<?php
require_once 'configs/param.php';
require_once 'lib/menu.php';
require_once 'lib/formulaire.php';
require_once 'lib/tableau.php';
require_once 'lib/dispatcher.php';
require_once 'modeles/dao.php';

if(isset($_GET['biorelaisMP'])){
	$_SESSION['biorelaisMP']= $_GET['biorelaisMP'];
}
else
{
	if(!isset($_SESSION['biorelaisMP'])){
		$_SESSION['biorelaisMP']="accueil";
	}
}

//--------------------------------------------------------
// connexion
//--------------------------------------------------------
$messageErreurConnexion ='';
if(isset($_POST['connexion'] ,$_POST['login'], $_POST['mdp'])){
		$_SESSION['personneActive'] = new personne($_POST['login'] ,'','','', $_POST['mdp'],'');
		$_SESSION['identification'] = personneDAO::verification($_SESSION['personneActive']);
		if($_SESSION['identification']){
				$_SESSION['biorelaisMP']="produits";
			}
		else {
				$messageErreurConnexion = 'Login ou mot de passe incorrect !';
		}
}

//--------------------------------------------------------
// inscription
//--------------------------------------------------------
$messageErreurInscription ='';
if(isset($_POST['inscription'] , $_POST['loginI'], $_POST['mdpI'])){
		$unePersonne = new personne($_POST['loginI'], $_POST['nomI'], $_POST['adresseI'], $_POST['mailI'], $_POST['mdpI'], 'P');
		$_SESSION['inscription'] = personneDAO::ajouter($unePersonne);
		if($_SESSION['inscription']){
				$_SESSION['biorelaisMP']="connexion";
		}
		else {
				$messageErreurInscription = 'Erreur lors de l\'inscription';
		}
}

//--------------------------------------------------------
// enregistrement producteur
//--------------------------------------------------------
$messageErreurEnregistrement ='';
if(isset($_POST['enregistrementProducteur'] , $_POST['mdpE'])){
		$unePersonne = new personne($_POST['loginE'], $_POST['nomE'], $_POST['adresseE'], $_POST['mailE'], $_POST['mdpE'], 'P');
		$_SESSION['enregistrement'] = personneDAO::ajouter($unePersonne);
		if($_SESSION['enregistrement']){
				$messageErreurEnregistrement = 'Enregistrement réussi';
		}
		else {
				$messageErreurEnregistrement = 'Erreur lors de l\'enregistrement';
		}
}

//--------------------------------------------------------
// modification informations de compte
//--------------------------------------------------------
$messageErreurModification ='';
if(isset($_POST['modifier'] )){
		$_SESSION['personneActive'] = new personne($_POST['idC'], $_POST['nomC'], $_POST['adresseC'], $_POST['mailC'], $_POST['mdpC'], 'P');
		$_SESSION['modification'] = personneDAO::modifier($_SESSION['personneActive']);
		if($_SESSION['modification']){
				$_SESSION['biorelaisMP']="compte";
				$messageErreurModification = 'Vos informations ont été mises à jour correctement';
		}
		else {
				$messageErreurModification = 'Erreur lors de la modification de vos informations';
		}
}

//--------------------------------------------------------
// suppression du compte
//--------------------------------------------------------
$messageErreurSuppression ='';
if(isset($_POST['supprimer'] )){
		$_SESSION['personneActive'] = new personne($_POST['idC'], $_POST['nomC'], $_POST['adresseC'], $_POST['mailC'], $_POST['mdpC'], 'P');
		$_SESSION['suppression'] = personneDAO::supprimer($_SESSION['personneActive']);
		if($_SESSION['suppression']){
				$_SESSION['biorelaisMP']="deconnexion";
		}
		else {
				$messageErreurSuppression = 'Erreur lors de la suppression du compte';
		}
}

$biorelaisMP= new Menu("biorelaisMP");
$biorelaisMP -> ajouterComposant($biorelaisMP-> creerItemLien("Accueil", "accueil"));
$biorelaisMP -> ajouterComposant($biorelaisMP-> creerItemLien("Produits", "produits"));
if(isset($_SESSION['identification']) && $_SESSION['identification']){
	$biorelaisMP -> ajouterComposant($biorelaisMP-> creerItemLien("Enregistrer Producteur", "enregistrerProducteur"));
  $biorelaisMP -> ajouterComposant($biorelaisMP-> creerItemLien("Compte", "compte"));
	$biorelaisMP -> ajouterComposant($biorelaisMP->creerItemLien("Se déconnecter", "deconnexion"));
}else
{	$biorelaisMP -> ajouterComposant($biorelaisMP->creerItemLien("Se connecter", "connexion"));
	$biorelaisMP -> ajouterComposant($biorelaisMP->creerItemLien("S'inscrire", "inscription"));

}

$biorelaisMP = $biorelaisMP->CreerMenu($_SESSION['biorelaisMP'],'biorelaisMP');

include_once dispatcher::dispatch($_SESSION['biorelaisMP']);
?>
