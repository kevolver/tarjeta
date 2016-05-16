<?php
date_default_timezone_set("America/Maceio"); //Seta a timezone para Maceió
/*
Classe principal do projeto, SyncCard
*/
class SyncCard {
	private $timestamp; //Variável privada timestamp
	
	public function __construct($timestamp=NULL) { //Construtor da classe, timestamp default=NULL
		if(empty($timestamp)) $timestamp = intval(date("U")); //Pega a hora atual se parâmetro timestamp for NULL
		$this->timestamp = $timestamp;
	}
	
	public function crypto($ts=NULL) { //Método crypto, ts (timestamp) default = NULL
		if(empty($ts)) $ts = $this->timestamp; //Se timestamp passado for NULL, pega o do objeto
		$a = substr($ts, -2, 2); //Pega os dois últimos dígitos da timestamp
		$b = md5($ts . "%@KevoISgoingTO.PR0Gr4m"); //Faz um md5 com timestamp mais uma string aleatória (redundância)
		$b = preg_replace("%[a-f]%uis", "", $b); //Elimina as letras de a-f do md5
		$b = substr($b, 0, 6); //Pega os 6 primeiros dígitos de b
		$b = str_pad($b, 6, "0", STR_PAD_LEFT); //Se tiver menos de 6 dígitos, preenche com 0 a esquerda
		return $a . $b; //Retorna a concatenado com b
	}
	
	public function decrypto($input,$ts=NULL) { //Método decrypto: Recebe valor digitado e mais uma possível timestamp para comparar
		if(empty($ts)) $ts = $this->timestamp; //Se timestamp passado for NULL, pega o do objeto 
		$a = $this->crypto($ts); //Utiliza a crypto na timestamp
		if($a===$input) return true; //Se o input bater com o crypto do timestamp, retorna true 
		else return false; //Senão, retorna false
	}
	
	public function getTimestamp() { //Método de retorno do timestamp
		return $this->timestamp;	
	}
}
?>