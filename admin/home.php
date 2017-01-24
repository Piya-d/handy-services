<?php


if(!isset($_SESSION['user_name'])) {

    header("location: login.php");
}
else {

?>      <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
					<h1> Welcome to Admin Panel 
					</h1>
                        </div>
						</div>
            </div>
        </div>
<?php }  ?>