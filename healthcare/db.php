<?php

$conn = mysqli_connect(
"localhost",
"root",
"",
"healthcare"
);

if(!$conn){
die("Connection Failed: ".mysqli_connect_error());
}

?>