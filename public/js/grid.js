$(document).ready(function() {
    var locale = $('#locale').val();
    locale = 'ru' == locale ? 'Russian' : 'Kyrgyz';
    $('#entries-table').DataTable({
        "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.11/i18n/" + locale + ".json"
        }
    });
} );

//deleting news entry through ajax
$('.delete-entry').click(function(e) {
    e.preventDefault();

    var $this = $(this);
    var url = this.href;

    swal({
        title: "Are you sure?",
        text: "Yes, delete this item",
        type: "info",
        showCancelButton: true,
        closeOnConfirm: false,
        showLoaderOnConfirm: true
    }, function(){
        $.ajax(url, {
            type: 'delete',
            dataType: 'json',
            data: {
                _token: $this.data('token'),
                _method: 'delete'
            },
            success: function() {
                swal({
                    title: "Item deleted",
                    type: "success",
                    timer: 1000,
                    showConfirmButton: true
                }, function() {
                    window.location.reload(true)
                });

            },
            error: function(request, status, error) {
                sweetAlert("Oops...", "Something went wrong!", "error");
                console.log('error!', status, error);
            }
        });
    });
});