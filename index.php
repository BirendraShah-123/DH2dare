<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Submit a Dare</title>
    <link rel="stylesheet" href="styles.css">
    <script>
        function validateForm() {
            const dareInput = document.querySelector('textarea[name="dare"]');
            if (dareInput.value.trim() === '') {
                alert('Please enter a dare!');
                return false;
            }
            return true;
        }
    </script>
</head>
<body>
    <?php include 'navigation.php'; ?>

    <h1>Submit a Dare Anonymously</h1>

    <?php
    if (isset($_GET['success'])) {
        echo "<p style='color: green;'>Dare submitted successfully!</p>";
    }
    if (isset($_GET['error'])) {
        echo "<p style='color: red;'>Please enter a dare!</p>";
    }
    ?>

    <div class="form-container">
        <form action="submit_dare.php" method="POST" onsubmit="return validateForm();">
            <textarea name="dare" rows="4" cols="50" placeholder="Enter your dare here..." required></textarea><br>
            <input type="submit" value="Submit Dare">
        </form>
    </div>
</body>
</html>