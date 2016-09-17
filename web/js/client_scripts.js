
$(document).ready(function() {
    //$('#customer-request-form').on('submit', function(e) {
    //    e.preventDefault();
    //    $.ajax({
    //        url: '/object/val-form',
    //        data
    //        type: 'POST',
    //        success: function(response) {
    //            console.log(response);
    //        }
    //    });
    //});


});
function sendAjax(e) {
    e.preventDefault();

    $('#customer-request-form').on('afterValidate', function() {
        var form = $('#customer-request-form').serialize();
        $('.loader-wrap').show();
            $.ajax({
                url: '/object/val-form',
                data: form,
                type: 'POST',
                dataType: 'JSON',
                beforeSend: function() {

                },
                success: function(res) {
                    setTimeout(function() {
                        if(res.success) {
                            $('.success-message').show('slow');
                            $('#customer-request-form').slideUp('slow');
                            $('.loader-wrap').hide();
                        } else {
                            $('.loader-wrap').hide();
                        }
                    }, 1500);
                    console.log(res.message);
                }
            });

    });

    return false;
}