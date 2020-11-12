<div class="section topics">
	<h2 class="section-title">Categorias</h2>
	<ul>
		<?php
			$query = "SELECT * FROM categoria";

			if ($result = $conn->query($query))
			{
				while ($row = $result->fetch_assoc())
					echo "<li><a href=\"pesquisa.php?c=".$row['IdCategoria']."\">".$row['Nome']."</a></li>";
				$result->free();
			}
		?>
		
	</ul>
</div>