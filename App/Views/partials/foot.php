<section class="footer-section">
    <div class="container">
      <div class="row">
      </div>
    </div>
    </div>
  </section>

  <!-- Footer -->
  <footer class="footer">
    <strong>ResearchMate</strong> &copy; Copyright <?= date('Y')?> Fahad Yousaf Mahar
  </footer>
  <!-- // Footer -->

  <!-- Inline Script for colors and config objects; used by various external scripts; -->
  <script>
    var colors = {
      "danger-color": "#e74c3c",
      "success-color": "#81b53e",
      "warning-color": "#f0ad4e",
      "inverse-color": "#2c3e50",
      "info-color": "#2d7cb5",
      "default-color": "#6e7882",
      "default-light-color": "#cfd9db",
      "purple-color": "#9D8AC7",
      "mustard-color": "#d4d171",
      "lightred-color": "#e15258",
      "body-bg": "#f6f6f6"
    };
    var config = {
      theme: "html",
      skins: {
        "default": {
          "primary-color": "#42a5f5"
        }
      }
    };
  </script>

  <!-- Vendor Scripts Bundle
    Includes all of the 3rd party JavaScript libraries above.
    The bundle was generated using modern frontend development tools that are provided with the package
    To learn more about the development process, please refer to the documentation.
    Do not use it simultaneously with the separate bundles above. -->
  <script src="/App/Views/js/vendor/all.js"></script>

  <!-- Vendor Scripts Standalone Libraries -->
  <!-- <script src="/App/Views/js/vendor/core/all.js"></script> -->
  <!-- <script src="/App/Views/js/vendor/core/jquery.js"></script> -->
  <!-- <script src="/App/Views/js/vendor/core/bootstrap.js"></script> -->
  <!-- <script src="/App/Views/js/vendor/core/breakpoints.js"></script> -->
  <!-- <script src="/App/Views/js/vendor/core/jquery.nicescroll.js"></script> -->
  <!-- <script src="/App/Views/js/vendor/core/isotope.pkgd.js"></script> -->
  <!-- <script src="/App/Views/js/vendor/core/packery-mode.pkgd.js"></script> -->
  <!-- <script src="/App/Views/js/vendor/core/jquery.grid-a-licious.js"></script> -->
  <!-- <script src="/App/Views/js/vendor/core/jquery.cookie.js"></script> -->
  <!-- <script src="/App/Views/js/vendor/core/jquery-ui.custom.js"></script> -->
  <!-- <script src="/App/Views/js/vendor/core/jquery.hotkeys.js"></script> -->
  <!-- <script src="/App/Views/js/vendor/core/handlebars.js"></script> -->
  <!-- <script src="/App/Views/js/vendor/core/jquery.hotkeys.js"></script> -->
  <!-- <script src="/App/Views/js/vendor/core/load_image.js"></script> -->
  <!-- <script src="/App/Views/js/vendor/core/jquery.debouncedresize.js"></script> -->
  <!-- <script src="/App/Views/js/vendor/core/modernizr.js"></script> -->
  <!-- <script src="/App/Views/js/vendor/core/velocity.js"></script> -->
  <!-- <script src="/App/Views/js/vendor/tables/all.js"></script> -->
  <!-- <script src="/App/Views/js/vendor/forms/all.js"></script> -->
  <!-- <script src="/App/Views/js/vendor/media/slick.js"></script> -->
  <!-- <script src="/App/Views/js/vendor/charts/flot/all.js"></script> -->
  <!-- <script src="/App/Views/js/vendor/nestable/jquery.nestable.js"></script> -->
  <!-- <script src="/App/Views/js/vendor/countdown/all.js"></script> -->
  <!-- <script src="/App/Views/js/vendor/angular/all.js"></script> -->

  <!-- App Scripts Bundle
    Includes Custom Application JavaScript used for the current theme/module;
    Do not use it simultaneously with the standalone modules below. -->
  	<script src="/App/Views/js/app/app.js"></script>

  	<script src="/App/Views/js/bounce.min.js"></script>
	<script src="/App/Views/js/noty.min.js"></script>
	<script src="/App/Views/js/jquery.imgareaselect.min.js"></script>
	<script src="/App/Views/js/myOwn.js"></script>
	<script src="/App/Views/js/summernote.js"></script>

  <!-- App Scripts Standalone Modules
    As a convenience, we provide the entire UI framework broke down in separate modules
    Some of the standalone modules may have not been used with the current theme/module
    but ALL the modules are 100% compatible -->

  <!-- <script src="/App/Views/js/app/essentials.js"></script> -->
  <!-- <script src="/App/Views/js/app/material.js"></script> -->
  <!-- <script src="/App/Views/js/app/layout.js"></script> -->
  <!-- <script src="/App/Views/js/app/sidebar.js"></script> -->
  <!-- <script src="/App/Views/js/app/media.js"></script> -->
  <!-- <script src="/App/Views/js/app/messages.js"></script> -->
  <!-- <script src="/App/Views/js/app/maps.js"></script> -->
  <!-- <script src="/App/Views/js/app/charts.js"></script> -->

  <!-- App Scripts CORE [html]:
        Includes the custom JavaScript for this theme/module;
        The file has to be loaded in addition to the UI modules above;
        app.js already includes main.js so this should be loaded
        ONLY when using the standalone modules; -->
  <!-- <script src="/App/Views/js/app/main.js"></script> -->

  <?php 
	if (isset($_SESSION['alert'])){
		alert($_SESSION['alert']['type'],$_SESSION['alert']['body']);
		unset($_SESSION['alert']);
	}
 ?>
</body>
</html>