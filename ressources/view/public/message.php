<!DOCTYPE html>
<html lang="fr">
    <head>    
        <?php include_once 'ressources/view/layout/head.php'; ?>
        <title>Message</title>
    </head>
    <body>
        <div class="pricing layout-container">
            <header class="header">    
                <?php include_once 'ressources/view/layout/header.php'; ?>
            </header>
            <section class="message">

                <p><?php echo $_SESSION['message'][0] ?></p>
                
                <p><a href="index.php?action=<?php echo $_SESSION['message'][1] ?>"><?php echo $_SESSION['message'][2] ?></a></p>
            </section>


            <footer class="footer">
<?php include_once 'ressources/view/layout/footer.php'; ?>
            </footer>
        </div>
<?php include_once 'ressources/view/layout/script.php'; ?>
        <script src="ressources/js/vendor/jquery.tooltipster.min.js"></script>
        <script src="ressources/js/pricing.js"></script>
    </body>
</html>
