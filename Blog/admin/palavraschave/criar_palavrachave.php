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
            
            <!-- Left sidebar -->
            <div class="left-sidebar">
                <ul>
                    <li><a href="../posts/index_posts.html">Posts</a></li>
                    <li><a href="../usuarios/index_usuarios.html">Usuários</a></li>
                    <li><a href="index_topicos.html">Tópicos</a ></li>
                </ul>
            </div> <!-- // Left sidebar -->
            
            <!-- Admin content -->
            <div class="admin-content">

                <div class="content">

                    <h2 class="page-title">Criando tópico</h2>

                    <form action="criar_topicos.html" method="post">
                        <div>
                            <label>Nome do tópico</label>
                            <input type="text" name="name" class="text-input">
                        </div>
                        <div>
                            <label>Descrição do tópico (opcional)</label>
                            <textarea name="description" id="body">
                            </textarea>
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