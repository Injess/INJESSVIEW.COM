<?php
// Set time zone
date_default_timezone_set('Africa/Blantyre');

if ($_SERVER['REQUEST_METHOD'] !== 'POST' || !isset($_POST['submit'])) {
    header('Location: irrigation-site-diary');
    exit;
}

if (isset($_POST['submit'])) {
    // Retrieve form data
    $date = htmlentities($_POST['date']);
    $sheet_no = htmlentities($_POST['sheet_no']);
    $dept = htmlentities($_POST['dept']);
    $region = htmlentities($_POST['region']);
    $district = htmlentities($_POST['district']);
    $contract_no = htmlentities($_POST['contract_no']);
    $contract_title = htmlentities($_POST['contract_title']);
    $contractor_name = htmlentities($_POST['contractor_name']);
    $consultant_name = htmlentities($_POST['consultant_name']);
    $date_daily = htmlentities($_POST['date_daily']); //
    $day = htmlentities($_POST['day']); //
    $from = htmlentities($_POST['working_time_from']);
    $to = htmlentities($_POST['working_time_to']);
    $rain = htmlentities($_POST['rain']);
    $working_condition = htmlentities($_POST['working_condition']);
    $construction_activities = htmlentities($_POST['construction_activities']);
    $site_agent = htmlentities($_POST['site_agent']);
    $site_eng = htmlentities($_POST['site_eng']);
    $foreman = htmlentities($_POST['foreman']);
    $driver = htmlentities($_POST['driver']);
    $operator = htmlentities($_POST['operator']);
    $craftsman = htmlentities($_POST['craftsman']);
    $unskilled = htmlentities($_POST['unskilled']);
    $total_personnel = htmlentities($_POST['total_personnel']);
    $hvy_plant = htmlentities($_POST['hvy_plant']);
    $light_plant = htmlentities($_POST['light_plant']);
    $hvy_vehicle = htmlentities($_POST['hvy_vehicle']);
    $light_vehicle = htmlentities($_POST['light_vehicle']);
    $motorbike = htmlentities($_POST['motorbike']);
    $bicycle = htmlentities($_POST['bicycle']);
    $others_vehicle = htmlentities($_POST['others_vehicle']);
    $total_vehicle = htmlentities($_POST['total_vehicle']);
    $gravel = htmlentities($_POST['gravel']);
    $crushed_stone = htmlentities($_POST['crushed_stone']);
    $aggregate = htmlentities($_POST['aggregate']);
    $cement = htmlentities($_POST['cement']);
    $premix = htmlentities($_POST['premix']);
    $timber = htmlentities($_POST['timber']);
    $diesel = htmlentities($_POST['diesel']);
    $petrol = htmlentities($_POST['petrol']);
    $survey_location = htmlentities($_POST['survey_location']);
    $survey_purposes = htmlentities($_POST['survey_purposes']);
    $setting_out_location = htmlentities($_POST['setting_out_location']);
    $setting_out_purposes = htmlentities($_POST['setting_out_purposes']);
    $sampling_location = htmlentities($_POST['sampling_location']);
    $sampling_purposes = htmlentities($_POST['sampling_purposes']);
    $testing_location = htmlentities($_POST['testing_location']);
    $testing_purposes = htmlentities($_POST['testing_purposes']);
    $measurement_location = htmlentities($_POST['measurement_location']);
    $measurement_purposes = htmlentities($_POST['measurement_purposes']);
    $review_program_location = htmlentities($_POST['review_program_location']);
    $review_program_purposes = htmlentities($_POST['review_program_purposes']);
    $review_cost_location = htmlentities($_POST['review_cost_location']);
    $review_cost_purposes = htmlentities($_POST['review_cost_purposes']);
    $inspection_location = htmlentities($_POST['inspection_location']);
    $inspection_purposes = htmlentities($_POST['inspection_purposes']);
    $meeting_location = htmlentities($_POST['meeting_location']);
    $meeting_purposes = htmlentities($_POST['meeting_purposes']);
    $visitors_location = htmlentities($_POST['visitors_location']);
    $visitors_purposes = htmlentities($_POST['visitors_purposes']);
    $others_location = htmlentities($_POST['others_location']);
    $others_purposes = htmlentities($_POST['others_purposes']);
    $remarks = htmlentities($_POST['remarks']);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="noindex, nofollow">
    <link rel="stylesheet" href="css/main.css">
    <script src="./js/jquery-3.3.1.min.js"></script>
    <script src="./js/html2pdf.min.js"></script>
    <script src="./js/all.min.js"></script>
    <title>Irrigation Site Diary Preview - Injessview</title>

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

            //credit : https://ekoopmans.github.io/html2pdf.js

            var element = document.getElementById('content');

            //easy
            // html2pdf().from(element).save();

            //custom file name
            //html2pdf().set({filename: 'code_with_mark_'+js.AutoCode()+'.pdf'}).from(element).save();


            //more custom settings
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

            // New Promise-based usage:
            html2pdf().set(opt).from(element).save();
        });

    });
    </script>

