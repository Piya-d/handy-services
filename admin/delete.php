 <?php 
  
  include "config.php"; 

  if(isset($_GET['id']))
  {
  $delete=$_GET['id'];
  $tables = array('movies', 'videos', 'news');
  foreach ($tables as $table) {
  $del=mysql_query("DELETE FROM $table WHERE id='$delete'");
  }
   if($del)
  {
	  echo "<script>
alert('File Deleted Successfully');
window.location.href='" .$_SERVER['HTTP_REFERER']. "';
</script>";

  }
  else
  {
 echo "<script>
alert('File Deleted UnSuccessfully');
window.location.href='" .$_SERVER['HTTP_REFERER']. "';
</script>";
  }
  }
?>