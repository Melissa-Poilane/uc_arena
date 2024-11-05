<?php
/* Template Name: Connexion */
get_header();

if (!is_user_logged_in()) {
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit_login'])) {
        // Vérification nonce pour la sécurité
        if (!isset($_POST['login_nonce']) || !wp_verify_nonce($_POST['login_nonce'], 'user_login')) {
            die('Sécurité du formulaire non vérifiée.');
        }

        $creds = array(
            'user_login'    => sanitize_user($_POST['user_login']),
            'user_password' => $_POST['user_password'],
            'remember'      => true
        );

        $user = wp_signon($creds, false);

        if (is_wp_error($user)) {
            echo '<p class="form__message form__message--error">Erreur : ' . $user->get_error_message() . '</p>';
        } else {
            wp_redirect(home_url());
            exit;
        }
    }
    ?>
<div class="content grid">
    <div class="registration-form ">
   
        <form class="form-C" method="post" action="">
        <section class="form__first">
            <!-- Ajout de l'icône du site -->
            <?php 
            $site_icon_url = get_site_icon_url();
            if ($site_icon_url) {
                echo '<img class="registration-form__icon" src="' . esc_url($site_icon_url) . '" alt="Icône du site">';
            }
            ?>
            <h1 class="form__title">Connexion</h1>
            </section>
            <?php wp_nonce_field('user_login', 'login_nonce'); ?>
            <div class="form__field">
                <label class="form__label" for="user_login">Nom d'utilisateur | email</label>
                <input class="form__input" type="text" name="user_login" id="user_login" required />
            </div>
            <div class="form__field">
                <label class="form__label" for="user_password">Mot de passe</label>
                <input class="form__input" type="password" name="user_password" id="user_password" required />
            </div>
            <div class="form__actions">
                <input class="form__submit" type="submit" name="submit_login" value="Se connecter" />
            </div>
        </form>
        
        <!-- Ajout de l'image après le formulaire -->
    <img class="form__image-C" src="<?php echo get_template_directory_uri(); ?>/assets/images/IMG_4003.jpg" alt="Image après le formulaire de connexion" />

    </div>
    </div>
    
    <?php
} else {
    echo '<p class="form__message form__message--logged-in">Vous êtes déjà connecté.</p>';
}

get_footer();
