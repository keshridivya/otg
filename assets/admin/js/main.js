$(document).ready(function(){
    $('.datetimerow').hide();
    $('.additional').keyup(function(){
        let additional=$('.additional').val();
        let total_amount=$('.total_amount').val();
        let add=parseInt(additional)+parseInt(total_amount);
        $('.expenes').val(add);
    });

    $('.reschedule').click(function(){
        let device_modal=$('.device_modal').val();
        let booking_status=$('.booking_status').val();
        let payment_method=$('.payment_method').val();
        let additional_expens=$('.additional_expens').val();
        let additional=$('.additional').val();
        let addon=$('.addon').val();
        let comment=$('.comment').val();
        let total_amount=$('.total_amount').val();
        let expenes=$('.expenes').val();
        let advance_payment=$('.advance_payment').val();
        let visiting_card=$('.visiting_card').val();
        let customer_name=$('.customer_name').val();
        let service_type=$('.service_type').val();
        let service_plan=$('.service_plan').val();
        let service_device=$('.service_device').val();
        let request_id=$('.request_id').val();
        let eng_name=$('.eng_name').val();

        
        if(device_modal == '' || booking_status== '' ||  payment_method=='' || additional_expens == '' || additional=='' || addon=='' || comment == '' || expenes == '' || advance_payment == '' || visiting_card == '' ){
            $('#message_upload_error').html('Please fill all field').addClass('alert alert-danger');
        }
        else{
            $('#message_upload_error').hide();
            $('#staticBackdrop').modal('show');
            $('#device_modal').val(device_modal);
            $('#booking_status').val(booking_status);
            $('#payment_method').val(payment_method);
            $('#additional_expens').val(additional_expens);
            $('#additional').val(additional);
            $('#addon').val(addon);
            $('#comment').val(comment);
            $('#expenes').val(expenes);
            $('#advance_payment').val(advance_payment);
            $('#visiting_card').val(visiting_card);
            $('#customer_name').val(customer_name);
            $('#service_type').val(service_type);
            $('#service_plan').val(service_plan);
            $('#service_device').val(service_device);
            $('#request_id').val(request_id);
            $('#eng_name').val(eng_name);
            $('#total_amount').val(total_amount);
            let value_btn=$(this).data('name');
            $('.btn_name').val(value_btn);
            if(value_btn == 'Generate'){
                    let expenes = $('.expenes').val();
                    let advance_payment = $('.advance_payment').val();
                    let add=parseInt(expenes)-parseInt(advance_payment);
                    $('.paymentradio').val(add);
                    alert('gg');
            }
            else{
                $('.paymentradio').val('199');
            }
        }
    });

    $('.reschedule_btn').click(function(){
        let device_modal=$('.device_modal').val();
        let booking_status=$('.booking_status').val();
        let payment_method=$('.payment_method').val();
        let additional_expens=$('.additional_expens').val();
        let additional=$('.additional').val();
        let addon=$('.addon').val();
        let comment=$('.comment').val();
        let total_amount=$('.total_amount').val();
        let expenes=$('.expenes').val();
        let advance_payment=$('.advance_payment').val();
        let visiting_card=$('.visiting_card').val();
        let customer_name=$('.customer_name').val();
        let service_type=$('.service_type').val();
        let service_plan=$('.service_plan').val();
        let service_device=$('.service_device').val();
        let request_id=$('.request_id').val();
        let eng_name=$('.eng_name').val();
       
        if(device_modal == '' || booking_status== '' || additional_expens == '' || additional=='' || addon=='' || comment == '' || expenes == '' || advance_payment == '' || visiting_card == '' ){
            $('#message_upload_error').html('Please fill all field').addClass('alert alert-danger');
        }
        else{
            $('#message_upload_error').hide();
            $('.datetimerow').toggle();
            let value_btn=$(this).data('name');
            $('.btn_name').val(value_btn);
        }
    });
});

 