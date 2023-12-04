<h3> Liste des Etudiants </h3>

<form method="post">
	Filtrer par : <input type="text" name="filtre">
	<input type="submit" name="Filtrer" value="Filtrer">
</form>
<br>
<table border="1">
	<tr>
		<td> ID Etudiant </td>
		<td> Nom  </td>
		<td> Prénom   </td>
		<td> Email </td>
		<td> Date naissance  </td>
		<td> La Classe  </td>
	</tr>

	<?php
	if (isset($lesEtudiants)){
		foreach($lesEtudiants as $unEtudiant){
			echo "<tr>"; 
			echo "<td>".$unEtudiant['idetudiant']."</td>";
			echo "<td>".$unEtudiant['nom']."</td>";
			echo "<td>".$unEtudiant['prenom']."</td>";
			echo "<td>".$unEtudiant['email']."</td>";
			echo "<td>".$unEtudiant['dateNais']."</td>";
			echo "<td>".$unEtudiant['idclasse']."</td>"; 
			echo "</tr>" ;
		}
	}
	?>
</table>

