<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php wp_title('|', true, 'right'); ?><?php bloginfo('name'); ?></title>
    <link rel="stylesheet" href="<?php echo esc_url(get_stylesheet_uri()); ?>" type="text/css">
    <?php wp_head(); ?>

    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Anton+SC&family=Public+Sans:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
</head>
<body <?php body_class(); ?> id="top" x-data="{ menuIsOpen: false }" :class="{ 'no-scroll': menuIsOpen }">

<header class="header" :class="{ 'menu--open': menuIsOpen }">
    <div class="header__container">
        <!-- Logo du site en SVG -->
        <div class="header__first">
            <div class="header__logo">
                <a href="<?php echo esc_url(home_url('/')); ?>">
                    <?php if (has_site_icon()) : ?>
                        <img src="<?php echo esc_url(get_site_icon_url()); ?>" alt="<?php bloginfo('name'); ?>" class="header__logo-image">
                    <?php endif; ?>
                </a>
            </div>
        </div>

        <!-- Bouton du menu hamburger -->
        <button class="header__menu-toggle" id="menuToggle" aria-label="Menu" aria-controls="mainNav"
        @click="menuIsOpen = !menuIsOpen" :class="{ 'menu-btn--open': menuIsOpen }">
        <span class="menu-btn__hamburger"></span>
        </button>

        <!-- Menu principal -->
        <nav class="header__nav" id="mainNav" :class="{ 'menu--open': menuIsOpen }">
            <?php
            wp_nav_menu(array(
                'theme_location' => 'header-menu',
                'container' => false,
                'menu_class' => 'header__menu'
            ));
            ?>
        </nav>

        <!-- Menu secondaire : Connexion/Déconnexion -->
        <nav class="header__secondary-nav" id="mainNav" :class="{ 'menu--open': menuIsOpen }">
            <?php display_login_logout_link(); ?>
        </nav>
    </div>
</header>

<?php wp_footer(); ?>
</body>
</html>