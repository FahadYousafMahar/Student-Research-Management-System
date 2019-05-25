<?php include 'partials/head.php'; ?>
<body class="login">
<?php include 'partials/nav.php'; ?>
<div class="parallax page-section bg-purple-600">
    <div class="container parallax-layer" data-opacity="true" style="transform: translate3d(0px, 0px, 0px); opacity: 1;">
      <div class="media media-grid v-middle">
        <div class="media-left">
          <span class="icon-block half text-white"><i class="fa fa-graduation-cap fa-2x"></i></span>
        </div>
        <div class="media-body">
          <h3 class="text-display-2 text-white margin-none">Student Registration</h3>
          <p class="text-white text-subhead">Get registered to submit your research papers!</p>
        </div>
      </div>
    </div>
  </div>
  <br>
    <div class="container">
        <div class="panel panel-default text-center paper-shadow" data-z="0.5">
          <h1 class="text-display-1">Register As Student</h1>
          <div class="panel-body">

            <!-- Signup -->
            <form role="form" action="index.html">
              <div class="form-group">
                <div class="form-control-material">
                  <input id="firstName" type="text" class="form-control" placeholder="First Name"><span class="ma-form-highlight"></span><span class="ma-form-bar"></span>
                  <label for="firstName">First name</label>
                </div>
              </div>
              <div class="form-group">
                <div class="form-control-material">
                  <input id="lastName" type="text" class="form-control" placeholder="Last Name"><span class="ma-form-highlight"></span><span class="ma-form-bar"></span>
                  <label for="lastName">Last name</label>
                </div>
              </div>
              <div class="form-group">
                <div class="form-control-material">
                  <input id="email" type="email" class="form-control" placeholder="Email"><span class="ma-form-highlight"></span><span class="ma-form-bar"></span>
                  <label for="email">Email address</label>
                </div>
              </div>
              <div class="form-group">
                <div class="form-control-material">
                  <input id="password" type="password" class="form-control" placeholder="Password"><span class="ma-form-highlight"></span><span class="ma-form-bar"></span>
                  <label for="password">Password</label>
                </div>
              </div>
              <div class="form-group">
                <div class="form-control-material">
                  <input id="passwordConfirmation" type="password" class="form-control" placeholder="Password Confirmation"><span class="ma-form-highlight"></span><span class="ma-form-bar"></span>
                  <label for="passwordConfirmation">Re-type password</label>
                </div>
              </div>
              <div class="form-group text-center">
                <div class="checkbox">
                  <input type="checkbox" id="agree">
                  <label for="agree">* I Agree with <a href="#">Terms &amp; Conditions!</a></label>
                </div>
              </div>
              <div class="text-center">
                <a href="website-student-dashboard.html" class="btn btn-primary">Create an Account</a>
              </div>
            </form>
            <!-- //Signup -->

          </div>
        </div>
  </div>
<?php include 'partials/foot.php'; ?>
