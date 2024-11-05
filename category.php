<?php
get_header();
?>
<div class="category">
    <h1>Catégorie <?php echo esc_html(single_cat_title('', false)); ?></h1>
    <?php get_template_part('loop'); ?>
</div>

<?php
get_sidebar();
get_footer();
?>
