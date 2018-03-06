<?php 
namespace App;
class CommandManagement
{
	public function invoke(Command $Command)
	{
		$Command->ejecutar();
	}
}