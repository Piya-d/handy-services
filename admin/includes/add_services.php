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
                                    <input type="text" placeholder="enter service id" id="serviceid" name="serviceid"/>
                                    <input type="text" placeholder="enter location id" id="location_id" name="location_id"/>
                                    <input type="text" placeholder="enter service name" id="service_name" name="service_name"/>
                                    <!--<input type="text" placeholder="enter id" id="location_search" name="location_search" /> -->
                                    <input type="text" placeholder="enter service type" id="service_type" name="service_type"/>
                                    <input type="text" placeholder="enter partners" id="partners" name="partners"/>
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
        $id = mysqli_real_escape_string($con, $_POST['serviceid']);
        $location_id = mysqli_real_escape_string($con, $_POST['location_id']);
        $service_name = mysqli_real_escape_string($con, $_POST['service_name']);
        $service_type = mysqli_real_escape_string($con, $_POST['service_type']);
        $partners = mysqli_real_escape_string($con, $_POST['partners']);
        //$status = mysqli_real_escape_string($con, $_POST['status']);

        //$image = mysqli_real_escape_string($_FILES['image']['name']);
        // move_uploaded_file($_FILES['image']['tmp_name'], 'images/'.$image);

        $query = "INSERT INTO services VALUES('$id','$location_id','$service_name','$service_type',$partners,DEFAULT )";

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