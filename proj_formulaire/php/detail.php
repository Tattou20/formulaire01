<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
    <link rel="stylesheet" type="text/css" href="../css/style.css">
</head>
<body>
    <div>
        <header>
            <nav>
                <ul>
                    <li><a href="#">Home</a></li><li><a href="#">News</a></li><li><a href="#">Contact</a></li><li><a href="php/liste.php">User</a></li>      
                </ul>
            </nav>
        </header>

<?php
include "connection.php";

if(isset($_POST["id"]))
{
    $id=$_POST["id"];
    $req=mysqli_query($link, "SELECT * FROM user WHERE id='$id' ");
    $res=mysqli_fetch_array($req);
}else
{
    echo "Champ manquant.";
}

?>

        <form action="php/modifier.php" method="GET">
            <fieldset>
                <legend>Détail</legend>
                <label id="nom">Nom</label><input type="text" name="nom" value="<?php echo $res["nom"] ?>" placeholder="Votre nom ici !"/><br>
                <label for="">Prénom</label><input type="text" name="prenom" value="<?php echo $res["prenom"] ?>" placeholder="Votre prénom ici !"/><br>
                <label for="">Tel</label><input type="number" name="phone" value="<?php echo $res["tel"] ?>" placeholder="Votre numéro de téléphone ici !"/><br>
                <label for="">Email</label><input type="email" name="mail" value="<?php echo $res["mail"] ?>" placeholder="Votre email ici !"/><br>
                <label for="">Sexe</label>
                <?php
                    if($res["sexe"]=="Homme")
                    {
                ?>
                <input type="radio" name="gender" value="Homme" checked="true"/>Homme
                <input type="radio" name="gender" value="Femme"/>Femme <br>
                <?php
                    }else
                    {
                ?>
                <input type="radio" name="gender" value="Homme" />Homme
                <input type="radio" name="gender" value="Femme"checked="true"/>Femme <br> 
                <?php
                    }
                ?>
              
                
                <input type="submit" value="Modifier"/>
            </fieldset>
    
        </form>
    </div>    
</body>
</html>