<?php
include_once('Lannister.class.php');
class Tyrion extends Lannister{

	public function sleepWith($person)
	{
		if (get_class($person) == "Sansa")
		{
			print ("Let's do this.\n");
		}
		else
		{
			print ("Not even if I'm drunk !\n");
		}
	}
}
?>