<?php
class Uploader {
	// eigenschappen
	private $filename;
	private $fileData;
	private $destination;
	
	//methodes
	
	// De map waarin de foto wordt opgeslagen
	public function saveIn ( $folder ) {
		$this->destination = $folder;
	}
	// De foto opslaan
	public function save(){
		// Er wordt gecontroleerd of er op die plaats een bestand opgeslagen kan worden
		$folderIsWriteable = is_writable( $this->destination );
		if ( $folderIsWriteable ) {
			// Als er een bestand in opgeslagen kan worden dan wordt er gecontroleerd welk product er geselecteerd is
			if (isset($_POST['selectproduct'])) { 
 $_SESSION['productselect'] = $_POST['productselect'];
 }
 $productselect = $_SESSION['productselect'];
 // De naam is gelijk aan die van het geselecteerde product en hij wordt via de move_uploaded_file functie verplaatst naar de map
			$name = "$this->destination/$productselect.png";
			$succes = move_uploaded_file($this->fileData, $name);
		} else {
			trigger_error("cannot write to $this->destination");
			$succes = false;
		}
		return $succes;
	}
	
	public function __construct( $key ) {
		$this->filename = $_FILES[$key]['name'];
		$this->fileData = $_FILES[$key]['tmp_name'];
	}
}