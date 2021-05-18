<?php

$db = mysqli_connect("localhost","root","root","enrollment");

if(!$db)
{
    die("Connection failed: " . mysqli_connect_error());
}
?>