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
		font-size: 15px
	}

	.add-experience:hover {
		background: #BA68C8;
		color: #fff;
		cursor: pointer;
		border: solid 1px #BA68C8
	}
    span{
        display:block;
    }
    .edit{
        margin-top:15px;
        cursor: pointer;
        color:green;
    }

	.header-name{
text-transform:capitalize
	}
	.account_header{
		text-decoration:underline;
	}

</style>
<div class="container rounded bg-white mb-5">
	<div class="row text-center justify-content-center">
		<div class="col-12 col-md-6">
            <div class="d-flex flex-column  p-3 py-3">
            <span class="font-weight-bold  account_header">INFORMATION ABOUT YOU</span>
            </div>
			<div class="d-flex flex-column  py-1">
               
                <span
					class="text-black-50 header-name"><?= $info->name; ?></span>
                    <span
					class="text-black-50"><?= $info->shop_code; ?></span><span>
                    <span
					class="text-black-50"><?= $info->email_id; ?></span>
                    <span
					class="text-black-50"><?= $info->contact; ?></span>
                    <span
					class="text-black-50"><?= $info->address; ?></span>
                    <span
					class="text-black-50"><?= $info->pincode; ?></span>
				</span>
                <div class=" py-3"><a class="edit">Edit</a></div>
            
            </div>
                
		</div>
	</div>
	<div class="row justify-content-center" id="editInput">
		<div class="col-12 col-md-8">
			<div class="p-3 py-5">
				<form method='post' enctype="multipart/form-data">
					<div class="d-flex justify-content-between align-items-center mb-3">
						<h4 class="text-right">Profile Settings</h4>
					</div>
					<div class="row justify-content-center">
						<input type="hidden" class="form-control form-control-user" value="<?= $info->shop_id; ?>"
							name="id">
						<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>"
							value="<?php echo $this->security->get_csrf_hash();?>">
						<div class="col-md-12"><label class="labels">Full Name</label><input type="text"
								class="form-control" placeholder="Full name" name='name' value="<?= $info->name; ?>"
								readonly></div>
						<div class="col-md-12"><label class="labels">Mobile Number</label><input type="text"
								name="contact" class="form-control" placeholder="enter phone number"
								value="<?= $info->contact; ?>" readonly></div>
						<div class="col-md-12"><label class="labels">Email ID</label><input type="text"
								class="form-control" name="email_id" placeholder="enter email id"
								value="<?= $info->email_id; ?>" readonly></div>
						<div class="col-md-12"><label class="labels">Address </label><input type="text"
								class="form-control" placeholder="enter address " name='address'
								value="<?= $info->address; ?>"></div>
						<div class="col-md-12"><label class="labels">Postcode</label><input type="text"
								class="form-control" placeholder="enter postcode" name='pincode'
								value="<?= $info->pincode; ?>"></div>
						<div class="col-md-12"><label class="labels">city</label><input type="text" class="form-control"
								placeholder="enter city" name='city' value="<?= $info->city; ?>">

						</div>
						<!-- <div class="col-md-12"><label class="labels">Profile Image</label><input type="file"
							class="form-control" placeholder="enter city" name='file' value="">
					</div> -->
						<div class="mt-5 text-center"><button class="btn btn-primary profile-button" type="submit">Save
								Profile</button></div>
				</form>
			</div>
		</div>
	</div>
</div>

