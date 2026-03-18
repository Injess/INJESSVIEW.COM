<?php
//set time zone for your country
date_default_timezone_set('Africa/Blantyre');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Building Site Diary Form - Injessview</title>
    <meta name="description" content="Create and preview a building site diary for daily works, visitors, plant, personnel, materials, incidents, and official site validation.">
    <link rel="canonical" href="https://injessview.com/building-site-diary">
    <link rel="stylesheet" href="./css/bootstrap.min.css" />
    <link rel="stylesheet" href="./css/aos.css" />
    <link rel="icon" type="image/png" href="./img/online-survey.png" />
    <link rel="stylesheet" href="./css/main.css" />
    <script src="./js/sweetalert.min.js" defer></script>

    <!--og codes-->
    <meta property="og:url" content="https://injessview.com/building-site-diary" />
    <meta property="og:type" content="website" />
    <meta property="og:image" content="https://injessview.com/img/online-survey.png" />
    <meta property="og:title" content="Building Site Diary Form - Injessview" />
    <meta property="og:description" content="Lilongwe Water and Sanitation Project building site diary for daily field reporting and project documentation." />
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
        <form action="building-preview" method="POST">
            <div class="row mt-3 d-flex justify-content-center align-items-center">
                <!-- General Information -->
                <div class="col-12 section-title">General Information</div>

                <!-- Site Field -->
                <div class="col-sm-6">
                    <div class="form-floating mb-3">
                        <input type="text" name="site" class="form-control" id="site" />
                        <label for="site">Site</label>
                    </div>
                </div>

                <!-- Sheet No. Field -->
                <div class="col-sm-6">
                    <div class="form-floating mb-3">
                        <input type="text" name="sheet_no" class="form-control" id="sheet_no" />
                        <label for="sheet_no">Sheet No.</label>
                    </div>
                </div>

                <!-- Area Field  -->
                <div class="col-sm-12">
                    <div class="form-floating mb-3">
                        <input type="text" name="area" class="form-control" id="area" />
                        <label for="area">Area</label>
                    </div>
                </div>

                <div class="col-sm-12">
                    <div class="form-floating mb-3">
                        <input type="text" name="contract_name" class="form-control" id="contract_name" placeholder="Contract Name" />
                        <label for="contract_name">Contract Name</label>
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="form-floating mb-3">
                        <input type="text" name="contract_no" class="form-control" id="contract_no" placeholder="Contract No." />
                        <label for="contract_no">Contract No.</label>
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="form-floating mb-3">
                        <input type="text" name="contractor" class="form-control" id="contractor" placeholder="Contractor Name" />
                        <label for="contractor">Contractor</label>
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="form-floating mb-3">
                        <select class="form-select" id="weather" name="weather">
                            <option value="sunny">Sunny</option>
                            <option value="rainy">Rainy</option>
                            <option value="windy">Windy</option>
                            <option value="cloudy">Cloudy</option>
                            <option value="hot">Hot</option>
                            <option value="cold">Cold</option>
                        </select>
                        <label for="weather">Daily Weather</label>
                    </div>
                </div>

                <!-- Visitors -->
                <div class="col-12 section-title justify-content-center">
                    Visitors
                </div>
                <div id="visitors-container">
                    <div class="visitor-group mb-3">
                        <div class="row g-3">
                            <!-- Visitor Name -->
                            <div class="col-sm-3 justify-content-center">
                                <div class="form-floating mb-3">
                                    <input type="text" name="visitor_name[]" class="form-control" />
                                    <label>Name</label>
                                </div>
                            </div>

                            <!-- Visitor Position -->
                            <div class="col-sm-3">
                                <div class="form-floating mb-3">
                                    <input type="text" name="visitor_position[]" class="form-control" />
                                    <label>Position</label>
                                </div>
                            </div>

                            <!-- Visitor Organization -->
                            <div class="col-sm-4">
                                <div class="form-floating mb-3">
                                    <input type="text" name="visitor_organization[]" class="form-control" />
                                    <label>Organization</label>
                                </div>
                            </div>

                            <!-- Remove Button -->
                            <div class="col-sm-2 d-flex align-items-center">
                                <button type="button" class="btn btn-danger btn-md remove-visitor">
                                    Remove
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Add Visitor Button -->
                <div class="col-sm-3 d-flex align-items-center">
                    <button type="button" id="add-visitor" class="btn btn-primary btn-md">
                        Add Visitor
                    </button>
                </div>

                <div class="col-12 section-title mt-3">
                    CHANGES MADE ON THE SITE TO
                </div>

                <div class="col-12 pb-2"><strong>PLANT</strong></div>
                <div id="plant-container">
                    <div class="plant-group row g-3 mb-3">
                        <!-- Item -->
                        <div class="col-sm-6 col-md-6 col-lg-4 col-xl-2">
                            <div class="form-floating">
                                <textarea type="text" name="plant_item[]" class="form-control"
                                    id="plant_item"></textarea>
                                <label for="plant_item">ITEM</label>
                            </div>
                        </div>
                        <!-- Added -->
                        <div class="col-sm-6 col-md-6 col-lg-4 col-xl-2">
                            <div class="form-floating">
                                <input type="number" name="plant_added[]" class="form-control" id="plant_added" />
                                <label for="plant_added">ADDED</label>
                            </div>
                        </div>
                        <!-- Removed -->
                        <div class="col-sm-6 col-md-6 col-lg-4 col-xl-2">
                            <div class="form-floating">
                                <input type="number" name="plant_removed[]" class="form-control" id="plant_removed" />
                                <label for="plant_removed">REMOVED</label>
                            </div>
                        </div>
                        <!-- Total -->
                        <div class="col-sm-6 col-md-6 col-lg-4 col-xl-2">
                            <div class="form-floating">
                                <input type="number" name="plant_total[]" class="form-control" id="plant_total" />
                                <label for="plant_total">TOTAL</label>
                            </div>
                        </div>
                        <!-- Remarks -->
                        <div class="col-sm-6 col-md-6 col-lg-4 col-xl-2">
                            <div class="form-floating">
                                <textarea type="text" name="plant_remarks[]" class="form-control"
                                    id="plant_remarks"></textarea>
                                <label for="plant_remarks">REMARKS</label>
                            </div>
                        </div>
                        <!-- Remove Button -->
                        <div class="col-sm-2 d-flex align-items-center">
                            <button type="button" class="btn btn-danger btn-md remove-plant">
                                Remove
                            </button>
                        </div>
                    </div>
                </div>
                <!-- Add Plant Button -->
                <div class="col-sm-3 d-flex align-items-center">
                    <button type="button" id="add-plant" class="btn btn-primary btn-md">
                        Add Plant
                    </button>
                </div>

                <!-- PERSONNEL SECTION -->
                <div class="col-12 p-2"><strong>PERSONNEL</strong></div>
                <div id="personnel-container">
                    <div class="personnel-group row g-3 mb-3">
                        <!-- Item -->
                        <div class="col-sm-6 col-md-6 col-lg-4 col-xl-2">
                            <div class="form-floating">
                                <textarea type="text" name="personnel_item[]" class="form-control"
                                    id="personnel_item"></textarea>
                                <label for="personnel_item">ITEM</label>
                            </div>
                        </div>
                        <!-- Added -->
                        <div class="col-sm-6 col-md-6 col-lg-4 col-xl-2">
                            <div class="form-floating">
                                <input type="number" name="personnel_added[]" class="form-control"
                                    id="personnel_added" />
                                <label for="personnel_added">ADDED</label>
                            </div>
                        </div>
                        <!-- Removed -->
                        <div class="col-sm-6 col-md-6 col-lg-4 col-xl-2">
                            <div class="form-floating">
                                <input type="number" name="personnel_removed[]" class="form-control"
                                    id="personnel_removed" />
                                <label for="personnel_removed">REMOVED</label>
                            </div>
                        </div>
                        <!-- Total -->
                        <div class="col-sm-6 col-md-6 col-lg-4 col-xl-2">
                            <div class="form-floating">
                                <input type="number" name="personnel_total[]" class="form-control"
                                    id="personnel_total" />
                                <label for="personnel_total">TOTAL</label>
                            </div>
                        </div>
                        <!-- Remarks -->
                        <div class="col-sm-6 col-md-6 col-lg-4 col-xl-2">
                            <div class="form-floating">
                                <textarea type="text" name="personnel_remarks[]" class="form-control"
                                    id="personnel_remarks"></textarea>
                                <label for="personnel_remarks">REMARKS</label>
                            </div>
                        </div>
                        <!-- Remove Button -->
                        <div class="col-sm-2 d-flex align-items-center">
                            <button type="button" class="btn btn-danger btn-md remove-personnel">
                                Remove
                            </button>
                        </div>
                    </div>
                </div>
                <!-- Add Personnel Button -->
                <div class="col-sm-3 d-flex align-items-center">
                    <button type="button" id="add-personnel" class="btn btn-primary btn-md">
                        Add Person
                    </button>
                </div>

                <!-- MATERIALS SECTION -->
                <div class="col-12 p-2"><strong>MATERIALS</strong></div>
                <div id="materials-container">
                    <div class="materials-group row g-3 mb-3">
                        <!-- Item -->
                        <div class="col-sm-6 col-md-6 col-lg-4 col-xl-2">
                            <div class="form-floating">
                                <textarea type="text" name="materials_item[]" class="form-control"
                                    id="materials_item"></textarea>
                                <label for="materials_item">ITEM</label>
                            </div>
                        </div>
                        <!-- Added -->
                        <div class="col-sm-6 col-md-6 col-lg-4 col-xl-2">
                            <div class="form-floating">
                                <input type="number" name="materials_added[]" class="form-control"
                                    id="materials_added" />
                                <label for="materials_added">ADDED</label>
                            </div>
                        </div>
                        <!-- Removed -->
                        <div class="col-sm-6 col-md-6 col-lg-4 col-xl-2">
                            <div class="form-floating">
                                <input type="number" name="materials_removed[]" class="form-control"
                                    id="materials_removed" />
                                <label for="materials_removed">REMOVED</label>
                            </div>
                        </div>
                        <!-- Total -->
                        <div class="col-sm-6 col-md-6 col-lg-4 col-xl-2">
                            <div class="form-floating">
                                <input type="number" name="materials_total[]" class="form-control"
                                    id="materials_total" />
                                <label for="materials_total">TOTAL</label>
                            </div>
                        </div>
                        <!-- Remarks -->
                        <div class="col-sm-6 col-md-6 col-lg-4 col-xl-2">
                            <div class="form-floating">
                                <textarea type="text" name="materials_remarks[]" class="form-control"
                                    id="materials_remarks"></textarea>
                                <label for="materials_remarks">REMARKS</label>
                            </div>
                        </div>
                        <!-- Remove Button -->
                        <div class="col-sm-2 d-flex align-items-center">
                            <button type="button" class="btn btn-danger btn-md remove-materials">
                                Remove
                            </button>
                        </div>
                    </div>
                </div>
                <!-- Add Materials Button -->
                <div class="col-sm-3 d-flex align-items-center">
                    <button type="button" id="add-materials" class="btn btn-primary btn-md">
                        Add Material
                    </button>
                </div>

                <!-- OTHER SECTION -->
                <div class="col-12 p-2"><strong>OTHER (SPECIFY)</strong></div>
                <div id="other-container">
                    <div class="other-group row g-3 mb-3">
                        <!-- Item -->
                        <div class="col-sm-6 col-md-6 col-lg-4 col-xl-2">
                            <div class="form-floating">
                                <textarea type="text" name="other_item[]" class="form-control"
                                    id="other_item"></textarea>
                                <label for="other_item">ITEM</label>
                            </div>
                        </div>
                        <!-- Added -->
                        <div class="col-sm-6 col-md-6 col-lg-4 col-xl-2">
                            <div class="form-floating">
                                <input type="number" name="other_added[]" class="form-control" id="other_added" />
                                <label for="other_added">ADDED</label>
                            </div>
                        </div>
                        <!-- Removed -->
                        <div class="col-sm-6 col-md-6 col-lg-4 col-xl-2">
                            <div class="form-floating">
                                <input type="number" name="other_removed[]" class="form-control" id="other_removed" />
                                <label for="other_removed">REMOVED</label>
                            </div>
                        </div>
                        <!-- Total -->
                        <div class="col-sm-6 col-md-6 col-lg-4 col-xl-2">
                            <div class="form-floating">
                                <input type="number" name="other_total[]" class="form-control" id="other_total" />
                                <label for="other_total">TOTAL</label>
                            </div>
                        </div>
                        <!-- Remarks -->
                        <div class="col-sm-6 col-md-6 col-lg-4 col-xl-2">
                            <div class="form-floating">
                                <textarea type="text" name="other_remarks[]" class="form-control"
                                    id="other_remarks"></textarea>
                                <label for="other_remarks">REMARKS</label>
                            </div>
                        </div>
                        <!-- Remove Button -->
                        <div class="col-sm-2 d-flex align-items-center">
                            <button type="button" class="btn btn-danger btn-md remove-other">
                                Remove
                            </button>
                        </div>
                    </div>
                </div>
                <!-- Add Other Button -->
                <div class="col-sm-3 d-flex align-items-center">
                    <button type="button" id="add-other" class="btn btn-primary btn-md">
                        Add Other
                    </button>
                </div>

                <!-- Incidents / Safety -->
                <div class="col-12 section-title mt-3">Incidents / Safety</div>
                <div class="col-12">
                    <div class="form-floating mb-3">
                        <textarea name="incidents" class="form-control" rows="3"></textarea>
                        <label>Incidents</label>
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="form-floating mb-3">
                        <select class="form-select" id="working_conditions" name="working_conditions">
                            <option value="good">Good</option>
                            <option value="fair">Fair</option>
                            <option value="bad">Bad</option>
                        </select>
                        <label for="working_conditions">Working Conditions</label>
                    </div>
                </div>

                <!-- Works -->
                <div class="col-12 section-title">Work</div>

                <br />
                <!-- Work Started, Restarted, and Completed -->
                <div id="work-detail-container">
                    <div class="work-details-group mb-3">

                        <div class="row g-3">

                            <!-- Work Details -->
                            <div class="col-md-12 col-lg-4 col-xl-4 col-xxl-4">
                                <div class="form-floating mb-3">
                                    <textarea name="work_details[]" class="form-control" rows="3"></textarea>
                                    <label>Work details</label>
                                </div>
                            </div>

                            <!-- Detail Type Checkboxes -->
                            <div class="col-sm-6 d-flex flex-wrap">

                                <div class="form-check me-4">
                                    <input type="checkbox" name="work_started[0][]" value="1" class="form-check-input">
                                    <label class="form-check-label">Started</label>
                                </div>

                                <div class="form-check me-4">
                                    <input type="checkbox" name="work_restarted[0][]" value="1"
                                        class="form-check-input">
                                    <label class="form-check-label">Restarted</label>
                                </div>

                                <div class="form-check me-4">
                                    <input type="checkbox" name="work_completed[0][]" value="1"
                                        class="form-check-input">
                                    <label class="form-check-label">Completed</label>
                                </div>
                            </div>

                            <!-- Remove Button -->
                            <div class="col-sm-2 d-flex align-items-center">
                                <button type="button" class="btn btn-danger btn-md remove-work-detail">Remove</button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Add Work Detail Button -->
                <div class="col-sm-3 d-flex align-items-center">
                    <button type="button" id="add-work-detail" class="btn btn-primary btn-md mb-3">Add Detail</button>
                </div>

                <script>
                    document.addEventListener('DOMContentLoaded', function() {
                        let workDetailIndex = 0; // Start from 0

                        // Add Work Detail Button
                        document.getElementById('add-work-detail').addEventListener('click', function() {
                            workDetailIndex++; // Increment index before adding new detail

                            const workDetailsContainer = document.getElementById('work-detail-container');
                            const newWorkDetailsGroup = document.createElement('div');
                            newWorkDetailsGroup.className = 'work-details-group mb-3';
                            newWorkDetailsGroup.innerHTML = `
        <div class="row g-3">
            <!-- Work Details -->
            <div class="col-md-12 col-lg-4 col-xl-4 col-xxl-4">
                <div class="form-floating mb-3">
                    <textarea name="work_details[]" class="form-control" rows="3"></textarea>
                    <label>Work details</label>
                </div>
            </div>

            <!-- Detail Type Checkboxes -->
            <div class="col-sm-6 d-flex flex-wrap">

                <div class="form-check me-4">
                    <input type="checkbox" name="work_started[${workDetailIndex}][]" value="1" class="form-check-input">
                    <label class="form-check-label">Started</label>
                </div>
                <div class="form-check me-4">
                    <input type="checkbox" name="work_restarted[${workDetailIndex}][]" value="1" class="form-check-input">
                    <label class="form-check-label">Restarted</label>
                </div>
                <div class="form-check me-4">
                    <input type="checkbox" name="work_completed[${workDetailIndex}][]" value="1" class="form-check-input">
                    <label class="form-check-label">Completed</label>
                </div>
            </div>

            <!-- Remove Button -->
            <div class="col-sm-2 d-flex align-items-center">
                <button type="button" class="btn btn-danger btn-md remove-work-detail">Remove</button>
            </div>
        </div>
        `;
                            workDetailsContainer.appendChild(newWorkDetailsGroup);
                        });

                        // Remove Work Detail Button
                        document.addEventListener('click', function(event) {
                            if (event.target.classList.contains('remove-work-detail')) {
                                event.target.closest('.work-details-group').remove();
                            }
                        });
                    });
                </script>

                <!-- Work Suspended, Delayed, Stopped, and Potential Claims Container -->
                <div id="work-issues-container">
                    <div class="work-issues-group mb-3">
                        <div class="row g-3">
                            <!-- Issue Details -->
                            <div class="col-md-12 col-lg-4 col-xl-4 col-xxl-4">
                                <div class="form-floating mb-3">
                                    <textarea name="work_issues_details[]" class="form-control" rows="3"></textarea>
                                    <label>Details of Work Issues</label>
                                </div>
                            </div>

                            <!-- Issue Type Checkboxes -->
                            <div class="col-sm-6 d-flex flex-wrap">

                                <div class="form-check me-4">
                                    <input type="checkbox" name="work_suspended[0][]" value="1"
                                        class="form-check-input">
                                    <label class="form-check-label">Suspended</label>
                                </div>

                                <div class="form-check me-4">
                                    <input type="checkbox" name="work_delayed[0][]" value="1" class="form-check-input">
                                    <label class="form-check-label">Delayed</label>
                                </div>

                                <div class="form-check me-4">
                                    <input type="checkbox" name="work_stopped[0][]" value="1" class="form-check-input">
                                    <label class="form-check-label">Stopped</label>
                                </div>

                                <div class="form-check me-4">
                                    <input type="checkbox" name="potential_claims[0][]" value="1"
                                        class="form-check-input">
                                    <label class="form-check-label">Potential Claim</label>
                                </div>
                            </div>

                            <!-- Remove Button -->
                            <div class="col-sm-2 d-flex align-items-center">
                                <button type="button" class="btn btn-danger btn-md remove-work-issue">Remove</button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Add Work Issue Button -->
                <div class="col-sm-3 d-flex align-items-center">
                    <button type="button" id="add-work-issue" class="btn btn-primary btn-md mb-3">Add Issue</button>
                </div>

                <script>
                    document.addEventListener('DOMContentLoaded', function() {
                        let workIssueIndex = 0; // Start from 0

                        // Add Work Issue Button
                        document.getElementById('add-work-issue').addEventListener('click', function() {
                            workIssueIndex++; // Increment index before adding new issue

                            const workIssuesContainer = document.getElementById('work-issues-container');
                            const newWorkIssueGroup = document.createElement('div');
                            newWorkIssueGroup.className = 'work-issues-group mb-3';
                            newWorkIssueGroup.innerHTML = `
            <div class="row g-3">
                <!-- Issue Details -->
                <div class="col-md-12 col-lg-4 col-xl-4 col-xxl-4">
                    <div class="form-floating mb-3">
                        <textarea name="work_issues_details[]" class="form-control" rows="3"></textarea>
                        <label>Details of Work Issues</label>
                    </div>
                </div>

                <!-- Issue Type Checkboxes -->
                <div class="col-sm-6 d-flex flex-wrap">
                    <div class="form-check me-4">
                        <input type="checkbox" name="work_suspended[${workIssueIndex}][]" value="1" class="form-check-input">
                        <label class="form-check-label">Suspended</label>
                    </div>
                    <div class="form-check me-4">
                        <input type="checkbox" name="work_delayed[${workIssueIndex}][]" value="1" class="form-check-input">
                        <label class="form-check-label">Delayed</label>
                    </div>
                    <div class="form-check me-4">
                        <input type="checkbox" name="work_stopped[${workIssueIndex}][]" value="1" class="form-check-input">
                        <label class="form-check-label">Stopped</label>
                    </div>
                    <div class="form-check me-4">
                        <input type="checkbox" name="potential_claims[${workIssueIndex}][]" value="1" class="form-check-input">
                        <label class="form-check-label">Potential Claim</label>
                    </div>
                </div>

                <!-- Remove Button -->
                <div class="col-sm-2 d-flex align-items-center">
                    <button type="button" class="btn btn-danger btn-md remove-work-issue">Remove</button>
                </div>
            </div>
        `;
                            workIssuesContainer.appendChild(newWorkIssueGroup);
                        });

                        // Remove Work Issue Button
                        document.addEventListener('click', function(event) {
                            if (event.target.classList.contains('remove-work-issue')) {
                                event.target.closest('.work-issues-group').remove();
                            }
                        });
                    });
                </script>

                <!-- Satifaction with work -->
                <div class="col-12 section-title">
                    Satisfaction to the Work carried out
                </div>
                <div class="col-sm-12">
                    <div class="form-floating mb-3">
                        <select class="form-select" id="satisfaction" name="satisfaction">
                            <option value="Yes">Yes</option>
                            <option value="No">No</option>
                        </select>
                        <label for="satisfaction">Satisfied</label>
                    </div>
                </div>

                <!-- Reason for disfaction -->
                <div class="col-12">
                    <div class="form-floating mb-3">
                        <textarea name="remarks" class="form-control" rows="3"></textarea>
                        <label>If No give reason</label>
                    </div>
                </div>

                <!-- Official Validation -->
                <div class="col-12 section-title">Official Validation</div>

                <!-- Official Signature -->
                <div class="col-sm-6">
                    <div class="form-floating mb-3">
                        <input type="text" name="authorised" class="form-control" id="authorised" />
                        <label for="authorised">Name</label>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-floating mb-3 start">
                        <input type="text" name="position" class="form-control" id="position" />
                        <label for="position">Position</label>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-floating mb-3">
                        <input type="text" name="signature" class="form-control" id="signature" />
                        <label for="signature">Signature</label>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-floating mb-3">
                        <input type="date" name="signed_date" class="form-control" id="signed_date" />
                        <label for="signed_date">Signed Date.</label>
                    </div>
                </div>

                <!-- Submit Button -->
                <button type="submit" name="submit" class="btn btn-primary py-2 mb-4"><i class="fa fa-eye"></i> Preview</button>
            </div>
        </form>
    </div>

    <!-- Professional Footer -->
    <footer class="footer-container mt-auto">
        <div class="container text-center">
            <p>&copy; <?= date('Y'); ?> Injessview. All rights reserved.</p>
        </div>
    </footer>

    <!-- Bootstrap Bundle with Popper -->
    <script src="./js/all.min.js"></script>
    <script src="./js/bootstrap.bundle.min.js"></script>
    <?php
    include './scripts.php';
    ?>
</body>

</html>