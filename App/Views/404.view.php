<?php include 'partials/head.php'; ?>
<body class="breakpoint-1024">
<?php include 'partials/nav.php'; ?>
<div class="parallax page-section bg-blue-300">
    <div class="container parallax-layer" data-opacity="true" style="transform: translate3d(0px, 0px, 0px); opacity: 1;">
      <div class="media media-grid v-middle">
        <div class="media-left">
          <span class="icon-block half bg-blue-500 text-white"><i class="fa fa-close"></i></span>
        </div>
        <div class="media-body">
          <h3 class="text-display-2 text-white margin-none">Error 404</h3>
          <p class="text-white text-subhead">Resource is not Here. But You are !</p>
        </div>
      </div>
    </div>
  </div>
  <div class="page-section parallax relative overflow-hidden">
    <div class="container">
      <div class="panel  mt-md-5 panel-default paper-shadow max-width-400 h-center" data-z="0.5">
        <div class="panel-heading">
          <h4 class="text-headline">Send a message</h4>
        </div>
        <div class="panel-body">
          <form>
            <div class="form-group form-control-material">
              <input class="form-control" type="text" id="fname" placeholder="First name"><span class="ma-form-highlight"></span><span class="ma-form-bar"></span>
              <label for="fname">First name:</label>
            </div>
            <div class="form-group form-control-material">
              <input class="form-control" type="tel" id="lname" placeholder="Last name"><span class="ma-form-highlight"></span><span class="ma-form-bar"></span>
              <label for="lname">Last name:</label>
            </div>
            <div class="form-group form-control-material">
              <input class="form-control" type="text" id="phone" placeholder="Phone"><span class="ma-form-highlight"></span><span class="ma-form-bar"></span>
              <label for="phone">Phone:</label>
            </div>
            <div class="form-group form-control-material">
              <textarea class="form-control" id="message" placeholder="Your message"></textarea><span class="ma-form-highlight"></span><span class="ma-form-bar"></span>
              <label for="message">Your message:</label>
            </div>
            <div class="text-right">
              <button class="btn btn-primary relative paper-shadow" data-z="0.5" data-hover-z="1" data-animated="">Send message</button>
            </div>
          </form>
        </div>
      </div>
      <br>
    </div>
  </div>
<?php include 'partials/foot.php'; ?>
