<h3> Liste des classes </h3>

<form method="post">
	Filtrer par : <input type="text" name="filtre">
	<input type="submit" name="Filtrer" value="Filtrer">
</form>
<br>
<table border="1">
	<tr>
		<td> ID Classe </td>
		<td> Nom Classe </td>
		<td> Salle de cours </td>
		<td> Diplôme préparé </td>
	<?php 
	if (isset($_SESSION['role']) && $_SESSION['role']=="admin" ) {
		echo "<td> Opérations </td>"; 
	} 
	?>
	</tr>

	<?php
	if (isset($lesClasses)){
		foreach($lesClasses as $uneClasse){
			echo "<tr>"; 
			echo "<td>".$uneClasse['idclasse']."</td>";
			echo "<td>".$uneClasse['nom']."</td>";
			echo "<td>".$uneClasse['salle']."</td>";
			echo "<td>".$uneClasse['diplome']."</td>"; 
			if (isset($_SESSION['role']) && $_SESSION['role']=="admin" ) {
			echo "<td>"; 
			echo "<a href='index.php?page=2&action=sup&idclasse=".$uneClasse['idclasse']."'>
				<img src='images/supprimer.png' height='30' width='30'>
				</a>";
			echo "<a href='index.php?page=2&action=edit&idclasse=".$uneClasse['idclasse']."'>
				<img src='images/editer.png' height='30' width='30'>
				</a>";
			echo "</td>";
			}
			echo "</tr>" ;
		}
	}
	?>
</table>





