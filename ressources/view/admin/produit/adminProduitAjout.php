
<!DOCTYPE html>
<html lang="fr">
    <head>    
        <?php include_once 'ressources/view/layout/headAdmin.php'; ?>
        <title>Produit Ajouter</title>
    </head>
    <body>
        <div class="pricing layout-container">
            <header class="header">    
                <?php include_once 'ressources/view/layout/headerAdmin.php'; ?>
            </header> 
            <section>
                <form method="post" action="index.php" novalidate>
                    <fieldset>
                        <legend>Ajouter un produit</legend>
                        <label for="nom">NOM:</label>
                        <input type="text" name="nom" id="nom" required value="<?php echo $formErrorsAdminProduit['nom']; ?>" />
                        <p class="erreur">
                            <?php
                            echo $formErrorsAdminProduit['messageErreurNomInvalide'];
                            echo $formErrorsAdminProduit['messageErreurNomExistant'];
                            ?>                            
                        </p>
                        <label for="description">DESCRIPTION (Merci de séparer chaque description par ";"):</label>
                        <textarea name="description" id="description" required cols="20" rows="4"><?php echo $formErrorsAdminProduit['description']; ?></textarea>
                        <p class="erreur">
                            <?php
                            echo $formErrorsAdminProduit['messageErreurDescriptionInvalide'];
                            ?>                               
                        </p>   
                        </p>
                        <label for="prix">PRIX:</label>
                        <input type="text" name="prix" id="prix" required value="<?php echo $formErrorsAdminProduit['prix']; ?>" />
                        <p class="erreur">
                            <?php
                            echo $formErrorsAdminProduit['messageErreurPrixInvalide'];
                            ?>                             
                        </p>                      
                        <label for="categorie">RUBRIQUE:</label>
                        <select name="categorie">
                            <?php
                            foreach ($categories as $value) {
                                echo '<option value="' . $value->getId() . '">' . $value->getNom() . '</option>';
                            }
                            ?>
                        </select>
                        <p class="erreur">
                            <?php
                            echo $formErrorsAdminProduit['messageErreurCategorieInvalide'];
                            ?>                             
                        </p> 
                        <label for="display">Afficher:</label>
                        <select name="display">  
                            <option value="1" <?php if ($formErrorsAdminProduit['display']==1){echo ' selected';} ?>>Oui</option>
                            <option value="0" <?php if ($formErrorsAdminProduit['display']==0){echo ' selected';} ?>>Non</option>
                        </select>
                        <input type="hidden" name="action" value="ctrlAdminProduitAjout" />
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
