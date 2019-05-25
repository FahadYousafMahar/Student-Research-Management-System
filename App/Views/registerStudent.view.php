<?php include 'partials/head.php'; ?>
<body class="login">
<?php include 'partials/nav.php'; ?>
<div class="parallax page-section bg-blue-600">
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
            <form role="form" method="post" action="/registerstudent">
            <div class="row">
              <div class="col-md-6 col-xs-12 col-sm-12">
                <div class="form-group">
                  <div class="form-control-material">
                    <input required id="firstName" type="text" name="fname"  class="form-control" placeholder="First Name"><span class="ma-form-highlight"></span><span class="ma-form-bar"></span>
                    <label for="firstName">First name</label>
                  </div>
                </div>
              </div>
              <div class="col-md-6 col-xs-12 col-sm-12">
                <div class="form-group">
                  <div class="form-control-material">
                    <input required id="lastName" type="text"  name="lname" class="form-control" placeholder="Last Name"><span class="ma-form-highlight"></span><span class="ma-form-bar"></span>
                    <label for="lastName">Last name</label>
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6 col-xs-12 col-sm-12">
              <div class="form-group">
                <div class="form-control-material">
                  <input required name="email" type="email" class="form-control" placeholder="Email"><span class="ma-form-highlight"></span><span class="ma-form-bar"></span>
                  <label for="email">Email address</label>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6 col-xs-12 col-sm-12">
              <div class="form-group">
                <div class="form-control-material">
                  <input required id="password" type="password"  name="password" class="form-control" placeholder="Password"><span class="ma-form-highlight"></span><span class="ma-form-bar"></span>
                  <label for="password">Password</label>
                </div>
              </div>
            </div>
              <div class="col-md-6 col-xs-12 col-sm-12">
              <div class="form-group">
                <div class="form-control-material">
                  <input required id="passwordConfirmation"  name="confirmpassword" type="password" class="form-control" placeholder="Password Confirmation"><span class="ma-form-highlight"></span><span class="ma-form-bar"></span>
                  <label for="passwordConfirmation">Re-type password</label>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6 col-xs-12 col-sm-12">
              <div class="form-group">
                <div class="">
                <select name="gender" class="selectpicker" data-style="btn-white" placeholder="Choose Gender" data-live-search="true" data-size="5" style="display: none;">
                      <option>Male</option>
                      <option>Female</option>
                    </select>                  
                </div>
              </div>
            </div>
              <div class="col-md-6 col-xs-12 col-sm-12">
              <div class="form-group">
              <div class="form-control-material">
                <label for="datepicker">Date of Birth</label>
                <input required id="datepicker" name="birthday"  type="text" class="form-control datepicker">
              </div>
             </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6 col-xs-12 col-sm-12">
              <div class="form-group">
                <div class="form-control-material">
                  <input required id="city" type="text"  name="city" class="form-control" placeholder="City"><span class="ma-form-highlight"></span><span class="ma-form-bar"></span>
                  <label for="city">City</label>
                </div>
              </div>
            </div>
              <div class="col-md-6 col-xs-12 col-sm-12">
              <div class="form-group">
                <div class="form-control-material">
                  <input required id="country" type="text" name="country"  class="form-control" placeholder="Country"><span class="ma-form-highlight"></span><span class="ma-form-bar"></span>
                  <label for="country">Country</label>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6 col-xs-12 col-sm-12">
              <div class="form-group">
                <div class="form-control-material">
                  <input required id="degree" type="text" name="degree" class="form-control" placeholder="Degree Programme"><span class="ma-form-highlight"></span><span class="ma-form-bar"></span>
                  <label for="degree">Degree Programme</label>
                </div>
              </div>
            </div>
            <div class="col-md-6 col-xs-12 col-sm-12">
              <div class="form-group">
                <div class="form-control-material">
                  <input required id="institute" type="text" name="institute" class="form-control" placeholder="Degree Programme"><span class="ma-form-highlight"></span><span class="ma-form-bar"></span>
                  <label for="institute">Institute Name</label>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
          <div class="col-md-6 col-xs-12 col-sm-12">
              <div class="form-group">
                <select name="semester" class="selectpicker" data-style="btn-white" placeholder="Choose Gender" data-live-search="true" data-size="5" style="display: none;">
                      <option>Choose Semester</option>
                      <option>Spring</option>
                      <option>Summers</option>
                      <option>Fall</option>
                    </select>                  
                </div>
              </div>
            <div class="col-md-6 col-xs-12 col-sm-12">
              <div class="form-group">
                <div class="form-control-material">
                  <input required id="semesteryear" type="text" name="semesteryear" class="form-control" placeholder="Semester Year"><span class="ma-form-highlight"></span><span class="ma-form-bar"></span>
                  <label for="semesteryear">Semester Year</label>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
          <div class="col-md-6 col-xs-12 col-sm-12">
              <div class="form-group">
                <div class="form-control-material">
                  <textarea id="aboutme" type="text" name="aboutme" class="form-control" placeholder="Tell us a little about yourself"></textarea><span class="ma-form-highlight"></span><span class="ma-form-bar"></span>
                  <label for="aboutme">Tell us a little about yourself</label>
                </div>
              </div>
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
          <div class="row">
          <div class="col-md-6 col-xs-12 col-sm-12">
              <div class="form-group text-center">
                <div class="checkbox">
                  <input required type="checkbox" name="tos" id="agree">
                  <label for="agree">* I Agree with <a href="#">Terms &amp; Conditions!</a></label>
                </div>
              </div>
            </div>
              <div class="text-center">
                <button type="submit" class="btn btn-primary">Create an Account</button>
              </div>
          </div>
        </form>
            <!-- //Signup -->
          </div>
        </div>
  </div>
<?php include 'partials/foot.php'; ?>
