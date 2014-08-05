
<!DOCTYPE html>
<html lang="fr">
    <head>    
        <?php include_once 'ressources/view/layout/headAdmin.php'; ?>
                <title>Client</title>
    </head>
    <body>
        <div class="pricing layout-container">
            <header class="header">    
                <?php include_once 'ressources/view/layout/headerAdmin.php'; ?>
            </header>
            <section class='myAccount'>
                <h3>Détails du client</h3>
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
            <section class='myAccount'>
                <h3>Les commandes du client</h3>
                <table class='table-bordered'>
                    <tr>
                        <th>Numero de la commande</th>
                        <th>date de la commande</th>
                    </tr>
                    <?php
                    foreach ($commandesClient as $value) {
                        echo '<tr>';
                        echo '<td><a href="index.php?action=ctrlAdminCommande&amp;idCommande='. $value['id'] .'">'.$value['id'] .'</a></td>';
                        echo '<td>'. $value['date'].'</td>';
                        echo '</tr>';
                    }
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
