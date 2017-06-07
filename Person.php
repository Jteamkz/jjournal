<?php 
class Person
{
	function __construct($name, $surname)
	{
		$this->name = $name;
		$this->surname = $surname;
	}

	public function getName()
	{
		return $this->name;
	}
	
	public function getSurname()
	{
		return $this->surname;
	}
	
	public function setName($name)
	{
		$this->name = $name;
	}
}
?>