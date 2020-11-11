<!DOCTYPE html>
<html>

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">

        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.7.2/css/all.min.css"  />

        <!-- Google Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Candal&family=Lora&display=swap" rel="stylesheet">

        <!-- Custom Styling -->
        <link rel="stylesheet" href="../../css/estilos_geral.css">

        <!-- Admin Styling -->
        <link rel="stylesheet" href="../../css/estilos_admin.css">

        <title>Post</title>
       
    </head>

    <body>
        <?php
			require('../../restrict.php');
			require('../../header.php');
			require('../../app/database/connection.php');
			
			$erro = "";
			
			if($_SERVER["REQUEST_METHOD"] == "POST")
			{
				if(isset($_POST["id"]))
					$id = mysqli_real_escape_string($conn, trim($_POST["id"]));
				
				if(isset($_POST["title"]))
					$title = mysqli_real_escape_string($conn, trim($_POST["title"]));
				
				if(isset($_POST["body"]))
					$body = mysqli_real_escape_string($conn, trim($_POST["body"]));
				
				if(isset($_POST["category"]))
					$category = mysqli_real_escape_string($conn, trim($_POST["category"]));
				
				if(isset($_POST["keywords"]))
					$keywords = $_POST["keywords"];
				
				if(!empty($title) && !empty($body) && !empty($category) && !empty($keywords))
				{
					if(!empty($id))
					{
						$query = "DELETE FROM palavraschaveporpost WHERE IdPost = $id";
						if(mysqli_query($conn, $query))
						{
							$query = "UPDATE posts SET Titulo = '$title', Conteudo = '$body', IdCategoria = '$category' WHERE IdPost = $id";
							if(mysqli_query($conn, $query))
							{
								foreach ($keywords as $keyword)
								{
									$query = "INSERT INTO palavraschaveporpost (IdChave, IdPost) VALUES ('$keyword', '$id')";
									if(mysqli_query($conn, $query))
									{
										header("location: index_posts.php");
									}
								}
							}
						}
					}
					else
					{
						$query = "INSERT INTO posts (IdPost, IdUsuario, IdCategoria, Titulo, Conteudo) VALUES (NULL, '".$_SESSION["id"]."', '$category', '$title', '$body')";
						
						if(mysqli_query($conn, $query))
						{
							$lastId = mysqli_insert_id($conn);
							
							foreach ($keywords as $keyword)
							{
								$query = "INSERT INTO palavraschaveporpost (IdChave, IdPost) VALUES ('$keyword', '$lastId')";
								if(mysqli_query($conn, $query))
								{
									$query = "INSERT INTO visualizacoes (IdPost, Quantidade) VALUES ('$lastId', '0')";
									if(mysqli_query($conn, $query))
									{
										header("location: index_posts.php");
									}
									else
									{
										$erro = "Ocorreu um erro ao adicionar o post";
									}
								}
								else
								{
									$erro = "Ocorreu um erro ao adicionar o post";
								}	
							}
						}
						else
							$erro = "Ocorreu um erro ao adicionar o post";
					}
				}
				else
				{
					$erro = "Você deve preencher todos os campos";
				}
			}
			else if($_SERVER["REQUEST_METHOD"] == "GET")
			{
				if(isset($_GET["id"]))
					$id = mysqli_real_escape_string($conn, trim($_GET["id"]));
			}
		?>
		
        <!-- Admin Page wrapper -->
        <div class="admin-wrapper">
            
            <?php
				require('../sidebar.php');
			?>
            
            <!-- Admin content -->
            <div class="admin-content">

                <div class="content">

                    <h2 class="page-title"><?php echo !empty($id) ? "Editar" : "Adicionar"?> post</h2>

                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
						
						<?php
							if(!empty($erro))
							{
								echo "<div class=\"msg error\">";
								echo "<li>".$erro."</li>";
								echo "</div>";
							}
							
							if(!empty($id))
							{
								echo "<div>";
								echo "<input type=\"hidden\" name=\"id\" value=\"".$id."\" class=\"text-input\">";
								echo "</div>";
								
								$query = "SELECT * FROM posts WHERE IdPost = $id LIMIT 1";
								$result = mysqli_fetch_assoc(mysqli_query($conn, $query));
								
								if(isset($result))
								{
									$title = $result['Titulo'];
									$body = $result['Conteudo'];
									$category = $result['IdCategoria'];
								}
							}
						?>
						
                        <div>
                            <label>Título do post</label>
                            <input type="text" name="title" <?php echo "value=\"".$title."\""; ?> class="text-input">
                        </div>
                        <div>
                            <label>Texto do post</label>
                            <textarea name="body" id="body"><?php echo $body; ?></textarea>
                        </div>
                        <div>
                            <label>Categoria</label>
                            <select name="category" class="text-input">
								<?php
									$query = "SELECT * FROM categoria";

									if ($result = $conn->query($query))
									{
										while ($row = $result->fetch_assoc())
											echo "<option ".($category == $row['IdCategoria'] ? "selected" : "")." value=\"".$row['IdCategoria']."\">".$row['Nome']."</option>";
										$result->free();
									}
								?>
                                
                            </select>
                        </div>
						<div>
                            <label>Palavras Chave</label>
                            <select name="keywords[]" class="text-input" multiple>
								<?php
									$query = "SELECT * FROM palavraschaveporpost WHERE IdPost = $id";
									$postKeywords = array();
									
									if ($result = $conn->query($query))
									{
										while ($row = $result->fetch_assoc())
											$postKeywords[] = $row['IdChave'];
										$result->free();
									}
								
									$query = "SELECT * FROM palavrachave";

									if ($result = $conn->query($query))
									{
										while ($row = $result->fetch_assoc())
											echo "<option ".(in_array($row['IdChave'], $postKeywords) ? "selected" : "")." value=\"".$row['IdChave']."\">".$row['Chave']."</option>";
										$result->free();
									}
								?>
                            </select>
                        </div>
                        <div class="button-group">
                            <button type="submit" class="btn btn-big"><?php echo !empty($id) ? "Editar" : "Adicionar"?></button>
                        </div>
                    </form>

                </div>

            </div> <!-- // admin-content -->

        </div> <!-- // Admin Page wrapper -->

        <!-- JQuery -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

        <!-- CKEditor 5.0 -->
        <script src="https://cdn.ckeditor.com/ckeditor5/22.0.0/classic/ckeditor.js"></script>

        <!-- Scripts JS -->
        <script src="../../js/scripts.js"></script>

    </body>
</html>