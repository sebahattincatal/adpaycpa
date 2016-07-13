var client = new ZeroClipboard($('.btn-copy'));

client.on('ready', function( readyEvent ) {
	client.on('aftercopy', function(event) {
    	alert('Ссылка скопирована в буфер обмена');
  	});
});