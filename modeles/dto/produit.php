<?php
class Produit {
	private $num;
	private $etat;

	public function __construct($unNum  , $unEtat){
		$this->$num = $unNum;
		$this->$etat = $unEtat;


	}
	public function getNum(){
		return $this->num;
	}
	public function setNum($unNum){
		$this->num = $unNum;
	}
	public function getEtat(){
		return $this->etat;
	}
	public function setEtat($unEtat){
		$this->etat = $unEtat;
	}

}
?>
