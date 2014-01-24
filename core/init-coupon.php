<?php
session_start();

require '../data.php';
require 'connect/database.php';
require 'classes/users.php';
require 'classes/general.php';
require 'captcha/recaptchalib.php';
require 'FPDI/fpdf.php'; 
require 'FPDI/fpdi.php';


$resp = recaptcha_check_answer ($privatekey,
                                $_SERVER["REMOTE_ADDR"],
                                $_POST["recaptcha_challenge_field"],
                                $_POST["recaptcha_response_field"]);
$users = new Users($db);
$general = new General();

$errors = array();