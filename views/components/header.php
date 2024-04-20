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
    <a href="<?=URL?>admin/articles/write_new_article"><button class="btn btn-primary">Ecrire un article</button></a>

    
</div>




<?php endif ?>