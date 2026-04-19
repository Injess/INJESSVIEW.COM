<?php
//set time zone for your country
date_default_timezone_set('Africa/Blantyre');

// 1. Data Source and Caching Configuration
$url = 'https://ppda.mw/tenders';
$cache_file = __DIR__ . '/ppda_tenders_cache.html';
$cache_lifetime = 6 * 3600; // 6 hours in seconds

$html = '';

// Check if cache file exists and is still fresh
if (file_exists($cache_file) && (time() - filemtime($cache_file) < $cache_lifetime)) {
    // Cache is fresh, load content from cache
    $html = file_get_contents($cache_file);
} else {
    // Cache is old or doesn't exist, fetch new content
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    // Add headers to mimic a browser and avoid blocking
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.36'
    ));

    $html = curl_exec($ch);
    $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);

    // Only cache if the fetch was successful (HTTP 200) and content is not empty
    if ($http_code === 200 && !empty($html)) {
        file_put_contents($cache_file, $html);
    } else if (file_exists($cache_file)) {
        // If fetch failed, use the last good cached version
        $html = file_get_contents($cache_file);
    }
}

// Load HTML for scraping (using the fetched or cached content)
$dom = new DOMDocument;
@$dom->loadHTML($html);
$xpath = new DOMXPath($dom);

// Select rows in the table
$rows = $xpath->query('//table[@id="tenderstable"]/tbody/tr');

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Construction Works & Tenders - Injessview</title>
    <link rel="canonical" href="https://injessview.com/construction-works">
    <meta property="og:url" content="https://injessview.com/construction-works" />
    <meta property="og:type" content="website" />
    <meta property="og:image" content="https://injessview.com/img/engineer.png" />
    <meta property="og:title" content="Construction Works & Tenders - Injessview" />
    <meta property="og:description" content="Track current Malawi construction opportunities and follow how they connect to Site InviSion, Ziwilatu, and digital site diaries." />
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/aos.css">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/enhanced.css">
    <link rel="icon" type="image/png" href="./img/engineer.png" /> 
    <script src="./js/sweetalert.min.js"></script>
    
    <meta name="description" content="Browse current construction tenders and jobs in Malawi. Updated information from PPDA tenders.">
    <meta name="keywords" content="construction tenders, Malawi jobs, PPDA, construction works, building contracts">
</head>

<body class="d-flex flex-column min-vh-100 bg-light">
    <?php include './nav.php'; ?>

    <div class="container my-5">
        <div class="text-center mb-5" data-aos="fade-down">
            <h1 class="display-4 mb-3">🏗️ Construction Works & <span class="text-gradient">Tenders</span></h1>
            <p class="lead text-muted">Discover the latest construction opportunities in Malawi</p>
        </div>

        <div class="text-center mb-4" data-aos="zoom-in">
            <img src="./img/engineer.png" alt="Injessview Construction Logo" class="img-fluid hover-lift" style="max-width: 120px; height: auto;">
        </div>
        
        <div class="alert alert-info text-center shadow-custom" data-aos="fade-up">
            <strong>📅 Last Updated:</strong> <?php echo date('F j, Y, g:i a', file_exists($cache_file) ? filemtime($cache_file) : time()); ?>
            <br><small class="mt-2 d-block">Data sourced from PPDA Official Tenders</small>
        </div>

            <div class="alert alert-light shadow-custom" data-aos="fade-up">
            <strong>🧭 Narrative Link:</strong> This construction pipeline is the operational origin of
            <a href="/site-invision class="alert-link">Site InviSion</a>. Ziwilatu network activity helps identify opportunity signals,
            while our <a href="/site-diary class="alert-link">Site Diary</a> forms capture field execution data that strengthens reporting quality.
        </div>

        <div class="table-responsive">
            <table class="table table-striped table-bordered" id="tenderstable">
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Institution</th>
                        <th>Reference No</th>
                        <th>Publish Date</th>
                        <th>Closing Date</th>
                        <th>Attachment</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // Check if $rows is an iterable object before loop
                    if ($rows instanceof DOMNodeList && $rows->length > 0) :
                        foreach ($rows as $row) :
                            // Skip header rows or empty rows that might be included in the selection
                            if ($xpath->query('td', $row)->length > 0) :
                                $title = trim($xpath->query('td[1]', $row)->item(0)->textContent);
                                $institution = trim($xpath->query('td[2]', $row)->item(0)->textContent);
                                $referenceNo = trim($xpath->query('td[3]', $row)->item(0)->textContent);
                                $publishDate = trim($xpath->query('td[4]', $row)->item(0)->textContent);
                                $closingDate = trim($xpath->query('td[5]', $row)->item(0)->textContent);
                                
                                // Get the actual href attribute value
                                $attachmentNode = $xpath->query('td[6]//a/@href', $row)->item(0);
                                $attachmentLink = $attachmentNode ? trim($attachmentNode->textContent) : '#';
                        ?>
                                <tr>
                                    <td><?php echo htmlspecialchars(strtoupper($title)); ?></td>
                                    <td><?php echo htmlspecialchars($institution); ?></td>
                                    <td><?php echo htmlspecialchars($referenceNo); ?></td>
                                    <td><?php echo htmlspecialchars($publishDate); ?></td>
                                    <td><?php echo htmlspecialchars($closingDate); ?></td>
                                    <td>
                                        <?php if ($attachmentLink && $attachmentLink !== '#'): ?>
                                            <a href="<?php echo htmlspecialchars($attachmentLink); ?>" class="btn btn-primary btn-sm" download>
                                                <i class="fa fa-download"></i>
                                            </a>
                                        <?php else: ?>
                                            N/A
                                        <?php endif; ?>
                                    </td>
                                </tr>
                        <?php
                            endif;
                        endforeach;
                    else:
                        // Display error if no rows are found
                        echo '<tr><td colspan="6" class="text-center text-danger">Could not fetch or parse tender data.</td></tr>';
                    endif;
                    ?>
                </tbody>
            </table>
        </div>
    </div>

    <?php include './footer.php'; ?>
    <script>
    </script>
</body>
</html>