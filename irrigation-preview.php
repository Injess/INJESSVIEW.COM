<?php
// Set time zone
date_default_timezone_set('Africa/Blantyre');

if ($_SERVER['REQUEST_METHOD'] !== 'POST' || !isset($_POST['submit'])) {
    header('Location: irrigation-site-diary');
    exit;
}

function sanitizeValue($data)
{
    if (is_array($data)) {
        return array_map('sanitizeValue', $data);
    }

    return is_string($data) ? htmlspecialchars(trim($data), ENT_QUOTES, 'UTF-8') : '';
}

function field($key)
{
    return sanitizeValue($_POST[$key] ?? '');
}

$otherActivities = [
    ['no' => 1, 'category' => 'Survey', 'location' => field('survey_location'), 'purpose' => field('survey_purposes')],
    ['no' => 2, 'category' => 'Setting Out', 'location' => field('setting_out_location'), 'purpose' => field('setting_out_purposes')],
    ['no' => 3, 'category' => 'Sampling', 'location' => field('sampling_location'), 'purpose' => field('sampling_purposes')],
    ['no' => 4, 'category' => 'Testing', 'location' => field('testing_location'), 'purpose' => field('testing_purposes')],
    ['no' => 5, 'category' => 'Measurement', 'location' => field('measurement_location'), 'purpose' => field('measurement_purposes')],
    ['no' => 6, 'category' => 'Review Programme', 'location' => field('review_program_location'), 'purpose' => field('review_program_purposes')],
    ['no' => 7, 'category' => 'Review Cost', 'location' => field('review_cost_location'), 'purpose' => field('review_cost_purposes')],
    ['no' => 8, 'category' => 'Inspection', 'location' => field('inspection_location'), 'purpose' => field('inspection_purposes')],
    ['no' => 9, 'category' => 'Meeting', 'location' => field('meeting_location'), 'purpose' => field('meeting_purposes')],
    ['no' => 10, 'category' => 'Visitors', 'location' => field('visitors_location'), 'purpose' => field('visitors_purposes')],
    ['no' => 11, 'category' => 'Other', 'location' => field('others_location'), 'purpose' => field('others_purposes')]
];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="noindex, nofollow">
    <title>Irrigation Site Diary Preview - Injessview</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="./js/jquery-3.3.1.min.js"></script>
    <script src="./js/html2pdf.min.js"></script>
    <script src="./js/all.min.js"></script>
    <script src="./js/diary-branding.js"></script>
    <style>
        body {
            background: #f3f3f3;
            color: #111;
        }

        .preview-toolbar {
            position: sticky;
            top: 0;
            z-index: 300;
            background: #fff;
            border-bottom: 1px solid #d8d8d8;
            padding: 0.7rem 1rem;
            display: flex;
            align-items: center;
            gap: 0.55rem;
        }

        .preview-toolbar .brand {
            color: #111;
            font-weight: 800;
            text-decoration: none;
            margin-right: auto;
            font-size: 0.95rem;
            letter-spacing: 0.3px;
        }

        .preview-toolbar .btn-action {
            border: 1px solid #111;
            color: #111;
            background: #fff;
            border-radius: 999px;
            font-size: 0.82rem;
            padding: 0.33rem 0.85rem;
            text-decoration: none;
            font-weight: 600;
        }

        .preview-toolbar .btn-action:hover {
            background: #111;
            color: #fff;
        }

        #content {
            max-width: 980px;
            margin: 1.2rem auto 2.2rem;
            background: #fff;
            border: 1px solid #d7d7d7;
            border-radius: 14px;
            box-shadow: 0 10px 28px rgba(0, 0, 0, 0.07);
            overflow: hidden;
        }

        .branding-header {
            padding: 1.2rem 1.6rem;
            border-bottom: 2px solid #111;
            text-align: center;
        }

        .branding-logo {
            max-height: 78px;
            max-width: 180px;
            object-fit: contain;
            margin: 0 auto 0.55rem;
            display: block;
        }

        .branding-name {
            font-size: 1.25rem;
            font-weight: 800;
            letter-spacing: 0.4px;
            text-transform: uppercase;
            margin: 0;
        }

        .branding-subtitle {
            margin: 0.2rem 0 0;
            color: #4b4b4b;
            font-size: 0.9rem;
            font-weight: 600;
        }

        .meta-grid {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 0.6rem;
            padding: 1rem 1.4rem;
            border-bottom: 1px solid #dedede;
            background: #fafafa;
        }

        .meta-item {
            border: 1px solid #d9d9d9;
            border-radius: 9px;
            padding: 0.5rem 0.7rem;
            background: #fff;
        }

        .meta-item .label {
            font-size: 0.68rem;
            text-transform: uppercase;
            color: #5a5a5a;
            letter-spacing: 0.7px;
            font-weight: 700;
        }

        .meta-item .value {
            font-size: 0.95rem;
            font-weight: 700;
            color: #111;
            margin-top: 0.1rem;
        }

        .doc-section {
            padding: 1rem 1.4rem;
            border-bottom: 1px solid #ececec;
        }

        .doc-section:last-child {
            border-bottom: none;
        }

        .section-title {
            font-size: 0.72rem;
            text-transform: uppercase;
            letter-spacing: 1px;
            color: #222;
            font-weight: 800;
            border-bottom: 1px solid #d8d8d8;
            padding-bottom: 0.4rem;
            margin-bottom: 0.7rem;
        }

        .report-table {
            width: 100%;
            border-collapse: collapse;
            font-size: 0.84rem;
        }

        .report-table th,
        .report-table td {
            border: 1px solid #cfcfcf;
            padding: 0.45rem 0.5rem;
            vertical-align: top;
            color: #111;
        }

        .report-table thead th,
        .report-table .row-head {
            background: #f1f1f1;
            font-weight: 800;
            text-transform: uppercase;
            font-size: 0.72rem;
            letter-spacing: 0.5px;
        }

        .remarks-box {
            border: 1px solid #d4d4d4;
            border-radius: 8px;
            padding: 0.7rem;
            min-height: 72px;
            white-space: pre-wrap;
            background: #fff;
            font-size: 0.87rem;
        }

        @media print {
            .preview-toolbar {
                display: none !important;
            }

            body {
                background: #fff;
            }

            #content {
                margin: 0;
                border: none;
                border-radius: 0;
                box-shadow: none;
                max-width: none;
            }
        }
    </style>
