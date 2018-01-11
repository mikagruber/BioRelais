<?php

	//--------------------------------------------------------
	//formulaire inscription
	//--------------------------------------------------------
	$formulaireInscription = new Formulaire('post', 'index.php', 'fInscription', 'Inscription');

	$formulaireInscription->ajouterComposantLigne($formulaireInscription->creerLabelFor('identifiantI', 'Identifiant :'), 1);
	$formulaireInscription->ajouterComposantLigne($formulaireInscription->creerInputTexte('loginI', 'loginI', ''   , 1, '',0),1);
	$formulaireInscription->ajouterComposantTab();

	$formulaireInscription->ajouterComposantLigne($formulaireInscription->creerLabelFor('mdpI', 'Mot de passe :'), 1);
	$formulaireInscription->ajouterComposantLigne($formulaireInscription->creerInputMdp('mdpI', 'mdpI', '' ,'', 0));
	$formulaireInscription->ajouterComposantTab();

	$formulaireInscription->ajouterComposantLigne($formulaireInscription->creerLabelFor('nomI', 'Nom :'));
	$formulaireInscription->ajouterComposantLigne($formulaireInscription->creerInputTexte('nomI', 'nomI', '',1, '', 0));
	$formulaireInscription->ajouterComposantTab();

	$formulaireInscription->ajouterComposantLigne($formulaireInscription->creerLabelFor('adresseI', 'Adresse :'));
	$formulaireInscription->ajouterComposantLigne($formulaireInscription->creerInputTexte('adresseI', 'adresseI', '',1, '', 0));
	$formulaireInscription->ajouterComposantTab();

	$formulaireInscription->ajouterComposantLigne($formulaireInscription->creerLabelFor('mailI', 'Mail :'));
	$formulaireInscription->ajouterComposantLigne($formulaireInscription->creerInputTexte('mailI', 'mailI', '',1, '', 0));
	$formulaireInscription->ajouterComposantTab();

	//$formulaireInscription->ajouterComposantLigne($formulaireInscription->creerLabel('Si vous êtes un producteur, présentez vous :', 'messageprod'));
	//$formulaireInscription->ajouterComposantTab();

	//$formulaireInscription->ajouterComposantLigne($formulaireInscription->creerLabelFor('descriptifI', 'Descriptif :'));
	//$formulaireInscription->ajouterComposantLigne($formulaireInscription->creerInputTexte('descriptifI', 'descriptifI', '',1, '', 0));
	//$formulaireInscription->ajouterComposantTab();

	$formulaireInscription->ajouterComposantLigne($formulaireInscription-> creerInputSubmit('inscription', 'inscription', 'Valider'),2);
	$formulaireInscription->ajouterComposantTab();

if($messageErreurInscription != ''){
	$formulaireInscription->ajouterComposantLigne($formulaireInscription->creerLabel($messageErreurInscription, "messageErreurInscription"),2);
	$formulaireInscription->ajouterComposantTab();
}

	$formulaireInscription->creerFormulaire();
	include_once 'vues/vueInscription.php';

?>
