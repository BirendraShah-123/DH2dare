<?php
// Enable error reporting for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $dare = trim($_POST['dare']);
    $file = 'dares.json'; // JSON file to store dares

    if (!empty($dare)) {
        // Read existing dares from the JSON file
        $dares = file_exists($file) ? json_decode(file_get_contents($file), true) : [];

        // Add the new dare to the array
        $dares[] = $dare;

        // Write the updated dares back to the JSON file
        if (file_put_contents($file, json_encode($dares)) === false) {
            // Log error if file write fails
            error_log("Failed to write to $file");
            header("Location: index.php?error=1");
            exit();
        }

        // Redirect back to the form with a success message
        header("Location: index.php?success=1");
    } else {
        header("Location: index.php?error=1");
    }
} else {
    header("Location: index.php");
}
?>