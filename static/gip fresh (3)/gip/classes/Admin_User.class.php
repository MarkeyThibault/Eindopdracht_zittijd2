<?php
class Admin_User {
	// Er wordt een nieuwe contstructor gemaakt
	public function __construct(){
		// Er wordt een sessie gestart
		session_start();
	}
	// Er wordt gecontroleerd of je ingelogd bent.
	public function isLoggedIn(){
		$sessionIsSet = isset( $_SESSION['logged_in'] );
		if ( $sessionIsSet ) {
			$out = $_SESSION['logged_in'];
		} else {
			$out = false;
		}
		return $out;
	}
	public function login () {
		// Er wordt aangeduid dat je ingelogd bent.
		$_SESSION['logged_in'] = true;
	}
	public function logout () {
		// Er wordt aangeduid dat je uitgelogd bent.
		$_SESSION['logged_in'] = false;
	}
}