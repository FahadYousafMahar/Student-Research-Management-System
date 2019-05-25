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

          <!-- Tabbable Widget -->
          <div class="tabbable paper-shadow relative" data-z="0.5">
            <!-- Panes -->
            <div class="tab-content">

              <div id="course" class="tab-pane active">
                <form action="/addPaper/<?= $user->id ?>" method="post" enctype="multipart/form-data" >
                  <div class="form-group form-control-material">
                    <input type="text" name="title" id="title" placeholder="Title" class="form-control used"><span class="ma-form-highlight"></span><span class="ma-form-bar"></span>
                    <label for="title">Title of your Research Paper</label>
                  </div>
                  <div class="form-group">
                    <label for="body">Summary</label>
                    <textarea id="summernote" name="body"></textarea>
                  </div>
                  <div class="form-group">
                  <span>Select Supervisor</span>
                  <select id="selector" name="facid">
                  <?php
                  if(count($faculty>0)){
                  foreach ($faculty as $i) {
                  ?>
                  <option value="<?= $i->id ?>"><?= ucwords($i->fname).' '.ucwords($i->lname)?></option>
                  <?php 
                  } }
                  ?>
                  </select>
                  </div>
                  <div class="form-group">
                  <span>Add File : </span>
                  <button id="addfile" class="btn btn-primary"><i class="fa fa-upload"></i> Profile</button>
                  <input type="file" name="file" style="display:none;">
                  </div>
                  <br>
                <div class="text-right">
                  <button  class="btn btn-primary">Submit Paper</a>
                </div>
                </form>
              </div>

            </div>
            <!-- // END Panes -->

          </div>
          <!-- // END Tabbable Widget -->

      <br>
      <br>
    </div>
<?php include 'partials/dashnav.php' ?>
  </div>
</div>
</div>
<?php include 'partials/foot.php'; ?>
