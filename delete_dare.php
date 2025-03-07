<?php
session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: admin_login.php");
    exit();
}

$file = 'dares.json';
$dares = file_exists($file) ? json_decode(file_get_contents($file), true) : [];

if (isset($_GET['index'])) {
    $index = $_GET['index'];
    if (isset($dares[$index])) {
        unset($dares[$index]); // Remove the dare
        $dares = array_values($dares); // Re-index the array
        file_put_contents($file, json_encode($dares));
    }
}

header("Location: view_dares.php");
exit();
?>