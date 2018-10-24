<?php $title = "Administration file d'attente"; 

require dirname(__FILE__).'/../controllers/adminwaitcontrollers.php';
?>

<h1>Modification de la file d'attente</h1>

Liste file d'attente :

<table>
        <tr>
            <td> Place file d'attente</td>
            <td> Nom </td>
            <td> Prenom </td>
            <td> Email </td>
            <td> Modifier place dans la file d'attente </td>
            <td> Supprimer de la file d'attente </td>
        </tr>
        <tr>
            <?php 
             if($reponse = WaitList())
            {
                 foreach ($reponse as $row)
                {
                    echo "<td>".$row['placefileattente']."</td>
                    <td>".$row['nom']."</td>
                    <td>".$row['prenom']."</td>
                    <td>".$row['email']."</td>
                    <td> <form METHOD='POST' ACTION='?p=adminwait'/>
                <input type='hidden' name='idUserMod' value=\"".$row['id_u']."\"/>
				<select name='placefileattente'>";
                $listwaitDispo = getwaitDispo();
                foreach($listwaitDispo as $key=>$value){
                    //echo "toto";
                    $key1 = $key+1;
                    $value1 = $value+1;
                    echo  "<option value=\"".$key1."\">$value1</option>";
                }
				echo "
                </select>
                <input type='submit' name='envoyer' value='envoyer'>
                </form> </td>
                <td> Supprimer</td>
                </tr>"; 
                    //print_r($reponse);
                } 
            }                                 
        ?>
</table>