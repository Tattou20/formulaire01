<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Utilisateurs</title>
    <link rel="stylesheet" type="text/css" href="../css/stylelist.css">
</head>
<body>
    <div>
    <h1>Liste des utilisateurs</h1>
    <table>
        <thead>
        <tr>
            <th>Identifiant</th>
            <th>Nom</th>
            <th>Prénom</th>
            <th>Téléphone</th>
            <th>Email</th>
            <th>Sexe</th>
            <th>Action</th>
        </tr>
        </thead>
        <?php
            Include "connection.php";
            $req= mysqli_query($link," SELECT * FROM user" );
            while($res=mysqli_fetch_array($req))
            {    
        ?>
        <tbody>
        <tr>
            <td><?php echo $res["id"] ; ?></td>
            <td><?php echo $res["nom"] ; ?></td>
            <td><?php echo $res["prenom"] ; ?></td>
            <td><?php echo $res["tel"] ; ?></td>
            <td><?php echo $res["mail"] ; ?></td>
            <td><?php echo $res["sexe"] ; ?></td>

            <td>
                <form action="detail.php" method="POST">
                    <input type="hidden" name="id" value="<?php echo $res["id"] ; ?>" />
                    <input type="submit" value="Détail" />
                </form> 
                <form action="delete.php" method="POST">
                    <input type="hidden" name="id" value="<?php echo $res["id"] ; ?>" />
                    <input type="submit" value="Supprimer" />
                </form>              
            </td>

        </tr>
        </tbody>
        <?php 
            }
        ?>
        <tfoot>
            <tr>
                <td colspan="7" >
                    Liste des utilisateurs inscrits
                </td>
            </tr>
        </tfoot>
    </table>
    <form  action="../index.html" method="POST">
                    <input type="submit" value="Menu" />
                </form>
    </div>
</body>
</html>