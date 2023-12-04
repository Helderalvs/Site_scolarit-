<h3> Ajout d'un nouvel enseignement </h3>

<form method="post">
	<table>
		<tr>
			<td> Nom de la Matière </td>
			<td> <input type="text" name="matiere"></td>
		</tr>
		<tr>
			<td> Coefficient </td>
			<td> <input type="number" name="coeff"></td>
		</tr>
		<tr>
			<td> Nb Heures  </td>
			<td> <input type="number" name="nbheures"></td>
		</tr>
		<tr>
			<td> La classe  </td>
			<td> 
				<select name="idclasse">
				</select>
			</td>
		</tr>
		<tr>
			<td> Le Professeur  </td>
			<td> 
				<select name="idprofesseur">
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