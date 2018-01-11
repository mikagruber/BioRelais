<?php

//--------------------------------------------------------
//formulaire enregistrement producteur
//--------------------------------------------------------
$formulaireEnregistrerProducteur = new Formulaire('post', 'index.php','fEnregistrementProducteur','fEnregistrementProducteur');
$formulaireEnregistrerProducteur->ajouterComposantLigne($formulaireEnregistrerProducteur->creerLabelFor('loginE', 'Id du producteur :'));
$formulaireEnregistrerProducteur->ajouterComposantLigne($formulaireEnregistrerProducteur->creerInputTexte('loginE', 'loginE', '', 1, '', 0));
$formulaireEnregistrerProducteur->ajouterComposantTab();


$formulaireEnregistrerProducteur->ajouterComposantLigne($formulaireEnregistrerProducteur->creerLabelFor('mdpE', 'Mot de passe du producteur :'));
$formulaireEnregistrerProducteur->ajouterComposantLigne($formulaireEnregistrerProducteur->creerInputMdp('mdpE', 'mdpE', '', '', '', 0));
$formulaireEnregistrerProducteur->ajouterComposantTab();

$formulaireEnregistrerProducteur->ajouterComposantLigne($formulaireEnregistrerProducteur->creerLabelFor('nomE', 'Nom du producteur :'));
$formulaireEnregistrerProducteur->ajouterComposantLigne($formulaireEnregistrerProducteur->creerInputTexte('nomE', 'nomE', '',1, '', 0));
$formulaireEnregistrerProducteur->ajouterComposantTab();

$formulaireEnregistrerProducteur->ajouterComposantLigne($formulaireEnregistrerProducteur->creerLabelFor('adresseE', 'Adresse du producteur :'));
$formulaireEnregistrerProducteur->ajouterComposantLigne($formulaireEnregistrerProducteur->creerInputTexte('adresseE', 'adresseE', '',1, '', 0));
$formulaireEnregistrerProducteur->ajouterComposantTab();

$formulaireEnregistrerProducteur->ajouterComposantLigne($formulaireEnregistrerProducteur->creerLabelFor('mailE', 'Mail du producteur :'));
$formulaireEnregistrerProducteur->ajouterComposantLigne($formulaireEnregistrerProducteur->creerInputTexte('mailE', 'mailE', '',1, '', 0));
$formulaireEnregistrerProducteur->ajouterComposantTab();

$formulaireEnregistrerProducteur->ajouterComposantLigne($formulaireEnregistrerProducteur->creerLabelFor('descriptifE', 'Descriptif du producteur :'));
$formulaireEnregistrerProducteur->ajouterComposantLigne($formulaireEnregistrerProducteur->creerInputTexte('descriptifE', 'descriptifE', '',1, '', 0));
$formulaireEnregistrerProducteur->ajouterComposantTab();

$formulaireEnregistrerProducteur->ajouterComposantLigne($formulaireEnregistrerProducteur->creerInputSubmit('enregistrementProducteur',"enregistrementProducteur","Valider"));
$formulaireEnregistrerProducteur->ajouterComposantTab();

if($messageErreurEnregistrement != ''){
$formulaireEnregistrerProducteur->ajouterComposantLigne($formulaireEnregistrerProducteur->creerLabel($messageErreurEnregistrement , "messageErreurEnregistrement"),2);
$formulaireEnregistrerProducteur->ajouterComposantTab();
}

$formulaireEnregistrerProducteur->creerFormulaire();

 include_once 'vues/vueEnregistrerProducteur.php'

 ?>
