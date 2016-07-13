<?php

// Подключаем файл конфигурации
include_once '../../../includes/config.php';

if (isset($_POST['country1'])) {$iso_country1=$_POST['country1'];}
if (isset($_POST['region1'])) {$id_region1=$_POST['region1'];} 
if (isset($_POST['city1'])) {$id_city1=$_POST['city1'];} 	
	
switch ($_POST['action'])
	{
	case "showRegionForInsert1":
		echo '<select name="region1" style="width: 200px; margin-left: 20px;" onchange="javascript:selectCity1();"><option value="0">Не указано</option>';
		$sql_region = "SELECT * FROM sxgeo_regions WHERE `country`='$iso_country1' ORDER BY `name_ru` ASC";
		$result_region = $mysqli->query($sql_region);
		if (mysqli_num_rows($result_region) > 0) 
			{
			while ($res_region=mysqli_fetch_array($result_region)) 
				{
				echo '<option value="'.$res_region['id'].'">'.$res_region['name_ru'].'</option>';
				}
			}
		else
			{
			echo '<option value="0">Не указано</option>';
			}
		echo '</select>';
	break;
               
	case "showCityForInsert1":
		echo '<select name="city1" id="city1" style="width: 200px; margin-left: 20px;"><option value="0">Не указано</option>';
		$sql_cities = "SELECT * FROM sxgeo_cities WHERE `region_id`='$id_region1' ORDER BY `name_ru` ASC";
		$result_cities = $mysqli->query($sql_cities);
		if (mysqli_num_rows($result_cities) > 0) 
			{
			while ($res_cities=mysqli_fetch_array($result_cities)) 
				{
				echo '<option value="'.$res_cities['id'].'">'.$res_cities['name_ru'].'</option>';
				}
			}
		else
			{
			echo '<option value="0">Не указано</option>';
			}
		echo '</select>';
	break;			   

};
?>