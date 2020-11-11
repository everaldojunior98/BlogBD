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

        <title>Palavras Chave</title>
       
    </head>

    <body>
        <?php
			require('../../restrict.php');
			require('../../header.php');
			require('../../app/database/connection.php');
			
			$erro = "";
			
			if($_SERVER["REQUEST_METHOD"] == "POST")
			{
				if(isset($_POST["chave"]))
					$chave = mysqli_real_escape_string($conn, trim($_POST["chave"]));
				
				if(isset($_POST["id"]))
					$id = mysqli_real_escape_string($conn, trim($_POST["id"]));
				
				if(!empty($chave))
				{
					if(!empty($id))
					{
						$query = "UPDATE palavrachave SET Chave = '$chave' WHERE IdChave = $id";
						
						if(mysqli_query($conn, $query))
							header("location: index_palavraschave.php");
						else
							$erro = "Ocorreu um erro ao editar a palavra chave";
					}
					else
					{
						$query = "INSERT INTO palavrachave (IdChave, Chave) VALUES (NULL, '$chave')";
						
						if(mysqli_query($conn, $query))
							header("location: index_palavraschave.php");
						else
							$erro = "Ocorreu um erro ao adicionar a palavra chave";
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
				if(isset($_GET["chave"]))
					$chave = mysqli_real_escape_string($conn, trim($_GET["chave"]));
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

                    <h2 class="page-title"><?php echo !empty($id) ? "Editar" : "Adicionar"?> palavra chave</h2>

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
							}
						?>
					
                        <div>
                            <label>Chave</label>
                            <input type="text" name="chave" <?php echo "value=\"".$chave."\"";?> class="text-input">
                        </div>
                        <div>
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