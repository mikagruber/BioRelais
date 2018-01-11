<div class="logo">
		<a href="index.php?biorelaisMP=accueil">
				<img src="images/Logo-Bio.png" />
		</a>
		<?php
		if(isset($_SESSION['identification']) && $_SESSION['identification']){
			?>
		<div class="panier">
			<?php
				include 'vuePanier.php';
				?>
		</div>
		<?php
	}
	?>
</div>
<nav class="menuPrincipal">
	<?php
	echo $biorelaisMP;
	?>
</nav>
