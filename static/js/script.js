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
    $(document).on('submit','#customer_form',function(e){
        e.preventDefault();
        var formData = new FormData($(this)[0]);
        $.ajax({
            url: $(this).attr('action'),
            data: formData,
            type: $(this).attr('method'),
            contentType: false,
            processData: false,
            success:function(data){
                window.location.href=base_url+"customers";
            }
        });
    });
});
