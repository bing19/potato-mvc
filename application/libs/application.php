<?php
	
	class Application{
		// Controller
		private $controller = null;
		
		// Action
		private $action = null;
		
		// Parameters
		private $params = array();
		
		public function __construct(){
			$this->parseUrl();
			
			
			if(file_exists("./application/controllers/".$this->controller.".php")){
				// import controller
				require "./application/controllers/".$this->controller.".php";
				
				// get an instance of the controller
				$this->controller = new $this->controller();
				
				if(method_exists($this->controller,$this->action)){
					$this->controller->{$this->action}($this->params);
				}
				else{
					$this->controller->index();
				}
			}
			else{
				// Page does not seem to exist, let's just
				// redirect them to the home page
				header("location: http://localhost/home/");
			}
		}
		
		private function parseUrl(){
			if(isset($_GET['url'])){
				$url = rtrim($_GET['url'],"/");
				$url = filter_var($url, FILTER_SANITIZE_URL);
				$url = explode('/',$url);
				$this->controller = (isset($url[0])?$url[0]:"home");
				$this->action = (isset($url[1])?$url[1]:"index");
				$this->params = array_slice($url,2,count($url)-1);
			}
		}	
	}