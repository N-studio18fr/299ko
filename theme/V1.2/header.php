<?php
defined('ROOT') OR exit('No direct script access allowed');
include_once(THEMES . $core->getConfigVal('theme') . '/functions.php');
?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <?php eval($core->callHook('frontHead')); ?>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <title><?php show::titleTag(); ?></title>
        <base href="<?php show::siteUrl(); ?>/" />
        <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1" />
        <meta name="description" content="<?php show::metaDescriptionTag(); ?>" />
        <link rel="icon" href="<?php show::themeIcon(); ?>" />
        <?php show::linkTags(); ?>
        <?php show::scriptTags(); ?>
        <?php eval($core->callHook('endFrontHead')); ?>
    </head>
    <body>
        <div class="wrap">
            <header>
                <nav>
                    <span><a href="<?php show::siteUrl(); ?>"><img src="theme/V1.2/icon.png" alt="<?php show::siteName(); ?>"></a></span>
                    <label id="labelBurger" for="burger"><i class="fa-solid fa-bars"></i></label>
                    <input type="checkbox" id="burger"/>
                    <div class="main_nav">
                        <ul id="navigation">
                        <?php
                        show::mainNavigation();
                        eval($core->callHook('endMainNavigation'));
                        ?>
                        </ul>
                    </div>
                </nav>

                <div class="banner">
                    <h1 class="siteName">
                        <a href="<?php show::siteUrl(); ?>"><?php show::siteName(); ?></a>
                    </h1>
                    <p class="desc_Site">Même si c'est plus lourd, c'est que le meilleur!</p>
                </div>
            </header>

            <section id="alert-msg">
                <?php show::displayMsg(); ?>
            </section>
            
            <main>
                <div id="content" class="<?php show::pluginId(); ?>">
                    <?php show::mainTitle(); ?>
            