<!DOCTYPE html>
<?php include 'partials/head.php'; ?>
    <body>
  <?php include 'partials/nav.php'; ?>
    <div class="jumbotron">
      <div class="container">
        <h1>YardStop!</h1>
        <p>Bying and Selling Made Easy </p>
        <p>All Categories and All Products .... </p>
      </div>
    </div>

    <div class="container">
    <?php if(is_array($products)){
       $count=0; 
       foreach ($products as $p){ if($p->published=='true'){
         if($count%4 == 0){ 
           ?>
      <div class="row align-items-center">
    <?php } ?>
    <div class="col-md-3">
        <div class="card shadow-lg p-3 mb-5 bg-white rounded h-100">
        <img src="./App/Data/images/products/<?=$p->picture ?>"  alt="..." class="card-img-top img-thumbnail">
        <div class="card-body ">
        <h4 class="card-title"><?=$p->title ?> </h4>
        <p class="card-text"><?=substr($p->description,0,75)." ..." ?></p>
          <p><a class="btn btn-primary" href="/product?id=<?=$p->id ?>" role="button">View details &raquo;</a></p>
        </div>
      </div>
      </div>
    <?php if($count%4 == 3){  ?>
      </div>
    <?php   } $count++; 
          } 
        }
      }if ($count-1%4 != 3): ?>
        </div>
    <?php endif; ?>
      <div class="row justify-content-center">
        <div class="col-md-6 col-xs-12">
        <a href="/?start=<?= $start+12 ?>" class="btn btn-primary btn-lg btn-block">Load More ...</a>

        </div>
      </div>
    <?php include 'partials/foot.php'; ?>
