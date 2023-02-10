<style>
	/* .form-control:focus {
    box-shadow: none;
    border-color: #BA68C8
} */

	.profile-button {
		background: rgb(99, 39, 120);
		box-shadow: none;
		border: none
	}

	.profile-button:hover {
		background: #682773
	}

	.profile-button:focus {
		background: #682773;
		box-shadow: none
	}

	.profile-button:active {
		background: #682773;
		box-shadow: none
	}

	.back:hover {
		color: #682773;
		cursor: pointer
	}

	.labels {
		font-size: 11px
	}

	.add-experience:hover {
		background: #BA68C8;
		color: #fff;
		cursor: pointer;
		border: solid 1px #BA68C8
	}

</style>
<div class="container rounded bg-white mb-5">
	<div class="row justify-content-center">
		<div class="col-12 col-md-8">
			<div class="d-flex flex-column align-items-center text-center p-3 py-5"><img class="rounded-circle "
					width="150px"
					src="https://st3.depositphotos.com/15648834/17930/v/600/depositphotos_179308454-stock-illustration-unknown-person-silhouette-glasses-profile.jpg"><span
					class="font-weight-bold"><?= $this->session->userdata['e_name'] ?></span><span class="text-black-50"><?= $this->session->userdata['e_mail'] ?></span><span>
				</span></div>
		</div>
		<div class="col-12 col-md-8">
			<div class="p-3 py-5">
				<div class="d-flex justify-content-between align-items-center mb-3">
					<h4 class="text-right">Profile Settings</h4>
				</div>
				<div class="row justify-content-center">
					<div class="col-md-12"><label class="labels">Full Name</label><input type="text"
							class="form-control" placeholder="first name" value="<?= $info[0]['eng_name'] ?>"></div>
					<div class="col-md-12"><label class="labels">Mobile Number</label><input type="text"
							class="form-control" placeholder="enter phone number" value="<?= $info[0]['contact'] ?>"></div>
							</div>
					<div class="col-md-12"><label class="labels">Email ID</label><input type="text" class="form-control"
							placeholder="enter email id" value="<?= $info[0]['email_id'] ?>"></div>
					<div class="col-md-12"><label class="labels">Address </label><input type="text" class="form-control"
							placeholder="enter address " value="<?= $info[0]['address'] ?>"></div>
					<div class="col-md-12"><label class="labels">Postcode</label><input type="text" class="form-control"
							placeholder="enter postcode" value="<?= $info[0]['postcode'] ?>"></div>
					<div class="col-md-12"><label class="labels">city</label><input type="text" class="form-control"
							placeholder="enter city" value="<?= $info[0]['city'] ?>">

				</div>
				<div class="mt-5 text-center"><button class="btn btn-primary profile-button" type="button">Save
						Profile</button></div>
			</div>
		</div>
	</div>
</div>
