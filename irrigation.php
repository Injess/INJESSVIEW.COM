<?php
//set time zone for your country
date_default_timezone_set('Africa/Blantyre');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Irrigation Site Diary Form - Injessview</title>
    <meta name="description" content="Document irrigation project activity with a daily site diary covering site data, staffing, conditions, materials, and project remarks.">
    <link rel="canonical" href="https://injessview.com/irrigation-site-diary">
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link rel="stylesheet" href="css/aos.css" />
    <link rel="icon" type="image/png" href="img/online-survey.png" />
    <link rel="stylesheet" href="css/main.css" />
    <script src="js/sweetalert.min.js"></script>

    <!--og codes-->
    <meta property="og:url" content="https://injessview.com/irrigation-site-diary" />
    <meta property="og:type" content="website" />
    <meta property="og:image" content="https://injessview.com/img/online-survey.png" />
    <meta property="og:title" content="Irrigation Site Diary Form - Injessview" />
    <meta property="og:description" content="Irrigation site diary for structured daily reporting, project tracking, and official field documentation." />
</head>

<body class="d-flex flex-column min-vh-100 bg-light">
    <!-- Navbar with Skewed Background Links and Navbar-Brand -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="home">INJESSVIEW</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="home" data-route="home">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="about" data-route="about">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="site-sync" data-route="site-sync">SiteSync</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="invi-rides" data-route="invi-rides">Invi Rides</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="carbon-abatement" data-route="carbon-abatement">Carbon Abatement</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="contact" data-route="contact">Contact Us</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container diary">
        <form id="irrigation-diary-form" action="irrigation-preview" method="POST">
            <div class="row mt-3 d-flex justify-content-center align-items-center">
                <div class="col-sm-6">
                    <div class="form-floating mb-3">
                        <input type="text" name="sheet_no" class="form-control" id="sheet_no" />
                        <label for="sheet_no">SHEET NO.:</label>
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-floating mb-3">
                        <input type="date" name="date" class="form-control" id="date" />
                        <label for="date">Date</label>
                    </div>
                </div>
                <!-- Site Data -->
                <div class="col-12 section-title">SITE DATA</div>

                <div class="col-sm-4">
                    <div class="form-floating mb-3">
                        <input type="text" name="dept" class="form-control" id="dept" />
                        <label for="dept">Department</label>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-floating mb-3">
                        <input type="text" name="region" class="form-control" id="region" />
                        <label for="region">Region</label>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-floating mb-3">
                        <input type="text" name="district" class="form-control" id="district" />
                        <label for="district">District</label>
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-floating mb-3">
                        <input type="text" name="contract_no" class="form-control" id="contract_no" />
                        <label for="contract_no">Contract No.</label>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-floating mb-3">
                        <input type="text" name="contract_title" class="form-control" id="contract_title" />
                        <label for="contract_title">Contract Title</label>
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-floating mb-3">
                        <input type="text" name="contractor_name" class="form-control" id="contractor_name" />
                        <label for="contractor_name">Contractor Name</label>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-floating mb-3">
                        <input type="text" name="consultant_name" class="form-control" id="consultant_name" />
                        <label for="consultant_name">Consultant Name</label>
                    </div>
                </div>

                <div class="col-12 section-title">ORGANIZATION BRANDING</div>
                <div class="col-sm-8">
                    <div class="form-floating mb-3">
                        <input type="text" id="branding_org_name_irrigation" class="form-control" maxlength="120" placeholder="Organization / Firm Name (e.g., INVI)" />
                        <label for="branding_org_name_irrigation">Organization / Firm Name</label>
                    </div>
                </div>
                <div class="col-sm-4 d-flex align-items-center mb-3">
                    <button type="button" class="btn btn-outline-secondary w-100" id="branding_clear_irrigation">
                        <i class="fa fa-rotate-left"></i> Reset Branding
                    </button>
                </div>
                <div class="col-sm-8">
                    <label for="branding_logo_file_irrigation" class="form-label fw-semibold">Company Logo</label>
                    <input type="file" id="branding_logo_file_irrigation" class="form-control mb-2" accept="image/png,image/jpeg,image/webp" />
                    <div class="form-text mb-3">PNG, JPG, or WEBP up to 2MB. Saved only in this browser per organization name and not stored as server files.</div>
                </div>
                <div class="col-sm-4 mb-3">
                    <div class="border rounded p-2 bg-white text-center h-100 d-flex flex-column justify-content-center align-items-center">
                        <img id="branding_logo_preview_irrigation" alt="Company Logo Preview" style="display:none; max-height:80px; max-width:100%; object-fit:contain;" />
                        <small id="branding_logo_status_irrigation" class="text-muted mt-2">No logo selected</small>
                    </div>
                </div>

                <!-- Daily Information -->
                <div class="col-12 section-title">DAILY INFORMATION</div>

                <div class="col-sm-6">
                    <div class="form-floating mb-3">
                        <input type="date" name="date_daily" class="form-control" id="date_daily" />
                        <label for="date_daily">Date</label>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-floating mb-3">
                        <input type="text" name="day" class="form-control" id="day" />
                        <label for="day">Day</label>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-floating mb-3">
                        <input type="time" name="working_time_from" class="form-control" id="working_time_from" />
                        <label for="working_time_from">Working Time From</label>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-floating mb-3">
                        <input type="time" name="working_time_to" class="form-control" id="working_time_to" />
                        <label for="working_time_to">Working Time To</label>
                    </div>
                </div>

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

                <!-- Construction Activities Conducted -->
                <div class="col-12 section-title">
                    CONSTRUCTION ACTIVITIES CONDUCTED
                </div>
                <div class="col-12">
                    <textarea name="construction_activities" cols="30" rows="5" class="form-control"></textarea>
                </div>

                <!-- Resources on Site -->
                <div class="col-12 section-title">RESOURCES ON SITE</div>

                <!-- Personnel -->
                <div class="col-12"><strong>PERSONNEL</strong></div>
                <div class="col-sm-3 mt-2">
                    <div class="form-floating mb-3">
                        <input type="number" name="site_agent" class="form-control" id="site_agent" />
                        <label for="site_agent">Site Agent</label>
                    </div>
                </div>
                <div class="col-sm-3 mt-2">
                    <div class="form-floating mb-3">
                        <input type="number" name="site_eng" class="form-control" id="site_eng" />
                        <label for="site_eng">Site Eng.</label>
                    </div>
                </div>
                <div class="col-sm-3 mt-2">
                    <div class="form-floating mb-3">
                        <input type="number" name="foreman" class="form-control" id="foreman" />
                        <label for="foreman">Foreman</label>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="form-floating mb-3">
                        <input type="number" name="driver" class="form-control" id="driver" />
                        <label for="driver">Driver</label>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="form-floating mb-3">
                        <input type="number" name="operator" class="form-control" id="operator" />
                        <label for="operator">Operator</label>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="form-floating mb-3">
                        <input type="number" name="craftsman" class="form-control" id="craftsman" />
                        <label for="craftsman">Craftsman</label>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="form-floating mb-3">
                        <input type="number" name="unskilled" class="form-control" id="unskilled" />
                        <label for="unskilled">Unskilled</label>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="form-floating mb-3">
                        <input type="number" name="total_personnel" class="form-control" id="total_personnel" />
                        <label for="total_personnel">Total Personnel</label>
                    </div>
                </div>

                <!-- Plant & Vehicle -->
                <div class="col-12"><strong>PLANT & VEHICLE</strong></div>
                <div class="col-sm-3 mt-2">
                    <div class="form-floating mb-3">
                        <input type="number" name="hvy_plant" class="form-control" id="hvy_plant" />
                        <label for="hvy_plant">Hvy Plant</label>
                    </div>
                </div>
                <div class="col-sm-3 mt-2">
                    <div class="form-floating mb-3">
                        <input type="number" name="light_plant" class="form-control" id="light_plant" />
                        <label for="light_plant">Light Plant</label>
                    </div>
                </div>
                <div class="col-sm-3 mt-2">
                    <div class="form-floating mb-3">
                        <input type="number" name="hvy_vehicle" class="form-control" id="hvy_vehicle" />
                        <label for="hvy_vehicle">Hvy Vehicle</label>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="form-floating mb-3">
                        <input type="number" name="light_vehicle" class="form-control" id="light_vehicle" />
                        <label for="light_vehicle">Light Vehicle</label>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="form-floating mb-3">
                        <input type="number" name="motorbike" class="form-control" id="motorbike" />
                        <label for="motorbike">Motorbike</label>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="form-floating mb-3">
                        <input type="number" name="bicycle" class="form-control" id="bicycle" />
                        <label for="bicycle">Bicycle</label>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="form-floating mb-3">
                        <input type="number" name="others_vehicle" class="form-control" id="others_vehicle" />
                        <label for="others_vehicle">Others</label>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="form-floating mb-3">
                        <input type="number" name="total_vehicle" class="form-control" id="total_vehicle" />
                        <label for="total_vehicle">Total Vehicle</label>
                    </div>
                </div>

                <!-- Materials -->
                <div class="col-12"><strong>MATERIALS</strong></div>
                <div class="col-sm-3 mt-2">
                    <div class="form-floating mb-3">
                        <input type="number" name="gravel" class="form-control" id="gravel" />
                        <label for="gravel">Gravel (cu.m)</label>
                    </div>
                </div>
                <div class="col-sm-3 mt-2">
                    <div class="form-floating mb-3">
                        <input type="number" name="crushed_stone" class="form-control" id="crushed_stone" />
                        <label for="crushed_stone">Crushed Stone (cu.m)</label>
                    </div>
                </div>
                <div class="col-sm-3 mt-2">
                    <div class="form-floating mb-3">
                        <input type="number" name="aggregate" class="form-control" id="aggregate" />
                        <label for="aggregate">Aggregate (cu.m)</label>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="form-floating mb-3">
                        <input type="number" name="cement" class="form-control" id="cement" />
                        <label for="cement">Cement (kg)</label>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="form-floating mb-3">
                        <input type="number" name="premix" class="form-control" id="premix" />
                        <label for="premix">Premix (kg)</label>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="form-floating mb-3">
                        <input type="number" name="timber" class="form-control" id="timber" />
                        <label for="timber">Timber (cu.m)</label>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="form-floating mb-3">
                        <input type="number" name="diesel" class="form-control" id="diesel" />
                        <label for="diesel">Diesel (ltr)</label>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="form-floating mb-3">
                        <input type="number" name="petrol" class="form-control" id="petrol" />
                        <label for="petrol">Petrol (ltr)</label>
                    </div>
                </div>

                <!-- Other Activities -->
                <div class="col-12 section-title">OTHER ACTIVITIES</div>

                <div class="col-6">
                    <strong>LOCATION</strong>
                </div>
                <div class="col-6">
                    <strong>PURPOSE</strong>
                </div>
                <div class="col-sm-6 mt-2">
                    <div class="form-floating mb-3">
                        <input type="text" name="survey_location" class="form-control" id="survey_location" />
                        <label for="survey_location">Survey</label>
                    </div>
                </div>
                <div class="col-sm-6 mt-2">
                    <div class="form-floating mb-3">
                        <input type="text" name="survey_purposes" class="form-control" id="survey_purposes" />
                        <label for="survey_purposes">Survey</label>
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-floating mb-3">
                        <input type="text" name="setting_out_location" class="form-control" id="setting_out_location" />
                        <label for="setting_out_location">Setting Out</label>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-floating mb-3">
                        <input type="text" name="setting_out_purposes" class="form-control" id="setting_out_purposes" />
                        <label for="setting_out_purposes">Setting Out</label>
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-floating mb-3">
                        <input type="text" name="sampling_location" class="form-control" id="sampling_location" />
                        <label for="sampling_location">Sampling</label>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-floating mb-3">
                        <input type="text" name="sampling_purposes" class="form-control" id="sampling_purposes" />
                        <label for="sampling_purposes">Sampling</label>
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-floating mb-3">
                        <input type="text" name="testing_location" class="form-control" id="testing_location" />
                        <label for="testing_location">Testing</label>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-floating mb-3">
                        <input type="text" name="testing_purposes" class="form-control" id="testing_purposes" />
                        <label for="testing_purposes">Testing</label>
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-floating mb-3">
                        <input type="text" name="measurement_location" class="form-control" id="measurement_location" />
                        <label for="measurement_location">Measurement</label>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-floating mb-3">
                        <input type="text" name="measurement_purposes" class="form-control" id="measurement_purposes" />
                        <label for="measurement_purposes">Measurement</label>
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-floating mb-3">
                        <input type="text" name="review_program_location" class="form-control"
                            id="review_program_location" />
                        <label for="review_program_location">Review Program</label>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-floating mb-3">
                        <input type="text" name="review_program_purposes" class="form-control"
                            id="review_program_purposes" />
                        <label for="review_program_purposes">Review Program</label>
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-floating mb-3">
                        <input type="text" name="review_cost_location" class="form-control" id="review_cost_location" />
                        <label for="review_cost_location">Review Cost</label>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-floating mb-3">
                        <input type="text" name="review_cost_purposes" class="form-control" id="review_cost_purposes" />
                        <label for="review_cost_purposes">Review Cost</label>
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-floating mb-3">
                        <input type="text" name="inspection_location" class="form-control" id="inspection_location" />
                        <label for="inspection_location">Inspection</label>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-floating mb-3">
                        <input type="text" name="inspection_purposes" class="form-control" id="inspection_purposes" />
                        <label for="inspection_purposes">Inspection</label>
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-floating mb-3">
                        <input type="text" name="meeting_location" class="form-control" id="meeting_location" />
                        <label for="meeting_location">Meeting</label>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-floating mb-3">
                        <input type="text" name="meeting_purposes" class="form-control" id="meeting_purposes" />
                        <label for="meeting_purposes">Meeting</label>
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-floating mb-3">
                        <input type="text" name="visitors_location" class="form-control" id="visitors_location" />
                        <label for="visitors_location">Visitors</label>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-floating mb-3">
                        <input type="text" name="visitors_purposes" class="form-control" id="visitors_purposes" />
                        <label for="visitors_purposes">Visitors</label>
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-floating mb-3">
                        <input type="text" name="others_location" class="form-control" id="others_location" />
                        <label for="others_location">Others</label>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-floating mb-3">
                        <input type="text" name="others_purposes" class="form-control" id="others_purposes" />
                        <label for="others_purposes">Others</label>
                    </div>
                </div>

                <!-- Remarks -->
                <div class="col-12 section-title">REMARKS</div>
                <div class="col-12 mb-3">
                    <textarea name="remarks" cols="30" rows="5" class="form-control"></textarea>
                </div>

                <button type="submit" name="submit" class="btn btn-primary py-2 mb-2"><i class="fa fa-eye"></i> Preview</button>
            </div>
        </form>
    </div>

    <!-- Professional Footer -->
    <footer class="footer-container mt-5">
        <div class="container text-center">
            <p>&copy; <?= date('Y'); ?> Injessview. All rights reserved.</p>
        </div>
    </footer>

    <!-- Bootstrap Bundle with Popper -->
    <script src="js/all.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/diary-branding.js"></script>
    <script>
        if (window.DiaryBranding && typeof window.DiaryBranding.initForm === 'function') {
            window.DiaryBranding.initForm({
                formSelector: '#irrigation-diary-form',
                orgInputSelector: '#branding_org_name_irrigation',
                logoInputSelector: '#branding_logo_file_irrigation',
                logoPreviewSelector: '#branding_logo_preview_irrigation',
                logoStatusSelector: '#branding_logo_status_irrigation',
                clearButtonSelector: '#branding_clear_irrigation'
            });
        }

        function calculateTotal() {
            const siteAgent =
                parseInt(document.getElementById("site_agent").value) || 0;
            const siteEng =
                parseInt(document.getElementById("site_eng").value) || 0;
            const totalPersonnel = siteAgent + siteEng;
            document.getElementById("total_personnel").value = totalPersonnel;
        }

        document
            .getElementById("site_agent")
            .addEventListener("input", calculateTotal);
        document
            .getElementById("site_eng")
            .addEventListener("input", calculateTotal);

        const currentPath = (window.location.pathname.replace(/\/+$/, "").split("/").pop() || "home").toLowerCase();
        const routeAliases = {
            home: ["", "home", "index.php"],
            about: ["about", "about.php"],
            "construction-works": ["construction-works", "construction-works.php", "construction-jobs-and-tenders"],
            "site-sync": ["site-sync", "site-sync.php"],
            "site-diary": [
                "site-diary",
                "site-diary.php",
                "building-site-diary",
                "building-site-dairy",
                "building.php",
                "irrigation-site-diary",
                "irrigation-site-dairy",
                "irrigation.php",
                "roads-authority-site-diary",
                "roads-authority-site-dairy",
                "roads-authority.php"
            ],
            contact: ["contact", "contact.php"],
            "it-solutions": ["it-solutions", "it-solutions.php"],
            "invi-rides": ["invi-rides", "invi-rides.php"],
            "carbon-abatement": ["carbon-abatement", "carbon-abatement.php"]
        };

        document.querySelectorAll("ul.navbar-nav [data-route]").forEach(function(link) {
            link.classList.remove("active");

            const route = link.getAttribute("data-route");
            const aliases = routeAliases[route] || [route];

            if (aliases.includes(currentPath)) {
                link.classList.add("active");
            }
        });
    </script>

</body>

</html>