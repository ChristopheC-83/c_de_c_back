<header class="p-3  text-center bg-dark ">
    <a href="<?= URL ?>" class="text-decoration-none">
        <h1 class="container text-light text-center fw-bold d-inline">Les données du site </h1>
    </a>
    <?php if (!empty($_SESSION['name'])) : ?>
    <a href="<?= URL ?>admin/logout" class="btn btn-black text-white align-middle mb-1 ms-auto">Logout
        <?= $_SESSION['name']  ?></a>
    <?php endif ?>
</header>

<?php if (!empty($_SESSION['name'])) : ?>
<div class="d-flex w-100 flex-wrap justify-content-between ">

    <div class="btn-group  m-1 flex-grow-1 ">
        <button class="btn btn-success btn-lg dropdown-toggle " type="button" data-bs-toggle="dropdown"
            aria-expanded="false">
            Accueil
        </button>
        <ul class="dropdown-menu ">
            <li><a href="<?= URL ?>admin/slider/sliders_page" class="dropdown-item">Accueil - Sliders</a></li>
            <li><a href="<?= URL ?>admin/frames/frames_page" class="dropdown-item">Accueil - Cadres</a></li>
            <li><a href="<?= URL ?>admin/partners/partners_page" class="dropdown-item">Accueil - Partenaires</a></li>
            <li><a href="<?= URL ?>admin/opinions/opinions_page" class="dropdown-item">Accueil - Avis</a></li>
        </ul>
    </div>
    <div class="btn-group    m-1  flex-grow-1 ">
        <button class="btn btn-warning btn-lg dropdown-toggle" type="button" data-bs-toggle="dropdown"
            aria-expanded="false">
            Location
        </button>
        <ul class="dropdown-menu ">
            <li><a href="<?= URL ?>admin/rental/rentals_page" class="dropdown-item">Location - Locations</a></li>
            <li><a href="<?= URL ?>admin/rental/text_under_array_rentals" class="dropdown-item">Location - Texte</a>
            </li>
        </ul>
    </div>
    <div class="btn-group    m-1 flex-grow-1 ">
        <button class="btn btn-secondary btn-lg dropdown-toggle" type="button" data-bs-toggle="dropdown"
            aria-expanded="false">
            Atelier
        </button>
        <ul class="dropdown-menu ">
            <li><a href="<?= URL ?>admin/workshop/workshop_page" class="dropdown-item">Atelier - Catégories</a></li>
            <li><a href="<?= URL ?>admin/workshop/show_all_tasks" class="dropdown-item">Atelier - Voir Tout</a></li>
        </ul>
    </div>
    <div class="btn-group    m-1 flex-grow-1 ">
        <button class="btn btn-primary btn-lg dropdown-toggle" type="button" data-bs-toggle="dropdown"
            aria-expanded="false">
            Vélos
        </button>
        <ul class="dropdown-menu ">
            <li><a href="<?= URL ?>admin/features/features_page" class="dropdown-item">Vélos - Caractéristiques</a></li>
            <li><a href="<?= URL ?>admin/bikes/bikes_page" class="dropdown-item">Vélos - Tous les Vélos</a></li>
            <li><a href="<?= URL ?>admin/bikes/new_bikes_page" class="dropdown-item">Vélos - Les neufs</a></li>
            <li><a href="<?= URL ?>admin/bikes/used_bikes_page" class="dropdown-item">Vélos - Les occasions</a></li>
            <li><a href="<?= URL ?>admin/bikes/create_bike" class="dropdown-item">Vélos - Créer un vélo</a></li>
        </ul>
    </div>
</div>




<?php endif ?>