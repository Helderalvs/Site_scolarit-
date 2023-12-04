<?php
	require_once ("modele/modele.class.php"); 
	class Controleur {
		private $unModele ; 

		public function __construct (){
			//instanciation de la classe Modele
			$this->unModele = new Modele (); 
		}
		
		public function setTable ($table){
			$this->unModele->setTable($table);
		}
		
		/*********** Gestion des classes *********/
		
		public function insert ($tab){
			//plus tard : controle des données avant insertion
			$this->unModele->insert ($tab); 
		}

		public function selectAll (){
			return $this->unModele->selectAll(); 
		}

		public function selectLike ($where,$filtre){
			return $this->unModele->selectLike ($where,$filtre); 
		}
		public function delete($where){
			$this->unModele->delete ($where);
		}

		public function selectWhere ($where)
		{
			return $this->unModele->selectWhere($where);
		}
		public function update($tab,$where){
			$this->unModele->update($tab,$where);
		}

		public function count(){
			return $this->unModele->count();
		}


		/************ connexion **********/
		public function verifConnexion ($email, $mdp){
			return $this->unModele->verifConnexion ($email, $mdp);
		}

		/********** Securite des données ********/
		public function testVide ($tab){
			$vide = false ; 
			foreach($tab as $valeur){

				if ($valeur == ""){
					$vide = true; 
					break;
				}
			}
			return $vide ;
		}
	}
?>