</head>

<body>

    <button id="rep" class="btn_download" title="Download PDF"><i class="fas fa-download"></i></button>
    <div id="content">
        <table>

            <tr>
                <td colspan="10" class="center"><b>CONTRACT SITE DIARY FORM</b></td>
            </tr>

            <thead style="line-height: 30px; font-size:16px;">
                <caption>
                    MINISTRY OF FINANCE ECONOMIC PLANNING AND DEVELOPMENT<br>
                </caption>

                <td colspan="5"><b>DATE:</b> <?php echo $date; ?></td>
                <td colspan="5"><b>SHEET NO.:</b> <?php echo $sheet_no; ?></td>
            </thead>

            <!-- Site Data -->
            <tr>
                <td colspan="10" class="center">SITE DATA</b></td>
            </tr>
            <tr>
                <td colspan="3"><b>DEPARTMENT:</b> <?php echo $dept; ?></td>
                <td colspan="3"><b>REGION:</b> <?php echo $region; ?></td>
                <td colspan="4"><b>DISTRICT:</b> <?php echo $district; ?></td>
            </tr>
            <tr>
                <td colspan="10" style="height: 14px;"></td>
            </tr>
            <tr>
                <td colspan=" 5"><b>CONTRACT NO:</b> <?php echo $contract_no; ?></td>
                <td colspan="5"><b>CONTRACT TITLE:</b> <?php echo $contract_title; ?></td>
            </tr>
            <tr>
                <td colspan="5"><b>CONTRACTOR NAME:</b> <?php echo $contractor_name; ?></td>
                <td colspan="5"><b>CONSULTANT NAME:</b> <?php echo $consultant_name; ?></td>
            </tr>
            <tr>
                <td colspan="10" style="height: 14px;"></td>
            </tr>

            <!-- Daily Information -->
            <tr>
                <td colspan="10" class="center">DAILY INFORMATION</td>
            </tr>
            <tr>
                <td colspan="2"><b>DATE:</b> <?php echo $date_daily; ?></td>
                <td colspan="2"><b>DAY:</b> <?php echo $day; ?></td>
                <td colspan="2"><b>WORKING TIME</b></td>
                <td colspan="2"><b>FROM:</b> <?php echo $from; ?></td>
                <td colspan="2"><b>TO:</b> <?php echo $to; ?></td>
            </tr>
            <tr>
                <td colspan="4">WEATHER CONDITION</td>
                <td colspan="3"><b>RAIN:</b> <?php echo $rain; ?></td>
                <td colspan="3"><b>WORKING CONDITION:</b> <?php echo $working_condition; ?></td>
            </tr>

            <!-- Construction Activities -->
            <tr>
                <td colspan="10" class="center">CONSTRUCTION ACTIVITIES CONDUCTED</td>
            </tr>
            <tr>
                <td colspan="10" style="height:14px;"><?php echo $construction_activities; ?></td>
            </tr>

            <!-- Resources on Site -->
            <tr>
                <td colspan="10" class="center">RESOURCES ON SITE</td>
            </tr>

            <!-- Personnel -->
            <tr>
                <th>1</th>
                <th>PERSONNEL</th>
                <th>SITE AGENT</th>
                <th>SITE ENG</th>
                <th>FOREMAN</th>
                <th>DRIVER</th>
                <th>OPERATOR</th>
                <th>CRAFTSMAN</th>
                <th>UNSKILLED</th>
                <th>TOTAL</th>
            </tr>
            <tr>
                <td></td>
                <td>NUMBER</td>
                <td><?php echo $site_agent; ?></td>
                <td><?php echo $site_eng; ?></td>
                <td><?php echo $foreman; ?></td>
                <td><?php echo $driver; ?></td>
                <td><?php echo $operator; ?></td>
                <td><?php echo $craftsman; ?></td>
                <td><?php echo $unskilled; ?></td>
                <td><?php echo $total_personnel; ?></td>
            </tr>

            <!-- Plant & Vehicle -->
            <tr>
                <th colspan="1">2</th>
                <th colspan="1">PLANT & VEHICLE</th>
                <th colspan="1">HEAVY PLANT</th>
                <th colspan="1">LIGHT PLANT</th>
                <th colspan="1">HEAVY VEHICLE</th>
                <th colspan="1">LIGHT VEHICLE</th>
                <th colspan="1">MOTORBIKE</th>
                <th colspan="1">BICYCLE</th>
                <th colspan="1">OTHERS</th>
                <th colspan="1">TOTAL</th>
            </tr>
            <tr>
                <td colspan="1"></td>
                <td colspan="1">NUMBER</td>
                <td colspan="1"><?php echo $hvy_plant; ?></td>
                <td colspan="1"><?php echo $light_plant; ?></td>
                <td colspan="1"><?php echo $hvy_vehicle; ?></td>
                <td colspan="1"><?php echo $light_vehicle; ?></td>
                <td colspan="1"><?php echo $motorbike; ?></td>
                <td colspan="1"><?php echo $bicycle; ?></td>
                <td colspan="1"><?php echo $others_vehicle; ?></td>
                <td colspan="1"><?php echo $total_vehicle; ?></td>
            </tr>

            <!-- Materials -->
            <tr>
                <th colspan="1">3</th>
                <th colspan="1">MATERIALS</th>
                <th colspan="1">GRAVEL</th>
                <th colspan="1">CRUSHED STONE</th>
                <th colspan="1">AGGREGATE</th>
                <th colspan="1">CEMENT</th>
                <th colspan="1">PREMIX</th>
                <th colspan="1">TIMBER</th>
                <th colspan="1">DIESEL</th>
                <th colspan="1">PETROL</th>
            </tr>
            <tr>
                <td colspan="1"></td>
                <td colspan="1">QUANTITY</td>
                <td colspan="1"><?php echo $gravel; ?> cu.m</td>
                <td colspan="1"><?php echo $crushed_stone; ?> cu.m</td>
                <td colspan="1"><?php echo $aggregate; ?> cu.m</td>
                <td colspan="1"><?php echo $cement; ?> kg</td>
                <td colspan="1"><?php echo $premix; ?> kg</td>
                <td colspan="1"><?php echo $timber; ?> cu.m</td>
                <td colspan="1"><?php echo $diesel; ?> litres</td>
                <td colspan="1"><?php echo $petrol; ?> litres</td>
            </tr>

            <!-- Other Activities -->
            <tr>
                <td colspan="10" class="center">OTHER ACTIVITIES</td>
            </tr>
            <tr>
                <td colspan="1"></td>
                <td colspan="3"><b>CATEGORY</b></td>
                <td colspan="3"><b>LOCATION</b></td>
                <td colspan="3"><b>PURPOSES</b></td>
            </tr>
            <tr>
                <td colspan="1">1</td>
                <td colspan="3">SURVEY</td>
                <td colspan="3"><?php echo $survey_location; ?></td>
                <td colspan="3"><?php echo $survey_purposes; ?></td>
            </tr>
            <tr>
                <td colspan="1">2</td>
                <td colspan="3">SETTING OUT</td>
                <td colspan="3"><?php echo $setting_out_location; ?></td>
                <td colspan="3"><?php echo $setting_out_purposes; ?></td>
            </tr>
            <tr>
                <td colspan="1">3</td>
                <td colspan="3">SAMPLING</td>
                <td colspan="3"><?php echo $sampling_location; ?></td>
                <td colspan="3"><?php echo $sampling_purposes; ?></td>
            </tr>
            <tr>
                <td colspan="1">4</td>
                <td colspan="3">TESTING</td>
                <td colspan="3"><?php echo $testing_location; ?></td>
                <td colspan="3"><?php echo $testing_purposes; ?></td>
            </tr>
            <tr>
                <td colspan="1">5</td>
                <td colspan="3">MEASUREMENT</td>
                <td colspan="3"><?php echo $measurement_location; ?></td>
                <td colspan="3"><?php echo $measurement_purposes; ?></td>
            </tr>
            <tr>
                <td colspan="1">6</td>
                <td colspan="3">REVIEW PROGRAMME</td>
                <td colspan="3"><?php echo $review_program_location; ?></td>
                <td colspan="3"><?php echo $review_program_purposes; ?></td>
            </tr>
            <tr>
                <td colspan="1">7</td>
                <td colspan="3">REVIEW COST</td>
                <td colspan="3"><?php echo $review_cost_location; ?></td>
                <td colspan="3"><?php echo $review_cost_purposes; ?></td>
            </tr>
            <tr>
                <td colspan="1">8</td>
                <td colspan="3">INSPECTION</td>
                <td colspan="3"><?php echo $inspection_location; ?></td>
                <td colspan="3"><?php echo $inspection_purposes; ?></td>
            </tr>
            <tr>
                <td colspan="1">9</td>
                <td colspan="3">MEETING</td>
                <td colspan="3"><?php echo $meeting_location; ?></td>
                <td colspan="3"><?php echo $meeting_purposes; ?></td>
            </tr>
            <tr>
                <td colspan="1">10</td>
                <td colspan="3">VISITORS</td>
                <td colspan="3"><?php echo $visitors_location; ?></td>
                <td colspan="3"><?php echo $visitors_purposes; ?></td>
            </tr>
            <tr>
                <td colspan="1">11</td>
                <td colspan="3">OTHER</td>
                <td colspan="3"><?php echo $others_location; ?></td>
                <td colspan="3"><?php echo $others_purposes; ?></td>
            </tr>
            <!-- Remarks -->
            <tr>
                <td colspan="10" class="center" style="height: 14px;">REMARKS</td>
            </tr>
            <tr>
                <td colspan="10" style="height:14px;"><?php echo $remarks; ?></td>
            </tr>
        </table>
    </div>
</body>

</html>

<?php
}
?>