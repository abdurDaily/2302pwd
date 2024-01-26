<?php
   session_start();
   $id = $_REQUEST['id'];
   include "../env/conn.php";
   $edit = "SELECT id, name, image FROM file WHERE id = $id";
   $dataQuery = mysqli_query($conn, $edit);
   $rslt = mysqli_fetch_assoc($dataQuery);
//    echo $rslt['id'];


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit...</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>
<body>
    <section>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 card mx-auto shadow mt-5">
                    <div class="card-header">
                        <h4>Student Info</h4>
                    </div>
                    <div class="card-body">

                    <?php
                        if(isset($_SESSION['success'])){
                           ?>
                                <div class="card alert-success">
                                    <div class="card-header">
                                        <?= $_SESSION['success'] ?>
                                    </div>
                                </div>
                           <?php
                        }
                    ?>
                        
                    <form action="./update.php" method="get" enctype="multipart/form-data">

                    <input type="text" name="hidden_id" value="<?= $rslt['id'] ?>"  hidden>
                        <label for="name">name</label>
                        <input type="text" value="<?= $rslt['name'] ?>" name="name" id="name" class="form-control mb-3" id="name" placeholder="name..">
                        <label for="image">image</label>
                        <input accept=".jpg,.png,.jpeg" type="file" name="image" id="image" class="form-control mb-3" id="image">
                        <button name="edit_btn" class="btn btn-primary w-100 mb-3" type="submit">Update</button>

                    </form>

                    </div>
                </div>
            </div>
        </div>
    </section>
</body>
</html>

<?php
   session_destroy();
?>