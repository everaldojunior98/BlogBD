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

        <title>Posts</title>
       
    </head>

    <body>
        <?php
			require('../../app/database/connection.php');
			require('../../restrict.php');
			require('../../header.php');
		?>
    
        <!-- Admin Page wrapper -->
        <div class="admin-wrapper">
            
            <?php
				require('../sidebar.php');
			?>
            
            <!-- Admin content -->
            <div class="admin-content">

                <div class="button-group">
                    <a href="criar_posts.php" class="btn btn-big">Criar post</a>
                </div>

                <div class="content">

                    <h2 class="page-title">Central de Posts</h2>

                    <table>
                        <thead>
                            <th>Id</th>
                            <th>Título</th>
                            <th>Autor(a)</th>
                            <th colspan="2">Ações</th>
                        </thead>
                        <tbody>
							<?php
								$query = "SELECT * FROM posts";

								if ($result = $conn->query($query))
								{
									while ($row = $result->fetch_assoc())
									{
										echo "<tr><td>".$row['IdPost']."</td>";
										echo "<td>".$row['Titulo']."</td>";
										
										$queryUser = "SELECT * FROM usuarios WHERE IdUsuario = ".$row['IdUsuario']." LIMIT 1";
										$resultUser = mysqli_fetch_assoc(mysqli_query($conn, $queryUser));
										
										echo "<td>".$resultUser['Usuario']."</td>";
										echo "<td><a href=\"criar_posts.php?id=".$row['IdPost']."\" class=\"edit\">Editar</a></td>";
										echo "<td><a href=\"deletar_post.php?id=".$row['IdPost']."\" class=\"delete\">Excluir</a></td></tr>";
									}
								
									$result->free();
								}
							?>
                        </tbody>
                    </table>

                </div>

            </div> <!-- // admin-content -->

        </div> <!-- // Admin Page wrapper -->

        <!-- JQuery -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

        <!-- Scripts JS -->
        <script src="../../js/scripts.js"></script>

    </body>
</html>