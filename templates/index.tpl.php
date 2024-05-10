<?php
session_start();
if (file_exists('./logicals/' . $keres['fajl'] . '.php')) {
    include ("./logicals/{$keres['fajl']}.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $ablakcim['cim'] . ((isset($ablakcim['mottó'])) ? (' | ' . $ablakcim['mottó']) : '') ?></title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <?php if (file_exists('./styles/' . $keres['fajl'] . '.css')) { ?>
        <link rel="stylesheet" href="./styles/<?= $keres['fajl'] ?>.css" type="text/css">
    <?php } ?>
    <style>
        header {
            background-color: #333;
            color: #fff;
            padding: 20px;
            text-align: center;
            font-family: Arial, sans-serif;
            width: 100% !important
        }

        footer {
            position: fixed;
            left: 0;
            bottom: 0;
            width: 100%;
            background-color: #333;
            color: #fff;
            text-align: center;
            padding: 10px 0;
        }
    </style>

</head>

<body>
    <header>
        <h1><?= $fejlec['cim'] ?></h1>
        <?php if (isset($fejlec['motto'])) { ?>
            <h4><?= $fejlec['motto'] ?></h4>
        <?php } ?>
        <?php if (isset($_SESSION['login'])) { ?>
            <strong><?= "Bejelentkezve:" . $_SESSION['csn'] . " " . $_SESSION['un'] . " (" . $_SESSION['login'] . ")" ?></strong>
        <?php } ?>
    </header>
    <div class="container-fluid">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav w-100">
                    <?php foreach ($oldalak as $url => $oldal) {
                        if (!isset($_SESSION['login']) && $oldal['menun'][0] || isset($_SESSION['login']) && $oldal['menun'][1]) { ?>
                            <li class="nav-item<?= (($oldal == $keres) ? ' active' : '') ?>">
                                <a class="nav-link" href="<?= ($url == '/') ? '.' : $url ?>"><?= $oldal['szoveg'] ?></a>
                            </li>
                        <?php }
                    } ?>
                </ul>
            </div>
        </nav>
    </div>

    <div id="content">
        <?php include ("./templates/pages/{$keres['fajl']}.tpl.php"); ?>
    </div>
    <footer class="mt-5">
        <?php if (isset($lablec['copyright'])) { ?>&copy;&nbsp;<?= $lablec['copyright'] ?><?php } ?>
        &nbsp;
        <?php if (isset($lablec['ceg'])) { ?>     <?= $lablec['ceg']; ?><?php } ?>
    </footer>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>