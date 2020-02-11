<?php
require 'database/Connection.php';
require 'database/QueryBuilder.php';

$pdo = Connection::make();
$query = new QueryBuilder($pdo);
$cases = $query->selectAll('tblcases');

?>
    <table class="table table-bordered table-condensed">
                <thead>
                    <tr>
                        <th>Claim</th>
                        <th>Applicant</th>
                        <th>Defendant</th>
                        <th>Claim Details</th>
                        <th>Claim Type</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($cases as $row): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($row['claim']) ?></td>
                            <td><?php echo htmlspecialchars($row['applicant']); ?></td>
                            <td><?php echo htmlspecialchars($row['defendant']); ?></td>
                            <td><?php echo htmlspecialchars($row['claim_details']); ?></td>
                            <td><?php echo htmlspecialchars($row['claim_type']); ?></td>
                        </tr>
                    <?php endforeach;?>
                </tbody>
            </table>
            <?php
?>