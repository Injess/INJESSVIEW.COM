<?php
// Set time zone
date_default_timezone_set('Africa/Blantyre');

if ($_SERVER['REQUEST_METHOD'] !== 'POST' || !isset($_POST['submit'])) {
    header('Location: building-site-diary');
    exit;
}

function sanitizeValue($data)
{
    if (is_array($data)) {
        return array_map('sanitizeValue', $data);
    }

    return is_string($data) ? htmlspecialchars($data, ENT_QUOTES, 'UTF-8') : '';
}

function getArrayValue($data, $index)
{
    return isset($data[$index]) ? $data[$index] : '';
}

function sanitizeLogoData($data)
{
    if (!is_string($data) || $data === '') {
        return '';
    }

    $trimmed = trim($data);
    if (strlen($trimmed) > 850000) {
        return '';
    }

    if (!preg_match('/^data:image\/(png|jpe?g|webp);base64,[A-Za-z0-9+\/=\r\n]+$/', $trimmed)) {
        return '';
    }

    return $trimmed;
}

$site = sanitizeValue($_POST['site'] ?? '');
$sheet_no = sanitizeValue($_POST['sheet_no'] ?? '');
$area = sanitizeValue($_POST['area'] ?? '');
$contract_name = sanitizeValue($_POST['contract_name'] ?? '');
$contract_no = sanitizeValue($_POST['contract_no'] ?? '');
$contractor = sanitizeValue($_POST['contractor'] ?? '');
$weather = sanitizeValue($_POST['weather'] ?? '');
$incidents = sanitizeValue($_POST['incidents'] ?? '');
$working_conditions = sanitizeValue($_POST['working_conditions'] ?? '');
$satisfaction = sanitizeValue($_POST['satisfaction'] ?? '');
$remarks = sanitizeValue($_POST['remarks'] ?? '');
$authorised = sanitizeValue($_POST['authorised'] ?? '');
$position = sanitizeValue($_POST['position'] ?? '');
$signature = sanitizeValue($_POST['signature'] ?? '');
$signed_date = sanitizeValue($_POST['signed_date'] ?? '');

$visitor_name = sanitizeValue($_POST['visitor_name'] ?? []);
$visitor_position = sanitizeValue($_POST['visitor_position'] ?? []);
$visitor_organization = sanitizeValue($_POST['visitor_organization'] ?? []);

$plant_item = sanitizeValue($_POST['plant_item'] ?? []);
$plant_added = sanitizeValue($_POST['plant_added'] ?? []);
$plant_removed = sanitizeValue($_POST['plant_removed'] ?? []);
$plant_total = sanitizeValue($_POST['plant_total'] ?? []);
$plant_remarks = sanitizeValue($_POST['plant_remarks'] ?? []);

$personnel_item = sanitizeValue($_POST['personnel_item'] ?? []);
$personnel_added = sanitizeValue($_POST['personnel_added'] ?? []);
$personnel_removed = sanitizeValue($_POST['personnel_removed'] ?? []);
$personnel_total = sanitizeValue($_POST['personnel_total'] ?? []);
$personnel_remarks = sanitizeValue($_POST['personnel_remarks'] ?? []);

$materials_item = sanitizeValue($_POST['materials_item'] ?? []);
$materials_added = sanitizeValue($_POST['materials_added'] ?? []);
$materials_removed = sanitizeValue($_POST['materials_removed'] ?? []);
$materials_total = sanitizeValue($_POST['materials_total'] ?? []);
$materials_remarks = sanitizeValue($_POST['materials_remarks'] ?? []);

$other_item = sanitizeValue($_POST['other_item'] ?? []);
$other_added = sanitizeValue($_POST['other_added'] ?? []);
$other_removed = sanitizeValue($_POST['other_removed'] ?? []);
$other_total = sanitizeValue($_POST['other_total'] ?? []);
$other_remarks = sanitizeValue($_POST['other_remarks'] ?? []);

$work_details = sanitizeValue($_POST['work_details'] ?? []);
$work_started = sanitizeValue($_POST['work_started'] ?? []);
$work_restarted = sanitizeValue($_POST['work_restarted'] ?? []);
$work_completed = sanitizeValue($_POST['work_completed'] ?? []);

$work_issues_details = sanitizeValue($_POST['work_issues_details'] ?? []);
$work_suspended = sanitizeValue($_POST['work_suspended'] ?? []);
$work_delayed = sanitizeValue($_POST['work_delayed'] ?? []);
$work_stopped = sanitizeValue($_POST['work_stopped'] ?? []);
$potential_claims = sanitizeValue($_POST['potential_claims'] ?? []);

