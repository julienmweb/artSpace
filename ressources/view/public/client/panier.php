<!DOCTYPE html>
<html lang="fr">
    <head>    
        <?php include_once 'ressources/view/layout/head.php'; ?>
        <title>Panier</title>
    </head>
    <body>
        <div class="pricing layout-container">
            <header class="header">    
                <?php include_once 'ressources/view/layout/header.php'; ?>
            </header>
            <section class='panier'>               
                <h3>Votre Panier</h3>
                <?php if (count($_SESSION['panier']->getLignesPanier()) > 0) {
                    ?> 
                    <p>Total de votre commande: <?php echo $_SESSION['panier']->totalPanier(); ?> euros</p>
                    <table class="table-bordered">
                        <tr>
                            <th>Nom du produit</th>
                            <th>Prix</th>
                            <th>Supprimer</th>
                        </tr>                    
                        <?php
                        foreach ($_SESSION['panier']->getLignesPanier() as $key => $value) {
                            echo '<tr>';
                            echo '<td><a class="link" href="index.php?action=ctrlPricingDetail&amp;id=' . $value['idProduit'] . '">' . $value['nomProduit'] . '</a></td>';
                            echo '<td>' . $value['prixProduit'] . '</td>';
                            echo '<td><a href="index.php?action=ctrlPanier&amp;event=del&amp;id=' . $key . '"><img src="ressources/img/bin.png" width=32 alt="bin" /></a></td>';
                            echo '</tr>';
                        }
                        ?>
                    </table> 
                    <?php echo $message; ?>                                 
                    <?php
                } else {
                    echo '<p>Votre panier est vide</p>';
                    echo '<p><a class="link" href="index.php?action=ctrlPricing">Consulter nos produits</a></p>';
                }
                ?>
            </section>             
            <footer class="footer">
                <?php include_once 'ressources/view/layout/footer.php'; ?>
            </footer>
        </div>
        <?php include_once 'ressources/view/layout/script.php'; ?>
    </body>
</html>
