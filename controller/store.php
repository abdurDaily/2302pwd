<?php
session_start();

include "../env/conn.php";

$btn = $_REQUEST['insert_btn'];

if(isset($btn)){

    $name = $_REQUEST['name'];
    $image = $_FILES['image'];

        $imgName = $image['name'];
        $tmpName = $image['tmp_name'];
        $type = $image['type'];
        $size = $image['size'];

            if($size < 2000000){
                $fileName = uniqid() . '.' .  $imgName;
                $fileLocation = 'uploads/' . $fileName;
                $uplodedImg = move_uploaded_file($tmpName,$fileLocation);

                   if($uplodedImg){
                        $storeInfo = "INSERT INTO file(name, image) VALUES ('$name','$fileLocation')";
                        mysqli_query($conn, $storeInfo);
                        header("Location:../../index.php");
                        $_SESSION['success'] = "inserted successfully.";
                   }

            }else{
                echo "your image size is too learge!";
            }
}