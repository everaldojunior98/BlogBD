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

        <title>Blog de tecnologia - Login</title>
       
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
				
				if(!empty($username) && !empty($password))
				{
					$password = md5($password);
					$query = "SELECT * FROM usuarios WHERE Usuario = '$username' && Senha = '$password' LIMIT 1";
					$result = mysqli_fetch_assoc(mysqli_query($conn, $query));
					
					if(isset($result))
					{
						$_SESSION["loggedin"] = true;
						$_SESSION["id"] = $result['IdUsuario'];
						$_SESSION["username"] = $username;
						
						header("location: index.php");
					}
					else
					{
						$erro = "Nome de usuário ou senha incorreta";
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

                    <h2 class="form-title">Login</h2>

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
                        <label>Senha</label>
                        <input type="password" name="password" class="text-input">
                    </div>
                    <div>
                        <button type="submit" name="register-btn" class="btn btn-big">Entrar</button>
                    </div>
                    <div class="siu">
                        Ou <a href="cadastrar.php"><u>Cadastre-se</u></a>
                    </div>

                </form> <!-- // Formulário de autenticação -->

            </div> <!-- // Auth-content -->

        </div> <!-- // Page wrapper -->

        <!-- JQuery -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

        <!-- Slick Carousel -->
        <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>

        <!-- Scripts JS -->
        <script src="js/scripts.js"></script>

    </body>

</html>