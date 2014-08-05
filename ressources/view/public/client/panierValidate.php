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
            <section class='panier'>               
                <h3>Récapitulatif de votre commande:</h3>

                <p>Total de votre commande: <?php echo $_SESSION['panier']->totalPanier(); ?> euros</p>
                <table class="table-bordered">
                    <tr>
                        <th>Nom du produit</th>
                        <th>Prix</th>
                    </tr>                    
                    <?php
                    foreach ($_SESSION['panier']->getLignesPanier() as $key => $value) {
                        echo '<tr>';
                        echo '<td>' . $value['nomProduit'] . '</td>';
                        echo '<td>' . $value['prixProduit'] . '</td>';
                        echo '</tr>';
                    }
                    ?>
                </table> 
                <h3>Vos coordonnées:</h3>
                <table>
                    <tr>
                        <th>Nom</th>
                        <th>Prénom</th>
                        <th>Email</th>
                        <th>Adresse</th>
                    </tr>  
                    <tr>
                        <td><?php echo $client->getNom(); ?></td>
                        <td><?php echo $client->getPrenom(); ?></td>
                        <td><?php echo $client->getEmail(); ?></td>
                        <td><?php echo $client->getAdresse(); ?></td>
                    </tr>
                </table>
                <p><button class="btn--type2"><a href="index.php?action=ctrlCommande">Valider définitivement votre commande</a></button></p>                                

            </section>             
            <footer class="footer">
                <?php include_once 'ressources/view/layout/footer.php'; ?>
            </footer>
        </div>
        <?php include_once 'ressources/view/layout/script.php'; ?>
    </body>
</html>
