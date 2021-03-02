<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(  ) ?>
</head>
<body <?php body_class();?> >
    <?php wp_body_open(); ?>
    <header class="header">
        <div class="container">
            <div class="header-wrapper">
                <div class="logo">
                    <a
                        href="#"
                        class="custom-logo-link"
                        rel="home"
                        aria-current="page"
                    >
                        <?php if( has_custom_logo() ){
                            the_custom_logo();
                            } else {
                                echo 'Universal';
                            } ?>
                    </a>
                </div>
                <?php 
                    wp_nav_menu( [
                        'theme_location'  => 'header_menu',
                        'container'       => 'nav', 
                        'container_class' => 'header-nav', 
                        'container_id'    => '',
                        'menu_class'      => 'header-menu', 
                        'echo'            => true,
                    ] );
                ?>
            <?php get_search_form( ); ?>
            <!-- /.header-wrapper -->
        </div>
    </header>
