/* <![CDATA[ */

// Jquery validate suggest
jQuery(document).ready(function(){

	$('#contactfriend').submit(function(){

		var action = $(this).attr('action');

		$("#message-friend").slideUp(750,function() {
		$('#message-friend').hide();

 		$('#submit-friend')
			.after('<img src="presenter/img/ajax-loader2.gif" class="loader-2" >')
			.attr('disabled','disabled');

		$.post(action, {
			name_suggest: $('#name_suggest').val(),
			friendname_suggest: $('#friendname_suggest').val(),
			friendemail_suggest: $('#friendemail_suggest').val(),
			message_suggest: $('#message_suggest').val(),
			verify_suggest: $('#verify_suggest').val()
		},
			function(data){
				document.getElementById('message-friend').innerHTML = data;
				$('#message-friend').slideDown('slow');
				$('#contactfriend img.loader-2').fadeOut('slow',function(){$(this).remove()});
				$('#submit-friend').removeAttr('disabled');
				if(data.match('success') != null) $('#contactfriend').slideUp('slow');

			}
		);

		});

		return false;

	});

});

  /* ]]> */