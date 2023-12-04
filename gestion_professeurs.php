<h2> Gestion des professeurs  </h2>

<?php
$unControleur->setTable("professeur");
if (isset($_SESSION['role']) && $_SESSION['role']=="admin" ) {
	$leProfesseur = null; 
	if(isset($_GET['action']) && isset($_GET['idprofesseur']))
	{
		$action = $_GET['action']; 
		$idprofesseur = $_GET['idprofesseur'];
		$where = array("idprofesseur"=>$idprofesseur);
		switch($action){
			case "sup"  : 
			$unControleur->delete($where); 
			break;
			case "edit" : 
			$leProfesseur = $unControleur->selectWhere($where);
			break;
		}
	}
	require_once ("vue/vue_insert_professeur.php"); 

	if (isset($_POST['Valider'])){
		//verification des données 
		if( $unControleur->testVide($_POST)){
			echo "<br> Veuillez remplir les champs.";
		}else {
			//insertion de la nouveau professeur dans la BDD 
			$tab=array("nom"=>$_POST['nom'],
			"prenom"=>$_POST['prenom'],
			"email"=>$_POST['email'],
			"diplome"=>$_POST['diplome']);
			$unControleur->insert($tab);
			}
	}

	if (isset($_POST['Modifier'])){
		//verification des données 
		if( $unControleur->testVide($_POST)){
			echo "<br> Veuillez remplir les champs.";
		}else {
			//update de le professeur dans la BDD *
			$tab=array("nom"=>$_POST['nom'],
			"prenom"=>$_POST['prenom'],
			"email"=>$_POST['email'],
			"diplome"=>$_POST['diplome']);
			$where = array("idprofesseur"=>$idprofesseur);
			$unControleur->update ($tab,$where);
			//actualiser la page 
			header("Location: index.php?page=3");
			}
		}
	}//fin if session admin
	 
	if (isset($_POST['Filtrer'])){
		$filtre = $_POST['filtre']; 
		$where = array("nom","prenom","email","diplome");
		$lesProfesseurs = $unControleur->selectLike ($where,$filtre);
	}else{
		$lesProfesseurs = $unControleur->selectAll();
	}

	require_once ("vue/vue_select_professeurs.php"); 

	echo "<br></br> NB professeur :";
	echo $unControleur->count() ['nb'];
	echo "<br></br>";
?>