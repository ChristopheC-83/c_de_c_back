<h1 class="text-center my-4"><u>Modifier l'article id <?= $article['id']  ?></u></h1>
<div class="container mt-3 d-flex flex-column justify-content-center align-items-center gap-2">

    <div class="container mt-3 row w-100 mx-auto ">

        <form action="<?=URL?>admin/articles/update_this_article" method="post"
            class="d-flex flex-column gap-2 col-12 col-sm-10 mx-auto" enctype="multipart/form-data">
            <input type="hidden" name="id" value=<?=$article['id']?>>

            <div class="d-flex flex-column gap-2">
                <label for="title" class="fw-bold">Titre de l'article</label>
                <input type="text" name="title" id="title" class="p-1 rounded" required value=<?= $article['title']  ?>>
            </div>
            <div class="d-flex flex-column gap-2">
                <label for="position" class="fw-bold">Position de l'article</label>
                <input type="text" name="position" id="position" class="p-1 rounded" required
                    value=<?= $article['position']  ?>>
            </div>
            <div class="d-flex flex-column gap-2">
                <label for="thumbnail" class="fw-bold">Image de l'article</label>
                <input type="text" name="thumbnail" id="thumbnail" class="p-1 rounded" required
                    value=<?= $article['thumbnail']  ?>>
            </div>
            <img src=<?= $article['thumbnail']?> alt="" style="width:250px">

            <div class="d-flex flex-column gap-2">
                <label for="visible" class="fw-bold">Visibilité de l'article : <?= $article['visible']?></label>
                <select type="text" class="col-4 text-primary fs-5 p-1 rounded" id="visible" name="visible">
                    <option value=1 <?= $article['visible']===1?'selected':''?>>Visible sur le Front</option>
                    <option value=0 <?= $article['visible']===0?'selected':''?>>Non Visible sur le Front</option>
                </select>
            </div>

            <div class="d-flex flex-column gap-2">
                <label for="type" class="fw-bold">Techno</label>
                <select type="text" class="col-4 text-primary fs-5 p-1 rounded" id="type" name="type"
                    placeholder="Type de techno utilisée">
                    <?php foreach($types as $type): ?>
                    <option value="<?= $type['type'] ?>" <?=$type['type']===$article['type'] ? 'selected':'' ?>>
                        <?= $type['type'] ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <label for="pitch" class="fw-bold">Pitch</label>
            <textarea name="pitch"><?=  $article['pitch'] ?></textarea>
            <label for="text" class="fw-bold">Texte de l' article</label>
            <textarea id="classic" name="text"><?=  $article['text'] ?></textarea>

            <button class="btn btn-primary">Poster</button>


        </form>


    </div>
</div>