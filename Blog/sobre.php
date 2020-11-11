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

        <title>Blog de tecnologia - Sobre</title>

    </head>

    <body>
		<?php include_once('header.php');?>
		
        <!-- Page wrapper -->
        <div class="page-wrapper">
            
            

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