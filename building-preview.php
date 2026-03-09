<?php
// Set time zone
date_default_timezone_set('Africa/Blantyre');

if (isset($_POST['submit'])) {
    // Function to sanitize strings safely
    function sanitizeString($data)
    {
        return is_string($data) ? htmlspecialchars($data, ENT_QUOTES, 'UTF-8') : '';
    }

    // Function to sanitize arrays safely
    function sanitizeArray($data)
    {
        return is_array($data) ? array_map('sanitizeString', $data) : [];
    }

    // Sanitize string inputs
    $site = sanitizeString($_POST['site'] ?? '');
    $sheet_no = sanitizeString($_POST['sheet_no'] ?? '');
    $area = sanitizeString($_POST['area'] ?? '');
    $contract_name = sanitizeString($_POST['contract_name'] ?? '');
    $contract_no = sanitizeString($_POST['contract_no'] ?? '');
    $contractor = sanitizeString($_POST['contractor'] ?? '');
    $weather = sanitizeString($_POST['weather'] ?? '');
    $incidents = sanitizeString($_POST['incidents'] ?? '');
    $working_conditions = sanitizeString($_POST['working_conditions'] ?? '');
    $works_suspended = sanitizeString($_POST['works_suspended'] ?? '');
    $satisfaction = sanitizeString($_POST['satisfaction'] ?? '');
    $remarks = sanitizeString($_POST['remarks'] ?? '');
    $authorised = sanitizeString($_POST['authorised'] ?? '');
    $position = sanitizeString($_POST['position'] ?? '');
    $signature = sanitizeString($_POST['signature'] ?? '');
    $signed_date = sanitizeString($_POST['signed_date'] ?? '');

    // Sanitize array inputs
    $visitor_name = sanitizeArray($_POST['visitor_name'] ?? []);
    $visitor_position = sanitizeArray($_POST['visitor_position'] ?? []);
    $visitor_organization = sanitizeArray($_POST['visitor_organization'] ?? []);

    $plant_item = sanitizeArray($_POST['plant_item'] ?? []);
    $plant_added = sanitizeArray($_POST['plant_added'] ?? []);
    $plant_removed = sanitizeArray($_POST['plant_removed'] ?? []);
    $plant_total = sanitizeArray($_POST['plant_total'] ?? []);
    $plant_remarks = sanitizeArray($_POST['plant_remarks'] ?? []);

    $personnel_item = sanitizeArray($_POST['personnel_item'] ?? []);
    $personnel_added = sanitizeArray($_POST['personnel_added'] ?? []);
    $personnel_removed = sanitizeArray($_POST['personnel_removed'] ?? []);
    $personnel_total = sanitizeArray($_POST['personnel_total'] ?? []);
    $personnel_remarks = sanitizeArray($_POST['personnel_remarks'] ?? []);

    $materials_item = sanitizeArray($_POST['materials_item'] ?? []);
    $materials_added = sanitizeArray($_POST['materials_added'] ?? []);
    $materials_removed = sanitizeArray($_POST['materials_removed'] ?? []);
    $materials_total = sanitizeArray($_POST['materials_total'] ?? []);
    $materials_remarks = sanitizeArray($_POST['materials_remarks'] ?? []);

    $other_item = sanitizeArray($_POST['other_item'] ?? []);
    $other_added = sanitizeArray($_POST['other_added'] ?? []);
    $other_removed = sanitizeArray($_POST['other_removed'] ?? []);
    $other_total = sanitizeArray($_POST['other_total'] ?? []);
    $other_remarks = sanitizeArray($_POST['other_remarks'] ?? []);

    // Work Details and Work Issues
    $work_details = sanitizeArray($_POST['work_details'] ?? []);
    $work_started = sanitizeArray($_POST['work_started'] ?? []);
    $work_restarted = sanitizeArray($_POST['work_restarted'] ?? []);
    $work_completed = sanitizeArray($_POST['work_completed'] ?? []);

    $work_issues_details = sanitizeArray($_POST['work_issues_details'] ?? []);
    $work_suspended = sanitizeArray($_POST['work_suspended'] ?? []);
    $work_delayed = sanitizeArray($_POST['work_delayed'] ?? []);
    $work_stopped = sanitizeArray($_POST['work_stopped'] ?? []);
    $potential_claims = sanitizeArray($_POST['potential_claims'] ?? []);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/main.css">
    <script src="./js/jquery-3.3.1.min.js"></script>
    <script src="./js/html2pdf.min.js"></script>
    <script src="./js/all.min.js"></script>
    <title>Site Diary Preview</title>

    <script type="text/javascript">
    function getFormattedDate() {
        const currentDate = new Date();

        const day = String(currentDate.getDate()).padStart(2, '0');
        const month = String(currentDate.getMonth() + 1).padStart(2, '0');
        const year = String(currentDate.getFullYear());

        const hours = String(currentDate.getHours()).padStart(2, '0');
        const minutes = String(currentDate.getMinutes()).padStart(2, '0');
        const seconds = String(currentDate.getSeconds()).padStart(2, '0');

        const formattedDate = `${day}${month}${year}${hours}${minutes}${seconds}`;

        return formattedDate;
    }

    $(document).ready(function($) {
        $(document).on('click', '.btn_download', function(event) {
            event.preventDefault();

            const formattedDate = getFormattedDate();

            var element = document.getElementById('content');

            var opt = {
                margin: 0.4,
                filename: 'site-diary-' + formattedDate + '.pdf',
                image: {
                    type: 'jpeg',
                    quality: 0.98
                },
                html2canvas: {
                    scale: 2
                },
                jsPDF: {
                    unit: 'in',
                    format: 'letter',
                    orientation: 'portrait'
                }
            };

            html2pdf().set(opt).from(element).save();
        });
    });
    </script>
</head>

<body>


    <button id="rep" class="btn_download" title="Download PDF"><i class="fas fa-download"></i></button>


    <div id="content">


        <table style="table-layout:fixed; width:100%;">


            <thead style="line-height: 30px; font-size:16px;">
                <caption>LILONGWE WATER AND SANITATION PROJECT</caption>

                <tr>
                    <td colspan="10" class="center" rol="5"><b>CONTRACT SITE DIARY FORM</b></td>
                </tr>
            </thead>

            <tr>
                <td colspan="5"><b>Sheet No:</b>
                    <?php echo $sheet_no; ?>
                </td>
                <td colspan="5"><b>SITE:</b>
                    <?php echo $site; ?>
                </td>
            </tr>

            <tr>
                <td colspan="10"><b>AREA:</b>
                    <?php echo $area; ?>
                </td>
            </tr>

            <tr>
                <td colspan="10"><b>CONTRACT NAME:</b>
                    <?php echo $contract_name; ?>
                </td>
            </tr>
            <tr>
                <td colspan="10"><b>CONTRACT No.:</b>
                    <?php echo $contract_no; ?>
                </td>
            </tr>
            <tr>
                <td colspan="10"><b>CONTRACTOR:</b>
                    <?php echo $contractor; ?>
                </td>
            </tr>

            <tr>
                <td colspan="10"><b>DAILY WEATHER:</b>
                    <?php echo $weather; ?>
                </td>
            </tr>

            <tr>
                <td colspan="10" class="center"><b>VISITORS</b></td>
            </tr>
            <tr>
                <td colspan="3"><b>NAME</b></td>
                <td colspan="3"><b>POSITION</b></td>
                <td colspan="4"><b>ORGANISATION</b></td>
            </tr>
            <?php foreach ($visitor_name as $index => $name): ?>
            <tr>
                <td colspan="3" style="height:14px;">
                    <?php echo $name; ?>
                </td>
                <td colspan="3" style="height:14px;">
                    <?php echo $visitor_position[$index]; ?>
                </td>
                <td colspan="4" style="height:14px;">
                    <?php echo $visitor_organization[$index]; ?>
                </td>
            </tr>
            <?php endforeach; ?>
            <tr>
                <td colspan="10" class="center"><b>CHANGES ON SITE TO:</b></td>
            </tr>
            <tr>
                <td colspan="1"><b>PLANT</b></td>
                <td colspan="2"><b>ITEM</b></td>
                <td colspan="1"><b>ADDED</b></td>
                <td colspan="1"><b>REMOVED</b></td>
                <td colspan="2"><b>TOTAL</b></td>
                <td colspan="3"><b>REMARK</b></td>
            </tr>
            <?php foreach ($plant_item as $index => $item): ?>
            <tr>
                <td colspan="1">
                    <?php echo $index + 1 ?>
                </td>
                <td colspan="2">
                    <?php echo $item; ?>
                </td>
                <td colspan="1">
                    <?php echo $plant_added[$index]; ?>
                </td>
                <td colspan="1">
                    <?php echo $plant_removed[$index]; ?>
                </td>
                <td colspan="2">
                    <?php echo $plant_total[$index]; ?>
                </td>
                <td colspan="3">
                    <?php echo $plant_remarks[$index]; ?>
                </td>
            </tr>
            <?php endforeach; ?>
            <tr>
                <td colspan="1"><b>PERSONNEL</b></td>
                <td colspan="2"><b>ITEM</b></td>
                <td colspan="1"><b>ADDED</b></td>
                <td colspan="1"><b>REMOVED</b></td>
                <td colspan="2"><b>TOTAL</b></td>
                <td colspan="3"><b>REMARK</b></td>
            </tr>
            <?php foreach ($personnel_item as $index => $item): ?>
            <tr>
                <td colspan="1">
                    <?php echo $index + 1 ?>
                </td>
                <td colspan="2">
                    <?php echo $item; ?>
                </td>
                <td colspan="1">
                    <?php echo $personnel_added[$index]; ?>
                </td>
                <td colspan="1">
                    <?php echo $personnel_removed[$index]; ?>
                </td>
                <td colspan="2">
                    <?php echo $personnel_total[$index]; ?>
                </td>
                <td colspan="3">
                    <?php echo $personnel_remarks[$index]; ?>
                </td>
            </tr>
            <?php endforeach; ?>
            <tr>
                <td colspan="1"><b>MATERIALS</b></td>
                <td colspan="2"><b>ITEM</b></td>
                <td colspan="1"><b>ADDED</b></td>
                <td colspan="1"><b>REMOVED</b></td>
                <td colspan="2"><b>TOTAL</b></td>
                <td colspan="3"><b>REMARK</b></td>
            </tr>
            <?php foreach ($materials_item as $index => $item): ?>
            <tr>
                <td colspan="1">
                    <?php echo $index + 1 ?>
                </td>
                <td colspan="2">
                    <?php echo $item; ?>
                </td>
                <td colspan="1">
                    <?php echo $materials_added[$index]; ?>
                </td>
                <td colspan="1">
                    <?php echo $materials_removed[$index]; ?>
                </td>
                <td colspan="2">
                    <?php echo $materials_total[$index]; ?>
                </td>
                <td colspan="3">
                    <?php echo $materials_remarks[$index]; ?>
                </td>
            </tr>
            <?php endforeach; ?>
            <tr>
                <td colspan="1"><b>OTHER (SPECIFY)</b></td>
                <td colspan="2"><b>ITEM</b></td>
                <td colspan="1"><b>ADDED</b></td>
                <td colspan="1"><b>REMOVED</b></td>
                <td colspan="2"><b>TOTAL</b></td>
                <td colspan="3"><b>REMARK</b></td>
            </tr>
            <?php foreach ($other_item as $index => $item): ?>
            <tr>
                <td colspan="1">
                    <?php echo $index + 1 ?>
                </td>
                <td colspan="2">
                    <?php echo $item; ?>
                </td>
                <td colspan="1">
                    <?php echo $other_added[$index]; ?>
                </td>
                <td colspan="1">
                    <?php echo $other_removed[$index]; ?>
                </td>
                <td colspan="2">
                    <?php echo $other_total[$index]; ?>
                </td>
                <td colspan="3">
                    <?php echo $other_remarks[$index]; ?>
                </td>
            </tr>
            <?php endforeach; ?>
            <tr>
                <td colspan="10" class="center"><b>INCIDENTS / SAFETY</b></td>
            </tr>
            <tr>
                <td colspan="10" style='height: 14px;'>
                    <?php echo $incidents; ?>
                </td>
            </tr>
            <tr>
                <td colspan="10" class="center"><b>WORKING CONDITION AND SAFETY</b></td>
            </tr>
            <tr>
                <td colspan="10" style='height: 14px;'>
                    <?php echo $working_conditions; ?>
                </td>
            </tr>

            <tr>
                <td colspan="10" class="center"><b>DETAILS OF WORKS STARTED / RESTARTED / COMPLETED</b></td>
            </tr>
            <tr>
                <td colspan="4"><b>DETAIL</b></td>
                <td colspan="6"><b>CATEGORY</b></td>
            </tr>
            <?php
            foreach ($work_details as $index => $detail) {
                echo "<tr>";
                echo "<td colspan='4' style='height: 14px;'>{$detail}</td>";
                echo "<td colspan='2'>" . (isset($work_started[$index]) ? 'STARTED' : '') . "</td>";
                echo "<td colspan='2'>" . (isset($work_restarted[$index]) ? 'RESTARTED' : '') . "</td>";
                echo "<td colspan='2'>" . (isset($work_completed[$index])  ? 'COMPLETED' : '') . "</td>";
                echo "</tr>";
            }
            ?>
            <tr>
                <td colspan="10" class="center"><b>WORK TEMPORARILY SUSPENDED / DELAYED /
                        STOPPED /
                        POTENTIAL CLAIMS</b>
                </td>
            </tr>
            <tr>
                <td colspan="2"><b>WORK ISSUE</b></td>
                <td colspan="8"><b>CATEGORY</b></td>
            </tr>
            <?php
            foreach ($work_issues_details as $index => $detail) {
                echo "<tr>";
                echo "<td colspan='2' style='height: 14px;'>{$detail}</td>";
                echo "<td colspan='2'>" . (isset($work_suspended[$index]) ? 'SUSPENDED' : '') . "</td>";
                echo "<td colspan='2'>" . (isset($work_delayed[$index]) ? 'DELAYED' : '') . "</td>";
                echo "<td colspan='2'>" . (isset($work_stopped[$index]) ? 'STOPPED' : '') . "</td>";
                echo "<td colspan='2'>" . (isset($potential_claims[$index]) ? 'POTENTIAL CLAIM' : '') . "</td>";
                echo "</tr>";
            }
            ?>

            <tr>
                <td colspan="10" class="center"><b>SATISFACTION TO THE WORKS CARRIED OUT:</b></td>
            </tr>
            <tr>
                <td colspan="10" style='height: 14px;'>SATISFIED:
                    <?php echo htmlentities($satisfaction); ?>
                </td>
            </tr>

            <tr>
                <td colspan="10"><b>IF NO (Give reasons)</b></td>
            </tr>
            <tr>
                <td colspan="10" style='height: 14px;'>
                    <?php echo $remarks; ?>
                </td>
            </tr>
            <tr>
                <td colspan="5"><b>NAME:</b>
                    <?php echo $authorised; ?>
                </td>
                <td colspan="5"><b>POSITION:</b>
                    <?php echo $position; ?>
                </td>
            </tr>
            <tr></tr>
            <td colspan="5"><b>SIGNATURE:</b>
                <?php echo $signature; ?>
            </td>
            <td colspan="5"><b>DATE:</b>
                <?php echo $signed_date; ?>
            </td>
            </tr>
        </table>
    </div>
</body>

</html>