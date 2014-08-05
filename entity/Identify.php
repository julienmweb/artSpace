<?php

namespace entity;

class Identify {

    /**
     * Contrôle si la session du client est valide
     * @return void
     */
    public function identifyMyAccount() {
        if (empty($_SESSION['userSession'])) {
            header('Location:index.php?action=publicIndex');
        } else {
            $tbl_session = unserialize($_SESSION['userSession']);
            if (empty($tbl_session['identifiantClient']) || empty($tbl_session['token'])) {
                header('Location:index.php?action=publicIndex');
            } else {
                if ($tbl_session['token'] != md5('token_very_salty' . $tbl_session['identifiantClient'])) {
                    header('Location:index.php?action=publicIndex');
                }
            }
        }
    }

    /**
     * Contrôle si la session administrateur est valide
     * @return void
     */
    public function identifyMyAdminAccount() {
        if (empty($_SESSION['userSession'])) {
            header('Location:index.php?action=publicIndex');
        } else {
            $tbl_session = unserialize($_SESSION['userSession']);
            if ($tbl_session['identifiantClient'] != 'admin' || empty($tbl_session['token'])) {
                header('Location:index.php?action=publicIndex');
            } else {
                if ($tbl_session['token'] != md5('token_very_salty' . $tbl_session['identifiantClient'])) {
                    header('Location:index.php?action=publicIndex');
                }
            }
        }
    }

    /**
     * retourne l'id du client en session
     * @return int
     */
    public function returnId() {
        $tbl_session = unserialize($_SESSION['userSession']);
        return ($tbl_session['idClient']);
    }

    /**
     * retourne l'identifiant du client en session
     * @return string
     */
    public function returnIdentifiant() {
        $tbl_session = unserialize($_SESSION['userSession']);
        return ($tbl_session['identifiantClient']);
    }

}
