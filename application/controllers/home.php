<?php
	class Home{
		public function index($params=array()){
			require "./application/views/_templates/header.php";
			$arr = scandir("./application/controllers");
			$controllers = array_slice($arr,2,count($arr));
			require "./application/views/home/index.php";
			require "./application/views/_templates/footer.php";
		}
	}