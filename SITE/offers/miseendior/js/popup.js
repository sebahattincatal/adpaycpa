$(document).ready(function() {

	$('.open_popup').click(function() {
		var popup_id = $('#' + $(this).attr("rel"));
		popup_id.show();
		$('.overlay').show();
	});

	$('.popup .close, .overlay').click(function() {
		$('.overlay, .popup').hide();
	});

	$('#popup_send').click(function(event) {
		var $response = $(this).parent().parent().find("#response");
		var $phone = $(this).parent().find('input[name="phone"]').val();

		$.ajax({
			type: "post",
			dataType: "json",
			url: 'mailsend.php',
			data: {
				phone: $phone
			},
			success: function(response) {
				if(response.status == 'ok')
					$response.parent().html(response.msg);
				else if(response.status == 'error')
					$response.text(response.msg);
			}
		});
	});

});