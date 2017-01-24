<?php
session_start();

if(!isset($_SESSION['user_name'])) {

  header("location: login.php");
}
else {

?>
 <?php 
  include "header.php"; 
  ?>
  
  <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-10">
                        <div class="card">
                            <div class="header">
                                <h4 class="title"> <strong>Insert News</strong> </h4>
                            </div>
                            <div class="content">
                                <form action="" method="post" enctype="multipart/form-data">
                                    <div class="row">
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <label>Language</label>
                                                <select name="language">
                                                          <option value="telugu">telugu</option>
                                                          <option value="hindi">hindi</option>
                                                          <option value="kanada">kanada</option>
                                                          <option value="tamil">tamil</option>
                                                          <option value="malayalam">malayalam</option>
                                               </select>
                                            </div>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <label>Title</label>
                                                <input type="text" class="form-control" name="title" placeholder="Title" value="">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Date</label>
                                                <input type="date" class="form-control" name="date" placeholder="Date" value="">
                                            </div>
                                        </div>
                                    
                                 <div class="col-md-8">
                                            <div class="form-group">
                                                <label>Image</label>
                                                <input type="file" class="form-control" name="image" placeholder="Image" value="">
                                            </div>
                                        </div>
										<div class="col-md-8">
                                            <div class="form-group">
                                                <label>Cast</label>
                                                <input type="text" class="form-control" name="cast" placeholder="Cast" value="">
                                            </div>
                                        </div>
                                           <div class="col-md-8">
                                            <div class="form-group">
                                                <label>Crew</label>
                                                <input type="text" class="form-control" name="crew" placeholder="crew" value="">
                                            </div>
                                        </div>
                                             <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Information</label>
                                                <textarea rows="20" class="form-control" name="content" placeholder="Here can be your description" value="content"></textarea>
                                            </div>
                                        </div>
                                    

                                    <button type="submit"  name="submit" class="btn btn-info btn-fill pull-right">Submit New</button>
                                    <div class="clearfix"></div>
									
									</div>
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
  
  <?php

include("includes/connect.php");

if(isset($_POST['submit'])) {

$language = mysql_real_escape_string($_POST['language']);
$title= mysql_real_escape_string($_POST['title']);
$date = mysql_real_escape_string($_POST['date']);
$image = mysql_real_escape_string($_FILES['image']['name']);
$image_temp = mysql_real_escape_string($_FILES['image']['tmp_name']);
$cast = mysql_real_escape_string($_POST['cast']);
$crew = mysql_real_escape_string($_POST['crew']);
$content = mysql_real_escape_string($_POST['content']);


move_uploaded_file($_FILES['image']['tmp_name'], 'images/'.$image);

$query ="INSERT INTO news VALUES('','$language','$title','$date','$image','$cast','$crew','$content','')";
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