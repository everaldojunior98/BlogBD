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

        <title>Blog de tecnologia</title>

    </head>

    <body>
		<?php
			require('app/database/connection.php');
			require('header.php');
		?>
    
        <!-- Page wrapper -->
        <div class="page-wrapper">
            
            <!-- Post slider -->
            <div class="post-slider">
                
                <h1 class="slider-title">Temos posts em alta</h1>
                
                <i class="fas fa-chevron-left prev"></i>
                <i class="fas fa-chevron-right next"></i>
                
                <div class="post-wrapper">
					<?php
						$query = "SELECT * FROM visualizacoes ORDER BY Quantidade DESC LIMIT 5";

						if ($result = $conn->query($query))
						{
							while ($row = $result->fetch_assoc())
							{
								$id = $row["IdPost"];
								$query = "SELECT * FROM posts WHERE IdPost = $id LIMIT 1";
								$post = mysqli_fetch_assoc(mysqli_query($conn, $query));
								
								$queryUser = "SELECT * FROM usuarios WHERE IdUsuario = ".$post['IdUsuario']." LIMIT 1";
								$resultUser = mysqli_fetch_assoc(mysqli_query($conn, $queryUser));
								
								echo "<div class=\"post\">";
								echo "<img src=\"imagens/img1.jpg\" alt=\"\" class=\"slider-image\">";
								echo "<div class=\"post-info\">";
								echo "<h4><a href=\"artigo.php?id=$id\">".$post["Titulo"]."</a></h4>";
								echo "<i class=\"far fa-user\"> ".$resultUser['Usuario']." </i>";
								echo "</div>";
								echo "</div>";
							}
						
							$result->free();
						}
					?>
                </div>

            </div>  <!-- // Post slider -->

            <!-- Content -->
            <div class="content clearfix">

                <!-- Main content -->
                <div class="main-content">

                    <h1 class="recent-post-title">Posts recentes</h1>

					<?php
						$query = "SELECT * FROM posts ORDER BY IdPost DESC LIMIT 5";
						
						if ($result = $conn->query($query))
						{
							while ($row = $result->fetch_assoc())
							{
								$queryUser = "SELECT * FROM usuarios WHERE IdUsuario = ".$row['IdUsuario']." LIMIT 1";
								$resultUser = mysqli_fetch_assoc(mysqli_query($conn, $queryUser));
								
								echo "<div class=\"post clearfix\">";
									echo "<img src=\"imagens/img1.jpg\" alt=\"\" class=\"post-image\">";
									echo "<div class=\"post-preview\">";
										echo "<h1><a href=\"artigo.php?id=".$row["IdPost"]."\">".$row["Titulo"]."</a></h1>";
										echo "<i class=\"fa fa-user\"> ".$resultUser['Usuario']." </i>";
										echo "&nbsp;";
										echo "<p class=\"preview-text\">".$row['Conteudo']."</p>";
										echo "<a href=\"artigo.php?id=".$row["IdPost"]."\" class=\"btn read-more\">Leia +</a>";
									echo "</div>";
								echo "</div>";
								
							}
						}
					?>					
                </div> <!-- //Main content -->

                <div class="sidebar">

                    <div class="section search">
                        <h2 class="section-title">Central de pesquisa</h2>
                        <form action="pesquisa.php" method="post">
                            <input type="text" name="search-term" class="text-input" placeholder="Pesquise aqui ...">
                        </form>
                    </div>

                    <?php require('categorias.php');?>

                </div>

            </div> <!-- // Content -->

        </div> <!-- // Page wrapper -->

        <!-- Footer -->
        <div class="footer">

            <div class="footer-content">

                <div class="footer-section about">
                    <h1 class="logo-text"><span>Tec</span>nologia</h1>
                    <p>###############</p>
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