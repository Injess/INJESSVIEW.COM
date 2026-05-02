<?php
//set time zone for your country
date_default_timezone_set('Africa/Blantyre');

// 1. Data Source and Caching Configuration
$url = 'https://www.siteinvi.com/api/regional-feed/';
$cache_file = __DIR__ . '/siteinvi_feed_cache.json';
$cache_lifetime = 6 * 3600; // 6 hours in seconds

$feed_response = '';

// Check if cache file exists and is still fresh
if (file_exists($cache_file) && (time() - filemtime($cache_file) < $cache_lifetime)) {
    // Cache is fresh, load content from cache
    $feed_response = file_get_contents($cache_file);
} else {
    // Cache is old or doesn't exist, fetch new content
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    // Add headers to mimic a browser and avoid blocking
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.36'
    ));

    $feed_response = curl_exec($ch);
    $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);

    // Only cache if the fetch was successful (HTTP 200) and content is not empty
    if ($http_code === 200 && !empty($feed_response)) {
        file_put_contents($cache_file, $feed_response);
    } else if (file_exists($cache_file)) {
        // If fetch failed, use the last good cached version
        $feed_response = file_get_contents($cache_file);
    }
}

// Parse JSON feed items from Site InviSion
$feed_items = array();
$feed_data = json_decode($feed_response, true);

if (is_array($feed_data) && !empty($feed_data['success']) && !empty($feed_data['items'])) {
    foreach ($feed_data['items'] as $item) {
        $raw_pub_date = (string) ($item['created_at'] ?? '');
        $formatted_pub_date = $raw_pub_date;

        if (!empty($raw_pub_date)) {
            $timestamp = strtotime($raw_pub_date);
            if ($timestamp !== false) {
                $formatted_pub_date = date('M j, Y g:i a', $timestamp);
            }
        }

        $feed_items[] = array(
            'title' => (string) ($item['title'] ?? 'Untitled Item'),
            'pubDate' => $formatted_pub_date,
            'link' => (string) ($item['click_url'] ?? $item['source_url'] ?? ''),
            'detail_url' => (string) ($item['detail_url'] ?? ''),
            'source' => (string) ($item['institution'] ?? 'Site InviSion')
        );
    }
}

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
    <meta property="og:description" content="Follow the latest Site InviSion feed updates and connect them to Site Diary reporting workflows." />
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/aos.css">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/enhanced.css">
    <link rel="icon" type="image/png" href="./img/INVI_LOGO.png" /> 
    <script src="./js/sweetalert.min.js"></script>
    
    <meta name="description" content="Browse the latest updates from Site InviSion feed and connect them to your digital field workflows.">
    <meta name="keywords" content="Site InviSion, construction updates, site feed, site diary, project updates">
</head>

<body class="d-flex flex-column min-vh-100 bg-light">
    <?php include './nav.php'; ?>

    <div class="container my-5">
        <div class="text-center mb-5" data-aos="fade-down">
            <h1 class="display-4 mb-3">🏗️ Construction Works & <span class="text-gradient">Feed</span></h1>
            <p class="lead text-muted">Latest updates from Site InviSion</p>
        </div>

        <div class="text-center mb-4" data-aos="zoom-in">
            <img src="./img/engineer.png" alt="Injessview Construction Logo" class="img-fluid hover-lift" style="max-width: 120px; height: auto;">
        </div>
        
        <div class="alert alert-info text-center shadow-custom" data-aos="fade-up">
            <strong>📅 Last Updated:</strong> <?php echo date('F j, Y, g:i a', file_exists($cache_file) ? filemtime($cache_file) : time()); ?>
            <br><small class="mt-2 d-block">Data sourced from the Site InviSion API</small>
        </div>

            <div class="alert alert-light shadow-custom" data-aos="fade-up">
            <strong>🧭 Narrative Link:</strong> This construction pipeline is the operational origin of
            <a href="/site-invision" class="alert-link">Site InviSion</a>. Ziwilatu network activity helps identify opportunity signals,
            while our <a href="/site-diary" class="alert-link">Site Diary</a> forms capture field execution data that strengthens reporting quality.
        </div>

        <div class="table-responsive">
            <table class="table table-striped table-bordered" id="tenderstable">
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Published</th>
                        <th>Source</th>
                        <th>Open</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (!empty($feed_items)) :
                        foreach ($feed_items as $feed_item) :
                        ?>
                                <tr>
                                    <td><?php echo htmlspecialchars($feed_item['title']); ?></td>
                                    <td><?php echo htmlspecialchars($feed_item['pubDate']); ?></td>
                                    <td><?php echo htmlspecialchars($feed_item['source']); ?></td>
                                    <td>
                                        <?php if (!empty($feed_item['link'])): ?>
                                            <a href="<?php echo htmlspecialchars($feed_item['link']); ?>" class="btn btn-primary btn-sm" target="_blank" rel="noopener noreferrer">Open</a>
                                        <?php else: ?>
                                            N/A
                                        <?php endif; ?>
                                    </td>
                                </tr>
                        <?php
                        endforeach;
                    else:
                        echo '<tr><td colspan="4" class="text-center text-danger">Could not fetch or parse Site InviSion API data.</td></tr>';
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