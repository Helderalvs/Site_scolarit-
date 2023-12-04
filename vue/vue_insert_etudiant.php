<h3> Ajout d'un nouvel étudiant </h3>

<form method="post">
	<table>
		<tr>
			<td> Nom de l'étudiant </td>
			<td> <input type="text" name="nom"></td>
		</tr>
		<tr>
			<td> Prénom de l'étudiant  </td>
			<td> <input type="text" name="prenom"></td>
		</tr>
		<tr>
			<td> Email contact  </td>
			<td> <input type="text" name="email"></td>
		</tr>
		<tr>
			<td> Date de naissance  </td>
			<td> <input type="date" name="dateNais"></td>
		</tr>
		<tr>
			<td> La classe de l'étudiant  </td>
			<td> 
				<select name="idclasse">
				</select>
			</td>
		</tr>
		<tr>
			<td>  </td>
			<td> 
				<input type="reset" name="Annuler" value="Annuler">
				<input type="submit" name="Valider" value="Valider">
			</td>
		</tr>
	</table>
</form>