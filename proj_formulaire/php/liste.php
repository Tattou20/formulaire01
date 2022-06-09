<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Utilisateurs</title>
    <style>
        body{
            width: 50%;
            font-family: arial;
            margin: 5px auto;
            padding: 20px;
            color: black ; 
            background: rgb(201, 219, 228);
         }
        div{
            background: url(../img/bg1.jpg);
            width: 800px;
    
        }
        table{
            border-collapse : collapse;
            margin : 50px;
            padding : 5px;
            font-size : 0.9em;
            font-family : sans-serif;
            box-shadow : 0 0 20px rgba(0,0,0,0.15);
            background : #ffffff;
        }
        td,th{
            padding : 10px;
            text-align : center;
        }
        thead{
            padding : 30px;
        }
        tbody tr{
            border-bottom : 1px solid #dddddd;
        }
        thead tr, tfoot tr{
            background-color : black;
            color : #ffffff;
            text-align : center;
        }
        tbody tr.active-row{
            font-weight : bold;
            color : #009879;
        }
        tbody tr:nth-of-type(even) {
            background-color : #f3f3f3;
        }
        input[type="submit"]{
            background-color : aliceblue;
            border : none;
            border-radius : 3px;
            color : black;
            padding : 6px;
            text-align : center;
            font-weight : bold;
            margin : 5px;
        }
    </style>
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
                    <input type="hidden" value="<?php echo $res["id"] ; ?>" />
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