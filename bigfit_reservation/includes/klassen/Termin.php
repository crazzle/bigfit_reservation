<?php
class Termin
{
	private $id;
	private $datum;
	private $beginn;
	private $ende;
	private $maxAnzahl;

	function Termin($id, $datum, $beginn, $ende, $maxAnzahl)
	{
		$this->id = $id;
		$this->datum = $datum;
		$this->beginn = $beginn;
		$this->ende = $ende;
		$this->maxAnzahl = $maxAnzahl;
	}
	public function getId(){return $this->id;}
	public function getDatum(){return $this->datum;}
	public function getBeginn(){return $this->beginn;}
	public function getEnde(){return $this->ende;}
	public function getMaxAnzahl(){return $this->maxAnzahl;}
}