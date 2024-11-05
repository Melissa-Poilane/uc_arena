<?php
get_header(); ?>

<div class="hero-image">
    <?php 
    $header_image = get_theme_mod('header_image_setting');
    if ($header_image) : ?>
        <img src="<?php echo esc_url($header_image); ?>" alt="Image d'en-tête" class="hero-img">
    <?php endif; ?>
</div>

<div class="grid">
    <div class="site-title">
        <h1><?php echo esc_html(get_bloginfo('name')); ?></h1>
        <h2><?php echo esc_html(get_bloginfo('description')); ?></h2>
    </div>

    <div class="description">
        <p>Ce site sert à sélectionner vos projets collectifs</p>
    </div>
    
    <div class="instructions">
        <ol>
            <li>Consultez la liste des projets, interrogez les porteurs ou moi</li>
            <li>Constituez des équipes de 4 étudiants avec au moins 1 dans chaque parcours</li>
            <li>Créez-vous un compte</li>
            <li>Un d’entre vous crée une équipe et enrôle les membres</li>
            <li>Faites la liste de vos 4 projets préférés</li>
            <li>Faites valider votre équipe</li>
            <li>Attendez la réponse de l’équipe pédagogique</li>
        </ol>
    </div>
    
    <div class="footer-message">
        <p>Bon projet !</p>
    </div>
</div>

<?php
get_footer();
?>
