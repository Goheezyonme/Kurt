<?php
// --- READ RECORDS FROM SQLITE DB --- //
$dbFile = "mydatabase.db";
$rows = [];

try {
    $pdo = new PDO("sqlite:" . $dbFile);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $query = "SELECT id,name, form, valid,formname FROM mytable WHERE valid = '1' ORDER BY id asc";
    $stmt = $pdo->query($query);
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

} catch (Exception $e) {
    die("Database error: " . $e->getMessage());
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Assessment Docs</title>

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

    <div class="container mt-4">

        <form class="p-4 border rounded shadow-sm bg-white" method="post" action="process.php" name="assessments">

            <!-- Clinician email -->
            <div class="mb-3">
                <label for="clinicianEmail" class="form-label">Clinician Email</label>
                <input type="email" class="form-control" id="clinicianEmail" name="clinicianEmail"
                    placeholder="clinician@example.com" required>
            </div>

            <!-- Patient email -->
            <div class="mb-4">
                <label for="patientEmail" class="form-label">Patient Email</label>
                <input type="email" class="form-control" id="patientEmail" name="patientEmail"
                    placeholder="patient@example.com" required>
            </div>

            <!-- Dynamic table -->
            <div class="table-responsive d-flex justify-content-center">
                <table class="table table-bordered w-auto text-center table-sm" name="assessments">
                    <thead class="table-light">
                        <tr>
                            <th>Select</th>
                            <th>Descripción</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php

                        foreach ($rows as $row):
                            //echo "<tr><td colspan=2> \$row = " . implode(",", array: $row) . "</td></tr>"; ?>
                            <tr>
                                <td>
                                    <input type="checkbox" name="assessments<?= "link" . htmlspecialchars($row['id']) ?>"
                                        value="<?= htmlspecialchars($row['form'] . "xyz&formname=" . $row['formname'])
                                            ?>">
                                </td>
                                <td>
                                    <?= htmlspecialchars($row['name']) //. $row['formname']) 
                                            // ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>

            <!-- Buttons -->
            <div class="mt-4 d-flex justify-content-end gap-2">
                <button type="reset" class="btn btn-secondary">Cancel</button>
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>

        </form>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>