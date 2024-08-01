<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Records</title>
    <link rel="stylesheet" href="PORTFOLIO.CSS">
</head>
<body>

<section>

<?php
// Database connection using PDO and DSN
$dsn = 'mysql:host=localhost;dbname=portfolio;charset=utf8';
$username = 'root';
$password = '';

try {
    $pdo = new PDO($dsn, $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // Use exception handling

    // Prepare and execute the SQL SELECT statement
    $stmt = $pdo->prepare("SELECT * FROM person");
    $stmt->execute();

    // Fetch and display the results
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    if ($results) {
        echo "<h2>All Entries:</h2>";
        echo "<table border='1'>";
        echo "<tr><th>ID</th><th>Name</th><th>Email</th><th>Message</th></tr>";
        foreach ($results as $row) {
            echo "<tr>";
            echo "<td>" . htmlspecialchars($row['personId']) . "</td>";
            echo "<td>" . htmlspecialchars($row['Name']) . "</td>";
            echo "<td>" . htmlspecialchars($row['Email']) . "</td>";
            echo "<td>" . htmlspecialchars($row['Message']) . "</td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "No entries found.";
    }
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>

</section>

<a href="submit_form.php">Back to Form</a>

</body>
</html>
