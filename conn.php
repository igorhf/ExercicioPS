<?php

try
{
	$conn = new PDO("mysql:dbname=banco_produtos;host=localhost","root","");
}
catch(PDOException $ex)
{
	$ex->GetMessege();
}

?>