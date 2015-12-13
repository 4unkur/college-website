$('#delete-news').click(function(e) {
    e.preventDefault();

    if (confirm('Do you really want to delete this news entry?')) {
        $.ajax(this.href, {
            type: 'delete',
            dataType: 'json',
            data: {
                _token: $(this).data('token'),
                _method: 'delete'
            },
            success: function(response) {
                console.log('success!', response);
            },
            error: function(request, status, error) {
                console.log('error!', status, error);
            }
        });
    }
    else {
        alert('canceled');
    }


});