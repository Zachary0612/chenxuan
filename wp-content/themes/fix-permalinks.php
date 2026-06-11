<?php
if (PHP_SAPI !== 'cli') {
    http_response_code(403);
    exit('Forbidden');
}

if (!defined('ABSPATH')) {
    define('ABSPATH', '/var/www/html/');
}
require ABSPATH . 'wp-load.php';

echo "Current permalink: " . get_option('permalink_structure') . "\n";
echo "Rewrite module: " . (function_exists('apache_get_modules') ? 'available' : 'not checked') . "\n";

// Set permalink structure
update_option('permalink_structure', '/%postname%/');

// Flush rewrite rules
flush_rewrite_rules(true);

echo "Permalink set to: /%postname%/\n";
echo "Rewrite rules flushed.\n";

// Check pages
echo "\nPages:\n";
foreach (get_pages() as $p) {
    $url = get_permalink($p->ID);
    echo "  {$p->post_name} => {$url}\n";
}

// Check .htaccess
$htaccess = '/var/www/html/.htaccess';
if (file_exists($htaccess)) {
    echo "\n.htaccess exists, content:\n";
    echo file_get_contents($htaccess);
} else {
    echo "\n.htaccess DOES NOT EXIST!\n";
    // Try to create it
    $rules = "# BEGIN WordPress\n<IfModule mod_rewrite.c>\nRewriteEngine On\nRewriteBase /\nRewriteRule ^index\\.php$ - [L]\nRewriteCond %{REQUEST_FILENAME} !-f\nRewriteCond %{REQUEST_FILENAME} !-d\nRewriteRule . /index.php [L]\n</IfModule>\n# END WordPress\n";
    if (file_put_contents($htaccess, $rules)) {
        echo "Created .htaccess successfully\n";
    } else {
        echo "FAILED to create .htaccess\n";
    }
}
