$(document).ready(function(){
    var base_url = $('.base_url').val();
    $(document).on('keyup','input[name="number_of_person"]',function(){
        var number_of_person = $(this).val();
        var str = '';
        for(var i = 1; i <= number_of_person; i++){
            str += '<div class="row">';
                str += '<div class="col-md-4">';
                    str += '<div class="form-group">';
                        var st = (i > 1) ? 's': '';
                        str += '<label>Price for minimum of '+i+' person'+st+':</label>';
                        str += '<input type="text" class="form-control" name="price_per_person[]" placeholder="Price"/>';
                    str += '</div>';
                str += '</div>';
            str += '</div>';
        }
        $('.number_of_person_list').html(str);
    });
    $(document).on('submit','#package_form',function(e){
        e.preventDefault();
        var formData = new FormData($(this)[0]);
        $.ajax({
            url: $(this).attr('action'),
            data: formData,
            type: $(this).attr('method'),
            contentType: false,
            processData: false,
            success:function(data){
                window.location.href=base_url+"packages";
            }
        });
    });
    $(document).on('submit','#create_user_form',function(e){
        e.preventDefault();
        var formData = new FormData($(this)[0]);
        $.ajax({
            url: $(this).attr('action'),
            data: formData,
            type: $(this).attr('method'),
            contentType: false,
            processData: false,
            success:function(data){
                window.location.href=base_url+"users";
            }
        });
    });
    $(document).on('submit','#create_payment_type_form',function(e){
        e.preventDefault();
        var formData = new FormData($(this)[0]);
        $.ajax({
            url: $(this).attr('action'),
            data: formData,
            type: $(this).attr('method'),
            contentType: false,
            processData: false,
            success:function(data){
                window.location.href=base_url+"paymenttype";
            }
        });
    });
    $(document).on('submit','#edit_price_package_form',function(e){
        e.preventDefault();
        var formData = new FormData($(this)[0]);
        $.ajax({
            url: $(this).attr('action'),
            data: formData,
            type: $(this).attr('method'),
            contentType: false,
            processData: false,
            success:function(data){
                window.location.href=base_url+"packages";
            }
        });
    });
    $(document).on('click','.getReservationDetails',function(){
        var id = $(this).attr('data-id');
        $.ajax({
            url:base_url+"reservations/get_reservation_details",
            type:"post",
            data:{
                'id':id
            },success:function(data){
                var obj = $.parseJSON(data);
                $('.package_text_display').text(obj.package_name);
                $('.number_of_people_text_display').text(obj.number_of_people);
                $('.number_of_filipino_text_display').text(obj.number_of_filipino);
                $('.pickup_address_text_display').text(obj.pickup_address);
                $('.email_text_display').text(obj.email_address);
                $('.phone_number_text_display').text(obj.phone_number);
                $('.special_request_text_display').text(obj.special_request);
            }
        });
    });
    $(document).on('click','.editPackagePrice',function(){
        var id = $(this).attr('data-id');
        $.ajax({
            url:base_url+"packages/get_package_price",
            type:"post",
            data:{
                'id':id
            },success:function(data){
                var obj = $.parseJSON(data);
                var str = '';
                var str_price = '';
                if(obj.packages_price.length > 0){
                    $('input[name="trans_type"]').val(1);
                    $.each(obj.packages_price,function(a,b){
                        str_price += '<div class="row">';
                            str_price += '<div class="col-md-7">';
                                str_price += '<div class="form-group">';
                                    str_price += '<label>Price Per head minimum '+b.per_person+'</label>';
                                    str_price += '<input type="text" name="package_price['+b.id+']" class="form-control" value="'+b.price+'" />';
                                str_price += '</div>';
                            str_price += '</div>';
                        str_price += '</div>';
                    });
                } else {
                    $('input[name="trans_type"]').val(0);
                    $('input[name="package_id_edit"]').val(id);
                    for(var i = 1; i <= 15; i++){
                        str_price += '<div class="row">';
                            str_price += '<div class="col-md-7">';
                                str_price += '<div class="form-group">';
                                    str_price += '<label>Price Per head minimum '+i+'</label>';
                                    str_price += '<input type="text" name="package_price['+i+']" class="form-control" value="" />';
                                str_price += '</div>';
                            str_price += '</div>';
                        str_price += '</div>';
                    }
                }
                $('#price_div').html(str_price);
            }
        });
    });
});
