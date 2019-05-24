<!DOCTYPE html>
<?php include 'partials/head.php'; ?>
    <body>
  <?php include 'partials/nav.php'; ?>

<!-- Main Header Account -->
<?php include 'partials/settingheader.php'; ?>
<!-- ... end Main Header Account -->


<!-- Your Account Personal Information -->

<div class="container">
	<div class="row">
		<div class="col col-xl-9 order-xl-2 col-lg-9 order-lg-2 col-md-12 order-md-1 col-sm-12 col-12">
			<div class="ui-block">
				<div class="ui-block-title">
					<h6 class="title">Personal Information</h6>
				</div>
				<div class="ui-block-content">

					
					<!-- Personal Information Form  -->
					
					<form action="/setting" method="post">
						<div class="row">
					
							<div class="col col-lg-6 col-md-6 col-sm-12 col-12">
								<div class="form-group label-floating">
									<label class="control-label">First Name</label>
									<input name="fname" class="form-control" placeholder="" type="text" value="<?= (!empty($user->fname))?ucwords($user->fname):"" ?>">
								</div>
					
								<div class="form-group label-floating">
									<label class="control-label">Your Email</label>
									<input name="email" class="form-control" placeholder="" type="email" value="<?= (!empty($user->email))?$user->email:"" ?>">
								</div>
					
								<div class="form-group date-time-picker label-floating">
									<label class="control-label">Your Birthday</label>
									<input name="birthday" type="datetimepicker" value="<?=(!empty($user->birthday))?date("m/d/Y",strtotime($user->birthday)):"01/01/2000" ?>" />
									<span class="input-group-addon">
															<svg class="olymp-month-calendar-icon icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-month-calendar-icon"></use></svg>
														</span>
								</div>
							</div>
				
							<div class="col col-lg-6 col-md-6 col-sm-12 col-12">
								<div class="form-group label-floating">
									<label class="control-label">Last Name</label>
									<input name="lname" class="form-control" placeholder="" type="text" value="<?= (!empty($user->lname))?ucwords($user->lname):""; ?>">
								</div>
					
								<div class="form-group label-floating">
									<label class="control-label">Your Website</label>
									<input name="website" class="form-control" placeholder="" type="text" value="<?= (!empty($about->website))?$about->website:""; ?>">
								</div>
					
					
								<div class="form-group label-floating">
									<label class="control-label">Your Phone Number</label>
									<input name="phone" class="form-control" placeholder="" type="text" value="<?= (!empty($about->phone))?$about->phone:""; ?>">
								</div>
							</div>
					
							<div class="col col-lg-6 col-md-4 col-sm-12 col-12">
								<div class="form-group label-floating is-select">
									<label class="control-label">Your Country</label>
									<select name="country" class="selectpicker form-control">

							<?php		
							$countries = array("Afghanistan", "Albania", "Algeria", "American Samoa", "Andorra", "Angola", "Anguilla", "Antarctica", "Antigua and Barbuda", "Argentina", "Armenia", "Aruba", "Australia", "Austria", "Azerbaijan", "Bahamas", "Bahrain", "Bangladesh", "Barbados", "Belarus", "Belgium", "Belize", "Benin", "Bermuda", "Bhutan", "Bolivia", "Bosnia and Herzegowina", "Botswana", "Bouvet Island", "Brazil", "British Indian Ocean Territory", "Brunei Darussalam", "Bulgaria", "Burkina Faso", "Burundi", "Cambodia", "Cameroon", "Canada", "Cape Verde", "Cayman Islands", "Central African Republic", "Chad", "Chile", "China", "Christmas Island", "Cocos (Keeling) Islands", "Colombia", "Comoros", "Congo", "Congo, the Democratic Republic of the", "Cook Islands", "Costa Rica", "Cote d'Ivoire", "Croatia (Hrvatska)", "Cuba", "Cyprus", "Czech Republic", "Denmark", "Djibouti", "Dominica", "Dominican Republic", "East Timor", "Ecuador", "Egypt", "El Salvador", "Equatorial Guinea", "Eritrea", "Estonia", "Ethiopia", "Falkland Islands (Malvinas)", "Faroe Islands", "Fiji", "Finland", "France", "France Metropolitan", "French Guiana", "French Polynesia", "French Southern Territories", "Gabon", "Gambia", "Georgia", "Germany", "Ghana", "Gibraltar", "Greece", "Greenland", "Grenada", "Guadeloupe", "Guam", "Guatemala", "Guinea", "Guinea-Bissau", "Guyana", "Haiti", "Heard and Mc Donald Islands", "Holy See (Vatican City State)", "Honduras", "Hong Kong", "Hungary", "Iceland", "India", "Indonesia", "Iran (Islamic Republic of)", "Iraq", "Ireland", "Israel", "Italy", "Jamaica", "Japan", "Jordan", "Kazakhstan", "Kenya", "Kiribati", "Korea, Democratic People's Republic of", "Korea, Republic of", "Kuwait", "Kyrgyzstan", "Lao, People's Democratic Republic", "Latvia", "Lebanon", "Lesotho", "Liberia", "Libyan Arab Jamahiriya", "Liechtenstein", "Lithuania", "Luxembourg", "Macau", "Macedonia, The Former Yugoslav Republic of", "Madagascar", "Malawi", "Malaysia", "Maldives", "Mali", "Malta", "Marshall Islands", "Martinique", "Mauritania", "Mauritius", "Mayotte", "Mexico", "Micronesia, Federated States of", "Moldova, Republic of", "Monaco", "Mongolia", "Montserrat", "Morocco", "Mozambique", "Myanmar", "Namibia", "Nauru", "Nepal", "Netherlands", "Netherlands Antilles", "New Caledonia", "New Zealand", "Nicaragua", "Niger", "Nigeria", "Niue", "Norfolk Island", "Northern Mariana Islands", "Norway", "Oman", "Pakistan", "Palau", "Panama", "Papua New Guinea", "Paraguay", "Peru", "Philippines", "Pitcairn", "Poland", "Portugal", "Puerto Rico", "Qatar", "Reunion", "Romania", "Russian Federation", "Rwanda", "Saint Kitts and Nevis", "Saint Lucia", "Saint Vincent and the Grenadines", "Samoa", "San Marino", "Sao Tome and Principe", "Saudi Arabia", "Senegal", "Seychelles", "Sierra Leone", "Singapore", "Slovakia (Slovak Republic)", "Slovenia", "Solomon Islands", "Somalia", "South Africa", "South Georgia and the South Sandwich Islands", "Spain", "Sri Lanka", "St. Helena", "St. Pierre and Miquelon", "Sudan", "Suriname", "Svalbard and Jan Mayen Islands", "Swaziland", "Sweden", "Switzerland", "Syrian Arab Republic", "Taiwan, Province of China", "Tajikistan", "Tanzania, United Republic of", "Thailand", "Togo", "Tokelau", "Tonga", "Trinidad and Tobago", "Tunisia", "Turkey", "Turkmenistan", "Turks and Caicos Islands", "Tuvalu", "Uganda", "Ukraine", "United Arab Emirates", "United Kingdom", "United States", "United States Minor Outlying Islands", "Uruguay", "Uzbekistan", "Vanuatu", "Venezuela", "Vietnam", "Virgin Islands (British)", "Virgin Islands (U.S.)", "Wallis and Futuna Islands", "Western Sahara", "Yemen", "Yugoslavia", "Zambia", "Zimbabwe"); 
							foreach( $countries as $country) { ?>
							<option value="<?= $country ?>"  <?= ($country==$user->country) ? 'selected':''?>><?= ucwords($country);?></option>
						<?php		} ;  ?>

									</select>
								</div>
							</div>
							
							<div class="col col-lg-6 col-md-4 col-sm-12 col-12">
							<div class="form-group label-floating">
									<label class="control-label">Your City</label>
									<input name="city" class="form-control" placeholder="" type="text" value="<?= ucwords($user->city) ?>">
								</div>
							</div>
							<div class="col col-lg-6 col-md-6 col-sm-12 col-12">
								<div class="form-group label-floating">
									<label class="control-label">Write a little description about you</label>
									<textarea name="aboutme" class="form-control" placeholder=""><?= (!empty($user->aboutme))?$user->aboutme:"";?></textarea>
								</div>
					
								<div class="form-group label-floating is-select">
									<label class="control-label">Your Gender</label>
									<select name="gender" class="selectpicker form-control">
									<?php 
												$genders=array("Male","Female","Other");
												foreach($genders as $gender) {
									?>
										<option value="<?=$gender?>" <?= ($gender==$user->gender) ? 'selected':''  ?> > <?=$gender?> </option>
									<?php	} ?>
									</select>
								</div>

								<div class="form-group label-floating ">
									<label class="control-label">Religious Belifs</label>
									<input name="religion" class="form-control" placeholder="" type="text" value="<?= (!empty($about->religion))?$about->religion:"";?>">
								</div>
							</div>
							<div class="col col-lg-6 col-md-6 col-sm-12 col-12">
								<div class="form-group label-floating">
									<label class="control-label">Your Birthplace</label>
									<input name="hometown" class="form-control" placeholder="" type="text" value="<?= (!empty($about->hometown))? $about->hometown :"";?>">
								</div>
					
								<div class="form-group label-floating">
									<label class="control-label">Your Occupation</label>
									<input name="occupation" class="form-control" placeholder="" type="text" value="<?= (!empty($about->occupation))? $about->occupation :"";?>">
								</div>
					
								<div class="form-group label-floating is-select">
									<label class="control-label">Status</label>
									<select name="status" class="selectpicker form-control">
									<?php 
												$statuses=array("Single","In a relationship","Engaged","Married","In a civil union","In a domestic partnership","In an open relationship","It's complicated","Separated","Divorced","Widowed");
												foreach($statuses as $status) {
									?>
										<option value="<?= $status ?>" <?php if (!empty($about->status)){echo ($status==$about->status) ? 'selected':'';}?> > <?= $status ?>  </option>

									<?php	} ?> 
									</select>
								</div>
					
								<div class="form-group label-floating">
									<label class="control-label">Political Incline</label>
									<input name="politics" class="form-control" placeholder="" type="text" value="<?= (!empty($about->politics))?$about->politics:"";?>">
								</div>
							</div>
							<div class="col col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
								<div class="form-group with-icon label-floating">
									<label class="control-label">Your Facebook Account</label>
									<input name="fbid" class="form-control" type="text" value="<?= (!empty($about->fbid))?$about->fbid:"";?>">
									<i class="fab fa-facebook-f c-facebook" aria-hidden="true"></i>
								</div>
								<div class="form-group with-icon label-floating">
									<label class="control-label">Your Twitter Account</label>
									<input name="twitterid" class="form-control" type="text" value="<?= (!empty($about->twitterid))?$about->twitterid:"";?>">
									<i class="fab fa-twitter c-twitter" aria-hidden="true"></i>
								</div>
								<!--
								<div class="form-group with-icon label-floating is-empty">
									<label class="control-label">Your RSS Feed Account</label>
									<input class="form-control" type="text">
									<i class="fa fa-rss c-rss" aria-hidden="true"></i>
								</div>
								<div class="form-group with-icon label-floating">
									<label class="control-label">Your Dribbble Account</label>
									<input class="form-control" type="text" value="Coming Soon">
									<i class="fab fa-dribbble c-dribbble" aria-hidden="true"></i>
								</div>
								<div class="form-group with-icon label-floating is-empty">
									<label class="control-label">Your Spotify Account</label>
									<input class="form-control" type="text">
									<i class="fab fa-spotify c-spotify" aria-hidden="true"></i>
								</div>
								-->
							</div>
							<div class="col col-lg-6 col-md-6 col-sm-12 col-12">
								<button type="reset" class="btn btn-secondary btn-lg full-width">Restore all Attributes</button>
							</div>
							<div class="col col-lg-6 col-md-6 col-sm-12 col-12">
								<button class="btn btn-primary btn-lg full-width">Save all Changes</button>
							</div>
					
						</div>
					</form>
					
					<!-- ... end Personal Information Form  -->
				</div>
			</div>
		</div>

		<div class="col col-xl-3 order-xl-1 col-lg-3 order-lg-1 col-md-12 order-md-2 col-sm-12  responsive-display-none">
			<div class="ui-block">

				
				
				<!-- Your Profile  -->
				
				<?php include 'partials/settingnav.php'; ?>
				
				<!-- ... end Your Profile  -->
				

			</div>
		</div>
	</div>
</div>

<!-- ... end Your Account Personal Information -->


<?php include 'partials/foot.php'; ?>