</head>

<body>
<div class="preview-toolbar">
    <a href="irrigation-site-diary" class="brand" id="preview-toolbar-brand-irrigation">Irrigation Site Diary Preview</a>
    <a href="irrigation-site-diary" class="btn-action">← Back to Form</a>
    <button id="btn-dl" class="btn-action" type="button"><i class="fas fa-download"></i> Download PDF</button>
</div>

<div id="content">
    <div class="branding-header">
        <img id="preview-branding-logo-irrigation" alt="Organization Logo" class="branding-logo" style="display:none;" onerror="this.style.display='none'">
        <p id="preview-branding-name-irrigation" class="branding-name" style="display:none;"></p>
        <p class="branding-subtitle">Irrigation Contract Site Diary</p>
    </div>

    <div class="meta-grid">
        <div class="meta-item">
            <div class="label">Date</div>
            <div class="value"><?= field('date') ?: '—' ?></div>
        </div>
        <div class="meta-item">
            <div class="label">Sheet No.</div>
            <div class="value"><?= field('sheet_no') ?: '—' ?></div>
        </div>
    </div>

    <div class="doc-section">
        <div class="section-title">Site Data</div>
        <table class="report-table">
            <tbody>
                <tr>
                    <td><strong>Department:</strong> <?= field('dept') ?></td>
                    <td><strong>Region:</strong> <?= field('region') ?></td>
                    <td><strong>District:</strong> <?= field('district') ?></td>
                </tr>
                <tr>
                    <td><strong>Contract No:</strong> <?= field('contract_no') ?></td>
                    <td colspan="2"><strong>Contract Title:</strong> <?= field('contract_title') ?></td>
                </tr>
                <tr>
                    <td><strong>Contractor Name:</strong> <?= field('contractor_name') ?></td>
                    <td colspan="2"><strong>Consultant Name:</strong> <?= field('consultant_name') ?></td>
                </tr>
            </tbody>
        </table>
    </div>

    <div class="doc-section">
        <div class="section-title">Daily Information</div>
        <table class="report-table">
            <tbody>
                <tr>
                    <td><strong>Date:</strong> <?= field('date_daily') ?></td>
                    <td><strong>Day:</strong> <?= field('day') ?></td>
                    <td><strong>Working Time:</strong> <?= field('working_time_from') ?> to <?= field('working_time_to') ?></td>
                </tr>
                <tr>
                    <td><strong>Weather Condition:</strong> Rain <?= field('rain') ?></td>
                    <td colspan="2"><strong>Working Condition:</strong> <?= field('working_condition') ?></td>
                </tr>
            </tbody>
        </table>
    </div>

    <div class="doc-section">
        <div class="section-title">Construction Activities Conducted</div>
        <div class="remarks-box"><?= field('construction_activities') ?: 'No activities submitted.' ?></div>
    </div>

    <div class="doc-section">
        <div class="section-title">Resources on Site</div>
        <table class="report-table">
            <thead>
                <tr>
                    <th class="row-head" colspan="10">Personnel</th>
                </tr>
                <tr>
                    <th>#</th>
                    <th>Site Agent</th>
                    <th>Site Eng</th>
                    <th>Foreman</th>
                    <th>Driver</th>
                    <th>Operator</th>
                    <th>Craftsman</th>
                    <th>Unskilled</th>
                    <th colspan="2">Total</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td><?= field('site_agent') ?></td>
                    <td><?= field('site_eng') ?></td>
                    <td><?= field('foreman') ?></td>
                    <td><?= field('driver') ?></td>
                    <td><?= field('operator') ?></td>
                    <td><?= field('craftsman') ?></td>
                    <td><?= field('unskilled') ?></td>
                    <td colspan="2"><?= field('total_personnel') ?></td>
                </tr>
            </tbody>
            <thead>
                <tr>
                    <th class="row-head" colspan="10">Plant & Vehicle</th>
                </tr>
                <tr>
                    <th>#</th>
                    <th>Heavy Plant</th>
                    <th>Light Plant</th>
                    <th>Heavy Vehicle</th>
                    <th>Light Vehicle</th>
                    <th>Motorbike</th>
                    <th>Bicycle</th>
                    <th>Others</th>
                    <th colspan="2">Total</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>2</td>
                    <td><?= field('hvy_plant') ?></td>
                    <td><?= field('light_plant') ?></td>
                    <td><?= field('hvy_vehicle') ?></td>
                    <td><?= field('light_vehicle') ?></td>
                    <td><?= field('motorbike') ?></td>
                    <td><?= field('bicycle') ?></td>
                    <td><?= field('others_vehicle') ?></td>
                    <td colspan="2"><?= field('total_vehicle') ?></td>
                </tr>
            </tbody>
            <thead>
                <tr>
                    <th class="row-head" colspan="10">Materials</th>
                </tr>
                <tr>
                    <th>#</th>
                    <th>Gravel</th>
                    <th>Crushed Stone</th>
                    <th>Aggregate</th>
                    <th>Cement</th>
                    <th>Premix</th>
                    <th>Timber</th>
                    <th>Diesel</th>
                    <th colspan="2">Petrol</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>3</td>
                    <td><?= field('gravel') ?> cu.m</td>
                    <td><?= field('crushed_stone') ?> cu.m</td>
                    <td><?= field('aggregate') ?> cu.m</td>
                    <td><?= field('cement') ?> kg</td>
                    <td><?= field('premix') ?> kg</td>
                    <td><?= field('timber') ?> cu.m</td>
                    <td><?= field('diesel') ?> litres</td>
                    <td colspan="2"><?= field('petrol') ?> litres</td>
                </tr>
            </tbody>
        </table>
    </div>

    <div class="doc-section">
        <div class="section-title">Other Activities</div>
        <table class="report-table">
            <thead>
                <tr>
                    <th style="width:6%">#</th>
                    <th style="width:22%">Category</th>
                    <th>Location</th>
                    <th>Purpose</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($otherActivities as $activity): ?>
                    <tr>
                        <td><?= $activity['no'] ?></td>
                        <td><?= $activity['category'] ?></td>
                        <td><?= $activity['location'] ?></td>
                        <td><?= $activity['purpose'] ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <div class="doc-section">
        <div class="section-title">Remarks</div>
        <div class="remarks-box"><?= field('remarks') ?: 'No remarks submitted.' ?></div>
    </div>
