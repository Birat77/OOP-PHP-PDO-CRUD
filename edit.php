<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Page</title>
</head>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<body>

<?php
require 'database/Connection.php';
require 'database/QueryBuilder.php';

if (isset($_GET['edit_id'])) {
    $id = $_GET['edit_id'];
    $pdo = Connection::make();
    $query = new QueryBuilder($pdo);
    $rowbyid = $query->selectOne('tblcases', $id);
    // echo "<pre>";
    // var_dump($rowbyid);
    // echo "</pre>";
}

?>
<div class="container">
<h2> Edit Case </h2>
<form action="./update.php" method="POST">
      <input type="hidden" id="claim_id" name="claim_id" value="<?php echo $rowbyid[0]['claim_id'] ?>">
      <div class="d-flex flex-column bd-highlight mb-3">
        <div class="form-group">
          <label for="claim">Claim</label>
          <input type="text" name="claim" id="claim" value = "<?php echo htmlspecialchars($rowbyid[0]['claim']); ?>" required/>
        </div>
        <div class="form-group">
          <label for="applicant">Applicant</label>
          <input type="text" name="applicant" id="applicant" value = "<?php echo $rowbyid[0]['applicant']; ?>" required/>
        </div>
        <div class="form-group">
          <label for="defendant">Defendant</label>
          <input type="text" name="defendant" id="defendant" value = "<?php echo htmlspecialchars($rowbyid[0]['defendant']); ?>" required/>
        </div>
        <div class="form-group">
          <label for="claim_details">Claim Details</label>
          <textarea type="text"name="claim_details"id="claim_details" required><?php echo htmlspecialchars($rowbyid[0]['claim_details']); ?></textarea>
        </div>
        <div class="form-group">
          <label>Type</label>
          <select name="claim_type">
            <option value="j">Judicial</option>
            <option value="r">Reconcile</option>
          </select>
          </div>
          <div>
          <input type="submit" class="btn btn-primary" name="update" value="UPDATE"/>
          </div>
        </div>
    </form>
    </div>
</body>
</html>
