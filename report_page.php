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
    $page_url = $_POST['page_url'];
    $reason = $_POST['reason'];
    $reporter_email = $_POST['reporter_email'];

    $sql = "INSERT INTO reported_pages (page_url, reason, reporter_email) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $page_url, $reason, $reporter_email);

    if ($stmt->execute()) {
        echo "Page reported successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $stmt->close();
}

$conn->close();
?>
