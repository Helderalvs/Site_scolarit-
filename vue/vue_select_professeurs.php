<h3> Liste des Professeurs </h3>

<form method="post">
	Filtrer par : <input type="text" name="filtre">
	<input type="submit" name="Filtrer" value="Filtrer">
</form>
<br>
<table border="1">
	<tr>
		<td> ID Professeur </td>
		<td> Nom Prof </td>
		<td> Prénom Prof  </td>
		<td> Email </td>
		<td> Diplôme </td>
		<?php 
	if (isset($_SESSION['role']) && $_SESSION['role']=="admin" ) {
		echo "<td> Opérations </td>"; 
	} 
	?>
	</tr>

	<?php
	if (isset($lesProfesseurs)){
		foreach($lesProfesseurs as $unProfesseur){
			echo "<tr>"; 
			echo "<td>".$unProfesseur['idprofesseur']."</td>";
			echo "<td>".$unProfesseur['nom']."</td>";
			echo "<td>".$unProfesseur['prenom']."</td>";
			echo "<td>".$unProfesseur['email']."</td>";
			echo "<td>".$unProfesseur['diplome']."</td>"; 
			if (isset($_SESSION['role']) && $_SESSION['role']=="admin" ) {
			echo "<td>"; 
			echo "<a href='index.php?page=3&action=sup&idprofesseur=".$unProfesseur['idprofesseur']."'>
				<img src='images/supprimer.png' height='30' width='30'>
				</a>";
			echo "<a href='index.php?page=3&action=edit&idprofesseur=".$unProfesseur['idprofesseur']."'>
				<img src='images/editer.png' height='30' width='30'>
				</a>";
			echo "</td>";
			}
			echo "</tr>" ;
		}
	}
	?>
</table>








