<?php include 'partials/head.php'; ?>
<body class="login">
<?php include 'partials/nav.php'; ?>
<div class="parallax overflow-hidden bg-blue-400 page-section third">
    <div class="container parallax-layer" data-opacity="true" style="transform: translate3d(0px, 0px, 0px); opacity: 1;">
      <div class="media v-middle">
        <div class="media-left text-center">
          <a href="#">
            <img src="/App/Data/images/users/<?= $user->profilepic ?>.jpg" alt="people" class="img-circle width-80">
          </a>
        </div>
        <div class="media-body">
          <h1 class="text-white text-capitalize text-display-1 margin-v-0"><?= $user->fname.' '.$user->lname ?></h1>
          <p class="text-subhead"><a class="link-white text-capitalize" href=""><?= $user->city.' , '.$user->country ?></a></p>
        </div>
        <div class="media-right">
          <span class="label bg-blue-500 text-uppercase"><?= $_SESSION['type'] ?></span>
        </div>
      </div>
    </div>
  </div>
  <br>
  <div class="container">
    <div class="page-section">
    <div class="row">
    <div class="col-md-9">
      <div class="panel panel-default">
        <div class="media v-middle">
          <div class="media-left">
            <div class="bg-green-400 text-white">
              <div class="panel-body">
                <i class="fa fa-pencil fa-fw fa-2x"></i>
              </div>
            </div>
          </div>
					<div class="media-body">
              <h3>My Profile </h3>
          </div>
          <div class="media-right media-padding">
					<?php if ($_SESSION['type'] != 'Student'): ?>
            <a class="btn btn-white paper-shadow relative" data-z="0.5" data-hover-z="1" data-animated=""  href="/edit<?=$_SESSION['type'].'/'.$user->id?>">
            Edit Profile</a>
          </div>
					<?php endif; ?>
        </div>
      </div>
      <div class="row">
        <div class="panel panel-default text-center paper-shadow" data-z="0.5">
          <h1 class="text-display-1"> </h1>
          <div class="panel-body">
            <!-- Signup -->
            <?php $i = $user ?>
            <form role="form" method="" action="">
            <div class="row">
              <div class="col-md-6 col-xs-12 col-sm-12">
                <div class="form-group">
                  <div class="form-control-material">
                    <input disabled  id="firstName" type="text" name="fname" value="<?= $i->fname?>" class="form-control" placeholder="First Name"><span class="ma-form-highlight"></span><span class="ma-form-bar"></span>
                    <label for="firstName">First name</label>
                  </div>
                </div>
              </div>
              <div class="col-md-6 col-xs-12 col-sm-12">
                <div class="form-group">
                  <div class="form-control-material">
                    <input disabled  id="lastName" type="text"  value="<?= $i->lname?>" name="lname" class="form-control" placeholder="Last Name"><span class="ma-form-highlight"></span><span class="ma-form-bar"></span>
                    <label for="lastName">Last name</label>
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6 col-xs-12 col-sm-12">
              <div class="form-group">
                <div class="form-control-material">
                  <input disabled  name="email" type="email" value="<?= $i->email?>" class="form-control" placeholder="Email"><span class="ma-form-highlight"></span><span class="ma-form-bar"></span>
                  <label for="email">Email address</label>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6 col-xs-12 col-sm-12">
              <div class="form-group">
                <div class="">
                <select name="gender" class="selectpicker" data-style="btn-white" placeholder="Choose Gender" data-live-search="true" data-size="5" style="display: none;">
                <?php 
												$genders=array("Male","Female");
												foreach($genders as $gender) {
									?>
										<option value="<?=$gender?>" <?= ($gender==$i->gender) ? 'selected':''  ?> > <?=$gender?> </option>
									<?php	} ?>
                    </select>                  
                </div>
              </div>
            </div>
              <div class="col-md-6 col-xs-12 col-sm-12">
              <div class="form-group">
              <div class="form-control-material">
                <label for="datepicker">Date of Birth</label>
                <input disabled  id="datepicker" name="birthday" value="<?=(!empty($i->birthday))?date("m/d/Y",strtotime($i->birthday)):"01/01/2000"?>"  type="text" class="form-control datepicker">
              </div>
             </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6 col-xs-12 col-sm-12">
              <div class="form-group">
                <div class="form-control-material">
                  <input disabled  id="city" type="text"  name="city" value="<?= $i->city ?>" class="form-control" placeholder="City"><span class="ma-form-highlight"></span><span class="ma-form-bar"></span>
                  <label for="city">City</label>
                </div>
              </div>
            </div>
              <div class="col-md-6 col-xs-12 col-sm-12">
              <div class="form-group">
                <div class="form-control-material">
                  <input disabled  id="country" type="text" name="country"  value="<?= $i->country ?>"  class="form-control" placeholder="Country"><span class="ma-form-highlight"></span><span class="ma-form-bar"></span>
                  <label for="country">Country</label>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
					<?php if (isset($i->education)):?>
					<div class="col-md-6 col-xs-12 col-sm-12">
              <div class="form-group">
                <div class="form-control-material">
                  <input disabled  id="degree" type="text" name="education"  value="<?= $i->education ?>" class="form-control" placeholder="Education"><span class="ma-form-highlight"></span><span class="ma-form-bar"></span>
                  <label for="degree">Education</label>
                </div>
              </div>
            </div>
					<?php endif; ?>
          <?php if (isset($i->degree)):?>
            <div class="col-md-6 col-xs-12 col-sm-12">
              <div class="form-group">
                <div class="form-control-material">
                  <input disabled  id="degree" type="text" name="degree"  value="<?= $i->degree ?>" class="form-control" placeholder="Degree Programme"><span class="ma-form-highlight"></span><span class="ma-form-bar"></span>
                  <label for="degree">Degree Programme</label>
                </div>
              </div>
            </div>
						<?php endif;?>
            <?php if (isset($i->institute)):?>
            <div class="col-md-6 col-xs-12 col-sm-12">
              <div class="form-group">
                <div class="form-control-material">
                  <input disabled  id="institute" type="text" name="institute" value="<?= $i->institute ?>" class="form-control" placeholder="Institute Name"><span class="ma-form-highlight"></span><span class="ma-form-bar"></span>
                  <label for="institute">Institute Name</label>
                </div>
              </div>
            </div>
						<?php endif;?>
          </div>
          <div class="row">
					<?php if (isset($i->semester)):?>
          <div class="col-md-6 col-xs-12 col-sm-12">
              <div class="form-group">
                <select name="semester" class="selectpicker" data-style="btn-white" placeholder="Choose Semester" data-live-search="true" data-size="5" style="display: none;">
                  <?php 
												$semesters=array("Spring","Summers","Fall");
												foreach($semesters as $semester) {
									?>
										<option value="<?=$semester?>" <?= ($semester==$i->semester) ? 'selected':''  ?> > <?=$semester?> </option>
									<?php	} ?>
                    </select>                  
                </div>
              </div>
						<?php endif;?>
            <?php if (isset($i->semseteryear)):?>
            <div class="col-md-6 col-xs-12 col-sm-12">
              <div class="form-group">
                <div class="form-control-material">
                  <input disabled  id="semesteryear" type="text" name="semesteryear" value="<?=$i->semesteryear?>" class="form-control" placeholder="Semester Year"><span class="ma-form-highlight"></span><span class="ma-form-bar"></span>
                  <label for="semesteryear">Semester Year</label>
                </div>
              </div>
            </div>
						<?php endif; ?>
            </div>
            <div class="row">
            <?php if (isset($i->aboutme)):?>
          <div class="col-md-6 col-xs-12 col-sm-12">
              <div class="form-group">
                <div class="form-control-material">
                  <textarea id="aboutme" type="text" name="aboutme" class="form-control" placeholder="Tell us a little about yourself"><?= $i->aboutme ?></textarea><span class="ma-form-highlight"></span><span class="ma-form-bar"></span>
                  <label for="aboutme">Tell us a little about yourself</label>
                </div>
              </div>
            </div>
					<?php endif;?>
          </div>
        </form>
            <!-- //Signup -->
           <?php if($_SESSION['type']=='Student'):?>
           </div>
           <?php endif; ?>
          </div>
					</div>
        </div>
      </div>
<?php include 'partials/dashnav.php' ?>
  </div>
</div>
</div>
<?php include 'partials/foot.php'; ?>
