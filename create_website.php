<?php
$host = "localhost";
$user = "root";
$password = "";
$dbname = "blogmagazine";

$conn = new mysqli($host, $user, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $website_name = $_POST['website_name'];
    $website_type = $_POST['website_type'];
    $creator_email = $_POST['creator_email'];

    $sql = "INSERT INTO websites (website_name, website_type, creator_email) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $website_name, $website_type, $creator_email);

    if ($stmt->execute()) {
        echo "Website created successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $stmt->close();
}

$conn->close();
?>
