<?php
//set time zone for your country
date_default_timezone_set('Africa/Blantyre');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Roads Authority Site Diary Form - Injessview</title>
    <meta name="description" content="Track roads authority field activity with a daily site diary for maintenance works, materials, incidents, visitors, and site remarks.">
    <link rel="canonical" href="https://injessview.com/roads-authority-site-diary">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/aos.css">
    <link rel="icon" type="image/png" href="./img/online-survey.png" />
    <link rel="stylesheet" href="css/main.css">
    <script src="./js/sweetalert.min.js"></script>

    <!--og codes-->
    <meta property="og:url" content="https://injessview.com/roads-authority-site-diary" />
    <meta property="og:type" content="website" />
    <meta property="og:image" content="https://injessview.com/img/online-survey.png" />
    <meta property="og:title" content="Roads Authority Site Diary Form - Injessview" />
    <meta property="og:description" content="Roads Authority maintenance site diary for daily operational reporting, project oversight, and contractor documentation." />
</head>

<body class="d-flex flex-column min-vh-100 bg-light">
    <?php include './nav.php'; ?>
    <div class="container diary">
        <form id="roads-diary-form" action="road-authority-preview" method="POST">
            <div class="row mt-3 d-flex justify-content-center">
                <div class="col-sm-6">
                    <div class="form-floating mb-3">
                        <input type="date" name="date" class="form-control" id="date">
                        <label for="date">Date</label>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-floating mb-3">
                        <input type="text" name="sheet_no" class="form-control" id="sheet_no">
                        <label for="sheet_no">Sheet No.</label>
                    </div>
                </div>

                <div class="col-sm-4">
                    <div class="form-floating mb-3">
                        <input type="text" name="ra_division" class="form-control" id="ra_division">
                        <label for="ra_division">RA Division</label>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-floating mb-3">
                        <input type="text" name="region" class="form-control" id="region">
                        <label for="region">Region</label>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-floating mb-3">
                        <input type="text" name="district" class="form-control" id="district">
                        <label for="district">District</label>
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-floating mb-3">
                        <input type="text" name="contract_no" class="form-control" id="contract_no">
                        <label for="contract_no">Contract No.</label>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-floating mb-3">
                        <input type="text" name="contract_title" class="form-control" id="contract_title">
                        <label for="contract_title">Contract Title</label>
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-floating mb-3">
                        <input type="text" name="contractor_name" class="form-control" id="contractor_name">
                        <label for="contractor_name">Contractor Name</label>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-floating mb-3">
                        <input type="text" name="consultant_name" class="form-control" id="consultant_name">
                        <label for="consultant_name">Consultant Name</label>
                    </div>
                </div>

                <div class="col-12 section-title">Organization Branding</div>
                <div class="col-sm-8">
                    <div class="form-floating mb-3">
                        <input type="text" id="branding_org_name_roads" class="form-control" maxlength="120" placeholder="Organization / Firm Name (e.g., INVI)">
                        <label for="branding_org_name_roads">Organization / Firm Name</label>
                    </div>
                </div>
                <div class="col-sm-4 d-flex align-items-center mb-3">
                    <button type="button" class="btn btn-outline-secondary w-100" id="branding_clear_roads">
                        <i class="fa fa-rotate-left"></i> Reset Branding
                    </button>
                </div>
                <div class="col-sm-8">
                    <label for="branding_logo_file_roads" class="form-label fw-semibold">Company Logo</label>
                    <input type="file" id="branding_logo_file_roads" class="form-control mb-2" accept="image/png,image/jpeg,image/webp">
                    <div class="form-text mb-3">PNG, JPG, or WEBP up to 2MB. Saved only in this browser per organization name and not stored as server files.</div>
                </div>
                <div class="col-sm-4 mb-3">
                    <div class="border rounded p-2 bg-white text-center h-100 d-flex flex-column justify-content-center align-items-center">
                        <img id="branding_logo_preview_roads" alt="Company Logo Preview" style="display:none; max-height:80px; max-width:100%; object-fit:contain;">
                        <small id="branding_logo_status_roads" class="text-muted mt-2">No logo selected</small>
                    </div>
                </div>

                <div class="col-sm-3">
                    <div class="form-floating mb-3">
                        <input type="text" name="road_no" class="form-control" id="road_no">
                        <label for="road_no">Road No.</label>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="form-floating mb-3">
                        <input type="text" name="section_no" class="form-control" id="section_no">
                        <label for="section_no">Section No.</label>
                    </div>
                </div>

                <div class="col-sm-3">
                    <div class="form-floating mb-3">
                        <input type="text" name="from" class="form-control" id="from">
                        <label for="from">From</label>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="form-floating mb-3">
                        <input type="text" name="to" class="form-control" id="to">
                        <label for="to">To</label>
                    </div>
                </div>

                <div class="col-12 section-title">Daily Formation</div>

                <div class="col-sm-6">
                    <div class="form-floating mb-3">
                        <input type="date" name="date_daily" class="form-control" id="date_daily">
                        <label for="date_daily">Date</label>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-floating mb-3">
                        <input type="text" name="day" class="form-control" id="day">
                        <label for="day">Day</label>
                    </div>
                </div>

                <div class="col-12 section-title">Working Time</div>

                <div class="col-sm-6">
                    <div class="form-floating mb-3">
                        <input type="time" name="from_daily" class="form-control" id="from">
                        <label for="from">From</label>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-floating mb-3">
                        <input type="time" name="to_daily" class="form-control" id="to_daily">
                        <label for="to_daily">To</label>
                    </div>
                </div>

                <!-- Weather Condition -->
                <div class="col-sm-6">
                    <div class="form-floating mb-3">
                        <select class="form-select" id="rain" name="rain">
                            <option>No</option>
                            <option>Yes</option>
                        </select>
                        <label for="rain" class="form-label">Rain</label>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-floating mb-3">
                        <select class="form-select" id="working_condition" name="working_condition">
                            <option>Good</option>
                            <option>Fair</option>
                            <option>Poor</option>
                        </select>
                        <label for="working_condition" class="form-label">Working Condition</label>
                    </div>
                </div>

                <!-- Maintenance Activity 1 -->
                <div class="col-12 section-title">Maintenance Activity 1</div>

                <div class="col-sm-4">
                    <div class="form-floating mb-3">
                        <input type="text" name="boq_item_1" class="form-control" id="boq_item_1">
                        <label for="boq_item_1">BOQ Item</label>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-floating mb-3">
                        <input type="text" name="description_1" class="form-control" id="description_1">
                        <label for="description_1">Description</label>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-floating mb-3">
                        <input type="text" name="location_1" class="form-control" id="location_1">
                        <label for="location_1">Location</label>
                    </div>
                </div>

                <!-- Maintenance Activity 2 -->
                <div class="col-12 section-title">Maintenance Activity 2</div>

                <div class="col-sm-4">
                    <div class="form-floating mb-3">
                        <input type="text" name="boq_item_2" class="form-control" id="boq_item_2">
                        <label for="boq_item_2">BOQ Item</label>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-floating mb-3">
                        <input type="text" name="description_2" class="form-control" id="description_2">
                        <label for="description_2">Description</label>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-floating mb-3">
                        <input type="text" name="location_2" class="form-control" id="location_2">
                        <label for="location_2">Location</label>
                    </div>
                </div>

                <!-- Maintenance Activity 3 -->
                <div class="col-12 section-title">Maintenance Activity 3</div>

                <div class="col-sm-4">
                    <div class="form-floating mb-3">
                        <input type="text" name="boq_item_3" class="form-control" id="boq_item_3">
                        <label for="boq_item_3">BOQ Item</label>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-floating mb-3">
                        <input type="text" name="description_3" class="form-control" id="description_3">
                        <label for="description_3">Description</label>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-floating mb-3">
                        <input type="text" name="location_3" class="form-control" id="location_3">
                        <label for="location_3">Location</label>
                    </div>
                </div>

                <!-- Personnel -->
                <div class="col-12 section-title">Personnel</div>

                <div class="col-lg-3 col-md-4 col-sm-4 col-6">
                    <div class="form-floating mb-3">
                        <input type="number" name="site_ag" class="form-control" id="site_ag">
                        <label for="site_ag">Site Ag</label>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-4 col-6">
                    <div class="form-floating mb-3">
                        <input type="number" name="site_eng" class="form-control" id="site_eng">
                        <label for="site_eng">Site Eng</label>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-4 col-6">
                    <div class="form-floating mb-3">
                        <input type="number" name="foreman" class="form-control" id="foreman">
                        <label for="foreman">Foreman</label>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-4 col-6">
                    <div class="form-floating mb-3">
                        <input type="number" name="driver" class="form-control" id="driver">
                        <label for="driver">Driver</label>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-4 col-6">
                    <div class="form-floating mb-3">
                        <input type="number" name="operator" class="form-control" id="operator">
                        <label for="operator">Operator</label>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-4 col-6">
                    <div class="form-floating mb-3">
                        <input type="number" name="craftman" class="form-control" id="craftman">
                        <label for="craftman">Craftman</label>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-4 col-6">
                    <div class="form-floating mb-3">
                        <input type="number" name="unskilled" class="form-control" id="unskilled">
                        <label for="unskilled">Unskilled</label>
                    </div>
                </div>


                <!-- Plant and Vehicle -->
                <div class="col-12 section-title">Plant and Vehicle</div>

                <div class="col-sm-4 col-md-3 col-lg-2 col-6">
                    <div class="form-floating mb-3">
                        <input type="number" name="plant" class="form-control" id="plant">
                        <label for="plant">Plant</label>
                    </div>
                </div>
                <div class="col-sm-4 col-md-3 col-lg-2 col-6">
                    <div class="form-floating mb-3">
                        <input type="number" name="hvy_veh" class="form-control" id="site_eng">
                        <label for="hvy_veh">Hvy Veh.</label>
                    </div>
                </div>
                <div class="col-sm-4 col-md-3 col-lg-2 col-6">
                    <div class="form-floating mb-3">
                        <input type="number" name="veh" class="form-control" id="veh">
                        <label for="veh">Veh.</label>
                    </div>
                </div>
                <div class="col-sm-4 col-md-3 col-lg-2 col-6">
                    <div class="form-floating mb-3">
                        <input type="number" name="motorbike" class="form-control" id="motorbike">
                        <label for="motorbike">Motorbike</label>
                    </div>
                </div>
                <div class="col-sm-4 col-md-3 col-lg-2 col-6">
                    <div class="form-floating mb-3">
                        <input type="number" name="bicycle" class="form-control" id="bicycle">
                        <label for="bicycle">Bicycle</label>
                    </div>
                </div>
                <div class="col-sm-4 col-md-3 col-lg-2 col-6">
                    <div class="form-floating mb-3">
                        <input type="number" name="others" class="form-control" id="others">
                        <label for="others">Others</label>
                    </div>
                </div>

                <!-- Materials -->
                <div class="col-12 section-title">Materials</div>

                <div class="col-sm-3 col-12">
                    <div class="form-floating mb-3">
                        <input type="number" name="gravel" class="form-control" id="gravel">
                        <label for="gravel">Gravel (cu.m)</label>
                    </div>
                </div>
                <div class="col-sm-3 col-12">
                    <div class="form-floating mb-3">
                        <input type="number" name="crushed_stone" class="form-control" id="crushed_stone">
                        <label for="crushed_stone">Crushed Stone (cu.m)</label>
                    </div>
                </div>
                <div class="col-sm-3 col-12">
                    <div class="form-floating mb-3">
                        <input type="number" name="aggregate" class="form-control" id="aggregate">
                        <label for="aggregate">Aggregate (cu.m)</label>
                    </div>
                </div>
                <div class="col-sm-3 col-12">
                    <div class="form-floating mb-3">
                        <input type="number" name="cement" class="form-control" id="cement">
                        <label for="cement">Cement (kg)</label>
                    </div>
                </div>
                <div class="col-sm-3 col-12">
                    <div class="form-floating mb-3">
                        <input type="number" name="premix" class="form-control" id="premix">
                        <label for="premix">Premix (kg)</label>
                    </div>
                </div>
                <div class="col-sm-3 col-12">
                    <div class="form-floating mb-3">
                        <input type="number" name="timber" class="form-control" id="timber">
                        <label for="timber">Timber (cu.m)</label>
                    </div>
                </div>
                <div class="col-sm-3 col-12">
                    <div class="form-floating mb-3">
                        <input type="number" name="diesel" class="form-control" id="diesel">
                        <label for="diesel">Diesel (ltr)</label>
                    </div>
                </div>
                <div class="col-sm-3 col-12">
                    <div class="form-floating mb-3">
                        <input type="number" name="petrol" class="form-control" id="petrol">
                        <label for="petrol">Petrol (ltr)</label>
                    </div>
                </div>

                <!-- Survey -->
                <div class="col-12 section-title">Survey</div>

                <div class="col-sm-6">
                    <div class="form-floating mb-3">
                        <input type="text" name="survey_location" class="form-control">
                        <label>Location</label>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-floating mb-3">
                        <input type="text" name="survey_purposes" class="form-control">
                        <label>Purposes</label>
                    </div>
                </div>

                <!-- Setting - out -->
                <div class="col-12 section-title">Setting Out</div>

                <div class="col-sm-6">
                    <div class="form-floating mb-3">
                        <input type="text" name="setting_out_location" class="form-control">
                        <label>Location</label>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-floating mb-3">
                        <input type="text" name="setting_out_purposes" class="form-control">
                        <label>Purposes</label>
                    </div>
                </div>

                <!-- Sampling-->
                <div class="col-12 section-title">Sampling</div>

                <div class="col-sm-6">
                    <div class="form-floating mb-3">
                        <input type="text" name="sampling_location" class="form-control">
                        <label>Location</label>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-floating mb-3">
                        <input type="text" name="sampling_purposes" class="form-control">
                        <label>Purposes</label>
                    </div>
                </div>

                <!-- Testing -->
                <div class="col-12 section-title">Testing</div>

                <div class="col-sm-6">
                    <div class="form-floating mb-3">
                        <input type="text" name="testing_location" class="form-control">
                        <label>Location</label>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-floating mb-3">
                        <input type="text" name="testing_purposes" class="form-control">
                        <label>Purposes</label>
                    </div>
                </div>

                <!-- Measurement -->
                <div class="col-12 section-title">Measurement</div>

                <div class="col-sm-6">
                    <div class="form-floating mb-3">
                        <input type="text" name="measurement_location" class="form-control">
                        <label>Location</label>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-floating mb-3">
                        <input type="text" name="measurement_purposes" class="form-control">
                        <label>Purposes</label>
                    </div>
                </div>

                <!-- Review Program -->
                <div class="col-12 section-title">Review Program</div>

                <div class="col-sm-6">
                    <div class="form-floating mb-3">
                        <input type="text" name="review_program_location" class="form-control">
                        <label>Location</label>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-floating mb-3">
                        <input type="text" name="review_program_purposes" class="form-control">
                        <label>Purposes</label>
                    </div>
                </div>

                <!-- Review Cost-->
                <div class="col-12 section-title">Review Cost</div>

                <div class="col-sm-6">
                    <div class="form-floating mb-3">
                        <input type="text" name="review_cost_location" class="form-control">
                        <label>Location</label>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-floating mb-3">
                        <input type="text" name="review_cost_purposes" class="form-control">
                        <label>Purposes</label>
                    </div>
                </div>
                <!-- Inspection-->
                <div class="col-12 section-title">Inspection</div>

                <div class="col-sm-6">
                    <div class="form-floating mb-3">
                        <input type="text" name="inspection_location" class="form-control">
                        <label>Location</label>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-floating mb-3">
                        <input type="text" name="inspection_purposes" class="form-control">
                        <label>Purposes</label>
                    </div>
                </div>

                <!-- Meeting-->
                <div class="col-12 section-title">Meeting</div>

                <div class="col-sm-6">
                    <div class="form-floating mb-3">
                        <input type="text" name="meeting_location" class="form-control">
                        <label>Location</label>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-floating mb-3">
                        <input type="text" name="meeting_purposes" class="form-control">
                        <label>Purposes</label>
                    </div>
                </div>

                <!-- Visitors-->
                <div class="col-12 section-title">Visitors</div>

                <div class="col-sm-6">
                    <div class="form-floating mb-3">
                        <input type="text" name="visitors_location" class="form-control">
                        <label>Location</label>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-floating mb-3">
                        <input type="text" name="visitors_purposes" class="form-control">
                        <label>Purposes</label>
                    </div>
                </div>

                <!-- Visitors-->
                <div class="col-12 section-title">Others</div>

                <div class="col-sm-6">
                    <div class="form-floating mb-3">
                        <input type="text" name="others_location" class="form-control">
                        <label>Location</label>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-floating mb-3">
                        <input type="text" name="others_purposes" class="form-control">
                        <label>Purposes</label>
                    </div>
                </div>

                <!-- Remarks -->
                <div class="col-12 section-title">Remarks</div>

                <div class="col-12">
                    <div class="mb-3">
                        <textarea name="remarks" cols="30" rows="5" class="form-control"></textarea>
                    </div>
                </div>

                <button type="submit" name="submit" class="btn btn-primary py-2 mb-4"><i class="fa fa-eye"></i> Preview</button>
            </div>

        </form>
    </div>
    <script src="./js/diary-branding.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            if (window.DiaryBranding && typeof window.DiaryBranding.initForm === 'function') {
                window.DiaryBranding.initForm({
                    formSelector: '#roads-diary-form',
                    orgInputSelector: '#branding_org_name_roads',
                    logoInputSelector: '#branding_logo_file_roads',
                    logoPreviewSelector: '#branding_logo_preview_roads',
                    logoStatusSelector: '#branding_logo_status_roads',
                    clearButtonSelector: '#branding_clear_roads'
                });
            }
        });
    </script>
    <?php include './footer.php'; ?>
