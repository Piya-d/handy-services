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
                                <h4 class="title"> <strong>Insert Cinema Poster Images</strong> </h4>
                            </div>
                            <div class="content">
                                <form action="" method="post" enctype="multipart/form-data">
                                    <div class="row">
                                                                            
                                 <div class="col-md-8">
                                            <div class="form-group">
                                                <label>Telugu Image :</label>
                                                <input type="file" class="form-control" name="imaget" placeholder="Image" value="">
                                            </div>
                                        </div>
                                               <div class="col-md-8">
                                            <div class="form-group">
                                                <label>Hindi Image :</label>
                                                <input type="file" class="form-control" name="imageh" placeholder="Image" value="">
                                            </div>
                                        </div>
                                            <div class="col-md-8">
                                            <div class="form-group">
                                                <label>Tamil Image :</label>
                                                <input type="file" class="form-control" name="imageta" placeholder="Image" value="">
                                            </div>
                                        </div>
                                              <div class="col-md-8">
                                            <div class="form-group">
                                                <label>English Image : </label>
                                                <input type="file" class="form-control" name="imagee" placeholder="Image" value="">
                                            </div>
                                        </div>
                                           <div class="col-md-8">
                                            <div class="form-group">
                                                <label>Kannada Image : </label>
                                                <input type="file" class="form-control" name="imagek" placeholder="Image" value="">
                                            </div>
                                        </div>
                                             <div class="col-md-8">
                                            <div class="form-group">
                                                <label> Malayalam Image</label>
                                                <input type="file" class="form-control" name="imagem" placeholder="Image" value="">
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

$imaget = mysql_real_escape_string($_FILES['imaget']['name']);
$imaget_temp = mysql_real_escape_string($_FILES['imaget']['tmp_name']);

$imageh = mysql_real_escape_string($_FILES['imageh']['name']);
$imageh_temp = mysql_real_escape_string($_FILES['imageh']['tmp_name']);

$imageta = mysql_real_escape_string($_FILES['imageta']['name']);
$imageta_temp = mysql_real_escape_string($_FILES['imageta']['tmp_name']);

$imagee = mysql_real_escape_string($_FILES['imagee']['name']);
$imagee_temp = mysql_real_escape_string($_FILES['imagee']['tmp_name']);

$imagek = mysql_real_escape_string($_FILES['imagek']['name']);
$imagek_temp = mysql_real_escape_string($_FILES['imagek']['tmp_name']);

$imagem = mysql_real_escape_string($_FILES['imagem']['name']);
$imagem_temp = mysql_real_escape_string($_FILES['imagem']['tmp_name']);



move_uploaded_file($_FILES['imaget']['tmp_name'], 'images/'.$imaget);

move_uploaded_file($_FILES['imageh']['tmp_name'], 'images/'.$imageh);

move_uploaded_file($_FILES['imagee']['tmp_name'], 'images/'.$imagee);

move_uploaded_file($_FILES['imageta']['tmp_name'], 'images/'.$imageta);

move_uploaded_file($_FILES['imagek']['tmp_name'], 'images/'.$imagek);

move_uploaded_file($_FILES['imagem']['tmp_name'], 'images/'.$imagem);

$query ="INSERT INTO cinema_poster VALUES('','$imaget','$imageh','$imageta','$imagee','$imagek','$imagem')";
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