<!DOCTYPE html>
<html lang="fr">
    <head>    
        <?php include_once 'ressources/view/layout/headAdmin.php'; ?>
        <title>Admin Index</title>
    </head>
    <body>
        <div class="pricing layout-container">
            <header class="header">    
                <?php include_once 'ressources/view/layout/headerAdmin.php'; ?>
            </header>
            <section>
                <h3>Bienvenue dans l'espace administration</h3>                
                <p>Il y a actuellement <?php echo $nbCommandes ?> commandes effectuées</p>
                <p>Il y a actuellement <?php echo $nbClients ?> clients enregistrés</p>
            </section>


            <footer class="footer">
<?php include_once 'ressources/view/layout/footerAdmin.php'; ?>
            </footer>
        </div>
<?php include_once 'ressources/view/layout/script.php'; ?>
    </body>
</html>
