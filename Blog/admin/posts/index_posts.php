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
                    <a href="criar_posts.html" class="btn btn-big">Criar post</a>
                </div>

                <div class="content">

                    <h2 class="page-title">Central de Posts</h2>

                    <table>
                        <thead>
                            <th>Código</th>
                            <th>Título</th>
                            <th>Autor(a)</th>
                            <th colspan="3">Ações</th>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>Post 01</td>
                                <td>Usuário</td>
                                <td><a href="#" class="edit">Editar</a></td>
                                <td><a href="#" class="delete">Excluir</a></td>
                                <td><a href="#" class="publish">Publicar</a></td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>Post 02</td>
                                <td>Usuário</td>
                                <td><a href="#" class="edit">Editar</a></td>
                                <td><a href="#" class="delete">Excluir</a></td>
                                <td><a href="#" class="publish">Publicar</a></td>
                            </tr>
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