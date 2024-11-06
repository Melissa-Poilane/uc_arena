<?php get_header(); ?>

<div class="hero-image">
    <?php
    $header_image = get_theme_mod('header_image_setting');
    if ($header_image): ?>
        <img src="<?php echo esc_url($header_image); ?>" alt="Image d'en-tête" class="hero-img2">
    <?php endif; ?>
</div>

<article class="single-match special-grid">
    <h1 class="single-match__title">
       <p class="single-match__phase">
            Phase <span><?php the_field('n_phase'); ?></span>
        </p> | Match <span><?php the_field('n_match'); ?></span>
    </h1>
    
    <div class="single-match__details">
        <h2>Date du match</h2>
       
        <p class="single-match__date">
         <?php the_field('date_et_heure_du_match'); ?>
        </p>
        <h2>Map</h2>
        <p class="single-match__map">
            <?php the_field('map'); ?>
        </p>
    </div>
</article>

<div class="bracket-container">
    <?php
    // Requête pour récupérer tous les matchs
    $match_args = array(
        'post_type' => 'match',
        'posts_per_page' => -1 // Récupérer tous les matchs
    );
    $match_query = new WP_Query($match_args);

    // Tableau pour organiser les matchs par phases (rounds)
    $rounds = array();
    ?>
</div>

<?php get_footer(); ?>
