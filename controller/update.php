<?php
    include "../env/conn.php";

    $hiddenId = $_REQUEST['hidden_id'];
    $data = "SELECT name, image FROM file WHERE id =  $hiddenId";
    $rslt = mysqli_query($conn, $data);
    $files = mysqli_fetch_all($rslt, 1);
   

    echo "<pre>";
    print_r($files);
    echo "</pre>";


    if(isset($_REQUEST['edit_btn'])){

        $editName = $_REQUEST['name'];
        if(file_exists($files[0]['image'])){

            $imgName = $files[0]['name'];
            $tmpName = $files[0]['tmp_name'];
            $type = $files[0]['type'];
            $size = $files[0]['size'];


                $fileName = uniqid() . '.' .  $imgName;
                $fileLocation = 'uploads/' . $fileName;
                $uplodedImg = move_uploaded_file($tmpName,$fileLocation);

                   if($uplodedImg){
                       
                        $update = "UPDATE file SET name='$editName',image='$editImage' WHERE id = $hiddenId";
                        mysqli_query($conn, $update);
                        header("Location:../../index.php");
                        $_SESSION['success'] = "update successfully.";
                   }
            


        }else{
            echo "img koi?";
        }
    }