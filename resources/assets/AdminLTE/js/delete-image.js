$('.admin-image-remove-button').click(function (e) {
	e.preventDefault();

	var $this = $(this);

	swal({
		title: "Are you sure?",
		text: "Yes, delete this item",
		type: "info",
		showCancelButton: true,
		closeOnConfirm: false,
		showLoaderOnConfirm: true
	}, function(){
		$.ajax($this.data('url'), {
			type: 'delete',
			dataType: 'json',
			data: {
				path: $this.data('image'),
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