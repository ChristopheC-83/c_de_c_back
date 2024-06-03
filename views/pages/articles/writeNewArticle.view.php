<h1 class="text-center my-4"><u>Ecrire un nouvel article</u></h1>
<div class="container mt-3 d-flex flex-column justify-content-center align-items-center gap-2">

    <div class="container mt-3 row w-100 mx-auto ">
        <form action="<?=URL?>admin/articles/send_new_article" method="post"
            class="d-flex flex-column gap-2 col-12 col-md-10 mx-auto" enctype="multipart/form-data">

            <div class="d-flex flex-column gap-2">
                <label for="title" class="fw-bold">Titre de l'article</label>
                <input type="text" name="title" id="title" class="p-1 rounded" required>
            </div>
            <div class="d-flex flex-column gap-2 mb-2">
                <label for="position" class="fw-bold">Position de l'article</label>
                <input type="number" name="position" id="position" class="p-1 rounded" required>
            </div>
            <div class="d-flex flex-column gap-2 mb-2">
                <label for="thumbnail" class="fw-bold">Image de l'article</label>
                <input type="text" name="thumbnail" id="thumbnail" class="p-1 rounded" >
            </div>
            <div class="d-flex gap-3 mb-3">
                <select type="text" class="col-4 text-primary fs-5 p-1 rounded" id="type" name="type"
                    placeholder="Type de techno utilisée" required>
                    <option value="">Type</option>
                    <?php foreach($types as $type): ?>
                    <option value="<?= $type['type'] ?>"><?= $type['type'] ?></option>
                    <?php endforeach; ?>
                </select>
                <select type="text" class="col-4 text-primary fs-5 p-1 rounded" id="type" name="language"
                    placeholder="Type de techno utilisée" required>
                    <option value="">Langage</option>
                    <?php foreach($languages as $language): ?>
                    <option value="<?= $language['language'] ?>"><?= $language['language'] ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <textarea name="pitch" placeholder="Le pitch de l'article."></textarea>
            <textarea id="classic" name="text" placeholder="L'article"></textarea>

            <button class="btn btn-primary">Poster</button>


        </form>



    </div>
</div>