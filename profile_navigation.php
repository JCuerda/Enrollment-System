                    <nav class = "navbar navbar-default navbar-fixed">
                        <div class="container-fluid">
                            <ul class="nav navbar-nav navbar-left">
                               <li><a href="profile.php"><i class="fa fa-home"></i>&nbsp;Home</a></li>
                                <li><a href = "editprofile.php"><i class="fa fa-cog"></i>&nbsp;Edit Basic Profile</a></li>
                        
                                <li><a href="#">
		                                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
	                                  		<input type="submit" name="btn_enroll" class="btn btn-success btn-xs" value="Enroll Now">
	                                     </form>
                                     </a>
                                </li>

                                 <li><a href="#">
                                        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
                                            <input type="submit" name="btn_update" class="btn btn-danger btn-xs" value="Update Payment">
                                         </form>
                                     </a>
                                </li>

                                <li>
                                    <a href="#">
                                        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
                                            <input type="submit" name="btn_print" class="btn btn-primary btn-xs" value="Print Form">
                                         </form>
                                     </a>
                                </li>


                                <li>
                                    <a href="#">
                                         <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
                                            <input type="submit" name="btn_upload" class="btn btn-default btn-xs" value="Upload Photo">
                                         </form> 
                                     </a>
                                </li>

                            </ul>
                        </div><!--end of .container-->
                    </nav>