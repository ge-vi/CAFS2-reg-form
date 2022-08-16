<?php

define('WWW_PATH', dirname(__FILE__, 2));    // '/var/www'
define('UPLOAD_DIR', 'file-uploads');
define('UPLOAD_PATH', WWW_PATH . '/file-uploads');
define('ALLOWED_EXTENSIONS', ['png', 'jpg', 'jpeg']);

require_once WWW_PATH . '/inc/helpers.php';

require_once WWW_PATH . '/inc/upload.php';

require_once WWW_PATH . '/inc/ParticipantDTO.php';
require_once WWW_PATH . '/inc/PhotoFrame.php';
