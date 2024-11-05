<div class="search-results">
    <h2>Résultats de recherche pour : "<?php echo esc_html(get_search_query()); ?>"</h2>

    <?php if ( have_posts() ) : ?>
        <ul>
            <?php while ( have_posts() ) : the_post(); ?>
                <li>
                    <a href="<?php echo esc_url(get_permalink()); ?>"><?php echo esc_html(get_the_title()); ?></a>
                    <p><?php the_excerpt(); ?></p>
                </li>
            <?php endwhile; ?>
        </ul>
    <?php else : ?>
        <p>Aucun résultat trouvé pour "<?php echo esc_html(get_search_query()); ?>".</p>
    <?php endif; ?>
</div>

