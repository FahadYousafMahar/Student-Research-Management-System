<!DOCTYPE html>
<?php include 'partials/head.php'; ?>
    <body>
  <?php include 'partials/nav.php'; ?>
    <div class="jumbotron">
      <div class="container">
        <div class="row">
            <div class="col-md-9 col-xs-8">
            <h1>Welcome <b><?=$user->name?></b></h1>
            <p>to YardStop Administration Area ! </p>
            </div>
            <div class="col-md-3 col-xs-4">
            <img src="./App/Data/images/customers/<?=$user->pic?>"  alt="..." class="card-img-top shadow img-thumbnail">
            </div>
        </div>
      </div>
    </div>
    <div class="container-fluid">
    <div class="row">
    <div class="col-md-3 col-xs-12">
    <div class="card mt-3 shadow">
            <div class="card-body">
                <a href="/adminpanel" class="btn btn-primary btn-block text-white">Unpublished Products</a>
                <a href="/addcategory" class="btn btn-primary btn-block text-white">Add Category</a>
            </div>
        </div>   
    </div>
    <div class="col-md-9 col-xs-12">
             <?php if (isset($status) && $status=='published'): ?>
              <div class="alert alert-primary mt-4" role="alert">
              The products were published successfully.<br>
             </div>
            <?php endif;if(isset($products)):?>
            <center><h1>Unpublished Products </h1></center>
            <table id="orders" class="table table-striped table-bordered" style="width:100%">
                <thead>
                <tr>
                    <th>Name</th>
                    <th>Publish Now</th>
                </tr>
                </thead>
                <tbody>
            <?php foreach ($products as $p ) : if($p->published=='false') : ?>
            <form action="/adminpanel" method="get">
            <tr>
              <td><?= $p->title?></td>
               <td><input type="checkbox" name="notpublished[]" value="<?=$p->id?>"></td>
              </tr>
            <?php endif; endforeach;?> 
            <tbody>
            </table>
            <button class="btn btn-primary" type="submit"> Publish Products </button>
            </form>
            <?php endif; ?>

    </div>
    </div>
    </div>
    <?php include 'partials/foot.php'; ?>
