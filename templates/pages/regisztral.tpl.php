
<!DOCTYPE html>
<html>

<head>
    <title>Regisztráció</title>
    <meta charset="utf-8">
    <style>
        body {
            background-color: #e6f2ff;
        }
    </style>
</head>

<body>
    <?php if (isset($uzenet)) { ?>
        <h1><?= $uzenet ?></h1>
        <?php if ($ujra) { ?>
            <a href="./belepes">Próbálja újra!</a>
        <?php } ?>
    <?php } ?>
</body>

</html>