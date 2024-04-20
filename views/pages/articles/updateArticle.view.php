<h1 class="text-center my-4"><u>Voir tous les articles</u></h1>
<div class="container mt-3 d-flex flex-column justify-content-center align-items-center gap-2">

    <div class="container mt-3 row w-100 mx-auto ">
        <?php foreach($allArticles as $article): ?>

        <form action="<?=URL?>admin/articles/send_new_article" method="post"
            class="d-flex flex-column gap-2 col-12 col-sm-10 col-md-8 col-lg-6 mx-auto" enctype="multipart/form-data">

            <div class="d-flex flex-column gap-2">
                <input type="hidden" name="id" value=<?=$article['id']   ?>>
                <label for="title" class="fw-bold">Titre de l'article</label>
                <input type="text" name="title" id="title" class="p-1 rounded" required value=<?= $article['title']  ?>>
            </div>
            <select type="text" class="col-4 text-primary fs-5 p-1 rounded" id="type" name="type"
                placeholder="Type de techno utilisée">
                <?php foreach($types as $type): ?>
                <option value="<?= $type['type'] ?>" <?=$type['type']===$article['type'] ? 'selected':'' ?>>
                    <?= $type['type'] ?></option>
                <?php endforeach; ?>
            </select>

            <textarea id="classic" name="text"><?=  $article['text'] ?></textarea>

            <button class="btn btn-primary">Poster</button>


        </form>

        <?php endforeach?>

    </div>
</div>