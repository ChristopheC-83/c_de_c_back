<?php 

// Tools::showArray($allArticles);

?>

<h1 class="text-center my-4"><u>Voir tous les <?= $type  ?></u></h1>
<div class="container mt-3 d-flex flex-column justify-content-center align-items-center gap-2">

    <div class="container mt-3 row w-100 mx-auto ">

                <div class="d-flex w-100 border border-2 border-black mt-5 align-items-center bg-dark text-white">
                    <h2 class="col-6 text-uppercase"><?= $type  ?></h2>
                    <div class="col-2 text-center">
                        <p>Visible</p>
                    </div>
                    <div class="col-2 text-center">
                        <p>Position</p>

                    </div>
                    <div class="col-2 text-center">
                        <p>Supprimer</p>
                    </div>
                </div>
                <?php foreach ($allArticles as $article) : ?>


                        <div class="d-flex w-100 border border-2 border-secondary border-top-0 align-items-center">
                            <p class="col-6 "><a href="<?= URL ?>admin/articles/updateArticle/<?= $article['id'] ?>"><?= $article['title']  ?></a></p>

                            <div class="col-2 text-center">
                                <p class="mb-0"><?= $article['visible']  ?></p>
                            </div>
                            <div class="col-2 text-center">
                                <p class="mb-0"><?= $article['position']  ?></p>
                            </div>
                            <div class="col-2 text-center">
                                <form action="<?= URL ?>admin/articles/delete_article" method="POST" onSubmit="return confirm('On confirme la suppression ?')">
                                    <input type="hidden" name="id" value=<?= $article['id'] ?>>
                                    <button class="btn" type="submit"><i class="fa-solid fa-trash-can  text-danger"></i></button>
                                </form>
                            </div>

                        </div>
                <?php endforeach ?>

    </div>
</div>