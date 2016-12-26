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
			     print $e->getMessage();
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
			$date = date("d.m.Y");

			$this->name = $name;
			$this->language = $language;
			$this->title = $title;
			$this->code = $code;

			$query = $this->db->prepare("INSERT INTO code SET 
			 name = ?,
			 language = ?,
			 title = ?, 
			 code = ?,
			 date = ?");

				$insert = $query->execute(array($name,$language,$title,$code,$date));
				if ($insert){
				    //print "Kayıt Edildi.";
				}else{
					//echo "Kayıt Edilemedi.";
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