<?php
session_start();

require 'connect/database.php';
require 'classes/admins.php';
require 'classes/general.php';

$admins = new Admins($db);
$general = new General();

$errors = array();