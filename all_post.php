<?php
    session_start();
    include "./env/conn.php";
    $allData = "SELECT * FROM file";
    $rslt = mysqli_query($conn, $allData);
    $files = mysqli_fetch_all($rslt, 1);
    


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>

<body>
    <section>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 card mx-auto shadow mt-5">
                   <table class="table table-responsive table-striped table-hover">
                      <tr>
                         <td>Sn</td>
                         <td>Name</td>
                         <td>Image</td>
                         <td>Action</td>
                      </tr>


                      <?php
                         foreach( $files as $key => $file){
                            ?>
                            <tr>
                               <td><?= ++ $key ?></td>
                               <td><?= $file['name'] ?></td>
                               <td>
                                  <img width="100" src="<?= './controller/' . $file['image'] ?>" alt="">
                               </td>
                               <td valign="middle">
                                  <div class="btn-group">
                                      <a href="./controller/edit.php?id=<?= $file['id'] ?>" class="btn btn-primary btn-sm">Edit</a>
                                      <a href="./controller/delete.php?id=<?= $file['id'] ?>" class="btn btn-danger btn-sm">Delete</a>
                                  </div>
                               </td>
                            </tr>

                            <?php
                         }
                      ?>

                   </table>
                </div>
            </div>
        </div>
    </section>
</body>
</html>

<?php
session_destroy();
?>