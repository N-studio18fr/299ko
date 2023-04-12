<?php

/**
 * @copyright (C) 2022, 299Ko, based on code (2010-2021) 99ko https://github.com/99kocms/
 * @license https://www.gnu.org/licenses/gpl-3.0.en.html GPLv3
 * @author Jonathan Coulet <j.coulet@gmail.com>
 * @author Maxence Cauderlier <mx.koder@gmail.com>
 * @author Frédéric Kaplon <frederic.kaplon@me.com>
 * @author Florent Fortat <florent.fortat@maxgun.fr>
 * 
 * @package 299Ko https://github.com/299Ko/299ko
 */
defined('ROOT') OR exit('No direct script access allowed');

$action = (isset($_GET['action'])) ? $_GET['action'] : '';
$error = false;
$passwordError = false;

switch ($action) {
    case 'del_install':
        if ($administrator->isAuthorized()) {
            $del = unlink(ROOT . 'install.php');
            if ($del) {
                show::msg("Le fichier install.php a bien été supprimé", 'success');
                header('location:index.php?p=configmanager');
                die();
            }
        }
        break;
    case 'save':
        if ($administrator->isAuthorized()) {
            $config = array(
                'siteName' => (trim($_POST['siteName']) != '') ? trim($_POST['siteName']) : 'Démo',
                'siteDesc' => (trim($_POST['siteDesc']) != '') ? trim($_POST['siteDesc']) : '',
                'adminEmail' => trim($_POST['adminEmail']),
                'siteUrl' => (trim($_POST['siteUrl']) != '') ? trim($_POST['siteUrl']) : $core->getConfigVal('siteUrl'),
                'theme' => $_POST['theme'],
                'defaultPlugin' => $_POST['defaultPlugin'],
                'hideTitles' => (isset($_POST['hideTitles'])) ? '1' : '0',
                'debug' => (isset($_POST['debug'])) ? '1' : '0',
                'defaultAdminPlugin' => $_POST['defaultAdminPlugin']
            );
            if (trim($_POST['_adminPwd']) != '') {
                if (trim($_POST['_adminPwd']) == trim($_POST['_adminPwd2']))
                    $config['adminPwd'] = $administrator->encrypt(trim($_POST['_adminPwd']));
                else
                    $passwordError = true;
            }
            if ($passwordError) {
                show::msg("Le mot de passe est différent de sa confirmation", 'error');
            } elseif (!util::isEmail(trim($_POST['adminEmail']))) {
                show::msg("Email invalide", 'error');
            } elseif (!$core->saveConfig($config, $config)) {
                show::msg("Une erreur est survenue", 'error');
            } else {
                show::msg("Les modifications ont été enregistrées", 'success');
            }
            $core->saveHtaccess($_POST['htaccess']);
            header('location:index.php?p=configmanager');
            die();
        }
        break;
}