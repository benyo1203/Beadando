<?php
include ('./includes/config.inc.php');
include ('./includes/config.inc.php');

if (isset($_POST['file'])) {
    $fajlnev = $_POST['file'];
    $vegsohely = $MAPPA . strtolower($fajlnev);
    if (file_exists($vegsohely)) {
        echo "exists";
    }
}
?>