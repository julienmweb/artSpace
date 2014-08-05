<!DOCTYPE html>
<html lang="fr">
    <head>    
        <?php include_once 'ressources/view/layout/headAdmin.php'; ?>
        <title>Rubrique</title>
    </head>
    <body>

        <header class="header">    
            <?php include_once 'ressources/view/layout/headerAdmin.php'; ?>
        </header> 

        <section>
            <button class="btn btn-default"><a href="index.php?action=ctrlAdminCategorieAjout">AJOUTER UNE RUBRIQUE</a></button>
        </section>
        <section>
            <h2>Liste des rubriques</h2>
            <p>Votre rubrique sera affichée sur le site si elle contient des produits</p>
            <table class="table-bordered">
                <tr>
                    <th>NOM</th>
                    <th>MODIFIER</th>
                </tr>                    
                <?php
                foreach ($_SESSION['categories'] as $value) {
                    echo '<tr>';
                    echo '<td>' . $value->getNom() . '</td>';
                    echo '<td><button type="button"class="btn btn-default"> <a href="index.php?action=ctrlAdminCategorieModifier&amp;id=' . $value->getId() . '">MODIFIER</a></button></td>';
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
