<?php
get_header();
?>
<div class="tag">
    <h1>Tag <?php echo esc_html(single_tag_title('', false)); ?></h1>
    <?php get_template_part('loop'); ?>
</div>

<?php
get_sidebar();
get_footer();
?>