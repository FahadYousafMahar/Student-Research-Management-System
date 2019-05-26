<div class="col-md-3">
      <div class="panel panel-default" data-toggle="panel-collapse" data-open="true">
        <div class="panel-heading panel-collapse-trigger collapse in" data-toggle="collapse" data-target="#b56a566b-f812-611f-d55a-cb56db49c6f5" aria-expanded="true" style="">
          <h4 class="panel-title">My Account</h4>
        </div>
        
      <div id="b56a566b-f812-611f-d55a-cb56db49c6f5" class="collapse in"><div class="panel-body list-group">
          <ul class="list-group list-group-menu">
            <li class="list-group-item active"><a class="link-text-color" href="/dashboard">Dashboard</a></li>
			<?php if ($_SESSION['type']=='Admin'): ?>
			<li class="list-group-item"><a class="link-text-color" href="/viewadmins">Administrators</a></li>
      <li class="list-group-item"><a class="link-text-color" href="/viewfaculty">Faculty</a></li>
      <li class="list-group-item"><a class="link-text-color" href="/viewstudents">Students</a></li>
			<?php endif; ?>
      <?php if ($_SESSION['type']=='Faculty'): ?>
			<li class="list-group-item"><a class="link-text-color" href="/viewallstudents">All Students</a></li>
      <li class="list-group-item"><a class="link-text-color" href="/viewallpapers">All Research Papers</a></li>
			<?php endif; ?>
      <?php if ($_SESSION['type']=='Student'): ?>
			<li class="list-group-item"><a class="link-text-color" href="/addPaper">Add New Paper</a></li>
      <li class="list-group-item"><a class="link-text-color" href="/viewpapers">View Research Papers</a></li>
			<?php endif; ?>
            <li class="list-group-item"><a class="link-text-color" href="/myprofile">Profile</a></li>
            <li class="list-group-item"><a class="link-text-color" href="/logout"><span>Logout</span></a></li>
          </ul>
        </div></div></div>
  </div>