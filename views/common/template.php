<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=roboto:100,400,700,900" rel="stylesheet" />
    <!-- <link href="<?= URL ?>public/style/style.css" rel="stylesheet" /> -->
    <link href="<?= URL ?>public/style/cleaned/final_css.css" rel="stylesheet" />

     <!-- tiny -->
     <script src="https://cdn.tiny.cloud/1/ioe3eh75wlk0ed6bxqzlm9mmphf2fa5dzibxjrx77bxl9520/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
        tinymce.init({
            selector: 'textarea#default'
        });
    </script>
    <title><?=$page_title?></title>
</head>

<body class="d-flex flex-column min-vh-100 roboto-font bg-light">

    <div class="content flex-grow-1 d-flex flex-column overflow-x-hidden">

        <?php require_once("./views/components/header.php")  ?>

        <!-- pour afficher les messagess -->
        <?php if (!empty($_SESSION['alert'])) : ?>
            <div class="container mt-3 alert <?= $_SESSION['alert']['type'] ?>" role="alert">
                <?= $_SESSION['alert']['message'] ?>
            </div>

        <?php
            unset($_SESSION['alert']);
        endif;
        ?>

        <!-- affiche le contenu spécifique de la page sélectionnée -->
        <div class="flex-grow-1"><?= $page_content ?></div>


        <?php require_once("./views/components/footer.php"); ?>

        <script src="<?=URL?>public/javascript/app.js"></script>
        <script src="<?=URL?>public/javascript/bootstrap.bundle.min.js"></script>
        <?php if (!empty($javascript)) : ?>
            <?php foreach ($javascript as $fichier_js) : ?>
                <script src="<?= URL ?>public/javascript/<?= $fichier_js ?>"></script>
            <?php endforeach; ?>
        <?php endif; ?>

</body>

</html>