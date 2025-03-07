<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Dares</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <?php include 'navigation.php'; ?>

    <h1>Submitted Dares</h1>

    <ul>
        <?php
        $file = 'dares.json';
        $dares = file_exists($file) ? json_decode(file_get_contents($file), true) : [];

        if (!empty($dares)): ?>
            <?php foreach ($dares as $index => $dare): ?>
                <li>
                    <?php echo htmlspecialchars($dare); ?>
                    <form action="delete_dare.php" method="GET" style="display:inline;">
                        <input type="hidden" name="index" value="<?php echo $index; ?>">
                        <input type="submit" value="Delete" onclick="return confirm('Are you sure you want to delete this dare?');">
                    </form>
                </li>
            <?php endforeach; ?>
        <?php else: ?>
            <li>No dares submitted yet.</li>
        <?php endif; ?>
    </ul>

    <a href="logout.php">Logout</a>
</body>
</html>