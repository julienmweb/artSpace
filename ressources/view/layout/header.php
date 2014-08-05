
<a href="index.php?action=publicIndex" class="header__logo">
    <img src="ressources/img/logo.png" alt="Logo">                    
</a>
<nav class="header__menu">
    <a href="index.php?action=publicIndex">TOUR</a>
    <a href="#">TEMPLATES</a>
    <a href="#">DEVELOPERS</a>
    <a href="index.php?action=ctrlPricing">PRICING</a>
    <?php
    if (isset($_SESSION['userSession'])) {
        $tbl_session = unserialize($_SESSION['userSession']);
        if ($tbl_session['identifiantClient'] === 'admin') {
            echo '<a href="index.php?action=ctrlAdminIndex">ESPACE ADMINISTRATEUR</a>';
        } else {
            echo '<a href="index.php?action=ctrlPanier&amp;event=view">SHOPPING CART</a>';
            echo '<a href="index.php?action=ctrlMyAccount">MY ACCOUNT '.$tbl_session['identifiantClient']. '</a>';
            echo' <a href="index.php?action=ctrlSignOut">SIGN OUT</a>';
        }
    } else {
        echo '<a href="index.php?action=ctrlPanier&amp;event=view">SHOPPING CART</a>';
        echo '<a href="index.php?action=ctrlSignIn">SIGN IN</a>';
        echo' <a href="index.php?action=ctrlSignUp">SIGN UP</a>';
    }
    ?>
</nav>


