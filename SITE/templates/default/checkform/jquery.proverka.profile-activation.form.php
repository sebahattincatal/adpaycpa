
<script type="text/javascript">
$(document).ready(function()
	{
	$(profile_activation_form).validate(
		{
		rules:
			{
			activation_code:
				{
				required: true,
				minlength: 1,
				maxlength: 100
				}
			},
		messages:
			{
			activation_code:
				{
				required: "<?php echo $loc['profile.php']['t29']; ?>",
				minlength: "<?php echo $loc['profile.php']['t30']; ?>",
				maxlength: "<?php echo $loc['profile.php']['t31']; ?>"
				}
			}
		});	
	});
</script>	
