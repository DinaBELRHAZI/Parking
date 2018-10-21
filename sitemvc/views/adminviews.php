<?php $title = "Administration"; 

require dirname(__FILE__).'/../controllers/admincontrollers.php';
?>

<h1>PANNEAU D'ADMINISTRATION</h1>

<h2> Gestion des utilisateurs </h2>

modification / suppression des users
<table>
    <tr>
        <td> id_u</td>
        <td> Nom </td>
        <td> Prenom </td>
        <td> email </td>
        <td> Modification </td>
        <td> Suppression </td>
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
                <td> X </td>
                <td><form name='delete' method=POST action=''>
                <input type='submit' name='action' value='supprimer' />
                </form></td>
                </tr>"; 
                //print_r($reponse);
            }
        }                         
      ?>

</table>

<h2> Gestions des places </h2>

modifier les places
attribuer places
voir les attribution de places
historique de place
    <table>
        <tr>
            <td> id_p</td>
            <td> Numero Place </td>
            <td> Modification </td>
            <td> Suppression </td>
        </tr>
        <tr>
            <?php 
             if($reponse = PlaceList())
            {
                 foreach ($reponse as $row)
                {
                    echo "<td>".$row['id_p']."</td>
                    <td>".$row['numeroplace']."</td>
                    <td> X </td>
                    <td> X </td>
                    </tr>"; 
                    //print_r($reponse);
                } 
            }                                 
        ?>

    </table>

<h2> Gestion liste d'attente </h2>

consulter liste d'attente
modification liste d'attente

<table>
        <tr>
            <td> Place file d'attente</td>
            <td> Nom </td>
            <td> Prenom </td>
            <td> Email </td>
            <td> Modification </td>
            <td> Suppression </td>
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
                    <td> X </td>
                    <td> X </td>
                    </tr>"; 
                    //print_r($reponse);
                } 
            }                                 
        ?>
</table>

