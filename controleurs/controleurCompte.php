<?php
if(isset($_SESSION['personneActive'])) {
  $_SESSION['personneActiveOUI'] = personneDAO::infosPersonne($_SESSION['personneActive']);
}
if(isset($_SESSION['personneActiveOUI'])) {

  $_SESSION['idPersonne'] = $_SESSION['personneActiveOUI'][0];
  $_SESSION['nomPersonne'] = $_SESSION['personneActiveOUI'][1];
  $_SESSION['adressePersonne'] = $_SESSION['personneActiveOUI'][2];
  $_SESSION['mailPersonne'] = $_SESSION['personneActiveOUI'][3];
  $_SESSION['mdpPersonne'] = $_SESSION['personneActiveOUI'][4];

$formulaireCompte = new Formulaire('post','index.php','formuCompte','Compte');
$uncomposant=$formulaireCompte->creerLabelFor('idC','Identifiant :');
$formulaireCompte->ajouterComposantLigne($uncomposant,1);

$uncomposant=$formulaireCompte->creerInputTexteRO('idC','idC', $_SESSION['idPersonne'], 1,'',0);
$formulaireCompte->ajouterComposantLigne($uncomposant,1);
$formulaireCompte->ajouterComposantTab();

$uncomposant=$formulaireCompte->creerLabelFor('nomC','Nom :');
$formulaireCompte->ajouterComposantLigne($uncomposant,1);

$uncomposant=$formulaireCompte->creerInputTexte('nomC','nomC', $_SESSION['nomPersonne'] , 1,'',0);
$formulaireCompte->ajouterComposantLigne($uncomposant,1);
$formulaireCompte->ajouterComposantTab();

$uncomposant=$formulaireCompte->creerLabelFor('adresseC','Adresse :');
$formulaireCompte->ajouterComposantLigne($uncomposant,1);

$uncomposant=$formulaireCompte->creerInputTexte('adresseC','adresseC', $_SESSION['adressePersonne'] , 1,'',0);
$formulaireCompte->ajouterComposantLigne($uncomposant,1);
$formulaireCompte->ajouterComposantTab();

$uncomposant=$formulaireCompte->creerLabelFor('mailC','Adresse mail :');
$formulaireCompte->ajouterComposantLigne($uncomposant,1);

$uncomposant=$formulaireCompte->creerInputTexte('mailC','mailC', $_SESSION['mailPersonne'] , 1,'',0);
$formulaireCompte->ajouterComposantLigne($uncomposant,1);
$formulaireCompte->ajouterComposantTab();

$uncomposant=$formulaireCompte->creerLabelFor('mdpC','Mot de passe :');
$formulaireCompte->ajouterComposantLigne($uncomposant,1);

$uncomposant=$formulaireCompte->creerInputTexte('mdpC','mdpC', $_SESSION['mdpPersonne'] , 1,'',0);
$formulaireCompte->ajouterComposantLigne($uncomposant,1);
$formulaireCompte->ajouterComposantTab();

$uncomposant=$formulaireCompte->creerInputSubmit('modifier','modifier','Modifier les informations');
$formulaireCompte->ajouterComposantLigne($uncomposant,1);
$formulaireCompte->ajouterComposantTab();

if($messageErreurModification != ''){
  $formulaireCompte->ajouterComposantLigne($formulaireCompte->creerLabel($messageErreurModification, "messageErreurModification"),2);
  $formulaireCompte->ajouterComposantTab();
}

$uncomposant=$formulaireCompte->creerInputSubmit('supprimer','supprimer','Supprimer le compte');
$formulaireCompte->ajouterComposantLigne($uncomposant,1);
$formulaireCompte->ajouterComposantTab();

if($messageErreurSuppression != ''){
$formulaireCompte->ajouterComposantLigne($formulaireCompte->creerLabel($messageErreurSuppression, "messageErreurSuppression"),2);
$formulaireCompte->ajouterComposantTab();
}

$formulaireCompte->creerFormulaire();
}

include_once 'vues/vueCompte.php';

?>
