<?php
class Page_Data {  /* De pagina eigenschappen worden gemaakt. */
	public $title="";
	public $content="";
	public $css="";
	public $embeddedStyle="";
	
	public function addCSS ( $href ) {
		$this->css .= "<link href='$href' rel='stylesheet' />";
	}
}