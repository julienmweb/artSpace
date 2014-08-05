<!DOCTYPE html>
<html lang="fr">
    <head>    
        <?php include_once 'ressources/view/layout/head.php'; ?>
        <title>Sign Up</title>
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
                            Sign Up
                        </legend>
                        <label for="identifiant">Choisissez un identifiant:</label>
                        <input type="text" name="identifiant" id="identifiant" required value="<?php echo $formErrorsSignUp['identifiant']; ?>" />
                        <p class="erreur">
                            <?php
                            echo $formErrorsSignUp['messageErreurIdentifiantInvalide'];
                            echo $formErrorsSignUp['messageErreurIdentifiantExistant'];
                            ?>
                        </p>
                        <label for="prenom">prenom:</label>
                        <input type="text" name="prenom" id="prenom" required value="<?php echo $formErrorsSignUp['prenom']; ?>" />
                        <p class="erreur">
                            <?php
                            echo $formErrorsSignUp['messageErreurPrenomInvalide'];
                            ?>                            
                        </p>                        
                        </p>
                        <label for="nom">nom:</label>
                        <input type="text" name="nom" id="nom" required value="<?php echo $formErrorsSignUp['nom']; ?>" />
                        <p class="erreur">
                            <?php
                            echo $formErrorsSignUp['messageErreurNomInvalide'];
                            ?>                              
                        </p> 
                       <label for="adresse">adresse:</label>
                        <input type="text" name="adresse" id="nom" required value="<?php echo $formErrorsSignUp['adresse']; ?>" />
                        <p class="erreur">
                            <?php
                            echo $formErrorsSignUp['messageErreurAdresseInvalide'];
                            ?>                             
                        </p>                         
                        <label for="email">Quel est votre e-mail ?</label>
                        <input type="email" name="email" id="email" required value="<?php echo $formErrorsSignUp['email']; ?>" />
                        <p class="erreur">
                            <?php
                            echo $formErrorsSignUp['messageErreurEmailExistant'];
                            echo $formErrorsSignUp['messageErreurEmailInvalide'];
                            ?>
                        </p>
                        <label for="emailBis">Veuillez saisir à nouveau votre email:</label>
                        <input type="email" name="emailBis" id="emailBis" required value="<?php echo $formErrorsSignUp['emailBis']; ?>"/>
                        <p class="erreur">
                            <?php
                            echo $formErrorsSignUp['messageErreurEmailBisInvalide'];
                            ?>
                        </p>
                        <label for="password">Votre mot de passe (minimum 5 caracteres):</label>
                        <input type="password" name="password" id="password" required  />
                        <p class="erreur">
                            <?php
                            echo $formErrorsSignUp['messageErreurPasswordInvalide'];
                            ?>
                        </p>	
                        <label for="passwordBis">Veuillez saisir à nouveau votre mot de passe :</label>
                        <input type="password" name="passwordBis" id="passwordbis" required />
                        <p class="erreur">
                            <?php
                            echo $formErrorsSignUp['messageErreurPasswordBisInvalide'];
                            ?>
                        </p>		
                        <input type="hidden" name="action" value="ctrlSignUp" />
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
