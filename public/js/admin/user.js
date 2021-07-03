var locationHref = $(location).attr('href');
var path = locationHref.slice(0 , locationHref.indexOf('admin'));
        $('.slider.round').on('click', function(event) {
            var userId = $(this).attr('data-userId');
            $.ajax({
                url: `${path}admin/users/` + userId,
                type: 'get',
                success: function( _response ){
                    console.log('thành công');
                },
                error: function( _response ){
                    console.log('thất bại');
                }
            });
        });