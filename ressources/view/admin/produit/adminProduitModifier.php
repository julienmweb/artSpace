<!DOCTYPE html>
<html lang="fr">
    <head>    
        <?php include_once 'ressources/view/layout/headAdmin.php'; ?>
        <title>Produit Modifier</title>
    </head>
    <body>
        <div class="pricing layout-container">
            <header class="header">    
                <?php include_once 'ressources/view/layout/headerAdmin.php'; ?>
            </header> 
            <section>

                <form method="post" action="index.php" novalidate>
                    <fieldset>
                        <legend>Modifier  produit</legend>
                        <label for="nom">NOM:</label>
                        <input type="text" name="nom" id="nom" required value="<?php echo $formInfoAdminProduit['nom']; ?>" />
                        <p class="erreur">
                         <?php echo $formInfoAdminProduit['messageErreurNomInvalide'] ?> 
                         <?php echo $formInfoAdminProduit['messageErreurNomExistant'] ?> 
                        </p>
                        <label for="description">DESCRIPTION (Merci de séparer chaque description par ";"):</label>
                        <textarea name="description" id="description" required cols="20" rows="4"><?php echo $formInfoAdminProduit['description']; ?></textarea>
                        <p class="erreur">
                            <?php echo $formInfoAdminProduit['messageErreurDescriptionInvalide'] ?>  
                        </p>                        
                        </p>
                        <label for="prix">PRIX:</label>
                        <input type="text" name="prix" id="prix" required value="<?php echo $formInfoAdminProduit['prix']; ?>" />
                        <p class="erreur">
                            <?php echo $formInfoAdminProduit['messageErreurPrixInvalide'] ?>  
                        </p>
                        <label for="categorie">RUBRIQUE:</label>
                        <select name="categorie">
                            <?php
                            foreach ($categories as $value) {
                                if ($formInfoAdminProduit['categorie'] == $value->getId()){
                                    $selected='selected=selected';
                                } else {
                                    $selected='';
                                }                               
                                echo '<option value="' . $value->getId() . '"'. $selected .'>' . $value->getNom() . '</option>';
                            }
                            ?>
                        </select>
                        <p class="erreur">
                       <?php echo $formInfoAdminProduit['messageErreurCategorieInvalide'] ?>  
                        </p>   
                        <label for="display">Afficher:</label>
                        <select name="display">  
                            <option value="1" <?php if ($formInfoAdminProduit['display']==1){echo ' selected';} ?>>Oui</option>
                            <option value="0" <?php if ($formInfoAdminProduit['display']==0){echo ' selected';} ?>>Non</option>
                        </select>                        
                         <input type="hidden" name="action" value="ctrlAdminProduitModifierEtape2" />
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
