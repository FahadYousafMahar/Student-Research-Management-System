<!-- Choose Method Modal -->

<div class="modal fade" id="update-header-photo" tabindex="-1" role="dialog" aria-labelledby="update-header-photo" style="display: none;" aria-hidden="true">
	<div class="modal-dialog window-popup update-header-photo" role="document">
		<div class="modal-content">
			<a href="#" class="close icon-close" data-dismiss="modal" aria-label="Close">
				<svg class="olymp-close-icon"><use xlink:href="/app/views/svg-icons/sprites/icons.svg#olymp-close-icon"></use></svg>
			</a>

			<div class="modal-header">
				<h6 class="title">Update Header Photo</h6>
			</div>

			<div class="modal-body">
				<form class="header-form" enctype="multipart/form-data">
					<input type="file" class="" name="header">
				</form>
				<form class="header-crop d-none" enctype="multipart/form-data">
					<input type="hidden" name="x1" value="" />
					<input type="hidden" name="y1" value="" />
					<input type="hidden" name="w" value="" />
					<input type="hidden" name="h" value="" />
				</form>
				<center>
				<div class="file-upload crop-upload-header d-none">
								<label for="upload" class="file-upload__label cropuploadlabel">Crop & Upload</label>
								<input id="upload" class="file-upload__input" class="cropuploadheader" type="button" name="uploadheader">
				</div>
				<hr>
				<img src=" "  width="768" class="selectedfile d-none">
				</center>
			</div>
		</div>
	</div>
</div>
