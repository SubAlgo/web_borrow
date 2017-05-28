<?php
session_start();
header('Content-Type: text/html; charset=utf-8');
$Hostname="localhost";
$Username="root";
$Password="";
$Database="borrow";
$Connection = mysql_connect($Hostname, $Username, $Password) or die("ติดต่อฐานข้อมูลไม่ได้");
mysql_select_db($Database) or die("เลือกฐานข้อมูลไม่ได้" . mysql_error());
mysql_query("SET NAMES UTF8");
mysql_query("SET character_set_results=utf8");
mysql_query("SET character_set_client=utf8");
mysql_query("SET character_set_connection=utf8");
?>
