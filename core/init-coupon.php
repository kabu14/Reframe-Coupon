<?php
session_start();

require 'connect/database.php';
require 'classes/users.php';
require 'classes/general.php';
require 'captcha/recaptchalib.php';
$privatekey = "6Leuhu0SAAAAAFFiBOMhDnGNVya5gH0GSAtgMBVF";
$resp = recaptcha_check_answer ($privatekey,
                                $_SERVER["REMOTE_ADDR"],
                                $_POST["recaptcha_challenge_field"],
                                $_POST["recaptcha_response_field"]);
$users = new Users($db);
$general = new General();

$errors = array();