<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package understrap
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

$container = get_theme_mod( 'understrap_container_type' );
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php do_action( 'wp_body_open' ); ?>
<div class="site" id="page">
    <section id="header">
        <div class="container">
            <div class="row">
                <div class="col-12 m_nopadding">
                    <div class="inner-wrapper">
                        <div class="logo-wrapper">
                            <?=the_custom_logo()?>
                        </div>
                        <nav class="navbar navbar-expand-md navbar-dark bg-dark">
                            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon"></span>
                            </button>
                            <!-- The WordPress Menu goes here -->
                            <?php wp_nav_menu(
                                array(
                                    'theme_location'  => 'primary',
                                    'container_class' => 'collapse navbar-collapse',
                                    'container_id'    => 'navbarNavDropdown',
                                    'menu_class'      => 'navbar-nav',
                                    'fallback_cb'     => '',
                                    'menu_id'         => 'main-menu',
                                )
                            ); ?>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>
