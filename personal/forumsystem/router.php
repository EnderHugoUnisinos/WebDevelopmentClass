<?php
// Get the request URI and remove query strings
$request = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$filepath = $_SERVER['DOCUMENT_ROOT'] . $request;

if (file_exists($filepath) && is_file($filepath)) {
    return false; // Let PHP's built-in server serve the file directly
}

// Define allowed pages
$allowed_pages = ['home', 'ping', 'profile', 'board', 'mail'];

// Remove leading slash
$page = trim($request, '/');

// If no page is provided (visiting "/"), use 'home'
if ($page == '' || $page == 'index') {
    $page = 'home';
}

// Check if the page exists
if (in_array($page, $allowed_pages)) {
    include "pages/$page.php";
} else {
    http_response_code(404);
    echo '
    <div class="error-message"> 
        <h1>404 - Page Not Found</h1>
    </div>
    ';
}
?>
