<?php
include_once 'fonctions/erreurs.php';
require_once 'fonctions/autoload.php';

session_start()?>
<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="utf-8" />
		<title>BioRelais</title>
		<style type="text/css">
			@import url(styles/bioRelais.css);
		</style>
		<link rel="shortcut icon" type="image/x-icon" href="images\Logo-bio.jpg" />
	</head>
	<body>

		<?php
				require_once 'controleurs/controleurPrincipal.php';
		?>
	</body>
</html>
