<?php

header('Content-Type:text/html');
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET");

require_once './class-q8.php';

if ( ! isset( $_GET['v'] ) || empty( $_GET['v'] ) ) {
  echo "<strong>Invalid Request</strong>";
  die;
} else {
  $q8 = new Class_Q8();
  echo $q8->show_vessel( $_GET['v'] );
  die;
}