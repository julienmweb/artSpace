<!DOCTYPE html>
<html lang="fr">
    <head>    
        <?php include_once 'ressources/view/layout/headAdmin.php'; ?>
        <title>Rubrique Modifier</title>
    </head>
    <body>
        <div class="pricing layout-container">
            <header class="header">    
                <?php include_once 'ressources/view/layout/headerAdmin.php'; ?>
            </header> 
            <section>

                <form method="post" action="index.php" novalidate>
                    <fieldset>
                        <legend>Modifier  rubrique</legend>
                        <label for="nom">NOM:</label>
                        <input type="text" name="nom" id="nom" required value="<?php echo $formInfoAdminCategorie['nom']; ?>" />
                        <p class="erreur">
                            <?php
                            echo $formInfoAdminCategorie['messageErreurNomInvalide'];
                            echo $formInfoAdminCategorie['messageErreurNomExistant'];
                            ?>                               
                        </p>                     
                        <input type="hidden" name="action" value="ctrlAdminCategorieModifierEtape2" />
                        <input type="submit" value="Envoyer" />
                    </fieldset>
                </form>

            </section>
            <footer class="footer">
                <?php include_once 'ressources/view/layout/footerAdmin.php'; ?>
            </footer>
        </div>
        <?php include_once 'ressources/view/layout/script.php'; ?>
    </body>
</html>
