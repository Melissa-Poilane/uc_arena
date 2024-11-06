<footer class="footer">
    <div class="footer__logo">
        <a href="<?php echo esc_url(home_url()); ?>">
            <?php if (has_site_icon()) : ?>
                <img src="<?php echo esc_url(get_site_icon_url()); ?>" alt="<?php echo esc_attr(get_bloginfo('name')); ?>" class="footer__logo-image">
            <?php endif; ?>
        </a>
    </div>
    <div class="footer__text">
     <?php echo esc_html(get_bloginfo('name')); ?> | SAE 301 | <a href="<?php echo esc_url(home_url('/infos-legales')); ?>" class="footer__link">Infos légales</a>
    </div>
</footer>
<?php wp_footer(); ?>
</body>
</html>
