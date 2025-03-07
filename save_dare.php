<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $dare = trim($_POST['dare']);

    if (!empty($dare)) {
        // Save the dare to a text file
        $file = 'dares.txt'; // Change this to your desired file path
        $current = file_get_contents($file);
        $current .= $dare . "\n"; // Append the new dare
        file_put_contents($file, $current);

        // Respond with a success message
        echo json_encode(['status' => 'success']);
    } else {
        // Respond with an error message
        echo json_encode(['status' => 'error', 'message' => 'Dare cannot be empty']);
    }
} else {
    // Respond with an error for invalid request method
    echo json_encode(['status' => 'error', 'message' => 'Invalid request method']);
}
?>