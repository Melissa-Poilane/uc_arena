<?php
/* Template Name: Inscription */
get_header();

if (!is_user_logged_in()) {
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit_registration'])) {
        // Vérification nonce pour la sécurité
        if (!isset($_POST['registration_nonce']) || !wp_verify_nonce($_POST['registration_nonce'], 'user_registration')) {
            die('Sécurité du formulaire non vérifiée.');
        }

        // Traitement des données du formulaire
        $user_login = sanitize_text_field($_POST['user_login']);
        $user_firstname = sanitize_text_field($_POST['user_firstname']);
        $user_lastname = sanitize_text_field($_POST['user_lastname']);
        $user_email = sanitize_email($_POST['user_email']);
        $user_password = $_POST['user_password'];

        // Créer un nouvel utilisateur
        $user_id = wp_create_user($user_login, $user_password, $user_email);

        if (!is_wp_error($user_id)) {
            // Mettre à jour les informations de l'utilisateur
            wp_update_user(array(
                'ID' => $user_id,
                'first_name' => $user_firstname,
                'last_name' => $user_lastname
            ));

            echo '<p class="registration-form__message registration-form__message--success">Inscription réussie. Vous pouvez maintenant vous connecter.</p>';
        } else {
            echo '<p class="registration-form__message registration-form__message--error">Erreur : ' . $user_id->get_error_message() . '</p>';
        }
    }
    ?>
    <div class="content grid">
        <div class="registration-form">
            
            <form class="form-I" method="post" action="">
            <section class="form__first">
            <!-- Ajout de l'icône du site -->
            <?php 
            $site_icon_url = get_site_icon_url();
            if ($site_icon_url) {
                echo '<img class="registration-form__icon" src="' . esc_url($site_icon_url) . '" alt="Icône du site">';
            }
            ?>
            <h1 class="form__title">Inscription</h1>
            </section>
                <?php wp_nonce_field('user_registration', 'registration_nonce'); ?>
                
                <div class="form__name">
                    <div class="form__field">
                        <label class="form__label" for="user_firstname">Prénom</label>
                        <input class="form__input" type="text" name="user_firstname" id="user_firstname" required />
                    </div>
                    <div class="form__field">
                        <label class="form__label" for="user_lastname">Nom</label>
                        <input class="form__input" type="text" name="user_lastname" id="user_lastname" required />
                    </div>
                </div>
                <div class="form__field">
                    <label class="form__label" for="user_login">Nom d'utilisateur</label>
                    <input class="form__input" type="text" name="user_login" id="user_login" required />
                </div>
                <div class="form__field">
                    <label class="form__label" for="user_email">Email</label>
                    <input class="form__input" type="email" name="user_email" id="user_email" required />
                </div>
                <div class="form__field">
                    <label class="form__label" for="user_password">Mot de passe</label>
                    <input class="form__input" type="password" name="user_password" id="user_password" required />
                </div>
                <div class="form__actions">
                    <input class="form__submit" type="submit" name="submit_registration" value="S'inscrire" />
                </div>
            </form>
            <!-- Ajout de l'image après le formulaire -->
            <img class="form__image-I" src="<?php echo get_template_directory_uri(); ?>/assets/images/annie-spratt-MChSQHxGZrQ-unsplash.jpg" alt="Image après le formulaire d'inscription" />
        </div>
    </div>
    <?php
} else {
    echo '<p class="form__message form__message--logged-in">Vous êtes déjà connecté.</p>';
}

get_footer();
