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
							<?php 
              include("includes/connect.php");

 if(isset($_GET['id']))
  {
  $get=$_GET['id'];
  
$up = "select * from news where id='$get'";
$ret = mysql_query($up);
while($row = mysql_fetch_array($ret)) {
	  $title=$row['title'];
	  $image = $row['image'];
	  $language=$row['language'];
	   $date=$row['date'];
	    $cast=$row['cast'];
	  $crew=$row['crew'];
	   $content=$row['content'];
	

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
                                                <label>Cast</label>
                                                <input type="text" class="form-control" name="cast" placeholder="Cast" value="<?php echo $cast ?>">
                                            </div>
                                        </div>
                                           <div class="col-md-8">
                                            <div class="form-group">
                                                <label>Crew</label>
                                                <input type="text" class="form-control" name="crew" placeholder="crew" value="<?php echo $crew ?>">
                                            </div>
                                        </div>
                                             <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Information</label>
                                                <textarea rows="20" class="form-control" name="content" placeholder="Here can be your description" value="<?php echo $content ?>"> <?php echo $content ?></textarea>
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
include("includes/connect.php");

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
$cast1 = mysql_real_escape_string($_POST['cast']);
$crew1 = mysql_real_escape_string($_POST['crew']);
$content1 = mysql_real_escape_string($_POST['content']);


move_uploaded_file($_FILES['image']['tmp_name'], 'images/'.$image1);

$query ="UPDATE news SET language='$language1', title='$title1', date='$date1', image='$image1', cast='$cast1', crew='$crew1', content='$content1' WHERE id=$id";
if(!mysql_query($query))
{
 echo "<script>
alert('Could not able to execute');
window.location.href='view_news.php';
</script>";
} else
{
	echo "<script>
alert('Records added successfully.');
window.location.href='view_news.php';
</script>";
  
}
}
}

?>
<?php }  ?>