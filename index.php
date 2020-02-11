<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>PHP CRUD</title>
  </head>
  <body>
  <?php
require 'database/Connection.php';
require 'database/QueryBuilder.php';
$pdo = Connection::make();
$query = new QueryBuilder($pdo);
// $rowbyid = $query->selectOne('tblcases', 26);
// foreach ($rowbyid as $row) {
//     echo '<pre>';
//     echo htmlspecialchars($row['claim_id']);
//     echo htmlspecialchars($row['claim']);
//     echo htmlspecialchars($row['applicant']);
//     echo htmlspecialchars($row['defendant']);
//     echo '</pre>';
// }
if (isset($_GET['del'])) {

    $id = $_GET['del'];
    $delete_query = $query->deleteRecord('tblcases', $id);
}

?>
<div class="container">
    <h3 class="p-3">Case Management System</h3>

    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
    Add New Case
    </button>

    <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add New Case</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

      <form action="./submit.php" method="POST">
      <div class="d-flex flex-column bd-highlight mb-3">
        <div class="form-group">
          <label for="claim">Claim</label>
          <input type="text" name="claim" id="claim" required/>
        </div>
        <div class="form-group">
          <label for="applicant">Applicant</label>
          <input type="text" name="applicant" id="applicant" required/>
        </div>
        <div class="form-group">
          <label for="defendant">Defendant</label>
          <input type="text" name="defendant" id="defendant" required/>
        </div>
        <div class="form-group">
          <label for="claim_details">Claim Details</label>
          <textarea type="text"name="claim_details"id="claim_details"></textarea>
        </div>
        <div class="form-group">
          <label>Type</label>
          <select name="claim_type">
            <option value="j">Judicial</option>
            <option value="r">Reconcile</option>
          </select>
        </div>
      </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <input type="submit" class="btn btn-primary" name="insert" value="Add"/>
      </div>
      </form>
    </div>
  </div>
  </div>

<div class="card">
  <h3 class="card-header text-center font-weight-bold text-uppercase py-4">All Cases</h3>
  <div class="card-body">

  <?php
$pdo = Connection::make();
$query = new QueryBuilder($pdo);
$cases = $query->selectAll('tblcases');

?>
    <table class="table table-bordered table-condensed">
                <thead>
                    <tr>
                        <th>Claim ID</th>
                        <th>Claim</th>
                        <th>Applicant</th>
                        <th>Defendant</th>
                        <th>Claim Details</th>
                        <th>Claim Type</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($cases as $row): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($row['claim_id']) ?></td>
                            <td><?php echo htmlspecialchars($row['claim']) ?></td>
                            <td><?php echo htmlspecialchars($row['applicant']); ?></td>
                            <td><?php echo htmlspecialchars($row['defendant']); ?></td>
                            <td><?php echo htmlspecialchars($row['claim_details']); ?></td>
                            <td><?php echo htmlspecialchars($row['claim_type']); ?></td>
                            <td>
                              <a class="btn btn-danger btn-rounded btn-sm my-0" href="index.php?del=<?php echo $row['claim_id'] ?>">Remove
                              <a class="btn btn-primary btn-rounded btn-sm my-0" href="edit.php?edit_id=<?php echo $row['claim_id'] ?>">Edit
                            </td>
                        </tr>
                    <?php endforeach;?>
                </tbody>
            </table>
            <?php
?>
    </div>
  </div>
</div>
<!-- Editable table -->
</div>



  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>
