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

        <title>Blog de tecnologia - Artigo</title>
       
    </head>

    <body>

        <!-- Facebook Page Plugin -->
        <div id="fb-root"></div>
        <script async defer crossorigin="anonymous" src="https://connect.facebook.net/pt_BR/sdk.js#xfbml=1&version=v8.0&appId=155361921631930&autoLogAppEvents=1" nonce="YyVKbLA6"></script>

        <?php
			require('app/database/connection.php');
			require('header.php');
			
			
			if($_SERVER["REQUEST_METHOD"] == "POST")
			{
				if(isset($_POST["message"]))
					$message = mysqli_real_escape_string($conn, trim($_POST["message"]));
				
				if(isset($_POST["id"]))
					$id = mysqli_real_escape_string($conn, trim($_POST["id"]));
				
				if(!empty($id) && !empty($message))
				{
					$query = "INSERT INTO comentario (IdComentario, IdUsuario, Comentario) VALUES (NULL, '".$_SESSION["id"]."', '$message')";
					
					if(mysqli_query($conn, $query))
					{
						$lastId = mysqli_insert_id($conn);
						$query = "INSERT INTO comentariosporpost (IdPost, IdComentario) VALUES ('$id', '$lastId')";
					
						if(mysqli_query($conn, $query))
						{
							header("location: artigo.php?id=$id");
						}
					}
				}
			}
		?>
    
        <!-- Page wrapper -->
        <div class="page-wrapper">
            
            <!-- Content -->
            <div class="content clearfix">

                <!-- Main content wrappe -->
                <div class="main-content-wrapper">
                
                    <!-- Main content -->
                    <div class="main-content single">
						<?php
							$id = $_GET['id'];
							$query = "SELECT * FROM posts WHERE IdPost = $id LIMIT 1";
							$post = mysqli_fetch_assoc(mysqli_query($conn, $query));
														
							echo "<h1 class=\"post-title\">".$post["Titulo"]."</h1>"; 
                        
							echo "<div class=\"post-content\">";
							echo $post["Conteudo"];
							echo "</div>";
						?>
						
						
                    </div>
					<div class="main-content single" style="margin-top:20px">
						<div class="footer-section contact-form">
							<h3>Comentários</h3>
							<div class="post-content">
								<?php
									$query = "SELECT * FROM comentariosporpost WHERE IdPost = ".$_GET["id"];

									if ($result = $conn->query($query))
									{
										while ($row = $result->fetch_assoc())
										{
											$queryCom = "SELECT * FROM comentario WHERE IdComentario = ".$row["IdComentario"]." LIMIT 1";
											$resultCom = mysqli_fetch_assoc(mysqli_query($conn, $queryCom));
											
											$queryUser = "SELECT * FROM usuarios WHERE IdUsuario = ".$resultCom['IdUsuario']." LIMIT 1";
											$resultUser = mysqli_fetch_assoc(mysqli_query($conn, $queryUser));
											
											$queryUser2 = "SELECT * FROM usuarios WHERE IdUsuario = ".$post['IdUsuario']." LIMIT 1";
											$resultUser2 = mysqli_fetch_assoc(mysqli_query($conn, $queryUser2));
											
											if($_SESSION["id"] == $resultCom['IdUsuario'] || $_SESSION["id"] == $resultUser2['IdUsuario'])
											{
												echo $resultUser["Usuario"]." : ".$resultCom["Comentario"]." <a href=\"deletar_comentario.php?id=".$row['IdComentario']."&a=$id\" class=\"delete\">[Excluir]</a></br></br>";
											}
											else
											{
												echo $resultUser["Usuario"]." : ".$resultCom["Comentario"]."</br></br>";
											}
											
											
										}
									}
								?>
							</div>
						</div>
                    </div>
					
					<div class="main-content single" style="margin-top:20px">
						<div class="footer-section contact-form">
							<h3>Adicione um comentario</h3>
							
							<?php
								if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true)
								{
									echo "<form action=\"".htmlspecialchars($_SERVER["PHP_SELF"])."\" method=\"post\">";
									echo "<input type=\"hidden\" name=\"id\" value=\"".$_GET["id"]."\">";
									echo "<textarea rows=\"4\" name=\"message\" class=\"text-input contact-input\" placeholder=\"Sua mensagem\"></textarea>";
									echo "<button type=\"submit\" class=\"btn btn-big contact-btn\">";
									echo "<i class=\"fas fa-envelope\"></i>";
									echo "Enviar";
									echo "</button>";
									echo "</form>";
								}
								else
								{
									echo "</br><h4>Faça login para comentar</h4>";
								}
							?>
						</div>
                    </div>
                
                </div> <!-- // Main content wrappe -->

                <!-- Sidebar -->
                <div class="sidebar single">
                    <div class="section popular">
                        <h2 class="section-title">Popular</h2>
                        
						<?php
							$query = "SELECT * FROM posts ORDER BY IdPost DESC LIMIT 5";
						
							if ($result = $conn->query($query))
							{
								while ($row = $result->fetch_assoc())
								{
									echo "<div class=\"post clearfix\">";
									echo "<img src=\"imagens/img1.jpg\" alt=\"\">";
									echo "<a href=\"artigo.php?id=".$row["IdPost"]."\" class=\"title\"><h4>".$row["Titulo"]."</h4></a>";
									echo "</div>";
								}
							}
						?>
                    </div>

                    <?php require('categorias.php');?>

                </div> <!-- // Sidebar -->

            </div> <!-- // Content -->

        </div> <!-- // Page wrapper -->

        <!-- Footer -->
        <div class="footer">

            <div class="footer-content">

                <div class="footer-section about">
                    <h1 class="logo-text"><span>Tec</span>nologia</h1>
                    <p>
                        ###############
                    </p>
                    <div class="contact">
                        <span><i class="fas fa-phone"></i>&nbsp; (00) 0-0000-000 </span>
                        <span><i class="fas fa-envelope"></i>&nbsp; info@info.com.br</span>
                    </div>
                    <div class="socials">
                        <a href="#"><i class="fab fa-facebook"></i></a>
                        <a href="#"><i class="fab fa-instagram"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                        <a href="#"><i class="fab fa-youtube"></i></a>
                    </div>
                </div>
            
                <div class="footer-section links">
                    <h2>Links rápidos</h2>
                    <br>
                    <ul>
                        <a href="#"><li>Equipe</li></a>
                        <a href="#"><li>Sobre o blog</li></a>
                        <a href="#"><li>Termos e condições</li></a>
                    </ul>
                </div>
            
                <div class="footer-section contact-form">
                    <h2>Entre em contato</h2>
                    <br>
                    <form action="index.html" method="post">
                        <input type="email" name="email" class="text-input contact-input" placeholder="Seu e-mail...">
                        <textarea rows="4" name="message" class="text-input contact-input" placeholder="Sua mensagem"></textarea>
                        <button type="submit" class="btn btn-big contact-btn">
                            <i class="fas fa-envelope"></i>
                            Enviar
                        </button>

                    </form>
                </div>
            
            </div>

            <div class="footer-bottom">
                &copy; Blog 2020
            </div>

        </div> <!-- //Footer -->

        <!-- JQuery -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

        <!-- Slick Carousel -->
        <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>

        <!-- Scripts JS -->
        <!-- <script src="js/jquery-3.5.1.min.js"></script> -->
        <script src="js/scripts.js"></script>

    </body>
</html>