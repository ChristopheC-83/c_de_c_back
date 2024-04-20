<!-- Page d'accueil pour connexion de l'administrateur de la DB du magasin -->

<div class="container pt-3">

    <div class="container row mx-auto">

        <!-- <?php foreach($users as $user): ?>
                <p class="text-center">Pseudo : <?= $user['name'] ?></p>
                <p class="text-center">mdp : <?= $user['password'] ?></p>
                <p class="text-center">Role : <?= $user['role'] ?></p>
            <?php endforeach ?> -->

        <?php if (empty($_SESSION['name'])) : ?>
            <div class="col-12 col-lg-10 col-xl-8  mx-auto border border-3 border-primary mt-5 rounded-3 box-shadow-white fs-5">
                <form class="my-4" method="POST" action="validation_login">
                    <div class="mb-3">
                        <label for="login" class="form-label">Pseudo</label>
                        <input type="text" class="form-control text-primary fs-5" id="login" name="user_name">
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Mot de Passe</label>
                        <input type="password" class="form-control text-primary fs-5" id="password" name="user_password">
                    </div>
                    <div class="mt-5 w-75 mx-auto d-flex flex-column gap-3 justify-content-center align-items-center ">
                        <button type="submit" class="btn btn-primary w-100 fs-5">Connexion</button>
                    </div>
                </form>
                <!-- Un mot de passe hashé ? -->
                <!-- <?= password_hash("123", PASSWORD_DEFAULT)  ?> -->
            </div>

        <?php endif ?>

        <?php Tools::showArray($_SESSION) ?>


    </div>



</div>