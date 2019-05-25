<?php include 'partials/head.php'; ?>
<body class="login">
<?php include 'partials/nav.php'; ?>
<div class="parallax page-section bg-blue-600">
    <div class="container parallax-layer" data-opacity="true" style="transform: translate3d(0px, 0px, 0px); opacity: 1;">
      <div class="media media-grid v-middle">
        <div class="media-left">
          <span class="icon-block half text-white"><i class="fa fa-user fa-2x"></i></span>
        </div>
        <div class="media-body">
          <h3 class="text-display-2 text-white margin-none">Login</h3>
        </div>
      </div>
    </div>
  </div>
  <div class="container">
        <div class="panel col-md-offset-3 col-md-6 col-xs-12 panel-default text-center paper-shadow" data-z="0.5">
          <h1 class="text-display-1 text-center margin-bottom-none">Sign In</h1>
          <!-- <img src="images/people/110/guy-5.jpg" class="img-circle width-80"> -->
          <div class="panel-body">
		  <form method="post" action="/login">
		  <div class="form-group">
		  <div class="form-control-material">
		  <label for="type">Login as</label>
                <select name="type" class="selectpicker" data-style="btn-white" placeholder="Login as" data-live-search="true" data-size="5" style="display: none;">
                      <option>Student</option>
                      <option>Faculty</option>
					  <option>Admin</option>
                    </select>
            </div>
            </div> 
            <div class="form-group">
              <div class="form-control-material">
                <input class="form-control" id="email" name="email" type="text" placeholder="Email"><span class="ma-form-highlight"></span><span class="ma-form-bar"></span>
                <label for="email">Email</label>
              </div>
            </div>
            <div class="form-group">
              <div class="form-control-material">
                <input class="form-control" id="password"  name="password" type="password" placeholder="Enter Password"><span class="ma-form-highlight"></span><span class="ma-form-bar"></span>
                <label for="password">Password</label>
              </div>
            </div>
			<div class="row">
                <?php if(isset($status)){
                    if (!($status) && isset($errors)){ ?>
                  <p class="bg-red-300 text-white">
                      <?php foreach ($errors as $e) {
                        echo $e.'<br>';
                    } ?>
                  </p>
                <?php }
                 if($status){ ?>
                <p class="bg-green-300 text-black">
                    You have been registered successfully ! 
                </p>
                <?php }} ?>
            </div>
            <button type="submit" class="btn btn-primary">Login <i class="fa fa-fw fa-unlock-alt"></i></button>
			</form>
            <a href="#" class="forgot-password">Forgot password?</a>
			<br>			<br>

            <a href="/registerstudent" class="btn btn-sm btn-info ">Sign Up as Student</a>
			OR
			<a href="/registerfaculty" class="btn btn-sm btn-info">Sign Up as Faculty</a>
          </div>
        </div>
      </div>
<?php include 'partials/foot.php'; ?>
