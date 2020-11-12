<?php
	require('restrict.php');
	require('header.php');
	require('app/database/connection.php');
	
	if($_SERVER["REQUEST_METHOD"] == "GET")
	{
		if(isset($_GET["id"]))
			$id = mysqli_real_escape_string($conn, trim($_GET["id"]));
		
		if(!empty($id))
		{
			$query = "DELETE FROM comentariosporpost WHERE IdComentario = $id";
			if(mysqli_query($conn, $query))
			{
				$query = "DELETE FROM comentario WHERE IdComentario = $id";
				if(mysqli_query($conn, $query))
				{
					header("location: artigo.php?id=".$_GET["a"]);
				}
			}
		}
	}
?>