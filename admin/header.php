<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<link rel="icon" type="image/png" href="assets/img/favicon.ico">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>Light Bootstrap Dashboard by Creative Tim</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />


    <!-- Bootstrap core CSS     -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />

    <!-- Animation library for notifications   -->
    <link href="assets/css/animate.min.css" rel="stylesheet"/>

    <!--  Light Bootstrap Table core CSS    -->
    <link href="assets/css/light-bootstrap-dashboard.css" rel="stylesheet"/>


    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="assets/css/demo.css" rel="stylesheet" />
	
	<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
  <script>tinymce.init({
  selector: 'textarea',
  height: 500,
  theme: 'modern',
  plugins: [
    'advlist autolink lists link image charmap print preview hr anchor pagebreak',
    'searchreplace wordcount visualblocks visualchars code fullscreen',
    'insertdatetime media nonbreaking save table contextmenu directionality',
    'emoticons template paste textcolor colorpicker textpattern imagetools codesample toc'
  ],
  toolbar1: 'undo redo | insert | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
  toolbar2: 'print preview media | forecolor backcolor emoticons | codesample',
  image_advtab: true,
  templates: [
    { title: 'Test template 1', content: 'Test 1' },
    { title: 'Test template 2', content: 'Test 2' }
  ],
  content_css: [
    '//fonts.googleapis.com/css?family=Lato:300,300i,400,400i',
    '//www.tinymce.com/css/codepen.min.css'
  ]
 });</script>
  


    <!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
    <link href="assets/css/pe-icon-7-stroke.css" rel="stylesheet" />

</head>
<body>

<div class="wrapper">
    <div class="sidebar" data-color="purple" data-image="assets/img/sidebar-5.jpg">

    <!--

        Tip 1: you can change the color of the sidebar using: data-color="blue | azure | green | orange | red | purple"
        Tip 2: you can also add an image using data-image tag

    -->

    	<div class="sidebar-wrapper">
            <div class="logo">
                <a href="http://www.creative-tim.com" class="simple-text">
                   Handy services
                </a>
            </div>

            <ul class="nav">
                <li>
                    <a href="index.php">
                        <i class="pe-7s-graph"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                </br></br>
                <li>
                    <a href="news_insert.php">
                        <i class="fa fa-newspaper-o"></i>
                      User permissions
					<!--	<i class="fa fa-angle-down pull-right"></i> -->
						 </a>
						 </li>
                </br></br>
                <!--
						<a href="news_insert.php"> <h5 style="text-align: center; color:white;">&#8594;  Insert News </h5>  </a>
					
						<a href="view_news.php"> <h5 style="text-align: center; color:white;">&#8594;  View News </h5>  </a>
					-->
				             <li>
                    <a href="location_insert.php">
                        <i class="fa fa-play"></i>
                    Manage location
						<!-- <i class="fa fa-angle-down pull-right"></i> -->
                    </a>	

                </li>
                </br></br>
                <!--
				<a href="videos_insert.php"> <h5 style="text-align: center; color:white;">&#8594; Insert Videos </h5>  </a>
					
						<a href="view_videos.php"> <h5 style="text-align: center; color:white;">&#8594; View Videos </h5>  </a>
						-->
                <li>
                    <a href="services_insert.php">
                        <i class="fa fa-film"></i>
                        Manage services
               <!-- <i class="fa fa-angle-down pull-right"></i> -->
                    </a>
			 </li>
                </br></br>
               <!--
             <a href="movies_insert.php"> <h5 style="text-align: center; color:white;">&#8594; Insert Movies </h5>  </a>

						<a href="view_movies.php"> <h5 style="text-align: center; color:white;">&#8594; View Movies </h5>  </a>
					-->
				
            </ul>
    	</div>
    </div>

    <div class="main-panel">
        <nav class="navbar navbar-default navbar-fixed">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example-2">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                        </div>
                <div class="collapse navbar-collapse">
                    
                    <ul class="nav navbar-nav navbar-right">
                           <li>
                            <a href="logout.php">
                             <strong>   Log out  </strong>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>