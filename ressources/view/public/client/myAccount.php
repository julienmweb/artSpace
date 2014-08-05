
<!DOCTYPE html>
<html lang="fr">
    <head>    
        <?php include_once 'ressources/view/layout/head.php'; ?>
                <title>My Account</title>
    </head>
    <body>
        <div class="pricing layout-container">
            <header class="header">    
                <?php include_once 'ressources/view/layout/header.php'; ?>
            </header>
            <section class='myAccount'>
                <h3><a href="index.php?action=ctrlSignUpdate">Modifier mes coordonnées</a></h3>
            </section>
            <section class='myAccount'>
                <h3>Historique des commandes</h3>
                <table>
                    <tr>
                        <th>Numero de la commande</th>
                        <th>date de la commande</th>
                    </tr>
                    <?php
                    foreach ($data as $value) {
                        echo '<tr>';
                        echo '<td>';
                        echo '<a href="index.php?action=ctrlMyAccount&amp;idCommande='. $value['id'] .'">'.$value['id'] .'</a>';
                        echo '</td>';
                        echo '<td>';
                        echo $value['date'];
                        echo '</td>';                        
                        echo '</tr>';
                    }
                    ?>
                </table>
            </section>

            <footer class="footer">
<?php include_once 'ressources/view/layout/footer.php'; ?>
            </footer>
        </div>
<?php include_once 'ressources/view/layout/script.php'; ?>
    </body>
</html>
