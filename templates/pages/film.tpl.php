<?php
include ("./includes/config.inc.php");

$dbh = new PDO('mysql:host=localhost;dbname=benyo1203', 'benyo1203', 'Titok1234567',
array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));
$dbh->query('SET NAMES utf8 COLLATE utf8_hungarian_ci');
$sql = "SELECT Poster_link, Series_title, Released_year, IMDB_rating, Star1, Star2, Star3, Star4, Director FROM imdb_top_1000";
$stmt = $dbh->query($sql);
$filmek = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <style>
        body {
            font-family: Arial, sans-serif;
            
            background-color: #e6f2ff;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background-color: #fff;
            border: 1px solid #ddd;
        }

        th,
        td {
            padding: 8px;
            border: 1px solid #ddd;
        }

        th {
            background-color: #f2f2f2;
            font-weight: bold;
            text-align: left;
        }

        img {
            max-width: 100px;
            height: auto;
        }
    </style>

</head>

<body>
    <table>
        <thead>
            <tr>
                <th>Poszter</th>
                <th>Cím</th>
                <th>Év</th>
                <th>Értékelés</th>
                <th>Szereplők</th>
                <th>Rendező</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($filmek as $film): ?>
                <tr>
                    <td><img src="<?= $film['Poster_link'] ?>" alt="kep"></td>
                    <td><?= $film['Series_title'] ?></td>
                    <td><?= $film['Released_year'] ?></td>
                    <td><?= $film['IMDB_rating'] ?></td>
                    <td><?= $film['Star1'] . ", " . $film['Star2'] . ", " . $film['Star3'] . ", " . $film['Star4'] ?></td>
                    <td><?= $film['Director'] ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

</body>

</html>