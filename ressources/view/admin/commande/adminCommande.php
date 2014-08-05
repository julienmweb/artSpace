
<!DOCTYPE html>
<html lang="fr">
    <head>    
        <?php include_once 'ressources/view/layout/headAdmin.php'; ?>
                <title>Commande</title>
    </head>
    <body>
        <div class="pricing layout-container">
            <header class="header">    
                <?php include_once 'ressources/view/layout/headerAdmin.php'; ?>
            </header>
            <section class='myAccount'>
                <h3>Historique des commandes de tous les clients</h3>
                <table class='table-bordered'>
                    <tr>
                        <th>Numero de la commande</th>
                        <th>Nom du client</th>
                        <th>date de la commande</th>
                    </tr>
                    <?php
                    foreach ($data as $value) {
                        echo '<tr>';
                        echo '<td>';
                        echo '<a href="index.php?action=ctrlAdminCommande&amp;idCommande='. $value['commandeId'] .'">'.$value['commandeId'] .'</a>';
                        echo '</td>';
                        echo '<td>';
                        echo '<a href="index.php?action=ctrlAdminCommande&amp;idClient='. $value['clientId'] .'">'.$value['clientIdentifiant'] .'</a>';
                        echo '</td>';                        
                        echo '<td>';
                        echo $value['commandeDate'];
                        echo '</td>';                        
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
