<!DOCTYPE html>
<html lang="fr">
    <head>    
        <?php include_once 'ressources/view/layout/headAdmin.php'; ?>
        <title>Produit</title>
    </head>
    <body>
        <header class="header">    
            <?php include_once 'ressources/view/layout/headerAdmin.php'; ?>
        </header> 
            <section>
            <button class="btn btn-default"><a href="index.php?action=ctrlAdminProduitAjout">AJOUTER UN PRODUIT</a></button>
            </section>
                    <section>
                        <h2>Liste des produits</h2>
                        <table class="table-bordered">
                            <tr>
                                <th>NOM</th>
                                <th>DESCRIPTION</th>
                                <th>PRIX</th>
                                <th>RUBRIQUE</th>
                                <th>AFFICHER</th>
                                <th>MODIFIER</th>
                            </tr>    
                            <?php
                            foreach ($_SESSION['produits'] as $value) {
                                echo '<tr>';
                                echo '<td>' . $value->getNom() . '</td>';
                                
                              $descriptions = explode(";", $value->getDescription());  
                                echo '<td>';
                                echo '<ul>';
                                foreach ($descriptions as $data) {
                                    echo '<li>';
                                    echo $data;
                                    echo '</li>';
                                }
                                echo '</ul>';
                                echo '</td>';
                                echo '<td>' . $value->getPrix() . '</td>';
                                echo '<td>' . $value->getCategorie() . '</td>';
                                if ($value->getDisplay()==1){$display='Oui';} else { $display='Non';}
                                echo '<td>' . $display . '</td>';
                                echo '<td><button type="button" class="btn btn-default">  <a href="index.php?action=ctrlAdminProduitModifier&amp;id=' . $value->getId() . '">MODIFIER</a></button></td>';                                
                                echo '</tr>';
                            }
                            ?>
                        </table>
                    </section>    
        <footer class="footer">
            <?php include_once 'ressources/view/layout/footerAdmin.php'; ?>
        </footer>

        <?php include_once 'ressources/view/layout/script.php'; ?>
    </body>
</html>

