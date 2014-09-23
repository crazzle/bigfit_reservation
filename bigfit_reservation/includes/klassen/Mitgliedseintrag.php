<?php
class Mitgliedseintrag
{
	private $id;
	private $vorname;
	private $nachname;
	private $email;
	private $rolle;

	function Mitgliedseintrag($id, $vorname, $nachname, $email, $rolle)
	{
		$this->id = $id;
		$this->vorname = $vorname;
		$this->nachname = $nachname;
		$this->email = $email;
		$this->rolle = $rolle;
	}
	public function getId(){return $this->id;}
	public function getVorname(){return $this->vorname;}
	public function getNachname(){return $this->nachname;}
	public function getEmail(){return $this->email;}
	public function getRolle(){return $this->rolle;}
}