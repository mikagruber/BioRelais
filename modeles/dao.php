<?php
class DBConnex extends PDO{

	private static $instance;

	public static function getInstance(){
		if ( !self::$instance ){
			self::$instance = new DBConnex();
		}
		return self::$instance;
	}

	function __construct(){
		try {
			parent::__construct(Param::$dsn ,Param::$user, Param::$pass);
		} catch (Exception $e) {
			echo $e->getMessage();
			die("Impossible de se connecter. " );
		}
	}

	public function __destruct(){
		if(!is_null(self::$instance)){
			self::$instance = null;
		}
	}


	public function queryFetchAll($sql){
		$sth  =$this->query($sql);

		if ( $sth ){
			return $sth -> fetchAll(PDO::FETCH_ASSOC);
		}

		return false;
	}


	public function queryFetchFirstRow($sql){
		$sth    = $this->query($sql);
		$result    = array();

		if ( $sth ){
			$result  = $sth -> fetch();
		}

		return $result;
	}


	public function insert($sql){
		if ( $this -> exec($sql) > 0 ){
			return 1;
			//$this->lastInsertId();
		}
		return false;
	}

	public function update($sql){
		return $this->exec($sql) ;
	}

	public function delete($sql){
		return $this->exec($sql) ;
	}

	public function creerMenu($composantActif,$nomMenu){
			$menu = "<ul class = '" .  $this->style . "'>";
			foreach($this->composants as $composant){
				if($composant[0] == $composantActif){
					$menu .= "<li>";
					$menu .=  "<span class='actif'>" . $composant[1] ."</span>";
				}
				else{
					$menu .= "<li>";
					$menu .= "<a href='index.php?" . $nomMenu ;
					$menu .= "=" . $composant[0] . "' >";
					$menu .= "<span>" . $composant[1] ."</span>";
					$menu .= "</a>";
				}
				$menu .= "</li>";
			}
			$menu .= "</ul>";
			return $menu ;
		}

}

class personneDAO{
	public static function verification(personne $personne){
		$db = DBConnex::getInstance();
		$req = $db->prepare('SELECT id, password FROM personne WHERE id = :login AND password = :password');
		$req->execute(array(
			'login' => $personne->getId(),
			'password' => $personne->getPassword()
		));
		if ($req->rowCount() == 1) {
			$res = True;
		}
		else{
			$res = False;
		}
		return $res;
	}

	public static function lire(personne $personne){
		$sql="select * from personne where id = '". $personne->getId() ."'";
		$personne = DBConnex::getInstance()->queryFetchFirstRow($sql);
		echo $sql;
		return $personne;
	}


	public static function supprimer(personne $personne){
		$sql="delete from personne where id = '". $personne->getId() ."'";
		echo $sql;
		return DBConnex::getInstance()->delete($sql);
	}

	public static function modifier(personne $personne){
		$sql ="update personne set
										id ='".$personne->getId() ."',
										nom = '".$personne->getNom() ."',
										adresse = '".$personne->getAdresse() ."',
										mail = '".$personne->getMail() ."',
										password = '".$personne->getPassword() ."'
										where id='".$personne->getId()."'";
				return DBConnex::getInstance()->update($sql);
	}

//************ requete qui insere une personne dans la bdd******************
	public static function ajouter(personne $personne){
		$sql="insert into personne (ID, NOM, ADRESSE, MAIL, PASSWORD, STATUT) values (
						 '".$personne->getId() . "',
						 '".$personne->getNom() ."',
						 '".$personne->getAdresse() ."',
						 '".$personne->getMail() ."',
						 '".$personne->getPassword() ."',
						 '".$personne->getStatut() ."')";
		return DBConnex::getInstance()->insert($sql);
	}

	public static function infosPersonne(personne $unePersonne){
		$sql="select * from personne where id = '". $unePersonne->getId() ."'";
		$personne = DBConnex::getInstance()->queryFetchFirstRow($sql);
		return $personne;
	}
}

Class ProducteurDAO{


//************ requete qui insere un producteur dans la bdd******************
    public static function insertProducteur(personne $personne)
       {
				 $sql="insert into personne (ID, NOM, ADRESSE, MAIL, PASSWORD, STATUT) values (
								 '".$personne->getId() . "',
								 '".$personne->getNom() ."',
								 '".$personne->getAdresse() ."',
								 '".$personne->getMail() ."',
								 '".$personne->getPassword() ."',
								 '".$personne->getStatut() ."')";
				return DBConnex::getInstance()->insert($sql);
       }
}
