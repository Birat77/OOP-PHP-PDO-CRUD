<?php

require 'database/Connection.php';
require 'database/QueryBuilder.php';
require 'database/Cases.php';

$pdo = Connection::make();
$query = new QueryBuilder($pdo);

$case = new Cases();
//$case->claim_id = $_POST['claim_id'];
$case->claim = $_POST['claim'];
$case->applicant = $_POST['applicant'];
$case->defendant = $_POST['defendant'];
//$case->claim_details = $_POST['claim_type'];

$casearr = (array) $case;
echo "<pre>";
var_dump($casearr);
echo "</pre>";
