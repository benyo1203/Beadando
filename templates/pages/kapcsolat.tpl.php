<?php
include ("./includes/config.inc.php");

$hiba = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!empty($_POST["uzenet"])) {
        $uzenet = $_POST["uzenet"];
        $felhasznalo = isset($_SESSION["login"]) ? $_SESSION["login"] : "Vendég";
        $dbh = new PDO('mysql:host=localhost;dbname=benyo1203', 'benyo1203', 'Titok1234567',
                        array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));
        
        $dbh->query('SET NAMES utf8 COLLATE utf8_hungarian_ci');
        $sqlInsert = "INSERT INTO uzenetek (id, felhasznalo_nev, uzenet, kuldve_datum) VALUES (0, :felhasznalo, :uzenet, NOW())";
        $stmt = $dbh->prepare($sqlInsert);
        $stmt->bindParam(":felhasznalo", $felhasznalo);
        $stmt->bindParam(":uzenet", $uzenet);
        if ($stmt->execute()) {
            if (isset($_SESSION["login"])) {
                header("Location: uzenetek");
                exit;
            } else {
                $hiba = "Az üzenet sikeresen elküldve!";
            }
        } else {
            $hiba = "Hiba az adatbázisban";
        }
    } else {
        $hiba = "Az üzenet mező nem lett kitöltve!";
    }
}
?>
<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #e6f2ff;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 800px;
            margin: 50px auto;
            padding: 20px;
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        h3 {
            color: #ff6600;
            margin-bottom: 20px;
            text-align: center;
        }

        form {
            margin-bottom: 20px;
            display: flex;
            flex-direction: column;
        }

        label {
            display: block;
            margin-bottom: 10px;
        }

        textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            resize: vertical;
            margin-bottom: 10px;
        }

        input[type="submit"] {
            background-color: #007bff;
            color: #ffffff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            align-self: flex-end;
            margin-right: 10px;
        }
    </style>
</head>

<body>
    <h3>Üzenet küldése az oldal tulajdonosának:</h3>
    <?php
    if (!empty($hiba)) {
        echo "<p style='color: red;'>$hiba</p>";
    }
    ?>
    <form action="./kapcsolat" method="POST" onsubmit="return validateForm()">
        <textarea id="uzenet" name="uzenet" rows="4" cols="50" placeholder="Ide írja az üzenetet"></textarea><br><br>
        <input type="submit" value="Üzenet küldése">
    </form>
</body>
<script>
    function validateForm() {
        var uzenet = document.getElementById("uzenet").value;

        if (uzenet == "") {
            alert("Az üzenet mező üres. Kérlek, írj egy üzenetet!");
            return false;
        }
        return true;
    }
</script>

</html>