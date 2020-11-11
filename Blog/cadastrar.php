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
        <link rel="stylesheet" href="css/estilos_geral.css">

        <title>Blog de tecnologia - Registre-se</title>
       
    </head>

    <body>
        <?php include_once('header.php');?>
    
        <!-- Page wrapper -->
        <div class="page-wrapper">
            
            <!-- Auth-content -->
            <div class="auth-content">
                
                <!-- Formulário de autenticação -->
                <form action="cadastrar.html" method="post">

                    <h2 class="form-title">Cadastro</h2>

                    <!--
                    <div class="msg error">
                        <li>Username required</li>
                    </div>
                     -->

                    <div>
                        <label>Usuário</label>
                        <input type="text" name="username" class="text-input">
                    </div>
                    <div>
                        <label>E-mail</label>
                        <input type="email" name="email" class="text-input">
                    </div   >                        
                    <div>
                        <label>Senha</label>
                        <input type="password" name="password" class="text-input">
                    </div>
                    <div>                                            
                        <label>Confirme a senha</label>
                        <input type="password" name="passwordConf" class="text-input">
                    </div>
                    <div>
                        <button type="submit" name="register-btn" class="btn btn-big">Cadastrar</button>
                    </div>
                    <div class="siu">
                        Ou <a href="login.html"><u>Faça o login</u></a>
                    </div>

                </form> <!-- // Formulário de autenticação -->

            </div> <!-- // Auth-content -->

        </div> <!-- // Page wrapper -->

        <!-- JQuery -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

        <!-- Slick Carousel -->
        <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>

        <!-- Scripts JS -->
        <!-- <script src="js/jquery-3.5.1.min.js"></script> -->
        <script src="js/scripts.js"></script>

    </body>

</html>