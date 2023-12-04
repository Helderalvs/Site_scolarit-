<h2> Gestion des classes  </h2>

<?php
$unControleur->setTable("classe");
if (isset($_SESSION['role']) && $_SESSION['role']=="admin" ) {
	$laClasse = null; 
	if(isset($_GET['action']) && isset($_GET['idclasse']))
	{
		$action = $_GET['action']; 
		$idclasse = $_GET['idclasse'];
		$where = array("idclasse"=>$idclasse);
		switch($action){
			case "sup"  : 
			$unControleur->delete($where); 
			break;
			case "edit" : 
			$laClasse = $unControleur->selectWhere($where);
			break;
		}
	}
	require_once ("vue/vue_insert_classe.php"); 

	if (isset($_POST['Valider'])){
		//verification des données 
		if( $unControleur->testVide($_POST)){
			echo "<br> Veuillez remplir les champs.";
		}else {
			//insertion de la nouvelle classe dans la BDD 
			$tab=array("nom"=>$_POST['nom'],
			"salle"=>$_POST['salle'],
			"diplome"=>$_POST['diplome']);
			$unControleur->insert ($tab);
			}
	}

	if (isset($_POST['Modifier'])){
		//verification des données 
		if( $unControleur->testVide($_POST)){
			echo "<br> Veuillez remplir les champs.";
		}else {
			//update de la classe dans la BDD 
			$tab=array("nom"=>$_POST['nom'],
			"salle"=>$_POST['salle'],
			"diplome"=>$_POST['diplome']);
			$where = array("idclasse"=>$_POST['idclasse']);
			$unControleur->update ($tab,$where);
			//actualiser la page 
			header("Location: index.php?page=2");
			}
	}
	} //fin du if admin 
	
	if (isset($_POST['Filtrer'])){
		$filtre = $_POST['filtre']; 
		$where = array("nom","salle","diplome");
		$lesClasses = $unControleur->selectLike($where,$filtre);
	}else{
		$lesClasses = $unControleur->selectAll();
	}

	require_once ("vue/vue_select_classes.php"); 

	echo "<br></br> NB classes :";
	echo $unControleur->count() ['nb'];
	echo "<br></br>";
?>