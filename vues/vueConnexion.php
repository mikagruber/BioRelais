<div id="conteneur">

	<div id="header">
		<?php include 'haut.php' ;?>
	</div>

	<div id="content">
	        <div class="contentConnexion">
						<div class ='titre'>Veuillez vous identifier</div>
	            <?php
	                $formulaireConnexion->afficherFormulaire();
	            ?>
					</div>
	</div>

	<div id="bas">
		<?php  include 'bas.php' ;?>
	</div>

</div>
