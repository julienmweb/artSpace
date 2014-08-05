<?php
$identify = new entity\Identify();
$identify->identifyMyAdminAccount();
?>
<!DOCTYPE html>
<html lang="fr">
    <head>    
        <?php include_once 'ressources/view/layout/headAdmin.php'; ?>
        <title>Message</title>
    </head>
    <body>
        <div class="pricing layout-container">
            <header class="header">    
                <?php include_once 'ressources/view/layout/headerAdmin.php'; ?>
            </header>
            <section class="message">

                <p><?php echo $_SESSION['adminMessage'][0] ?></p>
                
                <p><a href="index.php?action=<?php echo $_SESSION['adminMessage'][1] ?>"><?php echo $_SESSION['adminMessage'][2] ?></a></p>
            </section>


            <footer class="footer">
<?php include_once 'ressources/view/layout/footerAdmin.php'; ?>
            </footer>
        </div>
<?php include_once 'ressources/view/layout/script.php'; ?>
    </body>
</html>
