<?php
	class session{
		public static function init(){
			session_start();
		}
		public static function set($key,$value){
			$_SESSION[$key] = $value;
		}
		public static function get($key){
			if (isset($_SESSION[$key])) {
				return $_SESSION[$key];
			}
			else{
				return false;
			}
		}
		public static function cheaksession(){
			self::init();
			if(self::get("login") == false){
				self::destroy();
				header("Location: login.php");
				exit();
			}
		}
		public static function destroy(){
			session_destroy();
		}
	}
?>