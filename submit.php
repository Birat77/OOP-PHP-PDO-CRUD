<?php
require 'database/Connection.php';
require 'database/QueryBuilder.php';

//establish db connection
$pdo = Connection::make();

$submit = (bool) isset($_POST['insert']);

if (isset($submit)) {
    echo "set";
    $claim = $_POST['claim'];
    $applicant = $_POST['applicant'];
    $defendant = $_POST['defendant'];
    $claim_details = $_POST['claim_details'];
    $claim_type = $_POST['claim_type'];

    $sql = "INSERT INTO tblcases(claim,applicant,defendant,claim_details,claim_type)
                VALUES (:claim, :applicant,:defendant,:claim_details,:claim_type)";

    $data = $pdo->prepare($sql);
    $data->execute(array(':claim' => $claim,
        ':applicant' => $applicant,
        ':defendant' => $defendant,
        ':claim_details' => $claim_details,
        ':claim_type' => $claim_type));

    $query = new QueryBuilder($pdo);
    $cases = $query->selectAll('tblcases');
    header('Location:index.php');
    // dd($cases);

    // foreach ($cases as $case) {
    //     dd($case->claim);
    // }

}
