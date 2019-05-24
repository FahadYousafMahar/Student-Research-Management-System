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
                            <h1>Sell a Product</h1>
                        </div>
                    </div>
                    <form action="/sellproduct" method="post" enctype="multipart/form-data">
                        <div class="form-row">
                            <div class="col-xs-12 col-md-6 mt-4">
                                <label>Product Name</label>
                                <input type="text" name="title" class="form-control" required>
                            </div>
                            <div class="col-xs-12 col-md-6 mt-4">
                                <label>Product Image</label>
                                <div class="custom-file">
                                    <input type="file" name="pic" class="custom-file-input" id="customFile">
                                    <label class="custom-file-label" for="customFile">Choose file</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-row mt-4">
                            <div class="col-xs-12 col-md-6">
                                <label>Price</label>
                                <input type="text" name="price" class="form-control" required>
                            </div>
                            <div class="col-xs-12 col-md-6">
                            <label for="exampleFormControlSelect1">Select Category</label>
                                <select name="category" class="form-control" id="exampleFormControlSelect1">
                                <?php foreach ($category as $c) : ?>
                                     <option  value="<?= $c->id ?>"><?= $c->name ?></option>
                                <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <hr>
                        <div class="form-row mt-4">
                            <div class="col-xs-12 col-md-6">
                                <label>Quantity </label>
                                <input type="text" name="availability" class="form-control" required>
                            </div>
                        </div>
                        <div class="form-row mt-4">
                            <div class="col-xs-12 col-md-6">
                                <label>Description </label>
                                <input type="text" name="description" class="form-control" required>
                            </div>
                            <div class="col-xs-12 col-md-6">
                                <label>Product Address</label>
                                <input type="text" name="address" class="form-control" required>
                            </div>
                        </div>
                        <div class="form-row pt-4">
                            <div class="col-8"></div>
                            <div class="col-4"><button class="btn btn-primary btn-block" type="submit">Sell it !</button>
                            </div>
                        </div>
                        <?php if (isset($status) && $status==true) : ?>
                            <div class="alert alert-primary mt-4" role="alert">
                            Product Successfully Sent For Approval.<br>
                            </div>
                            <?php elseif(isset($status) && $status==false): ?>
                            <div class="alert alert-danger mt-4" role="alert">
                            A problem occured. Please recheck your form. <br>
                            <?php if(is_array($validate)):
                                foreach ($validate as $v): ?>
                                <?=$v."<br>" ?>
                            <?php endforeach; endif; ?>
                            <?php if(isset($errors) && is_array($errors)):
                                foreach ($errors as $v): ?>
                                <?=$v."<br>" ?>
                            <?php endforeach; endif; ?>
                            </div>
                            <?php endif; ?>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <?php include 'partials/foot.php'; ?>
