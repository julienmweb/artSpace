
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
                <h3>Détails de la commande numero <?php echo $data[0]['commande']?></h3>
                <p>Prix total de la commande: <?php echo $total ?> euros</p>
                <table>
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

            <footer class="footer">
<?php include_once 'ressources/view/layout/footer.php'; ?>
            </footer>
        </div>
<?php include_once 'ressources/view/layout/script.php'; ?>
    </body>
</html>
