<?php
if (PHP_SAPI !== 'cli') {
    http_response_code(403);
    exit('Forbidden');
}

if (!defined('ABSPATH')) {
    define('ABSPATH', '/var/www/html/');
}
require ABSPATH . 'wp-load.php';

// Delete old Chinese-slug duplicates and sample page
$delete_ids = [2, 3, 5, 6, 7, 8, 9, 10, 11];
foreach ($delete_ids as $id) {
    wp_delete_post($id, true);
    echo "Deleted post ID={$id}\n";
}

// Set front page
update_option('show_on_front', 'page');
update_option('page_on_front', 12);
echo "Front page set to ID=12\n";

// Set permalink structure
update_option('permalink_structure', '/%postname%/');

echo "\nFinal pages:\n";
foreach (get_pages() as $p) {
    echo "  ID={$p->ID} slug={$p->post_name} title={$p->post_title}\n";
}
