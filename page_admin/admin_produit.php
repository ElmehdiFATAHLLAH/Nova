<?PHP
$banner='<a href="..\connexion\co_deco.php"> Connexion </a>';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <script src="https://kit.fontawesome.com/e0febe2254.js" crossorigin="anonymous"></script>   
     <link rel="stylesheet" href="admin.css">
</head>
<body>
    <header>
    <div class="logo">Nova</div>
    <ul>
    <a href="../Home_Produit/homeproduit.php" > <li><i class="fa-sharp fa-solid fa-house"></i></li></a>
    <a href="../Panier/verif_panier.php"> <li><i class="fa-sharp fa-solid fa-cart-shopping"></i></li></a>
    <a href="../Configuration/verif_config.php" > <li><i class="fa-solid fa-laptop" style="color: #ffffff;"></i></li></a>
    <a href="../Profil/verif_profil.php" > <li><i class="fa-sharp fa-solid fa-user"></i></li></a>    
        <?PHP  echo $banner; ?>  
    </ul>
    </header>

    <div class="slide">
        <a href="admin.php">Home</a>
        <a href="admin_client.php">Client</a>
        <a href="admin_produit.php" style="background-color: white; color: #1B1290;">Produit</a>
        
</div>

<div class="option">
         <ul>   
        <div class="ajoute"><li><a href="ajout_pro.php">Ajouter</a></li></div><br>
        <div class="modifie"><li><a href="modif_pro.php">Modifier</a></li></div><br>
        <div class="supprime"><li><a href="supp_pro.php">Supprimer</a></li></div>
       </ul> 
    </div>

     <section>
        <div class="table_pro_scroll">
        <table class="t_pro">
            <thead>
                <tr>
                    <th class="titre_table">Table Produits</th></tr>
                    <tr>
                    <th>ID</th>
                    <th>Produit</th>
                    <th>Prix</th>
                    <th>Qte</th>
                </tr >
            </thead>
            <tbody>
                <?php 
                  $connection= mysqli_connect("localhost", "root", "", "projet_web");
                  $sql="SELECT * FROM produit ORDER BY Qte_Stock ASC";
                  $result=mysqli_query($connection,$sql);
                   while ($i=mysqli_fetch_array($result,MYSQLI_ASSOC)){
                    echo "<tr class='trow'>";
                    if($i['Qte_Stock']==0)
                    {
                        echo "<td>".$i["Id_Prod"]."</td>
                        <td>".$i["Nom_Prod"]."</td>
                        <td>".$i["Prix_Prod"]." DHS</td>
                        <td style='color:red;'>RUPTURE DE STOCK</td></tr>";
                        continue;                        
                    }

                    echo "<td>".$i["Id_Prod"]."</td>
                    <td>".$i["Nom_Prod"]."</td>
                    <td>".$i["Prix_Prod"]." DHS</td>
                    <td>".$i["Qte_Stock"]."</td></tr>";
                    
                                                                        }


                  mysqli_close($connection);
 
               
                ?>
            </tbody>
        </table>
        </div>
        <br>
        <br>
        <br><br><br><br>
        </div>
    </section>
       <br><br>
</body>
</html>
