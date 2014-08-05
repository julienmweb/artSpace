<!DOCTYPE html>
<html lang="fr">
    <head>    
        <?php include_once 'ressources/view/layout/head.php'; ?>
        <title>Sign In</title>
    </head>
    <body>
        <div class="pricing layout-container">
            <header class="header">    
                <?php include_once 'ressources/view/layout/header.php'; ?>
            </header>
            <section>
                <form method="post" action="index.php" novalidate>
                    <fieldset>
                        <legend>
                            Sign In
                        </legend>

                        <label for="identifiant">Votre identifiant</label>
                        <input type="text" name="identifiant" id="identifiant" required value="<?php echo $formErrorsSignIn['identifiantSignIn']; ?>"/>
                        <p class="erreur">
                            <?php
                            echo $formErrorsSignIn['messageErreurIdentifiantInvalideSignIn'];
                            ?>
                        </p>
                        <label for="pass">Votre mot de passe :</label>
                        <input type="password" name="password" id="password" required />
                        <p class="erreur">
                            <?php
                            echo $formErrorsSignIn['messageErreurPasswordInvalideSignIn'];
                            ?>                        
                        </p>
                        <input type="hidden" name="action" value="ctrlSignIn"/>
                        <input type="submit" value="Envoyer" />
                    </fieldset>
                </form>

            </section>


            <footer class="footer">
                <?php include_once 'ressources/view/layout/footer.php'; ?>
            </footer>
        </div>
        <?php include_once 'ressources/view/layout/script.php'; ?>
    </body>
</html>
