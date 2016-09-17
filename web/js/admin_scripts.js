$(window).load(function() {
    $('.delete-image').on('click', function() {
        var id = $(this).data('id'),
            image_id = $(this).data('image_id');

        $.ajax({
            url: 'delete-image',
            data: {id: id, image_id: image_id},
            type: 'GET',
            success: function(response) {
                $(".delete-image[data-image_id=" + image_id + "]").parent().slideUp();
            }
        });
    })
});