</div>

<script>
    (function () {
        if (window.DiaryBranding && typeof window.DiaryBranding.readProfile === 'function') {
            var profile = window.DiaryBranding.readProfile() || {};
            var orgName = String(profile.orgName || '').trim();
            var logoData = String(profile.logoData || '').trim();

            var toolbarBrand = document.getElementById('preview-toolbar-brand-irrigation');
            var logoElement = document.getElementById('preview-branding-logo-irrigation');
            var nameElement = document.getElementById('preview-branding-name-irrigation');

            if (orgName) {
                if (toolbarBrand) {
                    toolbarBrand.textContent = orgName;
                }
                if (nameElement) {
                    nameElement.textContent = orgName;
                    nameElement.style.display = 'block';
                }
            }

            if (logoData && logoElement) {
                logoElement.src = logoData;
                logoElement.style.display = 'block';
            }
        }

        function formattedDateToken() {
            var currentDate = new Date();
            var day = String(currentDate.getDate()).padStart(2, '0');
            var month = String(currentDate.getMonth() + 1).padStart(2, '0');
            var year = String(currentDate.getFullYear());
            var hours = String(currentDate.getHours()).padStart(2, '0');
            var minutes = String(currentDate.getMinutes()).padStart(2, '0');
            var seconds = String(currentDate.getSeconds()).padStart(2, '0');

            return day + month + year + hours + minutes + seconds;
        }

        document.getElementById('btn-dl').addEventListener('click', function () {
            var filename = 'irrigation-site-diary-' + formattedDateToken() + '.pdf';
            html2pdf().set({
                margin: 0.4,
                filename: filename,
                image: { type: 'jpeg', quality: 0.98 },
                html2canvas: { scale: 2, useCORS: true },
                jsPDF: { unit: 'in', format: 'letter', orientation: 'portrait' }
            }).from(document.getElementById('content')).save();
        });
    })();
</script>
<script src="js/bootstrap.bundle.min.js"></script>
</body>

</html>
