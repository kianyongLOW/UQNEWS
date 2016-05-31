<?php
session_start();
	require "php/document-header.php";
?>

<!-- navbar -->
<nav id="menu" class="navbar navbar-default navbar-fixed-top" >
  <div class="container"> 
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false" aria-controls="navbar">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
    </div>
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#home" class="page-scroll">Home</a></li>
        <li><a href="#displaySection" class="page-scroll">All Thoughts</a></li>
        <li><a href="#searchSection" class="page-scroll">Search</a></li>
        <li><a href="#chartSection" class="page-scroll">Chart</a></li>

        <?php if(isset($_SESSION["username"])){
                    $now = time(); // Checking the time now when home page starts.

                    if ($now > $_SESSION['expire']) {
                        session_destroy();
                        
            ?>
          <li><a href="#D-section" data-toggle="modal" data-target="#loginModal">Login</a></li>
                    <?php }else{ ?>
           
        <li><a href="php/logout.php">Logout</a></li>
        <?php }
            }else{ ?>
        <li><a href="#D-section" data-toggle="modal" data-target="#loginModal">Login</a></li>
          <?php } ?>
        
      </ul>
    </div>
  </div>
</nav>

<!-- /navbar --> 
<section class="resize">
<div class="text-center" id="home">
	<div class="intro-text">
		<h1><strong>UQ <span class="color">NEWS</span></strong></h1>
		<p>a creative way to spread your <span class="color"> thoughts</span></p>
		<div class="col-lg-4 col-lg-offset-4"> 
			<div id="login">
               <input type="text" size="40" ng-model="msg" placeholder="Type your thought"><br>
                <button ng-click="check_credentials()">add</button><br>

                <span id="message">{{message}}</span>
            </div>
		</div> 
	</div>
</div>


<div id="displaySection" class="text-center">
	<div class="container">
		<div class="row">
		<!-- display all thoughts-->
		  <h2>All <strong>Thoughts</strong></h2>
		  <hr>
			<div class="col-md-12">
                       <div ng-repeat="s in students">
                    <div class="circle-text col-md-1">
                        <div>
                            <i data-ng-class="getClass(s)" class="fa" aria-hidden="true" style="color:white;"></i> 
                            <i>{{s.name}}</i>
                            <br>
                            <i style="text-decoration: underline;" >{{s.MSG}}</i>
                            <br>
                            <a class="mini-listing gray button fa fa-thumbs-up fa-lg btn col-xs-6 likePosition" id="like" onclick="likeNews({{s.newsId}});updateData();" data-toggle="tooltip" title="Like this news">{{s.newsLike}}</a>
									
                            <a class="mini-listing gray button fa fa-thumbs-down fa-lg btn col-xs-6 likePosition" id="dislike" onclick="dislikeNews({{s.newsId}});updateData();" data-toggle="tooltip" title="Dislike this news">{{s.newsNotLike}}</a>
						
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
	 		<div class="col-lg-12">
			  <label>Search for : </label>
			  <input type="text" data-ng-model="name" >
			  <br><br>
			  <button class="btn btn-default btn-lg page-scroll" data-ng-click="getstudentData()">Submit</button>
			  <br><br>
                 
                <div class="col-md-12">
                <div ng-repeat="s in studentData">
                    <div class="circle-texts col-md-1">
                        <div>{{s.name}}<br>{{s.MSG}}<br>
                           
                        </div> 
                   </div>
				</div>
			</div>
			</div>
		</div>
	</div>  
</div>

<div id="chartSection" class="text-center col-xs-18">
	<div class="container">
		<div class="row">
		  <!-- chart will be shown here based on the thoughts-->
		  <h2><strong>Chart</strong></h2>
			<div class="ct-chart">
			</div>
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
					<div class="moveRight">
						<button type="submit" class="btn btn-default" id="btnLogin">Login</button>
						<p id="loginResponse"></p>
					</div>
				</form>
			</div>
			<div class="modal-footer">
				<div class="col-md-12">
				<p>No account? Register here</p>
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
					<span id="userError"></span>
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
					 <input type="radio" name="gender" value="m" required> <i class="fa fa-mars" aria-hidden="true" style="color:blue"> </i></label>
					 <label class="radio-inline">
					 <input type="radio" name="gender" value="f" > <i class="fa fa-venus" aria-hidden="true" style="color:pink"> </i></label>  
					 </span>
				</div>
					<br>
					<div class="input-group col-md-2 col-md-offset-5">
						<button type="submit" class="btn btn-default" id="btnRegister1">Register</button>
					</div>
				</form>
                <p id="registerResponse"></p>
			</div>
            
		</div>
	</div>
</div>
</section>
<script>
  document.write('<base href="' + document.location + '" />');
</script>
<!-- below here are those Javascript-->
<?php
	require "php/document-footer.php";
?>