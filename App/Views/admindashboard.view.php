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
            <div class="bg-blue-400 text-white">
              <div class="panel-body">
                <i class="fa fa-magic fa-fw fa-2x"></i>
              </div>
            </div>
          </div>
          <div class="media-right media-padding">
            <a class="btn btn-white paper-shadow relative" data-z="0.5" data-hover-z="1" data-animated="" href="#">
            Welcome to Admin Dashboard       
            </a>
          </div>
        </div>
      </div>
      <div class="row" data-toggle="isotope" style="position: relative; height: 674.4px;">
      <div class="item col-xs-12 col-lg-6" style="position: absolute; left: 435px; top: 314px;">
          <h4 class="text-headline margin-none">Faculty</h4>
          <p class="text-subhead text-light">Latest Faculty Signups</p>
          <ul class="list-group relative paper-shadow" data-hover-z="0.5" data-animated="">
          <?php if (count($faculty)>0 ):
                $c = $faculty;
                $i=0; 
                foreach($faculty as $s ):
                if ($i==$c || $i==3){
                    break;
                }
                $i++;
           ?>
            <li class="list-group-item paper-shadow">
              <div class="media v-middle">
                <div class="media-left">
                  <a href="/editFaculty/<?= $s->id ?>">
                    <img src="/App/Data/images/users/<?= $s->profilepic ?>.jpg" alt="person" class="img-circle width-40">
                  </a>
                </div>
                <div class="media-body">
                  <a href="/editFaculty/<?= $s->id ?>" class="text-subhead link-text-color text-capitalize"><?= $s->fname.' '.$s->lname ?></a>
                  <div class="text-light text-capitalize">
                    Education: <a href="#"><?= $s->education ?></a> &nbsp; Institution: <a href="#"><?= $s->institute ?></a>
                  </div>
                </div>
                <div class="media-right">
                  <div class="width-80 text-right">
                    <span class="text-caption text-capitalize text-light"><?= $s->city.', '.$s->country ?></span>
                  </div>
                </div>
              </div>
            </li>
            <?php endforeach; ?>
            <div class="panel-footer">
              <a href="/viewfaculty" class="btn btn-primary paper-shadow relative" data-z="0" data-hover-z="1" data-animated=""> View All</a>
            </div>
            <?php else: ?>
            <li class="list-group-item paper-shadow">
              <div class="media v-middle">
                <div class="media-left">
                  <a href="#">
                    <i class="fa fa-check"></i>
                  </a>
                </div>
                <div class="media-body">
                  <a href="#" class="text-subhead link-text-color text-capitalize">No Faculty Members</a>
                </div>
              </div>
            </li>
            <?php endif; ?>
            </ul>
        </div>

        <div class="item col-xs-12 col-lg-6" style="position: absolute; left: 435px; top: 314px;">
          <h4 class="text-headline margin-none">Students</h4>
          <p class="text-subhead text-light">Latest Student Signups</p>
          <ul class="list-group relative paper-shadow" data-hover-z="0.5" data-animated="">
          <?php if (count($students)>0 ):
                $c = $students;
                $i=0; 
                foreach($students as $s ):
                if ($i==$c || $i==3){
                    break;
                }
                $i++;
           ?>
            <li class="list-group-item paper-shadow">
              <div class="media v-middle">
                <div class="media-left">
                  <a href="/editStudent/<?= $s->id ?>">
                    <img src="/App/Data/images/users/<?= $s->profilepic ?>.jpg" alt="person" class="img-circle width-40">
                  </a>
                </div>
                <div class="media-body">
                  <a href="/editStudent/<?= $s->id ?>" class="text-subhead link-text-color text-capitalize"><?= $s->fname.' '.$s->lname ?></a>
                  <div class="text-light text-capitalize">
                    Education: <a href="#"><?= $s->degree ?></a> &nbsp; Institution: <a href="#"><?= $s->institute ?></a>
                  </div>
                  <div class="text-light text-capitalize">
                    Semester: <a href="#"><?= $s->semester ?></a> &nbsp; Year: <a href="#"><?= $s->semesteryear ?></a>
                  </div>
                </div>
                <div class="media-right">
                  <div class="width-80 text-right">
                    <span class="text-caption text-capitalize text-light"><?= $s->city.', '.$s->country ?></span>
                  </div>
                </div>
              </div>
            </li>
            <?php endforeach; ?>
            <div class="panel-footer">
              <a href="/viewstudents" class="btn btn-primary paper-shadow relative" data-z="0" data-hover-z="1" data-animated=""> View All</a>
            </div>
            <?php else: ?>
            <li class="list-group-item paper-shadow">
              <div class="media v-middle">
                <div class="media-left">
                  <a href="#">
                    <i class="fa fa-info"></i>
                  </a>
                </div>
                <div class="media-body">
                  <a href="#" class="text-subhead link-text-color text-capitalize">No Students Found !</a>
                </div>
              </div>
            </li>
            <?php endif; ?>
            </ul>
        </div>
        <div class="item col-xs-12 col-lg-12" style="position: absolute; left: 0px; top: 0px;">
          <div class="panel panel-default paper-shadow" data-z="0.5">
            <div class="panel-heading">
              <h4 class="text-headline margin-none">Research Papers</h4>
              <p class="text-subhead text-light">Showing Recently Submitted Papers</p>
            </div>
            <ul class="list-group">
            <?php if ( $c=count($papers)>0 ):
                $i=0;
                $c = $papers;
                foreach($papers as $p ):
                if ($i==$c || $i==3){
                    break;
                }
                $i++;
           ?>
              <li class="list-group-item media v-middle">
                <div class="media-body">
                  <a href="" class="text-subhead list-group-link text-capitalize"><?= $p->title ?></a>
                </div>
                <div class="media-right">
                  <div class="progress progress-mini width-100 margin-none">
                    <div class="progress-bar progress-bar-green-300" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width:100%;">
                    </div>
                  </div>
                </div>
              </li>
              <?php endforeach; ?>
            <div class="panel-footer text-right">
              <a href="website-student-courses.html" class="btn btn-white paper-shadow relative" data-z="0" data-hover-z="1" data-animated=""> View all</a>
            </div>
            <?php else: ?>
            <div class="panel-footer text-right">
            <a href="" class="text-subhead list-group-link text-capitalize">No Papers Were Found in Database ! </a>
            </div>
            <?php endif; ?>
            </ul>
          </div>
        </div>
      </div>
    </div>
<?php include 'partials/dashnav.php' ?>
  </div>
</div>
</div>
<?php include 'partials/foot.php'; ?>
