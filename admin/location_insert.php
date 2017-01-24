<?php
session_start();

if(!isset($_SESSION['user_name'])) {

  header("location: login.php");
}
else {

?>
 <?php 
  include "header.php"; 
  include "config.php"; 
  ?>
    <!--
  <style>
      table {
          font-family: arial, sans-serif;
          border-collapse: collapse;
          width: 100%;
      }

      td, th {
          border: 1px solid #dddddd;
          text-align: left;
          padding: 8px;
      }

      tr:nth-child(odd) {
          background-color: #dddddd;
      }
  </style>
  -->
    <style>
        .switch {
            position: relative;
            display: inline-block;
            width: 60px;
            height: 34px;
        }

        .switch input {display:none;}

        .slider {
            position: absolute;
            cursor: pointer;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: #ccc;
            -webkit-transition: .4s;
            transition: .4s;
        }

        .slider:before {
            position: absolute;
            content: "";
            height: 26px;
            width: 26px;
            left: 4px;
            bottom: 4px;
            background-color: white;
            -webkit-transition: .4s;
            transition: .4s;
        }

        input:checked + .slider {
            background-color: #2196F3;
        }

        input:focus + .slider {
            box-shadow: 0 0 1px #2196F3;
        }

        input:checked + .slider:before {
            -webkit-transform: translateX(26px);
            -ms-transform: translateX(26px);
            transform: translateX(26px);
        }

        /* Rounded sliders */
        .slider.round {
            border-radius: 34px;
        }

        .slider.round:before {
            border-radius: 50%;
        }
    </style>
    <!--
    <link href="https://cdn.datatables.net/1.10.13/css/jquery.dataTables.min.css" rel="stylesheet" />
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js"></script>
    -->
  <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-10">
                        <div class="card">
                            <div class="header">
                                <h4 class="title"> <strong> Area/Location </strong></h4>
                            </div>
                            <div class="content">
                                <form action="" method="post" enctype="multipart/form-data">
                                    <table id="example" class="display" cellspacing="0" width="100%">
                                    <div class="row">
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <label >Search</label>
                                                <input type="text" placeholder="enter location" id="filter_global" class="global_filter" name="location_search" />
                                            </div>
                                            <div class="form-group pull-right">
                                                <a href='#' onclick='javascript:window.open("includes/add_location.php", "_blank", "scrollbars=1,resizable=1,height=300,width=450");' title='Pop Up'> add </a>
                                            </div>
                                        </div>
                                    </div>



                                        <tr>
                                        <th>
                                            ID
                                        </th>
                                        <th> State </th>
                                        <th> City </th>
                                        <th> Zip </th>
                                        <th> Status </th>
                                        <th> Available Services </th>
                                        <th> Available partners </th>
                                        </tr>

                                        <?php
                                        $con=mysqli_connect("localhost","root","","sampletest");
    $up = "select * from locations";
    $ret = mysqli_query($con,$up);
    if (!$ret) {
    printf("Error: %s\n", mysqli_error($con));
    exit();
}
    while($row = mysqli_fetch_array($ret, MYSQLI_ASSOC)) {
        $id = $row['location_id'];
        $state = $row['state'];
        $city = $row['city'];
        $zip = $row['zip_code'];
        $status = $row['status'];

        ?>
        <tr>
            <td><?php echo $id; ?> </td>
            <td><?php echo $state; ?> </td>
            <td><?php echo $city; ?> </td>
            <td><?php echo $zip; ?> </td>
            <td><label class="switch">
                    <input type="checkbox" checked>
                    <div class="slider round"></div>
                </label> </td>
            <td> <?php $query1= "select count(*) from services where fk_location_id=$id";
                $result1 = mysqli_query($con,$query1);
                $services = mysqli_fetch_row($result1);
                print_r( $services[0]); ?> </td>
            <td> <?php $query2= "select sum(partners) from services where fk_location_id=$id";
                $result2 = mysqli_query($con,$query2);
                $partners = mysqli_fetch_row($result2);
                print_r($partners[0]); ?> </td>
        </tr>

        <?php
    }
                                        ?>


                                    </table>
                                </form>
                            </div>
                        </div>
                    </div>
                    </div>
            </div>
        </div>

    <script type="javascript">
        function filterGlobal () {
            $('#example').DataTable().search(
                $('#global_filter').val(),

            ).draw();
        }

        $(document).ready(function() {
            $('#example').DataTable();

            $('input.global_filter').on( 'keyup click', function () {
                filterGlobal();
            } );
        } );
    </script>

		 <?php 
  include "footer.php"; 
  ?>
  <?php

if(isset($_POST['submit'])) {

$language = mysql_real_escape_string($_POST['language']);
$title= mysql_real_escape_string($_POST['title']);
$date = mysql_real_escape_string($_POST['date']);
$image = mysql_real_escape_string($_FILES['image']['name']);
$image_temp = mysql_real_escape_string($_FILES['image']['tmp_name']);
$videotype = mysql_real_escape_string($_POST['videotype']);
$url = mysql_real_escape_string($_POST['url']);


move_uploaded_file($_FILES['image']['tmp_name'], 'images/'.$image);

$query ="INSERT INTO videos VALUES('','$language','$title','$date','$image','$videotype','$url','')";
if(!mysql_query($query))
{
	echo "<script>
alert('Could not able to execute');
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
<?php }  ?>