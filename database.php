<?php 

	/**
	* 	Created by Yusuf ÇAKAL
	*/

	class Database{

		private $db;
		private	$hostname = "localhost";
		private	$dbname = "code_paste";
		private	$username = "root";
		private	$password = "";

		function __construct(){

			try {
			     $this->db = new PDO("mysql:host=$this->hostname;dbname=$this->dbname", "$this->username", "$this->password");

			} catch ( PDOException $e ){
			     echo $e->getMessage();	
			}

			if ($this->db) {
				//echo "Veritabanı Bağlantısı Yapıldı.";
			}else{
				//echo "Veritabanına Bağlanılamadı.";
			}

		}

		public function insertFunction($name,$language,$title,$code){

			$code = htmlspecialchars($code);
			date_default_timezone_set('Europe/Istanbul');
			$date = date("Y-m-d");

			$this->name = $name;
			$this->language = $language;
			$this->title = $title;
			$this->code = $code;

				try {

					$query = $this->db->prepare("INSERT INTO code SET 
								 name = ?,
								 language = ?,
								 title = ?, 
								 code = ?,
								 date = ?");

					$insert = $query->execute(array($name,$language,$title,$code,$date));

				} catch (Exception $e) {
					echo $e->getMessage();
				}


		}

		public function selectFunction($id){
			$query = $this->db->query("SELECT * FROM code 
				WHERE id = '{$id}'")->fetch(PDO::FETCH_ASSOC);
			return $query;
		}

		public function getId(){
			return $this->db->lastInsertId();
		}

	}

 ?> 	