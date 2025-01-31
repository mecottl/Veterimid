<?php 
$enlace=mysqli_connect("localhost","root","","Veterimid"); 
if(!$enlace){ 
die("no pudo conectarse la base de datos" .mysqli_error()); 
} 
?> 