$(document).ready(() => {
	$('#photo1').change(function () {
		let file = this.files[0];
		if (file) {
			let reader = new FileReader();
			reader.onload = function (event) {
				$('#imgPreview1').attr('src', event.target.result);
			}
			reader.readAsDataURL(file);
		}
	});

	$('#photo2').change(function () {
		let file1 = this.files[0];
		if (file1) {
			let reader1 = new FileReader();
			reader1.onload = function (event) {
				$('#imgPreview2').attr('src', event.target.result);
			}
			reader1.readAsDataURL(file1);
		}
	});

    $('#photo3').change(function(){
        let file2= this.files[0];
        if(file2){
            let reader2 = new FileReader();
            reader2.onload = function(event){
                $('#imgPreview3').attr('src',event.target.result);
            }
            reader2.readAsDataURL(file2);
        }
    });

    $('#photo4').change(function(){
        let file3= this.files[0];
        if(file3){
            let reader3 = new FileReader();
            reader3.onload = function(event){
                $('#imgPreview4').attr('src',event.target.result);
            }
            reader3.readAsDataURL(file3);
        }
    });

    $('#photo5').change(function(){
        let file4= this.files[0];
        if(file4){
            let reader4 = new FileReader();
            reader4.onload = function(event){
                $('#imgPreview5').attr('src',event.target.result);
            }
            reader4.readAsDataURL(file4);
        }
    });

    $('.btn_image_submit').click(function(){
        let image1=$('#photo1').val();
        let image2=$('#photo2').val();
        let image3=$('#photo3').val();
        let image4=$('#photo4').val();
        let image5=$('#photo5').val();

        if(image1=='' || image2=='' || image3=='' || image4=='' || image5==''){
            $('#message_upload').css('display','block').html('please upload all details');
            return false;
        }
        else{
            return true;
        }
    });
});
