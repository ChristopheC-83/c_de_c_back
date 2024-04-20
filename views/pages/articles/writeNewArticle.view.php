<h1 class="text-center my-4"><u>Ecrire un nouvel article</u></h1>
<div class="container mt-3 d-flex flex-column justify-content-center align-items-center gap-2">

    <div class="container mt-3 row w-100 mx-auto ">
        <form action="<?=URL?>admin/articles/send_new_article" method="post"
            class="d-flex flex-column gap-2 col-12 col-sm-10 col-md-8 col-lg-6 mx-auto" enctype="multipart/form-data">

            <div class="d-flex flex-column gap-2">
                <label for="title" class="fw-bold">Titre de l'article</label>
                <input type="text" name="title" id="title" class="p-1 rounded" required>
            </div>
            <select type="text" class="col-4 text-primary fs-5 p-1 rounded" id="type" name="type"
                placeholder="Type de techno utilisée">
                <option value="">Techno</option>
                <?php foreach($types as $type): ?>
                <option value="<?= $type['type'] ?>"><?= $type['type'] ?></option>
                <?php endforeach; ?>
            </select>

            <textarea id="classic" name="text">Hello, World!</textarea>

            <button class="btn btn-primary">Poster</button>


        </form>



    </div>
</div>