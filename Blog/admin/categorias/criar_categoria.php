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

        <title>Categorias</title>
       
    </head>

    <body>
        <?php
			require('../../restrict.php');
			require('../../header.php');
			require('../../app/database/connection.php');
			
			$erro = "";
			
			if($_SERVER["REQUEST_METHOD"] == "POST")
			{
				if(isset($_POST["name"]))
					$name = mysqli_real_escape_string($conn, trim($_POST["name"]));
				
				if(!empty($name))
				{
					$query = "INSERT INTO categoria (IdCategoria, Nome) VALUES (NULL, '$name');";
					
					if(mysqli_query($conn, $query))
						header("location: index_categorias.php");
					else
						$erro = "Ocorreu um erro ao adicionar a categoria";
				}
				else
				{
					$erro = "Você deve preencher todos os campos";
				}
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

                    <h2 class="page-title">Criando categoria</h2>

                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
					
						<?php
							if(!empty($erro))
							{
								echo "<div class=\"msg error\">";
								echo "<li>".$erro."</li>";
								echo "</div>";
							}
						?>
					
                        <div>
                            <label>Nome</label>
                            <input type="text" name="name" class="text-input">
                        </div>
                        <div>
                            <button type="submit" class="btn btn-big">Adicionar</button>
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