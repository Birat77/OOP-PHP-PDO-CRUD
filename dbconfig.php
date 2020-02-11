<?php
require 'database/Connection.php';
require './functions.php';
require 'database/QueryBuilder.php';
require './Task.php';
//establish db connection
$pdo = Connection::make();
$query = new QueryBuilder($pdo);
$cases = $query->selectAll('tblcases');
dd($cases);
//var_dump($cases);
