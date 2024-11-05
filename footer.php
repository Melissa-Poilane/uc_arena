<footer class="footer">
    <div class="footer__logo">
        <a href="<?php echo esc_url(home_url()); ?>">
            <?php if (has_site_icon()) : ?>
                <img src="<?php echo esc_url(get_site_icon_url()); ?>" alt="<?php echo esc_attr(get_bloginfo('name')); ?>" class="footer__logo-image">
            <?php endif; ?>
        </a>
    </div>
    <div class="footer__text">
        2024 : <?php echo esc_html(get_bloginfo('name')); ?>.
    </div>
</footer>
<?php wp_footer(); ?>
</body>
</html>
