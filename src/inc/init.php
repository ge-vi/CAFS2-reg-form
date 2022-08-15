<?php /** @noinspection ALL */

define('SRC_DIR', dirname(__FILE__, 2));    // '/var/www'
define('UPLOAD_PATH', SRC_DIR . '/file-uploads');
define('ALLOWED_EXTENSIONS', ['png', 'jpg', 'jpeg']);

require_once SRC_DIR . '/inc/helpers.php';

require_once SRC_DIR . '/inc/upload.php';

require_once SRC_DIR . '/inc/ParticipantDTO.php';
require_once SRC_DIR . '/inc/PhotoStamp.php';
