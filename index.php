<?php
get_header(); ?>

<div class="hero-image">
    <?php
    $header_image = get_theme_mod('header_image_setting');
    if ($header_image): ?>
        <img src="<?php echo esc_url($header_image); ?>" alt="Image d'en-tête" class="hero-img">
    <?php endif; ?>
</div>

<div class="grid">
    <div class="site-title">
        <?php if (has_site_icon()): ?>
            <img src="<?php echo esc_url(get_site_icon_url()); ?>" alt="<?php bloginfo('name'); ?>" class="hero__logo ">
        <?php endif; ?>
        <h1><?php echo esc_html(get_bloginfo('name')); ?></h1>
        <p><strong><?php echo esc_html(get_bloginfo('description')); ?></strong></p>
    </div>


<a href="#intro" id="intro">
    <div class="intro_btn">
        <h3>C'est parti !</h3>
    </div>
</a>


    <div class="description" >
        <p>Bienvenue sur <strong>UC Arena 2024</strong>, le tournoi Valorant de l’Université de Franche-Comté !

            Préparez-vous à former vos équipes, à affronter d'autres étudiants, et à prouver votre talent dans la
            compétition la plus palpitante de l'année.</p>
    </div>

    <div class="instructions">
        <h2>Inscription</h2>

        <div class="instruction__section">
            <strong><span>1 | </span>Créer un compte sur UC Arena</strong>
            <p class="body2">Remplissez le formulaire d'inscription avec vos informations (Nom, Prénom, Pseudo (unique),
                Adresse e-mail, Mot de passe.).</p>
        </div>
        <div class="instruction__section">
            <strong><span>2 | </span>Se connecter et compléter son profil</strong>
            <p class="body2">Accédez à votre profil et complétez les informations manquantes, comme votre <strong>ID
                    Valorant (obligatoire)</strong>.</p>
        </div>
        <div class="instruction__section instruction-img">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/bannierevalo.jpg"
                alt="Bannière Valorant" >
        </div>
        <div class="instruction__section">
            <strong><span>3 | </span>Créer une équipe (pour les capitaines)</strong>
            <p class="body2">
            <ol>
                <li>Une fois connecté, accédez à l’onglet "Équipes".</li>
                <li>Cliquez sur "Créer une équipe".</li>
                <li>Entrez le nom de votre équipe, ainsi que ses informations (Y compris le pseudo Discord du capitaine)
                </li>
                <li>Sélectionnez 4 autres joueurs dans la liste de tous les joueurs inscrits sur la plateforme.</li>
                <li>Ajoutez la bannière de votre équipe En cliquant sur “Image de Mise en Avant”.</li>
                <li>Cliquez sur “Publier” </li>
            </ol>
            Les joueurs doivent être des étudiants de l’Univérsité de Franche-Comté inscrits sur UC Arena.
            </p>
            <p class="body2"> En tant que capitaine, vous serez responsable de l’inscription de l’équipe et de la
                communication avec les administrateurs.</p>
            <small>Note : Le capitaine est l'unique point de contact pour les administrateurs, qui lui fourniront toutes
                les informations importantes concernant les matchs.</small>
        </div>
        <div class="instruction__section instruction-img">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/team.jpg" alt="Bannière Valorant"
            ></div>
            
    <div class="instruction__section">
        <strong><span>4 |</span> Validation de l'équipe</strong>
        <p class="body2">Une fois les 5 joueurs sélectionnés, le capitaine soumet l’équipe à la validation par un
            administrateur.
            Le capitaine recevra une confirmation de l’un des administrateur dès que l’équipe est validée. </p>
        <p class="body2">Après cela, vous êtes officiellement inscris au tournoi !</p>
    </div>
    <div class="instruction__section">
        <strong><span>5 |</span> Préparez-vous pour le tournoi</strong>
        <p class="body2">Le capitaine recevra toutes les informations relatives aux matchs et devra s’assurer que chaque
            joueur de l’équipe est informé et prêt pour chaque rencontre.</p>
        <p class="body2">Assurez-vous d'être connecté et prêt le jour du match. Les horaires des rencontres sont
            clairement indiqués.</p>
        <p class="body2">Vous trouverez les infos de tous les matchs sur la page “Matchs”.</p>
    </div>
    <div class="instruction__section instruction-img">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/team2.jpg" alt="Bannière Valorant"
           >
    </div>
    <h2>Informations sur le tournoi</h2>
    <div class="instruction__section">
        <p class="body2">Nombre maximum de participants → <span>16</span></p>
        <p class="body2">Début du tournoi → <span>15 / 11 / 2024 20:00</span></p>
        <p class="body2">Clôture des inscriptions → <span>09 / 11 / 2024 23:59</span></p>
        <p class="body2">Jeu → <span>VALORANT</span></p>
        <p class="body2">Nombre minimum de participants → <span>4</span></p>
    </div>
    <div class="instruction__section">
        <a href="https://acrobat.adobe.com/link/review?uri=urn:aaid:scds:US:831ba033-1cf8-3887-9d6b-15b1dc4fd8e4">
            <p class="button">Lire le règlement</p>
        </a>
    </div>
    <h2>Bon tournoi !</h2>
    </div>
</div>

</div>


<?php
get_footer();
?>
