<!DOCTYPE html>
<html lang="fr">
    <head>    
        <?php include_once 'ressources/view/layout/head.php'; ?>
        <title>Pricing Detail</title>
    </head>
    <body>
        <div class="pricing layout-container">
            <header class="header">    
                <?php include_once 'ressources/view/layout/header.php'; ?>
            </header>
            <section class="pricing__part0">
                <hr class="hr--type2">
                <h1>FREE 14-DAY TRIAL WITH 24/7 SUPPORT</h1>
                <p class='pricing__part0__baseline0'>
                <h2>Choisissez votre rubrique</h2>
                <nav class="menuRubrique">
                    <ul>
                        <?php
                        foreach ($_SESSION['categories'] as $value) {
                            $colorSelected = ($value->getId() == $_SESSION['idCategorie'] ) ? 'style="background-color: #5CB85C;"' : '';
                            echo '<li> <a class="btn--type2" ' . $colorSelected . '  href="index.php?action=ctrlPricing&amp;id=' . $value->getId() . '">' . $value->getNom() . '</a></li>';
                        }
                        ?>
                    </ul>
                </nav>                     
                </p>
            </section>
            <section class="pricing__part1">
                <div class="layout-container__page">
                    <?php
                    if ($_SESSION['produit']) {

                        $descriptions = explode(";", $_SESSION['produit']->getDescription());
                        ?>
                        <div class="pricing__part1__standard">
                            <div class="pricing__part1__header">
                                <div class="title">
                                    <h2><?php echo $_SESSION['produit']->getNom(); ?></h2>
                                    <hr class="hr--type4">
                                </div>
                                <div class="pricing__part1__content">
                                    <p><span class="bigNumber"><?php echo $_SESSION['produit']->getPrix(); ?></span>/MO</p>
                                </div>
                                <p><a href="index.php?action=ctrlPanier&amp;event=add&amp;id=<?php echo $_SESSION['produit']->getId(); ?>" class="btn--type3">Ajouter au panier</a></p>
                            </div>  
                            <ul class="pricing__details">
                                <?php
                                foreach ($descriptions as $value) {
                                    ?>
                                    <li>
                                        <span class='tooltip--infoMobile'> i </span>
                                        <?php echo $value; ?>
                                    </li>                              
                                    <?php
                                }
                                ?>
                            </ul>
                        </div>                       
                        <?php
                    } else {
                        echo '<p>Le détail du produit n est pas disponible</p>';
                    }
                    ?>
                </div>                
            </section>
            <section class="pricing__part2">
                <div class="layout-container__page">
                    <div class="pricing__part2__element">
                        <div class="title">
                            <h3>HOW LONG ARE YOU CONTRACTS</h3>
                            <hr class="hr--type3">
                        </div>
                        <p>Art.space plans are month-to-month, yearly, or two years. We make it simple to start --and stop -- your service at any time.</p>
                    </div>
                    <div class="pricing__part2__element">
                        <div class="title">
                            <h3>HOW DO I SIGN UP</h3>
                            <hr class="hr--type3">
                        </div>
                        <p>You start with free trial. We don't collect your credit card until you've determined Squarespace is the right product for you.</p>
                    </div>
                    <div class="pricing__part2__element">
                        <div class="title">
                            <h3>IS THERE A DISCOUNT FOR YEARLY SERVICE?</h3>
                            <hr class="hr--type3">
                        </div>
                        <p>Yes, we offer discounts on up-front long-term commitments</p>
                    </div>
                    <div class="pricing__part2__element">
                        <div class="title">
                            <h3>HOW DO I CANCEL SERVICE?</h3>
                            <hr class="hr--type3">
                        </div>
                        <p>Canceling Art.space is an easy and no-questions-asked process. It's done online right from your site manager.</p>
                    </div>
                    <div class="pricing__part2__element">
                        <div class="title">
                            <h3>DO I NEED ANOTHER WEB HOST?</h3>
                            <hr class="hr--type3">
                        </div>
                        <p>No. All Art.space plans include our fully-managed cloud hosting. ensuring your website remains available at all times.</p>
                    </div>
                    <div class="pricing__part2__element">
                        <div class="title">
                            <h3>CAN I SWITCH PLANS?</h3>
                            <hr class="hr--type3">
                        </div>
                        <p>Yes, at any time, in your webdite manager. When upgrading or downgrading your website plan, you will receive either a pro-rated charge or refund, depending on the cost of your new plan.</p>
                    </div>
                    <div class="pricing__part2__element">
                        <div class="title">
                            <h3>CAN I DOWNLOAD SQUARESPACE?</h3>
                            <hr class="hr--type3">
                        </div>
                        <p>No Art.space is a fully-managed web service. We do not have plans to make a downloadable version. Art.space does provide many standard method for exporting your data.</p>
                    </div>
                    <div class="pricing__part2__element">
                        <div class="title">
                            <h3>WHAT IS MEANT BY UNLIMITED</h3>
                            <hr class="hr--type3">
                        </div>
                        <p>Certain Art.space packages do not have ressource limits for normal usage. As per our Terms of service, site cannot exist for the sole purpose of file sharing.</p>
                    </div>
                    <div class="pricing__part2__element">
                        <div class="title">
                            <h3>DO YOU OFFER EMAIL ACCOUNTS?</h3>
                            <hr class="hr--type3">
                        </div>
                        <p>While Art.space does not provide email accounts, you can easily link your domain to Google Apps and get free email.</p>
                    </div>
                    <div class="pricing__part2__element">
                        <div class="title">
                            <h3>HAVE MORE QUESTIONS?</h3>
                            <hr class="hr--type3">
                        </div>
                        <p>Our support team is available 24/7 and usually responds inwell under an hour. Visit our <a href="#">Help & Support center</a> to contact them.</p>

                    </div>
                </div>
            </section>

            <footer class="footer">
                <?php include_once 'ressources/view/layout/footer.php'; ?>
            </footer>
        </div>
    </body>
</html>
