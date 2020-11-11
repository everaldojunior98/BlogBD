<header>
	<div class="logo">
		<h1 class="logo-text">
			<span>Tec</span>nologia
		</h1>

	</div>
	<i class="fa fa-bars menu-toggle"></i>
	<ul class="nav">
		<?php
			session_start();
			
			$dir = "";
			if(isset($isAdminPage) && $isAdminPage === true)
				$dir = "../../";

			echo "<li><a href=\"".$dir."index.php\">Home</a></li>";
			echo "<li><a href=\"".$dir."sobre.php\">Sobre</a></li>";
			
			if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true)
			{
				echo "<li>";
				echo "<a href=\"#\">";
				echo "<i class=\"fa fa-user\"></i>";
				echo " ".$_SESSION["username"]." ";
				echo "<i class=\"fa fa-chevron-down\" style=\"font-size: .8em;\"></i>";
				echo "</a>";
				echo "<ul>";
				echo "<li><a href=\"".$dir."admin/posts/index_posts.php\">Dashboard</a></li>";
				echo "<li><a href=\"".$dir."logout.php\" class=\"sair\">Sair</a></li>";
				echo "</ul>";
				echo "</li>";
			}
			else
			{
				echo "<li><a href=\"".$dir."login.php\">Login</a></li>";
			}
		?>
	</ul>
</header>