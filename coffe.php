<?php

 

// Vérifier si le formulaire est soumis

 if ( isset( $_POST['envoi'] ) ) {

 /* récupérer les données du formulaire en utilisant

 la valeur des attributs name comme clé

 */

 $Nom = $_POST['Nom_name'];

 $Prenoms = $_POST['Prenoms_name'];

 $Email = $_POST['Email_name'];

 $TEL = $_POST['TEL_name'];

 $PAYS = $_POST['PAYS_name'];

 $Age = $_POST['Age_name'];

 $message= $_POST['message_name'];

 

 

// afficher le résultat

 echo '<h3>Informations récupérées avec POST:</h3>';

 echo 'Nom : ' . $Nom. '<br> Prenoms : ' . $Prenoms . '<br> Email : ' . $Email . '<br>

telephone : ' . $TEL . '<br> PAYS :' . $PAYS . ' <br> Age: ' .$Age. ' <br> message: ' .$message;

 

 

 }

//On établit la connexion à la connexion avec le serveur

 $link = mysqli_connect("localhost", "root", "","uvs_etudiant") or

 die("Impossible de se connecter : " . mysqli_error()); //== echo puis exit

 echo '<br> Etat :Connexion au Serveur et à la Base de Données réussies' ;

 

 //On établit la connexion à la connexion

$db_selected = mysqli_select_db($link, 'uvs_etudiant');

if (!$db_selected) {

die ('Impossible de sélectionner cette base de données : ' . mysql_error());

}

echo '<br> connexion à la base réussie';

 

// requete insertion dans la base

 $sql=" INSERT INTO `etudiant` (`Nom`, `Prenoms`, `Email`, `TEL`,

`PAYS`, `Age`, `message`)

 

VALUES ('$Nom','$Prenoms','$Email','$TEL','$PAYS','$Age','$message') ";

 

 

if (!mysqli_query($link,$sql))

{

die('impossible d’ajouter cet enregistrement : ' .mysqli_error());

}

echo "<br>  L’enregistrement est ajouté ";

 

// requete affichage données de la base

 $res1="SELECT * FROM etudiant";

 $res = mysqli_query($link,$res1);

$row=mysqli_fetch_row($res);

echo " Vous venez d'enregistrer visiteur:";

echo "&nbsp;".$row[0];

echo "&nbsp;".$row[1];

echo "&nbsp;".$row[2];

echo "&nbsp;".$row[3];

echo "&nbsp;".$row[4];

echo "&nbsp;".$row[5];

echo "&nbsp;".$row[6];

 

//requete affichage toutes les enreistrements

$result = mysqli_query($link,"SELECT * FROM etudiant");

echo " <br> Et voici la liste des visiteur :";

echo "<table border='1'>

<tr>

<th>Nom</th>

<th>Prenoms</th>

<th>Email</th>

<th>TEL</th>

<th>PAYS</th>

<th>Age</th>

<th>message</th>

</tr>";

while($row = mysqli_fetch_array($result))

{

echo "<tr>";

echo "<td>" . $row['Nom'] . "</td>";

echo "<td>" . $row['Prenoms'] . "</td>";

echo "<td>" . $row['Email'] . "</td>";

echo "<td>" . $row['TEL'] . "</td>";

echo "<td>" . $row['PAYS'] . "</td>";

echo "<td>" . $row['Age'] . "</td>";

echo "<td>" . $row['message'] . "</td>";

echo "</tr>";

}

echo "</table>";
 ?>

 

 

 