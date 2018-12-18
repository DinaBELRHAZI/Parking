<?php $title = "Administration des places"; 

require dirname(__FILE__).'/../controllers/adminplacecontrollers.php';
?>

<h1> Administration des places de parking</h1>

<h2> Ajouter des places de parking</h2>

<?php if($placesAdded = addPlaces()){
echo "$placesAdded place ajoutéés.";}?>
<form METHOD="POST" ACTION="<?php echo "?p=adminplace" ?>">
<label for="place">Nombre de place a rajouter :</label>
<input type="number" id="place" name="places"> 
<INPUT type="submit" value="addplace" name="addplace">
</form>

<h2> Modification d'attribution des places </h2>

Liste des places :

<table>
    <tr>
        <td> id_p</td>
        <td>id_u</td>
        <td> Numero place </td>
        <td> Nom </td>
        <td> Prenom </td>
        <td> Email </td>
        <td> Date de fin </td>
        <td> modifier place </td>
    </tr>
    <tr>
        <?php 
         if($reponse = PlaceList())
        {
             foreach ($reponse as $row)
            {
                //echo $row['id_u'];
				echo "<tr>";
                echo "<td>".$row['id_p']."</td>
                <td>".$row['id_u']."</td>
                <td>".$row['numeroplace']."</td>
                <td>".$row['nom']."</td>
                <td>".$row['prenom']."</td>
                <td>".$row['email']."</td>
                <td>".$row['datefin']."</td>
                <td> <form METHOD='POST' ACTION='?p=adminplace'/>
                <input type='hidden' name='idUserMod' value=\"".$row['id_u']."\"/>
				<select name='idplace'>";
                $listPlacesDispo = getPLacesDispo();
                foreach($listPlacesDispo as $key=>$value){
					//echo "toto";
                    echo  "<option value=\"".$key."\">$value</option>";
                }
				echo "
                </select>
                <input type='submit' name='envoyer' value='envoyer'>
                </form> </td>
                </tr>"; 
                //print_r($reponse);
                //print_r($_POST);
            } 
        }                                 
    ?>

</table>


<h2> Consulter l'historique des places </h2>

Historique des places :

<table>
    <tr>
        <td>id_u</td>
        <td> Nom </td>
        <td> Prenom </td>
        <td> Email </td>
        <td> historique </td>
    </tr>
    <tr>
        <?php 
         if($reponse = HistoList())
        {
             foreach ($reponse as $row)
            {
                //echo $row['id_u'];
				echo "<tr>";
                echo "<td>".$row['id_u']."</td>
                <td>".$row['nom']."</td>
                <td>".$row['prenom']."</td>
                <td>".$row['email']."</td>
                <td>".$row['historique']."</td>
                </tr>"; 
                //print_r($reponse);
                //print_r($_POST);
            } 
        }                                 
    ?>
</table>