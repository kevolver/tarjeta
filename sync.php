<?php
date_default_timezone_set("America/Maceio");
class SyncCard {
	private $timestamp;
	
	public function __construct($timestamp=NULL) {
		if(empty($timestamp)) $timestamp = intval(date("U"));
		$this->timestamp = $timestamp;
	}
	
	public function crypto($ts=NULL) {
		if(empty($ts)) $ts = $this->timestamp;
		$a = substr($ts, -2, 2);
		$b = md5($ts . "%@KevoISgoingTO.PR0Gr4m");
		$b = preg_replace("%[a-f]%uis", "", $b);
		$b = substr($b, 0, 6);
		$b = str_pad($b, 6, "0", STR_PAD_LEFT);
		return $a . $b;
	}
	
	public function decrypto($input,$ts=NULL) {
		if(empty($ts)) $ts = $this->timestamp;
		$a = $this->crypto($ts);
		if($a===$input) return true;
		else return false;
	}
	
	public function getTimestamp() {
		return $this->timestamp;	
	}
}
?>