<?php

	$DT = '00:00:00';
	$NT = '23:59:59';

	// класс обработчика запросов
	// Class Query Processor
	class zakaz_processor 
		{
		// данные для фильтра
		// Data for the filter
		public $filter_fields=Array('status' => -1,'date1' => '','date2' => '','offer' => -1);

		// смещение - по умолчанию с 0
		// Offset - default 0
		public $offset=0;

		// размер страницы - по умолчанию 10
		// Page size - the default 10
		public $page_size=10;

		// внутренние переменные
		// Internal variables
		private $sql_query;
		private $mysqli;

		public function __construct($mysqli) 
			{
			$this->mysqli=$mysqli;
			}

		// метод, вычисляющий число записей
		// Method that calculates the number of records
		public function get_count($clear_query=false) 
			{
			// если запрос еще не построен или установлен флаг очистки буфера запроса, то строим запрос
			// If the request has not yet been built or installed buffer request clearing the flag, then build the query
			if(!strlen($this->sql_query)||$clear_query) 
				{
				$this->_build_query();
				}
			// делаем запрос по count
			// Make a request for "count"
			$tmp=$this->mysqli->query('SELECT count(*) as count'.preg_replace('|\ limit [0-9]*\,[0-9]*$|i','',$this->sql_query));
			if(mysqli_num_rows($tmp)>0) 
				{
				$tmp2=mysqli_fetch_array($tmp);
				return $tmp2['count'];
				}
			else 
				{
				return 0;
				}
			}

		// метод, возвращающий результаты в виде массива
		// Method returns the result as an array
		public function get_result($clear_query=false) 
			{
			// если запрос еще не построен или установлен флаг очистки буфера запроса, то строим запрос
			// If the request has not yet been built or installed buffer request clearing the flag, then build the query
			if(!strlen($this->sql_query)||$clear_query) 
				{
				$this->_build_query();
				}
			$res=Array();
			// делаем запрос
			// Make an inquiry
			$tmp=$this->mysqli->query('SELECT zakaz.*'.$this->sql_query);
			if(mysqli_num_rows($tmp)>0) 
				{
				while($tmp2=mysqli_fetch_array($tmp)) 
					{
					$res[]=$tmp2;
					}
				}
			return $res;
			}

		// внутренний метод для построения запроса
		// Internal method for constructing a query
		private function _build_query() 
			{
			$this->sql_query=' FROM zakaz WHERE true AND `zakaz`.`owner_id`='.$this->filter_fields['owner_id'];
			if($this->filter_fields['status']!=-1) 
				{
				// если задан статус, то ставим его в запрос
				// If it is the status, then put it in the request
				$this->sql_query.=' and `zakaz`.`status`='.$this->filter_fields['status'];
				}
			if($this->filter_fields['user_id']!=-1) 
				{
				// если задан пользователь, то ставим его в запрос
				// If user is specified, then put it in the request
				$this->sql_query.=' and `zakaz`.`user_id`='.$this->filter_fields['user_id'];
				}
			if($this->filter_fields['offer']!=-1) 
				{
				// если задан оффер, то ставим его в запрос
				// If given Offer, then put it in the request
				$this->sql_query.=' and `zakaz`.`offer_id`='.$this->filter_fields['offer'];
				}				
			if($this->filter_fields['date1']&&$this->filter_fields['date2']&&($this->filter_fields['date1']<$this->filter_fields['date2'])) 
				{
				// если задан период, то ставим его в запрос
				// If the specified period, then put it in the request
				$this->sql_query.=" and `zakaz`.`date` BETWEEN '".$this->filter_fields['date1']."' AND '".$this->filter_fields['date2']."'";
				}
			// дополняем запрос сортировкой и пагинацией
			// Supplement request sorting and pagination
			$this->sql_query.=' ORDER BY `zakaz`.`id` DESC LIMIT '.$this->offset.','.$this->page_size;
			}
		}

	// готовим строку для GET запроса с учетом перезаписываемых данных
	// Prepare the string for a GET request in view of rewritable data
	function prepare_get_query($get,$override=Array()) 
		{
		// используем перезаписывание параметра
		// Use the overwrite parameter
		if(sizeof($override)) 
			{
			foreach($override as $key => $value) 
				{
				$get[$key]=$value;
				}
			}
		$res='';
		foreach($get as $key => $value) 
			{
			// строим строку запросов с urlencode
			// Build query string with "urlencode"
			$res.=$key.'='.urlencode($value).'&';
			}
		// отрезаем последний &
		// Cut the last "&"
		$res=preg_replace('|\&$|','',$res);
		return $res;
		}

	// обработка даты
	// Processing date
	if(isset($_GET['date1'])&&isset($_GET['date2'])) 
		{
		$dat1=date('Y-m-d', strtotime( $_GET['date1']));
		$dat2=date('Y-m-d', strtotime( $_GET['date2']));
		}
	else 
		{
		$tmp=$mysqli->query('SELECT `date` from `zakaz` ORDER BY `date` limit 1');
		if(mysqli_num_rows($tmp)>0) 
			{
			$tmp2=mysqli_fetch_array($tmp);
			$dat1=$tmp2['date'];
			}
		else 
			{
			$dat1 = date("Y-m-d");
			}
		$dat2 = date("Y-m-d");
		}
		
?>
