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
		?>
		
        <!-- Admin Page wrapper -->
        <div class="admin-wrapper">
            
            <!-- Left sidebar -->
            <div class="left-sidebar">
                <ul>
                    <li><a href="index_posts.html">Posts</a></li>
                    <li><a href="../usuarios/index_usuarios.html">Usuários</a></li>
                    <li><a href="../topicos/index_topicos.html">Tópicos</a></li>
                </ul>
            </div> <!-- // Left sidebar -->
            
            <!-- Admin content -->
            <div class="admin-content">

                <div class="content">

                    <h2 class="page-title">Criando um post</h2>

                    <form action="criar_post.html" method="post">
                        <div>
                            <label>Título do post</label>
                            <input type="text" name="title" class="text-input">
                        </div>
                        <div>
                            <label>Texto do post</label>
                            <textarea name="body" id="body"></textarea>
                        </div>
                        <div>
                            <!-- <label>Imagem</label> -->
                            <input type="file" name="image" class="text-input">
                        </div>
                        <div>
                            <label>Tópicos</label>
                            <select name="topic" class="text-input">
                                <option value="Hardware">Hardware</option>
                                <option value="Software">Software</option>
                                <option value="Para leigos">Para leigos</option>
                            </select>
                        </div>
                        <div class="button-group">
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