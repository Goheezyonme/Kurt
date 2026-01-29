<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>CTC Consent, Privacy and Service Agreement</title>
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
            margin: 40px;
            line-height: 1.5;
        }

        h1,
        h2,
        h3 {
            color: #2b2b2b;
        }

        .section {
            margin-bottom: 30px;
        }

        ul {
            margin-left: 20px;
        }

        .signature-line {
            margin-top: 20px;
        }

        hr {
            margin: 30px 0;
        }

        .small {
            font-size: 0.9em;
            color: #444;
        }

        body {
            font-family: Arial, Helvetica, sans-serif;
            margin: 40px;
            line-height: 1.5;
        }

        h1,
        h2,
        h3 {
            color: #2b2b2b;
        }

        .section {
            margin-bottom: 30px;
        }

        ul {
            margin-left: 20px;
        }

        .signature-line {
            margin-top: 20px;
        }

        label {
            display: block;
            margin-top: 10px;
            font-weight: bold;
        }

        input {
            width: 100%;
            max-width: 500px;
            padding: 6px;
            margin-top: 4px;
        }

        hr {
            margin: 30px 0;
        }

        .small {
            font-size: 0.9em;
            color: #444;
        }
    </style>

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <form action="" method="">
        <h1>Creative Therapy Consultants</h1>
        <p class="small">
            102-208 Ellis Street, Penticton, BC, V2A 4L6<br>
            Phone: (236) 422-4778 | Fax: (236) 422-4783<br>
            Email: info@creativetherapyconsultants.ca
        </p>

        <hr>

        <h2>Client Consent, Privacy and Service Agreement</h2>

        <div class="section">
            <h3>Privacy & Confidentiality</h3>
            <ul>
                <li>Creative Therapy Consultants (CTC) protects personal information under British Columbia’s Personal
                    Information Protection Act (PIPA) and relevant regulatory bodies.</li>
                <li>Personal information includes identifiable details provided for occupational therapy and
                    rehabilitation
                    services.</li>
                <li>Information is collected, used, and disclosed only as necessary to provide services, comply with
                    legal
                    requirements, and ensure client safety.</li>
                <li>Consent is obtained before collecting, using, or sharing personal information, except where
                    permitted by
                    law. Consent may be withdrawn at any time.</li>
                <li>Strict safeguards are used to protect information against unauthorized access, loss, or misuse.</li>
                <li>Clients may access and request corrections to their personal information.</li>
                <li>A Privacy Officer oversees compliance and handles inquiries.</li>
                <li>CTC has maintained professional and privacy standards since 1986.</li>
            </ul>
        </div>

        <div class="section">
            <h3>Consent to Treatment & Services</h3>
            <ul>
                <li>I voluntarily consent to occupational therapy and/or kinesiology services provided by CTC.</li>
                <li>I understand treatments may involve risks and I may ask questions at any time.</li>
                <li>I have the right to know who is providing my treatment and their qualifications.</li>
                <li>I agree to participate actively and respectfully in the treatment process.</li>
                <li>I consent to photographs for assessment purposes only.</li>
                <li>I acknowledge that session note-taking assistants may be used and that I may opt out.</li>
            </ul>

            <p class="signature-line">
                <label>Print Name</label>
                <input type="text" name="print_name"><br>
                <label>Signature</label>
                <input type="text" name="signature"><br>
                <label>Date</label>
                <input type="date" name="date">
            </p>
        </div>

        <div class="section">
            <h3>Release & Disclosure of Information</h3>
            <ul>
                <li>I authorize CTC to release and obtain relevant medical and rehabilitation information for the
                    duration
                    of my claim.</li>
                <li>Information may be shared with health professionals involved in my care.</li>
                <li>This information supports accurate evaluation and treatment.</li>
                <li>I waive claims against parties providing information in good faith.</li>
                <li>Electronic records are securely stored for at least 16 years in compliance with BC law.</li>
                <li>Telehealth services may be used and carry potential technical limitations.</li>
                <li>This consent remains valid until my file is discharged unless revoked in writing.</li>
            </ul>

            <p class="signature-line">
                <label>Print Name</label>
                <input type="text" name="print_name"><br>
                <label>Signature</label>
                <input type="text" name="signature"><br>
                <label>Telephone</label>
                <input type="tel" name="telephone" placeholder="(###) ###-####" pattern="\(\d{3}\) \d{3}-\d{4}"><br>
                <label>Email</label>
                <input type="email" name="email">
            </p>
        </div>

        <div class="section">
            <h3>Cancellation & Appointment Policy</h3>
            <ul>
                <li>24-hour business-day notice is required to cancel or reschedule appointments.</li>
                <li>Repeated late cancellations may result in service cessation.</li>
                <li>LTD clients may be billed by insurers for late cancellations.</li>
                <li>Private pay clients may be charged for missed appointments.</li>
            </ul>

            <p class="signature-line">
                <label>Initials (LTD)</label>
                <input type="text" name="initials_ltd" maxlength="4"><br>
                <label>Initials (Private Pay)</label>
                <input type="text" name="initials_private" maxlength="4"><br>
                <label>Signature</label>
                <input type="text" name="signature">
            </p>
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
    <hr>
    <p class="small">CTC v.13Mar2025</p>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>