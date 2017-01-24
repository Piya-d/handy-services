<?php
session_start();

if(!isset($_SESSION['user_name'])) {

    header("location: login.php");
}
else {

    ?>
    <?php
    //  include($_SERVER['DOCUMENT_ROOT'].'invokertech-newhandy/admin/header.php');
    include($_SERVER['DOCUMENT_ROOT'] . '/admin/config.php');
    ?>

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-10">
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-8">
                                <div class="form-group">
                                    <!-- <label>ID</label> -->
                                    <input type="text" placeholder="enter id" id="locationid" name="locationid"/>
                                    <input type="text" placeholder="enter state" id="state" name="state"/>
                                    <input type="text" placeholder="enter city" id="city" name="city"/>
                                    <!--<input type="text" placeholder="enter id" id="location_search" name="location_search" /> -->
                                    <input type="text" placeholder="enter zip_code" id="zip_code" name="zip_code"/>
                                </div>

                            </div>
                        </div>

                        <div class="row">
                            <input type="submit" name="submit" value="add"/>
                        </div>

                    </form>


                </div>
            </div>
        </div>
    </div>


    <?php
    include($_SERVER['DOCUMENT_ROOT'] . '/admin/footer.php');
    ?>
    <?php
    $con = mysqli_connect("localhost", "root", "", "sampletest");
    if (isset($_POST['submit'])) {
        $id = mysqli_real_escape_string($con, $_POST['locationid']);
        $state = mysqli_real_escape_string($con, $_POST['state']);
        $city = mysqli_real_escape_string($con, $_POST['city']);
        $zip_code = mysqli_real_escape_string($con, $_POST['zip_code']);
        //$status = mysqli_real_escape_string($con, $_POST['status']);

        //$image = mysqli_real_escape_string($_FILES['image']['name']);
        // move_uploaded_file($_FILES['image']['tmp_name'], 'images/'.$image);

        $query = "INSERT INTO locations VALUES('$id','$state','$city','$zip_code',1,DEFAULT )";

          if(!mysqli_query($con,$query))
          {
              echo "

<script>
  alert('Could not execute');
  window.location.href='" .$_SERVER['HTTP_REFERER']. "';
  </script>";

          } else
          {
              echo "<script>
  alert('Records added successfully.');
  window.location.href='" .$_SERVER['HTTP_REFERER']. "';
  </script>";

          }
      }

      ?>

  <?php

    }
?>