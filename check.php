<?php 
include 'Person.php';
$p = new Person("Kanye", "West");

 echo $p->getName()."<br>";
 
 print_r($p->getSurname());
 
 $p->setName("Eminem");

 echo "<br>".$p->getName();
?>