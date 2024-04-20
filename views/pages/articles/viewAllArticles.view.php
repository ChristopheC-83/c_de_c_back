<h1 class="text-center my-4"><u>Voir tous les articles</u></h1>
<div class="container mt-3 d-flex flex-column justify-content-center align-items-center gap-2">

    <div class="container mt-3 row w-100 mx-auto ">
        <?php foreach($types as $type): ?>
        <h2><?= $type['type'] ?></h2>
        <?php foreach($allArticles as $article): ?>
        <?php if($article['type'] === $type['type']) : ?>
        <p><a href="<?=URL?>admin/article/updateArticle/<?= $article['id'] ?>"><?= $article['title']  ?></a></p>
        <?php endif ?>
        <?php endforeach?>
        <?php endforeach?>

    </div>
</div>