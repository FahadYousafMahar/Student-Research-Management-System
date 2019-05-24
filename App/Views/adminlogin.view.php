<!doctype html>
<?php include 'partials/head.php'; ?>
    <body>
  <?php include 'partials/nav.php'; ?>
  <div class="container nav-margin">
        <div class="row justify-content-center">
            <div class="col-sm-12 col-md-6">
                    <div class="form-holder">
                    <div class="form-row justify-content-center">
                            <div class="col-xs-12">
                                <h1>Admin Login</h1>
                               
                            </div>
                        </div>
                        <form action="/admin" method="post">
                            <div class="form-row">
                                <div class="col-xs-12 col-md-12">
                                    <label>User Name</label>
                                    <input type="text" name="username" class="form-control" required>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-xs-12 col-md-12">
                                    <label>Password</label>
                                    <input type="password" name="password" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-4"><button class="btn btn-primary btn-block" type="submit">Login</button></div>
                            </div>
                        </form>
                        <?php if (isset($status) && $status==true) : ?>
                            <div class="alert alert-primary mt-4" role="alert">
                            You are successfully logged in.<br>
                            </div>
                            <?php elseif(isset($status) && $status==false): ?>
                            <div class="alert alert-danger mt-4" role="alert">
                            A problem occured. Please recheck your credentials. <br>
                            <?php if(isset($errors) && is_array($errors)):
                                foreach ($errors as $v): ?>
                                <?=$v."<br>" ?>
                            <?php endforeach; endif; ?>
                            </div>
                            <?php endif; ?>
                    </div>
            </div>
        </div>
    </div>
    
    <?php include 'partials/foot.php'; ?>
