<!DOCTYPE html>
<html data-ng-app="news" lang="en">
<head>
   <?php
	require "php/all_require.php";
	?>

</head>
<body>
<!-- navbar -->

<nav id="menu" class="navbar navbar-default navbar-fixed-top">
  <div class="container"> 
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
       </div>
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#home" class="page-scroll">Home</a></li>
        <li><a href="#displaySection" class="page-scroll">All Thoughts</a></li>
        <li><a href="#searchSection" class="page-scroll">Search</a></li>
        <li><a href="#chartSection" class="page-scroll">Chart</a></li>
        <li><a href="#D-section" data-toggle="modal" data-target="#loginModal">Login</a></li>

      </ul>
    </div>
  </div>
</nav>
      <!-- /navbar --> 
    
    <div class="text-center" id="home">
  <div class="intro-text">
    <h1><strong>UQ <span class="color">NEWS</span></strong></h1>
      <p>a creative way to spread your <span class="color"> thoughts</span></p>
        
      <div class="col-lg-4 col-lg-offset-4">
         
    <div data-ng-controller="studentCtrl">

      <!-- Add new thought -->
     <form name="addThought">
      <input type="text" placeholder="Name" data-ng-model="name" required/><br><br>
      <input type="text" placeholder="Message" data-ng-model="MSG" required/><br><br>
        <button id="addT" class="btn btn-default" data-ng-click="addstudentData(MSG, name)" data-ng-disabled="addThought.$invalid">Add</button>
         </form>
      </div>
        
      </div>
   
</div>
    </div>

<div id="displaySection" class="text-center">
<div class="container">
    <div>
    <!-- display all thoughts-->

      <h2>All <strong>Thoughts</strong></h2>
      <hr>
        <div class="col-md-4 col-md-offset-4" data-ng-controller="studentCtrl">

			<div data-ng-repeat="s in student">
				
					<div id="circle" class="col-md-4">
						<strong>{{student[$index].name}}</strong><br>{{student[$index].MSG}}
						<br>
					 <div class="showBtn">
						<a class="mini-listing gray button fa fa-thumbs-up fa-lg btn col-xs-6" href="property/1909201136430"></a>
						<a class="mini-listing gray button fa fa-thumbs-down fa-lg btn col-xs-6" href="property/1909201136430"></a>
					</div>  

					</div>
				
			</div>
        </div>
        </div>
       
    </div>  
</div>
   
<div id="searchSection" class="text-center">
  <div class="container">
    <div>
    <!-- search a thoughts-->

      <h2>Search <strong>Thoughts</strong></h2>
      <hr>
 <div class="col-lg-4 col-lg-offset-4" data-ng-controller="studentCtrl">
 
      <label>Search for : </label>
      <input type="text" data-ng-model="name" />
      <br><br>
      <button class="btn btn-default btn-lg page-scroll" data-ng-click="getstudentData()">Submit</button>
      <br><br>
 
      {{studentData}}<br>
 
    </div>
 
    </div>
    </div>  
</div> 
<div id="chartSection" class="text-center">
 <div class="container">
    <div>
        <!-- chart will be shown here based on the thoughts-->
      <h2><strong>Chart</strong></h2>
      <hr>
      <p></p>
    </div>
    </div>  
</div>
     <!-- login modal -->
    <div class="modal fade center" id="loginModal" tabindex="-1" role="dialog">
			<div class="modal-dialog modal-md" role="document">
              
				<div class="modal-content Lmodal">
                      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"></button>
        <h4 class="modal-title">Login</h4>
      </div>
					<div class="modal-body">
                        <form id="frmLogin">
						<div class="input-group">
							<span class="input-group-addon"><i class="fa fa-user"></i></span>
							<input type="email" id="email" name="email" placeholder="Email" class="form-control" required>
                            </div>
                            <span id="emailError"></span>
                            <br>
						<div class="input-group">
							<span class="input-group-addon"><i class="fa fa-key"></i></span>
							<input type="password" placeholder="Password" class="form-control" name="password" required>
						</div>
                            <span id="password"></span>	
						<br>
                            <div class="col-md-3">
                            <button type="submit" class="btn btn-default" id="btnLogin">Login</button>
                            </div>    
                        </form>
                        <div class="col-md-3">
                        <button type="submit" class="btn btn-default" id="btnRegister" data-toggle="modal" data-target="#registerModal" >Register</button>
                            </div>
					</div>
				</div>
                
			</div>
			
		</div>
    <!-- register modal-->
    <div class="modal fade center" id="registerModal" tabindex="-1" role="dialog">
			<div class="modal-dialog modal-md" role="document">
              
				<div class="modal-content">
                      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"></button>
        <h4 class="modal-title">Register</h4>
      </div>
					<div class="modal-body">
                        <form id="frmReg">
						<div class="input-group">
							<span class="input-group-addon"><i class="fa fa-user"></i></span>
							<input type="userName" id="userName" name="userName" placeholder="User Name" class="form-control" required>
                            </div>
                            <span id="emailError1"></span>
                            <br>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                            <input type="email" id="email1" name="email" placeholder="Email" class="form-control" required>
                            </div>
                            <span id="emailError1"></span>
                            <br>
						<div class="input-group">
							<span class="input-group-addon"><i class="fa fa-key"></i></span>
							<input type="password" placeholder="Password" class="form-control" name="password" required>
						</div>
                            <span id="password1"></span>	
						<br>
                            <div class="input-group">
							<span class="input-group-addon"><i class="fa fa-key"></i></span>
							<input type="password"  placeholder="Confirm Password" name="passwordRepeat" class="form-control" required>
						</div>
                            <span id="passwordRepeat1"></span>
						<br>
                             <div class="input-group">
                             <span class="input-group-addon"><label class="fa fa-transgender"> :</label>
                                 
                            <label class="radio-inline">
                                <input type="radio" name="gender" value="male" > <i class="fa fa-mars" aria-hidden="true" style="color:blue"> </i></label>
                            <label class="radio-inline">
                                <input type="radio" name="gender" value="female" > <i class="fa fa-venus" aria-hidden="true" style="color:pink"> </i></label>  
                                 </span>
                            </div>
                            
                            <span id="gender"></span>
						<br>
                               <button type="submit" class="btn btn-default" id="btnRegister1">Register</button>
                        </form>
					</div>
				</div>
                
			</div>
			
		</div>
    <!-- below here are those Javascript-->
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.9/angular.min.js"></script>
       <script src="js/angular.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script> 
<script type="text/javascript" src="js/jquery.1.11.1.js"></script> 
<script type="text/javascript" src="js/bootstrap.js"></script> 
<script type="text/javascript" src="js/main.js"></script>
    
    </body>
</html>
