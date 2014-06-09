<?php
class Mitgliedseintrag
{
	private $id;
	private $vorname;
	private $nachname;
	private $email;

	function Mitgliedseintrag($id, $vorname, $nachname, $email)
	{
		$this->id = $id;
		$this->vorname = $vorname;
		$this->nachname = $nachname;
		$this->email = $email;
	}
	public function getId(){return $this->id;}
	public function getVorname(){return $this->vorname;}
	public function getNachname(){return $this->nachname;}
	public function getEmail(){return $this->email;}
}