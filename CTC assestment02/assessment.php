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

    <form class="p-4 border rounded shadow-sm bg-white">

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

        <!-- Responsive centered table -->
        <div class="table-responsive d-flex justify-content-center">
            <table class="table table-bordered w-auto text-center">
                <thead class="table-light">
                    <tr>
                        <th scope="col">Select</th>
                        <th scope="col">Descripción</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><input type="checkbox" name="op1" checked></td>
                        <td>PHQ-9</td>
                    </tr>
                    <tr>
                        <td><input type="checkbox" name="op2"checked></td>
                        <td>GAD-7</td>
                    </tr>
                    <tr>
                        <td><input type="checkbox" name="op3"></td>
                        <td>PAS</td>
                    </tr>
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

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
