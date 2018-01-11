<?php
class Produit {
	private $id;
	private $nom;
  private $descriptif;
  private $unite;


	public function __construct($unId  , $unNom, $unDescriptif, $uneUnite){
		$this->$id = $unId;
		$this->$nom = $unNom;
    $this->$descriptif=$unDescriptif;
    $this->$unite=$uneUnite;

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
		$this->mdp = $unMdp;
	}
  public function getDescriptif(){
		return $this->descriptif;
	}
	public function setDescriptif($unDescriptif){
		$this->descriptif = $unDescriptif;
	}
  public function getUnite(){
    return $this->unite;
  }
  public function setUnite($uneUnite){
    $this->unite = $uneUnite;
  }



}
?>
