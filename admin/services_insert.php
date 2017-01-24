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

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-10">
                    <div class="card">
                        <div class="header">
                            <h4 class="title"> <strong> Services </strong></h4>
                        </div>
                        <div class="content">
                            <form action="" method="post" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label>Search</label>
                                            <input type="text" placeholder="enter service" id="service_search" name="_search" />
                                        </div>
                                        <div class="form-group pull-right">
                                            <a href='#' onclick='javascript:window.open("includes/add_services.php", "_blank", "scrollbars=1,resizable=1,height=300,width=450");' title='Pop Up'> add </a>
                                        </div>
                                    </div>
                                </div>
                                <table>

                                    <tr>
                                        <th>
                                            ID
                                        </th>
                                        <th> Service Name </th>
                                        <th> Available in city </th>
                                        <th> Available partners </th>
                                    </tr>

                                    <?php
                                    $con=mysqli_connect("localhost","root","","sampletest");
                                    $up = "select * from services ";
                                    $ret = mysqli_query($con,$up);
                                    while($row = mysqli_fetch_array($ret, MYSQLI_ASSOC)) {
                                        $id = $row['service_id'];
                                        $location_id =$row['fk_location_id'];
                                        $service_name = $row['service_name'];
                                        $partners = $row['partners'];

                                        ?>
                                        <tr>
                                            <td><?php echo $id; ?> </td>
                                            <td><?php echo  $service_name; ?> </td>

                                            <td><?php $query= "select city from locations where location_id=$location_id";
                $result = mysqli_query($con,$query);
                $cities = mysqli_fetch_row($result);
                                                if($cities != 0 || $cities != null){
                                            foreach($cities as $city)
                echo " $city </br> "; } else echo "currently not available"; ?> </td>
                                            <td><?php echo $partners; ?> </td>
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


    <?php
    include "footer.php";
    ?>

<?php }  ?>