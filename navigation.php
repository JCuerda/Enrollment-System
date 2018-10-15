   <nav class = "navbar navbar-default navbar-fixed-top">
		<div class="container">
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
				<ul class="nav navbar-nav navbar-left">
					<li><a href = "#">Home</a></li>
					<li class="dropdown">
                        <a href = "#" class="dropdown-toggle" data-toggle="dropdown" role="button">Admission<span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="admission_requirements.php?branch=<?php echo $the_branch; ?>">Admission Requirements</a></li>
                                <li><a href="#">Scholarship Grants</a></li>
                                <li><a href="#">Courses Offered</a></li>
                                <li><a href="#">The College</a></li>
                            </ul>
                    </li> <!-- end of category dropdown-->
					<li><a href = "#">Contact Us</a></li>
					<li><a href = "#">About</a></li>
                </ul>
                
                <ul class="nav navbar-nav navbar-right">
						

						<!-- <li><a href="#" role="button"><i class="fa fa-check-square-o"></i>&nbsp;Inquire Now</a></li> -->
						<li><a href = "enrollment_redirect.php?branch=<?php echo $the_branch; ?>"><i class="fa fa-edit"></i>&nbsp;Enroll Now</a></li>
						<li> <a href="redirect.php?branch=<?php echo $the_branch;?>" role="button"><i class="fa fa-hashtag"></i>&nbsp;Student Login</a></li>
    
				</ul>
                
           </div> <!--  end og .nav .navbar-collapse #navbar-collapse -->
        </div><!--end of .container-->
	</nav>