<?php

/**
 * Router script for PHP built-in development server.
 *
 * Run from project root:
 *   php -S localhost:8000 server.php
 *
 * Or use Composer: composer run serve
 *
 * This allows running the server from the project root while routing all
 * requests through Laravel's public/index.php and serving static assets from public/.
 */

$uri = urldecode(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));
$publicPath = __DIR__ . '/public';

// Serve existing static files from public directory
if ($uri !== '/' && $uri !== '' && file_exists($publicPath . $uri)) {
    $path = $publicPath . $uri;
    if (is_file($path)) {
        $ext = pathinfo($path, PATHINFO_EXTENSION);
        $mimes = [
            'css' => 'text/css',
            'js' => 'application/javascript',
            'json' => 'application/json',
            'png' => 'image/png',
            'jpg' => 'image/jpeg',
            'jpeg' => 'image/jpeg',
            'gif' => 'image/gif',
            'svg' => 'image/svg+xml',
            'ico' => 'image/x-icon',
            'woff' => 'font/woff',
            'woff2' => 'font/woff2',
            'ttf' => 'font/ttf',
            'eot' => 'application/vnd.ms-fontobject',
        ];
        $mime = $mimes[$ext] ?? (function_exists('mime_content_type') ? (mime_content_type($path) ?: 'application/octet-stream') : 'application/octet-stream');
        header('Content-Type: ' . $mime);
        readfile($path);
        return true;
    }
}

// Route all other requests to Laravel front controller
$_SERVER['SCRIPT_NAME'] = '/index.php';
$_SERVER['SCRIPT_FILENAME'] = $publicPath . '/index.php';

require $publicPath . '/index.php';

return true;
