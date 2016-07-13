
<h1><?php echo $loc['offers.php']['t01']; ?></h1>

<?php
if (isset($_GET['offer']) && ($_GET['offer']!=''))
	{
	// Вывод отдельно взятого оффера
	// Display a single offer
	include './templates/'.$template.'/blocks/offers_10_view.php';
	}
else
	{
	// Вывод списка всех офферов
	// Display a list of all offers
	include './templates/'.$template.'/blocks/offers_10_spisok.php';
	}
?>

<p>
	&nbsp;
</p>

