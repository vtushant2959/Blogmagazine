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
    $title = $_POST['title'];
    $content = $_POST['content'];
    $author = $_POST['author'];

    $sql = "INSERT INTO blogs (title, content, author) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $title, $content, $author);

    if ($stmt->execute()) {
        echo "Blog posted successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $stmt->close();
}

$conn->close();
?>
