        $(document).ready(function () {
            var nowPlus30Seconds = moment().add('59', 'seconds').format('YYYY/MM/DD HH:mm:ss');

            $('#divCountdown').countdown(nowPlus30Seconds)
                              .on('update.countdown', function (event) { $(this).html(event.strftime('%S')); })
                              .on('finish.countdown', function () { 
								$('.timer').hide(); 
								$('#redirect').show(); 
								$('#redirect2').show();								
								});
        });
