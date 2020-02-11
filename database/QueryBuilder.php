<?php

class QueryBuilder
{
    protected $pdo;
    protected $id;
    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }
    public function selectAll($table)
    {
        $stmt = $this->pdo->prepare('select * from ' . $table);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function insertInto($table)
    {

    }
    public function deleteRecord($table, $id)
    {
        $stmt = $this->pdo->prepare('delete from ' . $table . ' where claim_id=' . $id);
        //$stmt->bindValue(":id", $id);
        $res = $stmt->execute();
    }
    public function selectOne($table, $id)
    {
        $stmt = $this->pdo->prepare('select * from tblcases where claim_id=' . $id);
        //$stmt->bindValue(":id", $id);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);

    }
    public function updateRecord($casesobj,$id){
        
    }

}
