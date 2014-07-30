<?php
	
	class Blog{
		public function index(){
			require "./application/views/_templates/header.php";
			require "./application/views/blog/index.php";
			require "./application/views/_templates/footer.php";
		}
	}