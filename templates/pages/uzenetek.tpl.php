<?php
$ures = "";
$dbh = new PDO('mysql:host=localhost;dbname=benyo1203', 'benyo1203', 'Titok1234567',
                        array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));
$dbh->query('SET NAMES utf8 COLLATE utf8_hungarian_ci');
$sql = "SELECT felhasznalo_nev, uzenet, kuldve_datum FROM uzenetek ORDER BY kuldve_datum DESC";
$stmt = $dbh->query($sql);
$uzenetek = $stmt->fetchAll(PDO::FETCH_ASSOC);

$sql_count = "SELECT COUNT(*) as count FROM uzenetek";
$stmt_count = $dbh->query($sql_count);
$row = $stmt_count->fetch(PDO::FETCH_ASSOC);
$count = $row['count'];

if ($count === 0) {
    $ures = "Még nincs üzenet";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <style>
        body {
                background-color: #e6f2ff;
            }
        table {
            border-collapse: collapse;
            width: 100%;
            table-layout: fixed;
        }

        th, td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
        }

        th {
            background-color: #f2f2f2;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #ddd;
        }

        .message {
            font-style: italic;
            color: #888;
        }
    </style>
</head>

<body>
    <?php if ($count === 0) : ?>
        <p><?= $ures ?></p>
    <?php else : ?>
        <table>
            <thead>
                <tr>
                    <th style="width: 20%;">Küldés ideje</th>
                    <th style="width: 20%;">Küldő</th>
                    <th style="width: 60%;">Üzenet</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($uzenetek as $uzenet) : ?>
                    <tr>
                        <td><?= $uzenet['kuldve_datum'] ?></td>
                        <td><?= $uzenet['felhasznalo_nev'] ?></td>
                        <td><?= $uzenet['uzenet'] ?></td>
                    </tr>
                <?php endforeach; ?>
            <?php endif; ?>
            </tbody>
        </table>
</body>

</html>
