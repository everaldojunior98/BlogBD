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

        <title>Tópicos</title>
       
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
                    <a href="criar_topicos.html" class="btn btn-big">Criar tópico</a>
                </div>

                <div class="content">

                    <h2 class="page-title">Central de tópicos</h2>

                    <table>
                        <thead>
                            <th>Código</th>
                            <th>Nome</th>
                            <th colspan="2">Ações</th>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>Hardware</td>
                                <td><a href="#" class="edit">Editar</a></td>
                                <td><a href="#" class="delete">Excluir</a></td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>Software</td>
                                <td><a href="#" class="edit">Editar</a></td>
                                <td><a href="#" class="delete">Excluir</a></td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>Para leigos</td>
                                <td><a href="#" class="edit">Editar</a></td>
                                <td><a href="#" class="delete">Excluir</a></td>
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