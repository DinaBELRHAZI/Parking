<?php $title = "Administration"; 

require dirname(__FILE__).'/../controllers/admincontrollers.php';
?>

<h1>PANNEAU D'ADMINISTRATION</h1>

<h2> Gestion des utilisateurs </h2>

Liste des utilisateurs :
<table>
    <tr>
        <td> id_u</td>
        <td> Nom </td>
        <td> Prenom </td>
        <td> email </td>
        <td> Modification </td>
    </tr>
       <tr>
        <?php 
        if($reponse = UserList())
        {
             foreach ($reponse as $row)
            {
                echo "<td>".$row['id_u']."</td>
                <td>".$row['nom']."</td>
                <td>".$row['prenom']."</td>
                <td>".$row['email']."</td>
                <td> <a href='?p=adminuser'> Modifier</a></td>
                </td>
                </tr>"; 
                //print_r($reponse);
            }
        }                         
      ?>

</table>

<h2> Gestions des places </h2>

Pour modifier, ajouter ou attribuer des places manuellement ou voir l'historique des places rendez-vous <a href='?p=adminplace'> içi</a>. <br>

Liste des places :

    <table>
        <tr>
            <td> id_p</td>
            <td> Numero place </td>
            <td> Nom </td>
            <td> Prenom </td>
            <td> Email </td>
            <td> Date de fin </td>
        </tr>
        <tr>
            <?php 
             if($reponse = PlaceList())
            {
                 foreach ($reponse as $row)
                {
                    echo "<td>".$row['id_p']."</td>
                    <td>".$row['numeroplace']."</td>
                    <td>".$row['nom']."</td>
                    <td>".$row['prenom']."</td>
                    <td>".$row['email']."</td>
                    <td>".$row['datefin']."</td>
                    </tr>"; 
                    //print_r($reponse);
                } 
            }                                 
        ?>

    </table>

<h2> Gestion liste d'attente </h2>

Pour gerer la file d'attente rendez-vous <a href='?p=adminwait'> içi</a>. <br>

Liste file d'attente :
<table>
        <tr>
            <td> Place file d'attente</td>
            <td> Nom </td>
            <td> Prenom </td>
            <td> Email </td>
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
                    </tr>"; 
                    //print_r($reponse);
                } 
            }                                 
        ?>
</table>

