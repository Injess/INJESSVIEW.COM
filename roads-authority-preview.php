<?php
//set time zone for your country
date_default_timezone_set('Africa/Blantyre');
?>
<?php
if (isset($_POST['submit'])) {

  $date = htmlentities($_POST['date']);
  $sheet_no = htmlentities($_POST['sheet_no']);
  $ra_division = htmlentities($_POST['ra_division']);
  $region = htmlentities($_POST['region']);
  $district = htmlentities($_POST['district']);
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
        <caption>Roads Authority Maintenance Department Contract Site Diary Form</caption>

        <tr>
          <td colspan="5"><b>DATE:</b> <?php echo $date; ?></td>
          <td colspan="5"><b>SHEET NO.:</b> <?php echo $sheet_no; ?></td>
        </tr>
        <tr>
          <td colspan="10" class="center">SITE DATA</td>
        </tr>
        <tr>
          <td colspan="3"><b>RA DIVISION:</b> <?php echo $ra_division; ?></td>
          <td colspan="3"><b>REGION:</b> <?php echo $region; ?></td>
          <td colspan="4"><b>DISTRICT:</b> <?php echo $district; ?></td>
        </tr>
        <tr>
          <td colspan="5"><b>CONTRACT NO:</b> <?php echo $_POST['contract_no']; ?></td>
          <td colspan="5"><b>CONTRACT TITLE:</b> <?php echo $_POST['contract_title']; ?></td>
        </tr>
        <tr>
          <td colspan="5"><b>CONTRACTOR NAME:</b> <?php echo $_POST['contractor_name']; ?></td>
          <td colspan="5"><b>CONSULTANT NAME:</b> <?php echo $_POST['consultant_name']; ?></td>
        </tr>
        <tr>
          <td colspan="2"><b>ROAD NO:</b> <?php echo $_POST['road_no']; ?></td>
          <td colspan="2"><b>SECTION NO:</b> <?php echo $_POST['section_no']; ?></td>
          <td colspan="2"><b>FROM:</b> <?php echo $_POST['from']; ?></td>
          <td colspan="4"><b>TO:</b> <?php echo $_POST['to']; ?></td>
        </tr>
        <tr>
          <td colspan="10" class="center">DAILY FORMATION</td>
        </tr>
        <tr>
          <td colspan="2"><b>DATE:</b> <?php echo $_POST['date_daily']; ?></td>
          <td colspan="2"><b>DAY:</b> <?php echo $_POST['day']; ?></td>
          <td colspan="2"><b>WORKING TIME</b></td>
          <td colspan="2"><b>FROM:</b> <?php echo $_POST['from_daily']; ?></td>
          <td colspan="2"><b>TO:</b> <?php echo $_POST['to_daily']; ?></td>
        </tr>

        <tr>
          <td colspan="4">WEATHER CONDITION</td>
          <td colspan="3"><b>RAIN:</b> <?php echo $_POST['rain']; ?></td>
          <td colspan="3"><b>WORKING CONDITION:</b> <?php echo $_POST['working_condition']; ?></td>
        </tr>

        <tr>
          <td colspan="10" class="center">MAINTENANCE ACTIVITIES</td>
        </tr>

        <tr>
          <th colspan="1"></th>
          <th colspan="2">BOQ ITEM</th>
          <th colspan="4">DESCRIPTION</th>
          <th colspan="3">LOCATION</th>
        </tr>
        <tr>
          <td colspan="1">1</td>
          <td colspan="2"><?php echo $_POST['boq_item_1']; ?></td>
          <td colspan="4"><?php echo $_POST['description_1']; ?></td>
          <td colspan="3"><?php echo $_POST['location_1']; ?></td>
        </tr>
        <tr>
          <td colspan="1">2</td>
          <td colspan="2"><?php echo $_POST['boq_item_2']; ?></td>
          <td colspan="4"><?php echo $_POST['description_2']; ?></td>
          <td colspan="3"><?php echo $_POST['location_2']; ?></td>
        </tr>
        <tr>
          <td colspan="1">3</td>
          <td colspan="2"><?php echo $_POST['boq_item_3']; ?></td>
          <td colspan="4"><?php echo $_POST['description_3']; ?></td>
          <td colspan="3"><?php echo $_POST['location_3']; ?></td>
        </tr>

        <tr>
          <td colspan="10" class="center">RESOURCES ON SITE</td>
        </tr>

        <!-- Personnel -->
        <tr>
          <th>1</th>
          <th>PERSONNEL</th>
          <th>SITE AG</th>
          <th>SITE ENG</th>
          <th>FOREMAN</th>
          <th>DRIVER</th>
          <th>OPERATOR</th>
          <th>CRAFTMAN</th>
          <th>UNSKILLED</th>
          <th>TOTAL</th>
        </tr>
        <tr>
          <td></td>
          <td>NUMBER</td>
          <td><?php echo $_POST['site_ag']; ?></td>
          <td><?php echo $_POST['site_eng']; ?></td>
          <td><?php echo $_POST['foreman']; ?></td>
          <td><?php echo $_POST['driver']; ?></td>
          <td><?php echo $_POST['operator']; ?></td>
          <td><?php echo $_POST['craftman']; ?></td>
          <td><?php echo $_POST['unskilled']; ?></td>
          <td><?php echo (int)$_POST['site_ag'] + (int)$_POST['site_eng'] + (int)$_POST['foreman'] + (int)$_POST['driver'] + (int)$_POST['operator'] + (int)$_POST['craftman'] + (int)$_POST['unskilled']; ?></td>
        </tr>

        <!-- Plant and Vehicle -->
        <tr>
          <th colspan="1">2</th>
          <th colspan="2">PLANT & VEHICLE</th>
          <th colspan="1">PLANT</th>
          <th colspan="1">HEVY VEH.</th>
          <th colspan="1">VEH.</th>
          <th colspan="1">MOTORBIKE</th>
          <th colspan="1">BICYCLE</th>
          <th colspan="1">OTHERS</th>
          <th colspan="1">TOTAL</th>
        </tr>
        <tr>
          <td colspan="1"></td>
          <td colspan="2">NUMBER</td>
          <td colspan="1"><?php echo $_POST['plant']; ?></td>
          <td colspan="1"><?php echo $_POST['hvy_veh']; ?></td>
          <td colspan="1"><?php echo $_POST['veh']; ?></td>
          <td colspan="1"><?php echo $_POST['motorbike']; ?></td>
          <td colspan="1"><?php echo $_POST['bicycle']; ?></td>
          <td colspan="1"><?php echo $_POST['others']; ?></td>
          <td colspan="1"><?php echo (int)$_POST['plant'] + (int)$_POST['hvy_veh'] + (int)$_POST['veh'] + (int)$_POST['motorbike'] + (int)$_POST['bicycle'] + (int)$_POST['others']; ?></td>
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
          <td colspan="1"><?php echo $_POST['gravel']; ?> cu.m</td>
          <td colspan="1"><?php echo $_POST['crushed_stone']; ?> cu.m</td>
          <td colspan="1"><?php echo $_POST['aggregate']; ?> cu.m</td>
          <td colspan="1"><?php echo $_POST['cement']; ?> kg</td>
          <td colspan="1"><?php echo $_POST['premix']; ?> kg</td>
          <td colspan="1"><?php echo $_POST['timber']; ?> cu.m</td>
          <td colspan="1"><?php echo $_POST['diesel']; ?> litres</td>
          <td colspan="1"><?php echo $_POST['petrol']; ?> litres</td>
        </tr>

        <tr>
          <td colspan="10" class="center">OTHER ACTIVITIES</td>
        </tr>

        <tr>
          <th colspan="1"></th>
          <th colspan="3">TYPE</th>
          <th colspan="3">LOCATION</th>
          <th colspan="3">PURPOSES</th>
        </tr>

        <tr>
          <td colspan="1">1</td>
          <td colspan="3">SURVEY</td>
          <td colspan="3"><?php echo $_POST['survey_location']; ?></td>
          <td colspan="3"><?php echo $_POST['survey_purposes']; ?></td>
        </tr>
        <tr>
          <td colspan="1">2</td>
          <td colspan="3">SETTING - OUT</td>
          <td colspan="3"><?php echo $_POST['setting_out_location']; ?></td>
          <td colspan="3"><?php echo $_POST['setting_out_purposes']; ?></td>
        </tr>
        <tr>
          <td colspan="1">3</td>
          <td colspan="3">SAMPLING</td>
          <td colspan="3"><?php echo $_POST['sampling_location']; ?></td>
          <td colspan="3"><?php echo $_POST['sampling_purposes']; ?></td>
        </tr>
        <tr>
          <td colspan="1">4</td>
          <td colspan="3">TESTING</td>
          <td colspan="3"><?php echo $_POST['testing_location']; ?></td>
          <td colspan="3"><?php echo $_POST['testing_purposes']; ?></td>
        </tr>
        <tr>
          <td colspan="1">5</td>
          <td colspan="3">MEASUREMENT</td>
          <td colspan="3"><?php echo $_POST['measurement_location']; ?></td>
          <td colspan="3"><?php echo $_POST['measurement_purposes']; ?></td>
        </tr>
        <tr>
          <td colspan="1">6</td>
          <td colspan="3">REVIEW PROGRAM</td>
          <td colspan="3"><?php echo $_POST['review_program_location']; ?></td>
          <td colspan="3"><?php echo $_POST['review_program_purposes']; ?></td>
        </tr>
        <tr>
          <td colspan="1">7</td>
          <td colspan="3">REVIEW COST</td>
          <td colspan="3"><?php echo $_POST['review_cost_location']; ?></td>
          <td colspan="3"><?php echo $_POST['review_cost_purposes']; ?></td>
        </tr>
        <tr>
          <td colspan="1">8</td>
          <td colspan="3">INSPECTION</td>
          <td colspan="3"><?php echo $_POST['inspection_location']; ?></td>
          <td colspan="3"><?php echo $_POST['inspection_purposes']; ?></td>
        </tr>
        <tr>
          <td colspan="1">9</td>
          <td colspan="3">MEETING</td>
          <td colspan="3"><?php echo $_POST['meeting_location']; ?></td>
          <td colspan="3"><?php echo $_POST['meeting_purposes']; ?></td>
        </tr>
        <tr>
          <td colspan="1">10</td>
          <td colspan="3">VISITORS</td>
          <td colspan="3"><?php echo $_POST['visitors_location']; ?></td>
          <td colspan="3"><?php echo $_POST['visitors_purposes']; ?></td>
        </tr>
        <tr>
          <td colspan="1">11</td>
          <td colspan="3">OTHERS</td>
          <td colspan="3"><?php echo $_POST['others_location']; ?></td>
          <td colspan="3"><?php echo $_POST['others_purposes']; ?></td>
        </tr>

        <tr>
          <td colspan="10" class="center">REMARKS</td>
        </tr>
        <tr>
          <td colspan="10"><?php echo $_POST['remarks']; ?></td>
        </tr>
      </table>
    </div>
  </body>

  </html>

<?php
}
?>