<?php 

require "lib/PolishNotationCalculator.php";

ini_set("display_errors", 1);
error_reporting(E_ALL);

if(isset($_POST['action']) && $_POST['action'] == "calculate") {
    $calculator = new PolishNotationCalculator;
    $result = $calculator->calculate($_POST['polish_notation_input']);
}

include('views/main.php');