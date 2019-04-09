<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?= !empty($title) ? $title : '' ?></title>
    <link rel="stylesheet" href="<?= URL ?>assets/style.css">
</head>
<body>
    <header>
        <div class="menu">
            <a href="<?= URL ?>home.php">Move'In</a>
            <a href="<?= URL ?>home.php">Home</a>
            <a href="<?= URL ?>about.php">About</a>
            <a href="<?= URL ?>contact.php">Contact</a>
        </div>
    </header>
