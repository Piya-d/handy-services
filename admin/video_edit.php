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
  
  <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-10">
                        <div class="card">
                            <div class="header">
                                <h4 class="title"> <strong>Update Video Files</strong> </h4>
                            </div>
                            <div class="content">
							<?php 
 if(isset($_GET['id']))
  {
  $get=$_GET['id'];
  
$up = "select * from videos where id='$get'";
$ret = mysql_query($up);
while($row = mysql_fetch_array($ret)) {
	  $title=$row['title'];
	  $image = $row['image'];
	  $language=$row['language'];
	   $date=$row['date'];
	    $videotype=$row['videotype'];
		$url=$row['url'];
	

}
  }
	     ?>
                                <form action="" method="post" enctype="multipart/form-data">
                                    <div class="row">
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <label>Language</label>
                                                <select name="language">
												<option value="<?php echo $language?>"><?php echo $language?></option>
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
                                                <input type="text" class="form-control" name="title" placeholder="Title" value="<?php echo $title?>">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Date</label>
                                                <input type="date" class="form-control" name="date" placeholder="Date" value="<?php echo $date ?>">
                                            </div>
                                        </div>
                                    
                                 <div class="col-md-8">
                                            <div class="form-group">
                                                <label>Image</label>
                                                <input type="file" class="form-control" name="image" placeholder="Image" value="<?php echo $image ?>">
                                            </div>
                                        </div>
										
									
										 <div class="col-md-8">
                                            <div class="form-group">
                                                <label>Video Type </label>
                                                <select name="videotype">
												<option value="<?php echo $videotype?>"><?php echo $videotype?></option>
                                                          <option value="Video">Video</option>
                                                          <option value="Song">Song</option>
                                                          <option value="Teaser">Teaser</option>
                                                          <option value="Trailer">Trailer</option>
                                               </select>
                                            </div>
                                        </div>
                                    	<div class="col-md-8">
                                            <div class="form-group">
                                                <label>url</label>
                                                <input type="url" class="form-control" name="url" placeholder="url" value="<?php echo $url; ?>">
                                            </div>
                                        </div>

                                    <button type="submit"  name="update" class="btn btn-info btn-fill pull-right">Update New</button>
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

if(isset($_GET['id']))
{
  $id=$_GET['id'];
  if(isset($_POST['update']))
  {

$language1 = mysql_real_escape_string($_POST['language']);
$title1= mysql_real_escape_string($_POST['title']);
$date1 = mysql_real_escape_string($_POST['date']);
$image1 = mysql_real_escape_string($_FILES['image']['name']);
$image_temp = mysql_real_escape_string($_FILES['image']['tmp_name']);
$videotype1 = mysql_real_escape_string($_POST['videotype']);
$url1 = mysql_real_escape_string($_POST['url']);


move_uploaded_file($_FILES['image']['tmp_name'], 'images/'.$image1);

$query ="UPDATE videos SET language='$language1', title='$title1', date='$date1', image='$image1', videotype='$videotype1', url='$url1' WHERE id=$id";
if(!mysql_query($query))
{
 echo "<script>
alert('Could not able to execute');
window.location.href='view_videos.php';
</script>";
} else
{
	echo "<script>
alert('Records added successfully.');
window.location.href='view_videos.php';
</script>";
  
}
}
}

?>
<?php }  ?>