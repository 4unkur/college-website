$(document).ready(function() {
    $('#news-table').DataTable();
} );

//deleting news entry through ajax
$('.delete-news').click(function(e) {
    e.preventDefault();

    if (confirm('Do you really want to delete this news entry?')) {
        $this = $(this);
        $.ajax(this.href, {
            type: 'delete',
            dataType: 'json',
            data: {
                _token: $this.data('token'),
                _method: 'delete'
            },
            success: function() {
                window.location.reload(true);
            },
            error: function(request, status, error) {
                alert('Couldn\'n remove entry');
                console.log('error!', status, error);
            }
        });
    }
    else {
        alert('canceled');
    }
});