<?php

require 'database/Connection.php';
require 'database/QueryBuilder.php';
require 'database/Cases.php';

$pdo = Connection::make();
$query = new QueryBuilder($pdo);

if (isset($_POST['update'])) {
    $case = new Cases();
    $case->claim_id = $_POST['claim_id'];
    $case->claim = $_POST['claim'];
    $case->applicant = $_POST['applicant'];
    $case->defendant = $_POST['defendant'];
    $case->claim_details = $_POST['claim_details'];
    $case->claim_type = $_POST['claim_type'];

    $casearr = (array) $case;
    echo "<pre>";
    var_dump($casearr);
    echo "</pre>";
    $claim_id = $casearr['claim_id'];
    $claim = $casearr['claim'];
    $applicant = $casearr['applicant'];
    $defendant = $casearr['defendant'];
    $claim_details = $casearr['claim_details'];
    $claim_type = $casearr['claim_type'];

    $sql = "UPDATE tblcases
            SET
            claim = '$claim',
            applicant='$applicant',
            defendant='$defendant',
            claim_details='$claim_details',
            claim_type='$claim_type'
            WHERE claim_id=$claim_id";

    echo $sql;
    $update = $pdo->prepare($sql);
    $update->execute();

    $updatedcase = $query->selectOne('tblcases', $claim_id);
    // echo "<pre>";
    // var_dump($updatedcase);
    // echo "</pre>";
    header('Location:index.php');
}
