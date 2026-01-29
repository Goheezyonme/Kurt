<?php
session_start();

/* ==============================
   SAVE FORM DATA (POST)
   ============================== */
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // If user clicks cancel (reset simulation)
    if (isset($_POST['cancel'])) {
        unset($_SESSION['assessments_form']);
        header("Location: index.php");
        exit;
    }

    // Save all posted data
    $_SESSION['assessments_form'] = $_POST;

    // ---- HERE YOU CAN ADD YOUR PROCESSING LOGIC ----
    // send emails, save to DB, etc.

    // Prevent form resubmission
    header("Location: index.php");
    exit;
}

/* ==============================
   RESTORE SAVED DATA
   ============================== */
$old = $_SESSION['assessments_form'] ?? [];

/* ==============================
   READ RECORDS FROM SQLITE DB
   ============================== */
$dbFile = "mydatabase.db";
$rows = [];

try {
    $pdo = new PDO("sqlite:" . $dbFile);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $query = "SELECT id, name, form, valid, formname
              FROM mytable
              WHERE valid = '1'
              ORDER BY id ASC";

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
    <title>Assessment Docs</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

    <div class="container mt-4">

        <form class="p-4 border rounded shadow-sm bg-white" method="post" action="process.php" name="assessments">

            <!-- Clinician email -->
            <div class="mb-3">
                <label class="form-label">Clinician Email</label>
                <input type="email" class="form-control" name="clinicianEmail" placeholder="clinician@example.com"
                    value="<?= htmlspecialchars($old['clinicianEmail'] ?? '') ?>" required>
            </div>

            <!-- Patient email -->
            <div class="mb-4">
                <label class="form-label">Patient Email</label>
                <input type="email" class="form-control" name="patientEmail" placeholder="patient@example.com"
                    value="<?= htmlspecialchars($old['patientEmail'] ?? '') ?>" required>
            </div>

            <!-- Dynamic table -->
            <div class="table-responsive d-flex justify-content-center">
                <table class="table table-bordered w-auto text-center table-sm">
                    <thead class="table-light">
                        <tr>
                            <th>Select</th>
                            <th>Descripción</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($rows as $row):
                            $checkboxName = "assessmentslink" . $row['id'];
                            $checked = isset($old[$checkboxName]) ? 'checked' : '';
                            ?>
                            <tr>
                                <td>
                                    <input type="checkbox" name="<?= $checkboxName ?>"
                                        value="<?= htmlspecialchars($row['form'] . "xyz&formname=" . $row['formname']) ?>"
                                        <?= $checked ?>>
                                </td>
                                <td>
                                    <?= htmlspecialchars($row['name']) ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>

            <!-- Buttons -->
            <div class="mt-4 d-flex justify-content-end gap-2">
                <button type="submit" name="cancel" class="btn btn-secondary">
                    Cancel
                </button>
                <button type="submit" class="btn btn-primary">
                    Submit
                </button>
            </div>

        </form>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>