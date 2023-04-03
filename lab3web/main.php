<?php
$mod = $_REQUEST['mod'];
switch ($mod) {
  case "home":
    require("home.php");
    break;
  case "tambah":
    require("tambah.php");
    break;
  default;
    require("home.php");
}
