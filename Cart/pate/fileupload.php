<?php


if ($_SERVER["REQUEST_METHOD"] == "POST") {



    if (isset($_FILES["photo"]) && $_FILES["photo"]["error"] == 0) {

        $allowed = array("jpg" => "image/jpg", "jpeg" => "image/jpeg", "gif" => "image/gif", "png" => "image/png");
        $filename = $_FILES["photo"]["name"];
        $filetype = $_FILES["photo"]["type"];
        $filesize = $_FILES["photo"]["size"];
        $filetmp  = $_FILES['photo']['tmp_name'];

       $uploadPath = move_uploaded_file($filetmp, "uploadfile/" . $filename);

    //    $currentDirectory=getcwd();
    //               //echo getcwd();
    //               $x="abc";
    //              $uploadPath = $currentDirectory . "uploadfile/" . basename($x.""); 
    //             echo $uploadPath;                                           //$x.".jpg")


        
        $ext = pathinfo($filename, PATHINFO_EXTENSION);
        if (!array_key_exists($ext, $allowed)) die("Error: Please select a valid file format.");

        
        $maxsize = 5 * 1024 * 1024;
        if ($filesize > $maxsize) die("Error: File size is larger than the allowed limit.");

        
        if (in_array($filetype, $allowed))
         {
            
            if (file_exists($uploadPath . $filename)) {
                echo $filename . " is already exists.";
            } else {
                move_uploaded_file($filetmp, $uploadPath);
                echo "Your file was uploaded successfully.";
                echo "<a href='$uploadPath' download> Download File Here...</a>";
            }
        } else {
            echo "Error: There was a problem uploading your file. Please try again.";
        }
    } else {
        echo "Error: " . $_FILES["photo"]["error"];
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<title>ABHISHEK</title>
<head>
    <style>
        body {
            background-color: #99ffcc;
            text-align: center;
            font-family: Garamond ;
        }
        h2{
            width: 100%;
            background-color: black;
            color:white;
          border: 1px solid white;
        }
    </style>
    <meta charset="UTF-8">
    <title>File Upload Form</title>
</head>

<body>
    <form action="" method="post" enctype="multipart/form-data">
        <h2><i>Upload File</i></h2>
        <label for="fileSelect">Filename:</label>
        <input type="file" name="photo" id="fileSelect">
        <input type="submit" name="submit" value="Upload" style="background-color: gray;">
        <p><strong>Note:</strong> Only .jpg, .jpeg, .gif, .png formats allowed to a max size of 5 MB.</p>
    </form>
</body>

</html>