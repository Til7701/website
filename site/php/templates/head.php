<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title><?= $title ?></title>
    <meta name="description" content="The fancy website of Til7701">
    <meta name="author" content="Til7701">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="/favicon.svg" type="image/x-icon"/>
    <!-- common styles: -->
    <link rel="stylesheet" type="text/css" href="/accent-color.php">
    <link rel="stylesheet" type="text/css" href="/css/style.css">
    <!-- page-specific styles: -->
    <?php foreach ($cssFiles as $cssFile) { ?>
        <?php if (str_starts_with($cssFile, "/")) { ?>
            <link rel="stylesheet" type="text/css" href="<?= $cssFile ?>">
        <?php } else { ?>
            <link rel="stylesheet" type="text/css" href="css/<?= $cssFile ?>.css">
        <?php } ?>
    <?php }
    ?>

    <!-- common scripts: -->
    <!-- page-specific scripts: -->
    <?php
    foreach ($jsFiles as $jsFile) { ?>
        <script src="/js/scripts/<?= $jsFile ?>.js"></script>
        <?php
    }
    ?>
</head>
