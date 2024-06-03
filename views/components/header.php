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
    <div class="d-flex w-100 flex-wrap justify-content-center p-4">
        <a href="<?= URL ?>admin/articles/write_new_article"><button class="btn btn-primary mx-3">Ecrire un article</button></a>

        <a href="<?= URL ?>admin/articles/view_all_articles"><button class="btn btn-secondary mx-3">Voir les articles</button></a>

        <a href="<?= URL ?>admin/articles/view_all_shares"><button class="btn btn-warning mx-3">Voir les partages</button></a>

        <a href="<?= URL ?>admin/articles/view_all_projects"><button class="btn btn-info mx-3">Voir les projets</button></a>
        
        <a href="<?= URL ?>admin/articles/view_all_tutos"><button class="btn btn-dark mx-3">Voir les tutos</button></a>


    </div>




<?php endif ?>