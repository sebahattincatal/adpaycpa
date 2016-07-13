
<script>

	function selectRegion1()
		{
        var country1 = $('select[name="country1"]').val();
        if(!country1)
			{
			$('span[name="selectDataRegion1"]').html('<select name="region1" style="width: 200px; "><option value="0">Не указано</option></select>');
			$('span[name="selectDataCity1"]').html('<select name="city1" id="city1" style="width: 200px; "><option value="0">Не указано</option></select>');
			}
		else
			{
            $.ajax(
				{
				type: "POST",
				url: "<?php echo site_url(); ?>/templates/<?php echo $template; ?>/js/geo_spisok.php",
				data: { action: 'showRegionForInsert1', country1: country1},
				cache: false,
				success: function(responce){ $('span[name="selectDataRegion1"]').html(responce); }
				});
			};
		};

	function selectCity1()
		{
        var region1 = $('select[name="region1"]').val();
		$.ajax(
			{
			type: "POST",
			url: "<?php echo site_url(); ?>/templates/<?php echo $template; ?>/js/geo_spisok.php",
			data: { action: 'showCityForInsert1', region1: region1},
			cache: false,
			success: function(responce){ $('span[name="selectDataCity1"]').html(responce); }
			});
		};
		
</script>
