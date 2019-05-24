<!-- Choose Method Modal -->

<div class="modal fade" id="update-profile-photo" tabindex="-1" role="dialog" aria-labelledby="update-header-photo" style="display: none;" aria-hidden="true">
	<div class="modal-dialog window-popup update-header-photo" role="document">
		<div class="modal-content">
			<a href="#" class="close icon-close" data-dismiss="modal" aria-label="Close">
				<svg class="olymp-close-icon"><use xlink:href="/app/views/svg-icons/sprites/icons.svg#olymp-close-icon"></use></svg>
			</a>

			<div class="modal-header">
				<h6 class="title">Update Profile Photo</h6>
			</div>

			<div class="modal-body upload-profile">
			<form class="profile-form" enctype="multipart/form-data">
					<input type="file" class="" id="addPhotoInput" name="profile">
				</form>
				<form class="profile-crop d-none" enctype="multipart/form-data">
					<input type="hidden" name="x1" value="" />
					<input type="hidden" name="y1" value="" />
					<input type="hidden" name="w" value="" />
					<input type="hidden" name="h" value="" />
				</form>
				<center>
				<div class="file-upload crop-upload-profile d-none">
								<label for="upload" class="file-upload__label cropuploadprofilelabel">Crop & Upload</label>
								<input id="upload" class="file-upload__input" class="cropuploadprofile" type="button" name="uploadprofile">
				</div>
				<hr>
				<img src=" " width="400" class="selectedfileprofile d-none">
				</center>
			</div>
		</div>
	</div>
</div>