<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = ""; // No password
$dbname = "upload.db";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if file is uploaded
if (isset($_FILES['inpFile']) && $_FILES['inpFile']['error'] === UPLOAD_ERR_OK) {
    // File details
    $fileTmpPath = $_FILES['inpFile']['tmp_name'];
    $fileName = $_FILES['inpFile']['name'];
    $uploadFileDir = './uploads/'; // Directory where files will be stored

    // Create uploads directory if it doesn't exist
    if (!is_dir($uploadFileDir)) {
        mkdir($uploadFileDir, 0777, true);
    }

    $destPath = $uploadFileDir . basename($fileName);

    // Move the uploaded file to the server's directory
    if (move_uploaded_file($fileTmpPath, $destPath)) {
        // Prepare the SQL statement to insert file metadata
        $stmt = $conn->prepare("INSERT INTO files (filename, filepath) VALUES (?, ?)");
        $stmt->bind_param("ss", $fileName, $destPath);

        // Execute the statement
        if ($stmt->execute()) {
            // Success response
            echo json_encode(["success" => true, "message" => "File uploaded successfully."]);
        } else {
            // Error response
            echo json_encode(["success" => false, "message" => "Database insertion failed."]);
        }

        $stmt->close();
    } else {
        // Error response for file move
        echo json_encode(["success" => false, "message" => "File move failed."]);
    }
} else {
    // Error response for file upload
    echo json_encode(["success" => false, "message" => "No file uploaded or there was an upload error."]);
}

$conn->close();
?>
