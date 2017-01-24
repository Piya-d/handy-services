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
                    <div class="col-md-12">
                        <div class="card">
					
                            <div class="header">
                                <h4 class="title"><strong> View Movies List </strong></h4>
                               </div>
                            <div class="content table-responsive table-full-width">
			                   <table class="table table-hover table-striped">
                                    <thead>
                                        <th>ID</th>
										<th>Language</th>
                                    	<th>Title</th>
                                    	<th>Date</th>
                                    	<th>Edit</th>
										<th>Delete</th>
										</thead>
                                   
														  <?php 

$up = "select * from movies ORDER BY id DESC";
$ret = mysql_query($up);
while($row = mysql_fetch_array($ret)) {
	$id=$row['id'];
     $title=$row['title'];
	  $language=$row['language'];
	   $date=$row['date'];
	  $cast=$row['cast'];
	  $url=$row['url'];
	     ?>							 <tbody>
             
                                        <tr>
                                        	<td><?php echo $id; ?> </td>
                                        	<td><?php echo $language; ?></td>
                                        	<td><?php echo $title; ?></td>
                                        	<td><?php echo $date; ?></td>
											  <td><button class="btn btn-default btn-xs"><a href="movie_edit.php?id=<?php echo $id; ?>" ><i class="fa fa-pencil"></i></a></button></td>
											  <td><button class="btn btn-default btn-xs"><a href="delete.php?id=<?php echo $id; ?>" ><i class="fa fa-times"></i></a></button></td>
                                          
                                        </tr> 
										</tbody>
										<?php } ?>
                                </table>
                              
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