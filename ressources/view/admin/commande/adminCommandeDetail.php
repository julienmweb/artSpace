
<!DOCTYPE html>
<html lang="fr">
    <head>    
        <?php include_once 'ressources/view/layout/headAdmin.php'; ?>
                <title>Commande détail</title>
    </head>
    <body>
        <div class="pricing layout-container">
            <header class="header">    
                <?php include_once 'ressources/view/layout/headerAdmin.php'; ?>
            </header>
            <section class='myAccount'>
                <h3>Détails de la commande numero <?php echo $data[0]['commande']?></h3>
                <p>Prix total de la commande: <?php echo $total ?> euros</p>
                <table class='table-bordered'>
                    <tr>
                        <th>Nom du produit</th>
                        <th>Prix du produit</th>
                    </tr>
                    <?php
                    foreach ($data as $value) {
                        echo '<tr>';
                        echo '<td>';
                        echo $value['nomProduit'];
                        echo '</td>';
                        echo '<td>';
                        echo $value['prixProduit'];
                        echo '</td>';                        
                        echo '</tr>';
                    }
                    ?>
                </table>
            </section>
            <section class='myAccount'>
                <h3>Client:</h3>
                <table class='table-bordered'>
                    <tr>
                        <th>Nom</th>
                        <th>Prenom</th>
                        <th>Identifiant</th>
                        <th>Email</th>
                        <th>Adresse</th>
                    </tr>
                    <?php 
                        echo '<tr>';
                        echo '<td>'. $client->getNom() .'</td>';
                        echo '<td>'. $client->getPrenom() .'</td>';   
                        echo '<td>'. $client->getIdentifiant() .'</td>';
                        echo '<td>'. $client->getEmail() .'</td>';   
                        echo '<td>'. $client->getAdresse() .'</td>';                         
                        echo '</tr>';
                    ?>
                </table>
            </section>
            <footer class="footer">
<?php include_once 'ressources/view/layout/footerAdmin.php'; ?>
            </footer>
        </div>
<?php include_once 'ressources/view/layout/script.php'; ?>
    </body>
</html>
