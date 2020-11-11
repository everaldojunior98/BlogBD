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
		<?php
			require('app/database/connection.php');
			require('header.php');
			
			$erro = "";
			
			if($_SERVER["REQUEST_METHOD"] == "POST")
			{
				if(isset($_POST["username"]))
					$username = mysqli_real_escape_string($conn, trim($_POST["username"]));
				
				if(isset($_POST["password"]))
					$password = mysqli_real_escape_string($conn, trim($_POST["password"]));
				
				if(isset($_POST["passwordConf"]))
					$passwordConf = mysqli_real_escape_string($conn, trim($_POST["passwordConf"]));
				
				if(isset($_POST["email"]))
					$email = mysqli_real_escape_string($conn, trim($_POST["email"]));

				if(!empty($username) && !empty($password) && !empty($passwordConf) && !empty($email))
				{
					if (filter_var($email, FILTER_VALIDATE_EMAIL))
					{
						if($password === $passwordConf)
						{
							$password = md5($password);
							$query = "INSERT INTO usuarios (IdUsuario, Usuario, Email, Senha) VALUES (NULL, '$username', '$email', '$password')";

							if(mysqli_query($conn, $query))
								header("location: login.php");
							else
								$erro = "Ocorreu um erro ao adicionar o usuário";
						}
						else
						{
							$erro = "As senhas não são identicas";
						}
					}
					else
					{
						$erro = "Digite um email válido";
					}
				}
				else
				{
					$erro = "Você deve preencher todos os campos";
				}
			}
		?>
    
        <!-- Page wrapper -->
        <div class="page-wrapper">
            
            <!-- Auth-content -->
            <div class="auth-content">
                
                <!-- Formulário de autenticação -->
				<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">

                    <h2 class="form-title">Cadastro</h2>

					<?php
						if(!empty($erro))
						{
							echo "<div class=\"msg error\">";
							echo "<li>".$erro."</li>";
							echo "</div>";
						}
					?>

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