$organizationName = sanitizeValue($_POST['branding_org_name'] ?? '') ?: 'INJESSVIEW';
$brandingLogo = sanitizeLogoData($_POST['branding_logo_data'] ?? '');
$logoSource = $brandingLogo !== '' ? $brandingLogo : 'img/INVI_LOGO.png';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="noindex, nofollow">
    <title>Building Site Diary Preview – Injessview</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/main.css">
    <script src="./js/jquery-3.3.1.min.js"></script>
    <script src="./js/html2pdf.min.js"></script>
    <script src="./js/all.min.js"></script>
    <style>
        body { background: #f3f3f3; color: #111; }

        /* ── Toolbar (hidden in PDF) ───────────────────────── */
        .preview-toolbar {
            position: sticky;
            top: 0;
            z-index: 200;
            background: #fff;
            border-bottom: 1px solid #d8d8d8;
            padding: 0.7rem 1.5rem;
            display: flex;
            align-items: center;
            gap: 0.65rem;
            box-shadow: 0 2px 14px rgba(0, 0, 0, .08);
        }
        .preview-toolbar .brand {
            color: #111;
            font-weight: 800;
            font-size: 1.05rem;
            text-decoration: none;
            margin-right: auto;
            letter-spacing: .5px;
        }
        .preview-toolbar .btn-back {
            background: #fff;
            color: #111;
            border: 1px solid #111;
            font-size: .85rem;
            border-radius: 50px;
            padding: .35rem .9rem;
            text-decoration: none;
            transition: background .2s;
        }
        .preview-toolbar .btn-back:hover { background: #111; color: #fff; }
        .preview-toolbar .btn-dl {
            background: #fff;
            color: #111;
            border: 1px solid #111;
            font-weight: 700;
            font-size: .85rem;
            border-radius: 50px;
            padding: .35rem .9rem;
            cursor: pointer;
            transition: box-shadow .2s;
        }
        .preview-toolbar .btn-dl:hover { background: #111; color: #fff; box-shadow: 0 4px 14px rgba(0,0,0,.15); }

        /* ── Document card ─────────────────────────────────── */
        #content {
            max-width: 960px;
            margin: 2rem auto 3rem;
            background: #fff;
            border-radius: 1rem;
            border: 1px solid #d7d7d7;
            box-shadow: 0 10px 28px rgba(0, 0, 0, .07);
            overflow: hidden;
        }

        /* ── Document header ───────────────────────────────── */
        .doc-header {
            background: #fff;
            color: #111;
            border-bottom: 2px solid #111;
            padding: 2rem 2.5rem 1.6rem;
            text-align: center;
        }
        .doc-header h1 { font-size: 1.35rem; font-weight: 800; letter-spacing: .5px; margin: .35rem 0 .2rem; }
        .doc-header h2 { font-size: .95rem; font-weight: 500; color: #4b4b4b; margin: 0; }
        .brand-logo {
            max-height: 78px;
            max-width: 180px;
            object-fit: contain;
            margin: 0 auto;
            display: block;
        }
        .firm-name {
            margin: .55rem 0 0;
            text-transform: uppercase;
            font-size: 1.22rem;
            font-weight: 800;
            letter-spacing: .4px;
        }

        /* ── Meta strip ────────────────────────────────────── */
        .doc-meta {
            display: flex;
            flex-wrap: wrap;
            gap: .65rem 2rem;
            padding: 1.1rem 2.5rem;
            background: #fafafa;
            border-bottom: 1px solid #dedede;
        }
        .doc-meta-item .lbl {
            font-size: .67rem;
            text-transform: uppercase;
            letter-spacing: .8px;
            color: #5a5a5a;
            font-weight: 700;
            display: block;
        }
        .doc-meta-item .val {
            font-size: .92rem;
            font-weight: 700;
            color: #111;
        }

        /* ── Sections ──────────────────────────────────────── */
        .doc-section {
            padding: 1.5rem 2.5rem;
            border-bottom: 1px solid #ececec;
        }
        .doc-section:last-child { border-bottom: none; }
        .s-heading {
            font-size: .68rem;
            text-transform: uppercase;
            letter-spacing: 1px;
            color: #222;
            font-weight: 800;
            margin-bottom: 1rem;
            padding-bottom: .4rem;
            border-bottom: 1px solid #d8d8d8;
        }

        /* ── Sub-category label ────────────────────────────── */
        .sub-label {
            font-size: .75rem;
            text-transform: uppercase;
            letter-spacing: .5px;
            font-weight: 700;
            color: #222;
            margin: 1rem 0 .5rem;
        }
        .sub-label:first-child { margin-top: 0; }

        /* ── Tables ────────────────────────────────────────── */
        .preview-table {
            width: 100%;
            border-collapse: collapse;
            font-size: .86rem;
            margin-bottom: 1.25rem;
        }
        .preview-table:last-child { margin-bottom: 0; }
        .preview-table thead th {
            background: #f1f1f1;
            color: #111;
            font-weight: 800;
            padding: .55rem .85rem;
            border: 1px solid #cfcfcf;
            text-transform: uppercase;
            font-size: .72rem;
            letter-spacing: .5px;
        }
        .preview-table tbody td {
            padding: .55rem .85rem;
            border: 1px solid #cfcfcf;
            vertical-align: top;
            color: #111;
        }
        .preview-table tbody tr:nth-child(even) td { background: #fafafa; }

        /* ── Info grid ─────────────────────────────────────── */
        .info-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: .75rem 2.5rem;
        }
        .info-pair .lbl {
            font-size: .67rem;
            text-transform: uppercase;
            letter-spacing: .8px;
            color: #5a5a5a;
            font-weight: 700;
            display: block;
            margin-bottom: .15rem;
        }
        .info-pair .val { font-size: .95rem; font-weight: 600; color: #111; }

        /* ── Status badges ─────────────────────────────────── */
        .sbadge {
            display: inline-block;
            font-size: .7rem;
            font-weight: 700;
            padding: .18rem .55rem;
            border-radius: 50px;
            text-transform: uppercase;
            letter-spacing: .4px;
        }
        .sb-started,
        .sb-restarted,
        .sb-completed,
        .sb-suspended,
        .sb-delayed,
        .sb-stopped,
        .sb-claim,
        .sb-yes,
        .sb-no { background: #efefef; color: #111; border: 1px solid #cfcfcf; }

        /* ── Signature boxes ───────────────────────────────── */
        .sig-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 1rem; }
        .sig-box {
            border: 1px solid #d4d4d4;
            border-radius: .75rem;
            padding: 1rem 1.25rem;
            background: #fff;
        }
        .sig-box .sig-name { font-size: 1.05rem; font-weight: 700; color: #111; margin-top: .2rem; }
        .sig-box .sig-role { font-size: .85rem; color: #4b4b4b; margin-top: .1rem; }
        .sig-box .sig-line {
            border-top: 2px solid #111;
            margin-top: .9rem;
            padding-top: .65rem;
            font-size: .85rem;
            color: #111;
        }

        /* ── Print optimisations ───────────────────────────── */
        @media print {
            .preview-toolbar { display: none !important; }
            body { background: #fff; }
            #content { box-shadow: none; margin: 0; border-radius: 0; }
            .doc-section { padding: 1rem 1.5rem; }
        }
    </style>
</head>

<body>

<!-- Toolbar -->
<div class="preview-toolbar">
    <a href="building-site-diary" class="brand"><?= $organizationName ?></a>
    <a href="building-site-diary" class="btn-back">← Back to Form</a>
    <button id="btn-dl" class="btn-dl"><i class="fas fa-download"></i> Download PDF</button>
</div>

<!-- Document -->
<div id="content">

    <!-- Header -->
    <div class="doc-header">
        <img src="<?= $logoSource ?>" alt="Organization Logo" class="brand-logo" onerror="this.style.display='none'">
        <p class="firm-name"><?= $organizationName ?></p>
        <h1>CONTRACT SITE DIARY FORM</h1>
        <h2>Building Works — Daily Field Report</h2>
    </div>

    <!-- Meta strip -->
    <div class="doc-meta">
        <div class="doc-meta-item">
            <span class="lbl">Sheet No.</span>
            <span class="val"><?= $sheet_no ?: '—' ?></span>
        </div>
        <div class="doc-meta-item">
            <span class="lbl">Site</span>
            <span class="val"><?= $site ?: '—' ?></span>
        </div>
        <div class="doc-meta-item">
            <span class="lbl">Area</span>
            <span class="val"><?= $area ?: '—' ?></span>
        </div>
        <div class="doc-meta-item">
            <span class="lbl">Daily Weather</span>
            <span class="val"><?= $weather ? ucfirst($weather) : '—' ?></span>
        </div>
    </div>

    <!-- Contract Information -->
    <div class="doc-section">
        <div class="s-heading">Contract Information</div>
        <div class="info-grid">
            <div class="info-pair" style="grid-column: 1 / -1;">
                <span class="lbl">Contract Name</span>
                <span class="val"><?= $contract_name ?: '—' ?></span>
            </div>
            <div class="info-pair">
                <span class="lbl">Contract No.</span>
                <span class="val"><?= $contract_no ?: '—' ?></span>
            </div>
            <div class="info-pair">
                <span class="lbl">Contractor</span>
                <span class="val"><?= $contractor ?: '—' ?></span>
            </div>
        </div>
    </div>

    <!-- Visitors -->
    <div class="doc-section">
        <div class="s-heading">Visitors</div>
        <?php
        $hasVisitors = !empty($visitor_name) && !(count($visitor_name) === 1 && $visitor_name[0] === '');
        if (!$hasVisitors):
        ?>
            <p class="text-muted mb-0" style="font-size:.875rem;">No visitors recorded.</p>
        <?php else: ?>
        <table class="preview-table">
            <thead>
                <tr>
                    <th style="width:3%">#</th>
                    <th>Name</th>
                    <th>Position</th>
                    <th>Organisation</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($visitor_name as $i => $name):
                    if ($name === '' && getArrayValue($visitor_position,$i) === '' && getArrayValue($visitor_organization,$i) === '') continue;
                ?>
                <tr>
                    <td><?= $i + 1 ?></td>
                    <td><?= $name ?></td>
                    <td><?= getArrayValue($visitor_position, $i) ?></td>
                    <td><?= getArrayValue($visitor_organization, $i) ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <?php endif; ?>
    </div>

    <!-- Changes on Site -->
    <div class="doc-section">
        <div class="s-heading">Changes on Site</div>

        <?php
        $changeSections = [
            'Plant'           => ['item' => $plant_item,     'added' => $plant_added,     'removed' => $plant_removed,     'total' => $plant_total,     'remarks' => $plant_remarks],
            'Personnel'       => ['item' => $personnel_item, 'added' => $personnel_added, 'removed' => $personnel_removed, 'total' => $personnel_total, 'remarks' => $personnel_remarks],
            'Materials'       => ['item' => $materials_item, 'added' => $materials_added, 'removed' => $materials_removed, 'total' => $materials_total, 'remarks' => $materials_remarks],
            'Other (Specify)' => ['item' => $other_item,     'added' => $other_added,     'removed' => $other_removed,     'total' => $other_total,     'remarks' => $other_remarks],
        ];
        foreach ($changeSections as $label => $data):
            $hasRows = !empty($data['item']) && !(count($data['item']) === 1 && $data['item'][0] === '');
        ?>
        <p class="sub-label"><?= $label ?></p>
        <?php if (!$hasRows): ?>
            <p class="text-muted mb-3" style="font-size:.875rem;">No <?= strtolower($label) ?> changes recorded.</p>
        <?php else: ?>
        <table class="preview-table">
            <thead>
                <tr>
                    <th style="width:3%">#</th>
                    <th>Item</th>
                    <th>Added</th>
                    <th>Removed</th>
                    <th>Total</th>
                    <th>Remarks</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($data['item'] as $i => $item):
                    if ($item === '') continue;
                ?>
                <tr>
                    <td><?= $i + 1 ?></td>
                    <td><?= $item ?></td>
                    <td><?= getArrayValue($data['added'],   $i) ?></td>
                    <td><?= getArrayValue($data['removed'], $i) ?></td>
                    <td><?= getArrayValue($data['total'],   $i) ?></td>
                    <td><?= getArrayValue($data['remarks'], $i) ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <?php endif;
        endforeach; ?>
    </div>

    <!-- Incidents & Safety -->
    <div class="doc-section">
        <div class="s-heading">Incidents / Safety</div>
        <div class="info-grid">
            <div class="info-pair">
                <span class="lbl">Incidents</span>
                <span class="val"><?= $incidents ?: 'None reported' ?></span>
            </div>
            <div class="info-pair">
                <span class="lbl">Working Conditions</span>
                <span class="val"><?= $working_conditions ? ucfirst($working_conditions) : '—' ?></span>
            </div>
        </div>
    </div>

    <!-- Works Started / Restarted / Completed -->
    <div class="doc-section">
        <div class="s-heading">Details of Works Started / Restarted / Completed</div>
        <?php $hasWorkDetails = !empty($work_details) && !(count($work_details) === 1 && $work_details[0] === ''); ?>
        <?php if (!$hasWorkDetails): ?>
            <p class="text-muted mb-0" style="font-size:.875rem;">No work details recorded.</p>
        <?php else: ?>
        <table class="preview-table">
            <thead>
                <tr>
                    <th style="width:3%">#</th>
                    <th>Detail</th>
                    <th>Category</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($work_details as $i => $detail):
                    if ($detail === '') continue;
                    $cats = [];
                    if (!empty($work_started[$i]))   $cats[] = '<span class="sbadge sb-started">Started</span>';
                    if (!empty($work_restarted[$i])) $cats[] = '<span class="sbadge sb-restarted">Restarted</span>';
                    if (!empty($work_completed[$i])) $cats[] = '<span class="sbadge sb-completed">Completed</span>';
                ?>
                <tr>
                    <td><?= $i + 1 ?></td>
                    <td><?= $detail ?></td>
                    <td><?= $cats ? implode(' ', $cats) : '<span class="text-muted">—</span>' ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <?php endif; ?>
    </div>

    <!-- Work Issues -->
    <div class="doc-section">
        <div class="s-heading">Work Temporarily Suspended / Delayed / Stopped / Potential Claims</div>
        <?php $hasIssues = !empty($work_issues_details) && !(count($work_issues_details) === 1 && $work_issues_details[0] === ''); ?>
        <?php if (!$hasIssues): ?>
            <p class="text-muted mb-0" style="font-size:.875rem;">No work issues recorded.</p>
        <?php else: ?>
        <table class="preview-table">
            <thead>
                <tr>
                    <th style="width:3%">#</th>
                    <th>Issue Detail</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($work_issues_details as $i => $detail):
                    if ($detail === '') continue;
                    $statuses = [];
                    if (!empty($work_suspended[$i]))   $statuses[] = '<span class="sbadge sb-suspended">Suspended</span>';
                    if (!empty($work_delayed[$i]))     $statuses[] = '<span class="sbadge sb-delayed">Delayed</span>';
                    if (!empty($work_stopped[$i]))     $statuses[] = '<span class="sbadge sb-stopped">Stopped</span>';
                    if (!empty($potential_claims[$i])) $statuses[] = '<span class="sbadge sb-claim">Potential Claim</span>';
                ?>
                <tr>
                    <td><?= $i + 1 ?></td>
                    <td><?= $detail ?></td>
                    <td><?= $statuses ? implode(' ', $statuses) : '<span class="text-muted">—</span>' ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <?php endif; ?>
    </div>

    <!-- Satisfaction -->
    <div class="doc-section">
        <div class="s-heading">Satisfaction to Works Carried Out</div>
        <div class="info-grid">
            <div class="info-pair">
                <span class="lbl">Satisfied</span>
                <span class="val">
                    <?php if ($satisfaction === 'Yes'): ?>
                        <span class="sbadge sb-yes">Yes</span>
                    <?php elseif ($satisfaction === 'No'): ?>
                        <span class="sbadge sb-no">No</span>
                    <?php else: ?>—<?php endif; ?>
                </span>
            </div>
            <?php if ($satisfaction === 'No' && $remarks): ?>
            <div class="info-pair">
                <span class="lbl">Reason</span>
                <span class="val"><?= $remarks ?></span>
            </div>
            <?php endif; ?>
        </div>
    </div>

    <!-- Official Validation -->
    <div class="doc-section">
        <div class="s-heading">Official Validation</div>
        <div class="sig-grid">
            <div class="sig-box">
                <span class="lbl" style="font-size:.67rem;text-transform:uppercase;letter-spacing:.8px;color:#5a5a5a;font-weight:700;">Authorised By</span>
                <div class="sig-name"><?= $authorised ?: '—' ?></div>
                <div class="sig-role"><?= $position ?: '' ?></div>
                <div class="sig-line">
                    <span style="color:#5a5a5a;font-size:.75rem;">Signature: </span><?= $signature ?: '' ?>
                </div>
            </div>
            <div class="sig-box">
                <span class="lbl" style="font-size:.67rem;text-transform:uppercase;letter-spacing:.8px;color:#5a5a5a;font-weight:700;">Date Signed</span>
                <div class="sig-name"><?= $signed_date ?: '—' ?></div>
            </div>
        </div>
    </div>

</div><!-- /#content -->

<script>
$(document).ready(function() {
    $('#btn-dl').on('click', function() {
        var d = new Date();
        var pad = function(n){ return String(n).padStart(2,'0'); };
        var ts = pad(d.getDate()) + pad(d.getMonth()+1) + d.getFullYear() + pad(d.getHours()) + pad(d.getMinutes()) + pad(d.getSeconds());
        html2pdf().set({
            margin:       0.4,
            filename:     'building-site-diary-' + ts + '.pdf',
            image:        { type: 'jpeg', quality: 0.98 },
            html2canvas:  { scale: 2, useCORS: true },
            jsPDF:        { unit: 'in', format: 'letter', orientation: 'portrait' }
        }).from(document.getElementById('content')).save();
    });
});
</script>
<script src="js/bootstrap.bundle.min.js"></script>
</body>

</html>