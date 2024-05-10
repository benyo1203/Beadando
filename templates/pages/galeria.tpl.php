<?php
include ('./includes/config.inc.php');
$uzenet = array();
if (isset($_FILES['file'])) {
    $fajl = $_FILES['file'];
    $vegsohely = $MAPPA . strtolower($fajl['name']);
    move_uploaded_file($fajl['tmp_name'], $vegsohely);
}

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Galéria</title>
    <style type="text/css">
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

        form {
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 10px;
        }

        input[type="file"] {
            display: block;
            margin-bottom: 10px;
        }

        input[type="submit"] {
            background-color: #007bff;
            color: #ffffff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }

        .grid-container {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
            gap: 10px;
            padding: 10px;
        }

        .kep {
            display: inline-block;
            justify-content: center;
            align-items: center;
        }

        img {

            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);

            height: 200px;
            width: auto;
            margin: 50px;
        }

        form#feltolt {
            max-width: 400px;
            margin: 50px auto 20px;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 8px;
            background-color: #fff;
        }
    </style>
</head>

<body>
    <?php if (isset($_SESSION['login'])) { ?>

        <form action="./galeria" method="post" enctype="multipart/form-data" id="feltolt">
            Feltöltés a galériába:
            <input type="file" name="file" required>
            <input type="submit" name="kuld" value="Feltöltés">
        </form>
        <div class="kep"> <?php } ?>
        <?php
        $fajlok = glob("./images/*");
        foreach ($fajlok as $fajl) {
            echo '<div class="kep"><img src="' . $fajl . '" alt="Kép"></div>';
        }
        ?>
    </div>
    <script>
        document.getElementById("feltolt").addEventListener("submit", function (event) {
            event.preventDefault();
            var fajlInput = document.querySelector('input[type="file"]');
            var fajl = fajlInput.files[0];
            var uzenet = "";

            if (!fajl) {
                uzenet = "Nincs kiválasztva fájl!";
            } else if (!fajl.type.match('image.*')) {
                uzenet = "Csak kép fájlok tölthetők fel!";
            } else if (fajl.size > <?php echo $MAXMERET; ?>) {
                uzenet = "Túl nagy állomány!";
            } else {
                var xhr = new XMLHttpRequest();
                xhr.open("POST", "./ellenor.php", true);
                xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
                xhr.onreadystatechange = function () {
                    if (xhr.readyState == 4 && xhr.status == 200) {
                        var response = xhr.responseText;
                        if (response === "exists") {
                            uzenet = "Már létezik a fájl a célkönyvtárban!";

                        } else {
                            alert('A fájl feltöltve');
                            document.getElementById("feltolt").submit();
                            return;
                        }
                        alert(uzenet);
                    }
                };
                xhr.send("file=" + encodeURIComponent(fajl.name));
                return;
            }
            alert(uzenet);
        });

    </script>

</body>

</html>