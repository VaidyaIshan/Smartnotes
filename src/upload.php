<?php
$servername = "sql307.infinityfree.com";
$username = "if0_36316648";
$password = "bHR6W8waQb";
$dbname = "if0_36316648_smartnotes";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
session_start();
if (isset($_POST['submit'])) {
    $pdf_file = $_FILES['pdf-file'];
    $user_filename = $_POST['filename'];
    $subject = $_POST['subject'];
    $grade = $_POST['grade'];
    $username= $_SESSION['username'];
    $description=$_POST['description'];

    // Check if the file was uploaded without errors
    if ($pdf_file['error'] === UPLOAD_ERR_OK) {
        // Check if the file is a PDF
        $file_type = strtolower(pathinfo($pdf_file['name'], PATHINFO_EXTENSION));
        if ($file_type === 'pdf') {
            // Move the uploaded file to the target directory
            if (move_uploaded_file($pdf_file['tmp_name'], 'uploads/' . $user_filename)) {
                // Insert the file path into the database
                $sql = "INSERT INTO files (filename, username, subject, class, description) VALUES ('$user_filename', '$username', '$subject', '$grade', '$description')";
                if ($conn->query($sql) === TRUE) {
                    header('Location: successupload.php');
                    exit;
                } else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }
            } else {
                echo "Error: Failed to move uploaded file.";
            }
        } else {
            echo "Error: Only PDF files are allowed.";
        }
    } else {
        // Display appropriate error message
        switch ($pdf_file['error']) {
            case UPLOAD_ERR_INI_SIZE:
                echo "Error: The uploaded file exceeds the upload_max_filesize directive in php.ini.";
                break;
            case UPLOAD_ERR_FORM_SIZE:
                echo "Error: The uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the HTML form.";
                break;
            case UPLOAD_ERR_PARTIAL:
                echo "Error: The uploaded file was only partially uploaded.";
                break;
            case UPLOAD_ERR_NO_FILE:
                echo "Error: No file was uploaded.";
                break;
            case UPLOAD_ERR_NO_TMP_DIR:
                echo "Error: Missing a temporary folder.";
                break;
            case UPLOAD_ERR_CANT_WRITE:
                echo "Error: Failed to write file to disk.";
                break;
            case UPLOAD_ERR_EXTENSION:
                echo "Error: A PHP extension stopped the file upload.";
                break;
            default:
                echo "Error: Unknown error occurred.";
                break;
        }
    }
} else {
    echo "Invalid request.";
}

// Close the database connection
$conn->close();
?>
