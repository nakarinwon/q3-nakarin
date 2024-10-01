<?php 
include "connect.php";

// Enable error reporting for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Ensure that the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Update this line with the correct column names
    $stmt = $pdo->prepare("INSERT INTO product (product_name, product_detail, product_price) VALUES (Null,?, ?, ?)");
    $stmt->bindParam(1, $_POST["pname"]);
    $stmt->bindParam(2, $_POST["pdetail"]);
    $stmt->bindParam(3, $_POST["price"]);
    
    // Execute the statement
    if ($stmt->execute()) {
        $pid = $pdo->lastInsertId();
        $dir = "pphoto/";
        $targetfile = $dir . basename($_FILES["image"]["name"]);

        if (!is_dir($dir)) {
            echo "Directory $dir does not exist.";
        } elseif (!is_writable($dir)) {
            echo "Directory $dir is not writable.";
        } else {
            if ($_FILES["image"]["error"] == UPLOAD_ERR_OK) {
                $imageFileType = strtolower(pathinfo($targetfile, PATHINFO_EXTENSION));
                echo "File type: " . $imageFileType . "<br>";

                if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetfile)) {
                    header("Location: product-detail.php?pid=" . $pid);
                    exit(); // Stop executing further code after redirect
                } else {
                    echo "Sorry, there was an error uploading your file.";
                }
            } else {
                echo "Error during file upload: " . $_FILES["image"]["error"];
            }
        }
    } else {
        echo "Error inserting product: " . $stmt->errorInfo()[2];
    }
}
?>
