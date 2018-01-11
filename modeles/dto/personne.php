<?php
class Personne {
	private $id;
	private $nom;
  private $adresse;
  private $mail;
  private $password;
  private $statut;

	public function __construct($unId  , $unNom, $uneAdresse, $unMail, $unPassword, $unStatut  ){
		$this->id = $unId;
		$this->nom = $unNom;
    $this->adresse = $uneAdresse;
    $this->mail = $unMail;
    $this->password = $unPassword;
    $this->statut = $unStatut;
	}
	public function getId(){
		return $this->id;
	}
	public function setId($unId){
		$this->id = $unId;
	}

	public function getNom(){
		return $this->nom;
	}
	public function setNom($unNom){
		$this->nom = $unNom;
	}

	public function getAdresse(){
		return $this->adresse;
	}
	public function setAdresse($uneAdresse){
		$this->adresse = $uneAdresse;
	}

	public function getMail(){
		return $this->mail;
	}
	public function setMail($unMail){
		$this->mail = $unMail;
	}

  public function getPassword(){
		return $this->password;
	}
	public function setPassword($unPassword){
		$this->password = $unPassword;
	}
  public function getStatut(){
		return $this->statut;
	}
	public function setStatut($unStatut){
		$this->statut = $unStatut;
	}

}
?>
