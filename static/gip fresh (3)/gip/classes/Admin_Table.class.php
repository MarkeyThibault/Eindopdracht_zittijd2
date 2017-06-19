<?php

// Het database object wordt gemaakt
class Admin_Table
{
	private $db;

	public function __construct ( $db ) {
		$this->db = $db;
	}
	public function makeStatement ( $sql, $data ){
		$statement = $this->db->prepare( $sql );
		try {
			$statement->execute( $data );
		} catch (Exception $e) {
			$exceptionMessage = "<p>You tried to run this sql: $sql <p><p>Exception: $e</p>";
			trigger_error($exceptionMessage);
		}
		return $statement;
	}
	
	//Hiermee probeer je in te loggen.
	public function checkCredentials ( $email, $password ){
		// De inlogwaarden worden gecontroleerd in de admin tabel
		$sql = "SELECT email FROM admin
		WHERE email = ? AND password = MD5(?)";
		$data = array($email, $password);
		$statement = $this->makeStatement( $sql, $data );
		if ( $statement->rowCount() === 1 ) {
			$out = true;
		} else {
			$loginProblem = new Exception( "login failed!" );
			throw $loginProblem;
		}
		return $out;
	}
}
