<?php
	class Modele {
		private $unPDO ; //php data object 
		private $table ;

		public function __construct (){
			try{
			$url ="mysql:host=localhost;dbname=scolarite_JV_iris_24"; 
			$user = "root"; 
			$mdp =""; 
			//instanciation de la classe PDO 
			$this->unPDO = new PDO($url, $user, $mdp);
			}
			catch (PDOException $exp){
				echo "Erreur connexion BDD : ".$exp->getMessage (); 
			}
		}
		public function setTable ($table) {
			$this->table= $table ;
		}
		
		/**************** Gestion des classes  ***********/
		public function insert ($tab){
			$champs = array();
			foreach($tab as $cle =>$valeur){
				$champs[] = ":".$cle;
				$donnees[":".$cle] = $valeur;
			}
			$chaine = implode(" , ",$champs);
			$requete ="insert into ".$this->table." values(null, ".$chaine.") ;";
			$select = $this->unPDO->prepare ($requete); 
			$select->execute($donnees);
		}
		public function selectAll (){
			$requete ="select * from ".$this->table.";";
			$select = $this->unPDO->prepare ($requete); 
			$select->execute();
			return $select->fetchAll(); 
		}
		public function delete ($where){
			$champs = array();
			$donnees = array();
			foreach($where as $cle => $valeur){
				$champs [] = $cle." = :".$cle;
				$donnees [":".$cle] = $valeur;
			}
			$chaine = implode(" and ", $champs);
			$requete ="delete from ".$this->table." where ".$chaine.";";
			$select = $this->unPDO->prepare ($requete); 
			$select->execute($donnees);
		}
		public function selectWhere ($where){
			$champs = array();
			$donnes = array();
			foreach($where as $cle =>$valeur){
				$champs[] = $cle." = :".$cle;
				$donnees[":".$cle] = $valeur;
			}
			$chaine = implode(" and ", $champs);
			$requete="select * from ".$this->table." where ".$chaine.";";
			$select = $this->unPDO->prepare ($requete); 
			$select->execute($donnees);
			return $select->fetch() ; //un seul résultat
		}
		public function update ($tab,$where){
			$champs = array();
			$donnes = array();
			foreach($where as $cle =>$valeur){
				$champs[] = $cle." = :".$cle;
				$donnees[":".$cle] = $valeur;
			}
			$chaine = implode(" and ", $champs);

			$champsSet = array();
			foreach($tab as $cle =>$valeur){
				$champsSet[] = $cle." = :".$cle;
				$donnees[":".$cle] = $valeur;
			}
			$chaineSet = implode(", ", $champsSet);
			$requete ="update ".$this->table." set ".$chaineSet." where ".$chaine." ;";
			$select = $this->unPDO->prepare ($requete); 
			$select->execute($donnees);
		}
		public function selectLike ($where,$filtre){
			$chaine = "";
			$champs = array();
			foreach($where as $cle) {
				$champs[] = $cle." like :filtre ";
			}
			$chaine = implode(" or ", $champs);
			$requete ="select * from ".$this->table." where ".$chaine.";";
			$select = $this->unPDO->prepare ($requete); 
			$donnees=array(":filtre"=>"%".$filtre."%");
			$select->execute($donnees);
			return $select->fetchAll(); 
		}

		public function count(){
			$requete = "select count(*) as nb from ".$this->table.";";
			$select = $this->unPDO->prepare ($requete); 
			$select->execute();
			return $select->fetch();
		}

	

	/************ Connexion ***************************/
		public function verifConnexion ($email, $mdp){
			$requete ="select * from user where email=:email and mdp =:mdp ;";
			$donnees=array(":email"=>$email,":mdp"=>$mdp);
			$select = $this->unPDO->prepare ($requete);
			$select->execute($donnees);
			return $select->fetch(); 
		}
	}
?>







