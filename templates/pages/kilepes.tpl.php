<?php

    $data['csn'] = $_SESSION['csn'];
    $data['un'] = $_SESSION['un'];
    $data['login'] = $_SESSION['login'];
?>
<h1>Kilépett:</h1>
<?= $data['csn']." ".$data['un']." (".$data['login'].")" ;
header("Location: .")?>


?>
<!DOCTYPE html>
<html>
    <head>
        <style>
            body {
                background-color: #e6f2ff;
            }
        </style>
    </head>
</html>
