<?php get_header(); ?>
<?php if (have_posts()) : ?>
  <?php while (have_posts()) : the_post(); ?>
      <article class="single-projet-team special-grid">
          <div class="single-projet-team__thumbnail">
              <?php the_post_thumbnail('large'); ?>
          </div>
          <h1 class="single-projet-team__title">
              <?php the_title(); ?>
          </h1><div class="equipe__etudiants">
                    <?php 
                    // Boucle sur les champs 'etudiant_1' à 'etudiant_4'
                    for ($i = 1; $i <= 4; $i++) :
                        $user = get_field("etudiant_$i");
                        if ($user):
                            // Récupérer le prénom et le nom de l'utilisateur
                            $first_name = get_user_meta($user['ID'], 'first_name', true);
                            $last_name = get_user_meta($user['ID'], 'last_name', true);
                            ?>
                            <ul class="equipe__etudiants-list">
                                <li class="equipe__etudiants-item">
                                    <?php echo get_avatar($user['ID'], 40); // Affiche la photo de profil de l'étudiant ?>
                                    <span class="equipe__etudiants-name"><?php echo esc_html($first_name . ' ' . $last_name); ?></span>
                                </li> 
                            </ul>
                        <?php endif;
                    endfor; 
                    ?>
                </div>
           <div class="single-projet-team__equipe">
           <h2 class="single-projet-team__equipe-title">Description</h2>
<div class="single-projet-team__equipe-description">
    <?php
    $content = get_the_content();
    if (!empty($content)) {
        the_content();
    } else {
        echo "Cette équipe n'a pas encore de description, mais on est surs qu'elle est géniale !";
    }
    ?>
</div>
               
               <?php
               $featured_posts = get_field('choix_du_projets');
               if ($featured_posts) : ?>
               <h2 class="single-projet-team__voeux-title">Vœux de projets</h2>
               <ul class="single-projet-team__voeux-list">
                   <?php 
                   $counter = 1; // Initialiser le compteur
                   foreach ($featured_posts as $post) : 
                       setup_postdata($post); ?>
                       <li class="single-projet-team__voeux-item">
                          
                           <a href="<?php echo esc_url(get_permalink()); ?>" class="single-projet-team__voeux-link">
                               <?php if (has_post_thumbnail()) : ?>
                                   <div class="single-projet-team__voeux-image">
                                       <?php the_post_thumbnail('large'); ?>
                                   </div>
                               <?php endif; ?>
                               <section class="single-projet-team__voeux-text">
                               <span class="single-projet-team__voeux-order"><?php echo esc_html($counter); ?> </span>
                               <h2 class="single-projet-team__voeux-name">
                               <?php the_title(); ?></h2>
                               </section>
                           </a>
                       </li>
                       <?php 
                       $counter++; // Incrémenter le compteur
                   endforeach; 
                   wp_reset_postdata(); ?>
               </ul>
               <?php endif; ?>
           </div>
      </article>
  <?php endwhile; ?>
<?php endif; ?>
<?php get_footer(); ?>
