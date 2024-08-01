<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Form</title>
    <link rel="stylesheet" href="PORTFOLIO.CSS">
</head>
<body>

<section>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['Email']);
    $message = htmlspecialchars($_POST['Message']);

    // Database connection using PDO and DSN
    $dsn = 'mysql:host=localhost;dbname=portfolio;charset=utf8';
    $username = 'root';
    $password = '';

    try {
        $pdo = new PDO($dsn, $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // Use exception handling

        // Prepare and execute the SQL INSERT statement
        $stmt = $pdo->prepare("INSERT INTO person (`personId`, `Name`, `Email`, `Message`) VALUES (NULL, :name, :email, :message)");
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':message', $message);

        if ($stmt->execute()) {
            echo "Thanks, your response has been saved.<br>";
            echo '<a href="view_records.php">View records</a>'; // Correct URL for viewing records
        } else {
            echo "Error: " . implode(" ", $stmt->errorInfo());
        }
    } catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
}
?>

</section>

</body>
</html>
