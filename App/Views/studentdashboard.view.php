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
            Welcome to Student Dashboard       
            </a>
          </div>
        </div>
      </div>
      <div class="row" data-toggle="isotope" style="position: relative; height: 674.4px;">
      <div class="item col-xs-12 col-lg-6" style="position: absolute; left: 435px; top: 314px;">
          <h4 class="text-headline margin-none">Faculty</h4>
          <p class="text-subhead text-light">Your Supervisors</p>
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
                  <a href="#">
                    <img src="/App/Data/images/users/<?= $s->profilepic ?>.jpg" alt="person" class="img-circle width-40">
                  </a>
                </div>
                <div class="media-body">
                  <a href="#" class="text-subhead link-text-color text-capitalize"><?= $s->fname.' '.$s->lname ?></a>
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
          <h4 class="text-headline margin-none">Papers</h4>
          <p class="text-subhead text-light">Your Latest Submissions</p>
          <ul class="list-group relative paper-shadow" data-hover-z="0.5" data-animated="">
          <?php if (count($papers)>0 ):
                $found = false;
                $c = $papers;
                $i=0; 
                foreach($papers as $s ):
                if ($i==$c || $i==3){
                    break;
                }
                $i++;
           ?>
            <li class="list-group-item paper-shadow">
              <div class="media v-middle">
                <div class="media-left">
                  <a href="/viewPaper/<?= $s->id ?>">
                     <span class="img-circle width-40"><i class="fa fa-file fa-2x"></i></span>
                  </a>
                </div>
                <div class="media-body">
                  <a href="/viewPaper/<?= $s->id ?>" class="text-subhead link-text-color text-capitalize"><?= $s->title ?></a>
                  <div class="text-light text-capitalize">
                  <a href="#">Excerpt: </a><?= substr($s->body,0,150).' ...' ?>
                  </div>
                  <div class="text-light text-capitalize">
                  <a href="#">Supervised By: </a>
                    <?php foreach($faculty as $f ):?>
                        <?php if ($f->id == $s->facid): ?>
                            <?= $f->fname.' '.$f->lname ?>
                            <?php $found = true; ?>
                            <?php break(1); ?>
                        <?php endif; ?>
                    <?php endforeach;?>
                    <?php if (!$found): ?>
                        No Faculty Member
                    <?php endif; ?>
                  </div>
                </div>
                <div class="media-right">
                  <div class="width-80 text-right">
                    <span class="text-caption text-capitalize text-light"><?= date('d-M-Y',strtotime($s->createdat)) ?></span>
                  </div>
                </div>
              </div>
            </li>
            <?php endforeach; ?>
            <div class="panel-footer">
              <a href="/viewpapers" class="btn btn-primary paper-shadow relative" data-z="0" data-hover-z="1" data-animated=""> View All</a>
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
                  <a href="#" class="text-subhead link-text-color text-capitalize">No Papers Found !</a>
                </div>
              </div>
            </li>
            <?php endif; ?>
            </ul>
        </div>
      </div>
    </div>
<?php include 'partials/dashnav.php' ?>
  </div>
</div>
</div>
<?php include 'partials/foot.php'; ?>
