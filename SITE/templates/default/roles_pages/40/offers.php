
<?php
if (isset($_GET['offer']) && ($_GET['offer']!=''))
	{
	// Вывод отдельно взятого оффера
	// Display a single offer
	include './templates/'.$template.'/blocks/offers_40_view.php';
	}
else
	{
	// Вывод списка всех офферов
	// Display a list of all offers
	include './templates/'.$template.'/blocks/offers_40_spisok.php';
	}
?>
