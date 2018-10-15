<?php
    include('includes/connection.php');
?>


<!DOCTYPE HTML>
<html>
<head>
<title>Interface Computer College | Home</title>
<meta charset="utf-8">
	    
	<meta http-equiv="X-UA-Compatible" content="IE=edge">    
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="font-awesome-4.6.3/css/font-awesome.min.css" rel="stylesheet">
	<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
   <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
    <link href="style.css" rel="stylesheet" >

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	   
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	    
	<!--[if lt IE 9]>
	     
	<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	     
	<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
    
</head>

<body>
   
    <nav class = "navbar navbar-default navbar-fixed-top">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
                    <span class="sr-only">Toggle Navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>

				<a class="navbar-brand brand-title" href="index.php"></a>
                
             </div> <!--end of .navbar-header-->
            
            <div class="collapse navbar-collapse" id="navbar-collapse"> 
				<ul class="nav navbar-nav navbar-left" align="center">
					<li><a href = "index.php">Home</a></li>
					<li class="dropdown">
                        <a href = "#" class="dropdown-toggle" data-toggle="dropdown" role="button">Admission<span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="#admission">Admission Requirements</a></li>
                                <li><a href="#">Scholarship Grants</a></li>
                                <li><a href="#">Courses Offered</a></li>
                                <li><a href="#">The College</a></li>
                            </ul>
                    </li> <!-- end of category dropdown-->
					<li><a href = "">Contact Us</a></li>
					<li><a href = "#">About</a></li>
                </ul>
                
                <ul class="nav navbar-nav navbar-right">
						<li>
                            <a href="" role="button"><i class="fa fa-hashtag"></i>&nbsp;Enroll Now</a>
						</li>
					</ul>
                
           </div> <!--  end og .nav .navbar-collapse #navbar-collapse -->
            
        </div><!--end of .container-->
	</nav>
   
       <!-- Header Carousel -->
    <header id="myCarousel" class="carousel slide">
        <!-- Indicators -->
        <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
            <li data-target="#myCarousel" data-slide-to="2"></li>
        </ol>

        <!-- Wrapper for slides -->
        <div class="carousel-inner">
            <div class="item active">
                
                <div class="fill" style="background:ewan.png;"></div>
                <div class="carousel-caption">
                    <h2>Caption 1</h2>
                </div>
            </div>
            <div class="item">
                <div class="fill" style="background-image:url('ewan.png');"></div>
                <div class="carousel-caption">
                    <h2>Caption 2</h2>
                </div>
            </div>
            <div class="item">
                <div class="fill" style="background-image:ewan.png;"></div>
                <div class="carousel-caption">
                    <h2>Caption 3</h2>
                </div>
            </div>
        </div>

        <!-- Controls -->
        <a class="left carousel-control" href="#myCarousel" data-slide="prev">
            <span class="icon-prev"></span>
        </a>
        <a class="right carousel-control" href="#myCarousel" data-slide="next">
            <span class="icon-next"></span>
        </a>
    </header>
          
     <div class="container" id="mainContainer">
        <div class="row">
            <div class="col-md-12">
                
                    <ol class="breadcrumb">
                        <li><a href="index.php">Home</a></li>
                        <li class="active"><a href="enrollnow.php">Enroll Now</a></li>
                    </ol>
                
            </div>
        </div>
         <form class="form-horizontal">
            <fieldset>

            <!-- Form Name -->
            <legend>Enrollment Form</legend>

            <!-- Select Basic -->
            <div class="form-group">
              <label class="col-md-4 control-label" for="branch">Branch</label>
              <div class="col-md-4">
                <select id="branch" name="branch" class="form-control">
                 <option value="">-Select-</option>
                  <option value="caloocan">Caloocan</option>
                  <option value="manila">Manila</option>
                  <option value="davao">Davao</option>
                </select>
              </div>
            </div>

            <!-- Text input-->
            <div class="form-group">
              <label class="col-md-4 control-label" for="fName">First Name:</label>  
              <div class="col-md-4">
              <input id="fName" name="fName" type="text" placeholder="First Name" class="form-control input-md">

              </div>
            </div>

            <!-- Text input-->
            <div class="form-group">
              <label class="col-md-4 control-label" for="lastName">Last Name:</label>  
              <div class="col-md-4">
              <input id="lastName" name="lastName" type="text" placeholder="Last Name" class="form-control input-md">

              </div>
            </div>

            <!-- Text input-->
            <div class="form-group">
              <label class="col-md-4 control-label" for="mName">Middle Name</label>  
              <div class="col-md-4">
              <input id="mName" name="mName" type="text" placeholder="Middle Name:" class="form-control input-md">

              </div>
            </div>

            <!-- Text input-->
            <div class="form-group">
              <label class="col-md-4 control-label" for="age">Age:</label>  
              <div class="col-md-4">
              <input id="age" name="age" type="text" placeholder="Age" class="form-control input-md">
              </div>
            </div>
            
            <!-- Select Basic -->
            <div class="form-group">
              <label class="col-md-4 control-label" for="gender">Gender</label>
              <div class="col-md-4">
                <select id="gender" name="gender" class="form-control">
                  <option value="">-Select-</option>
                  <option value="">Male</option>
                  <option value="">Female</option>
                </select>
              </div>
            </div>

            <!-- Text input-->
            <div class="form-group">
              <label class="col-md-4 control-label" for="address">Address:</label>  
              <div class="col-md-5">
              <input id="address" name="address" type="text" placeholder="Address" class="form-control input-md">

              </div>
            </div>

            <!-- Text input-->
            <div class="form-group">
              <label class="col-md-4 control-label" for="lastSchool">Course Offered</label>  
              <div class="col-md-5">
              <select id="course" name="course" class="form-control">
                  <option value="">-Select-</option>
                  <option value="">Bachelor of Science in Information Technology</option>
                  <option value="">Bachelor of Science in Computer Science</option>
                </select>

              </div>
            </div>
        

            <!-- Button (Double) -->
            <div class="form-group">
              <label class="col-md-4 control-label" for="btnSubmit"></label>
              <div class="col-md-8">
                <button id="btnSubmit" name="btnSubmit" class="btn btn-success">Submit</button>
                <button id="btnCancel" name="btnCancel" class="btn btn-default">Cancel</button>
              </div>
            </div>

            </fieldset>
        </form>

    </div><!--end of main -->

 
    

	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
	   
	<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>  -->

	<script src="js/jquery-1.11.3.min.js"></script>
	<script src="js/jquery-2.2.4.min.js"></script>
	<!-- Include all compiled plugins (below), or include individual files as needed -->
	<script src="bootstrap/js/bootstrap.min.js"></script>
   
   

    <div class="container-fluid footer-container">
        <div class="row">
            <div class="col-md-12">
                    &copy; All Rights Reserved &bull; Cuerda, Jessie A. 
            </div>
        </div>
    </div>
</body>

</html>