<?php

require_once 'init.php';
require_once 'helpers.php';


function uploadUserImage(array $user_file): string
{
//    var_dump(__LINE__, $_SERVER);
//    var_dump(__LINE__, $user_file);

    /*
    Array
    (
            [user-image] => Array
            (
                [name] => Kalendorius-2022-08.png
                [full_path] => Kalendorius-2022-08.png
                [type] => image/png
                [tmp_name] => /tmp/phpPpMlNb
                [error] => 0
                [size] => 12168
            )

    )
    */

    if (isset($user_file['size'])) {
        $file = $user_file;

        if ($file['error'] == UPLOAD_ERR_OK) {
            $ext = pathinfo($file['name'], PATHINFO_EXTENSION);
            $ext = strtolower($ext);

            if (!in_array($ext, ALLOWED_EXTENSIONS)) {
                echo 'File ext not allowed';
                exit;
            }

            $path = UPLOAD_DIR . '/' . date('Y/m/d');

            if (!is_dir($path)) {
                mkdir($path, 0777, true);
            }

            do {
                $name = generateRandomString(16);
                $path = sprintf('%s/%s.%s', $path, $name, $ext);
            } while (file_exists($path));

            move_uploaded_file($file['tmp_name'], $path);

            return $_SERVER['HTTP_ORIGIN'] . '/file-uploads/' . date('Y/m/d') . '/' . $name . '.' . $ext;
        }
    }
}


//$_SERVER
//
// POST
//
//
//array(61) {
//    ["HOSTNAME"]=>
//  string(12) "3316f2a30d75"
//    ["PHP_INI_DIR"]=>
//  string(18) "/usr/local/etc/php"
//    ["SHLVL"]=>
//  string(1) "1"
//    ["HOME"]=>
//  string(14) "/home/www-data"
//    ["PHP_LDFLAGS"]=>
//  string(12) "-Wl,-O1 -pie"
//    ["PHP_CFLAGS"]=>
//  string(83) "-fstack-protector-strong -fpic -fpie -O2 -D_LARGEFILE_SOURCE -D_FILE_OFFSET_BITS=64"
//    ["PHP_VERSION"]=>
//  string(5) "8.1.8"
//    ["GPG_KEYS"]=>
//  string(122) "528995BFEDFBA7191D46839EF9BA0ADA31CBD89E 39B641343D8C104B2B146DC3F9C39DC0B9698544 F1F692238FBC1666E5A5CCD4199F9DFEF6FFBAFD"
//    ["PHP_CPPFLAGS"]=>
//  string(83) "-fstack-protector-strong -fpic -fpie -O2 -D_LARGEFILE_SOURCE -D_FILE_OFFSET_BITS=64"
//    ["PHP_ASC_URL"]=>
//  string(54) "https://www.php.net/distributions/php-8.1.8.tar.xz.asc"
//    ["PHP_URL"]=>
//  string(50) "https://www.php.net/distributions/php-8.1.8.tar.xz"
//    ["PATH"]=>
//  string(60) "/usr/local/sbin:/usr/local/bin:/usr/sbin:/usr/bin:/sbin:/bin"
//    ["PHPIZE_DEPS"]=>
//  string(78) "autoconf 		dpkg-dev dpkg 		file 		g++ 		gcc 		libc-dev 		make 		pkgconf 		re2c"
//    ["PWD"]=>
//  string(8) "/var/www"
//    ["PHP_SHA256"]=>
//  string(64) "04c065515bc347bc68e0bb1ac7182669a98a731e4a17727e5731650ad3d8de4c"
//    ["USER"]=>
//  string(8) "www-data"
//    ["HTTP_ACCEPT_LANGUAGE"]=>
//  string(41) "lt,en-US;q=0.9,en;q=0.8,ru;q=0.7,pl;q=0.6"
//    ["HTTP_ACCEPT_ENCODING"]=>
//  string(17) "gzip, deflate, br"
//    ["HTTP_REFERER"]=>
//  string(32) "http://localhost:8085/form-1.php"
//    ["HTTP_SEC_FETCH_DEST"]=>
//  string(8) "document"
//    ["HTTP_SEC_FETCH_USER"]=>
//  string(2) "?1"
//    ["HTTP_SEC_FETCH_MODE"]=>
//  string(8) "navigate"
//    ["HTTP_SEC_FETCH_SITE"]=>
//  string(11) "same-origin"
//    ["HTTP_ACCEPT"]=>
//  string(135) "text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.9"
//    ["HTTP_CONTENT_TYPE"]=>
//  string(68) "multipart/form-data; boundary=----WebKitFormBoundarykWN97EjGQBCduav6"
//    ["HTTP_ORIGIN"]=>
//  string(21) "http://localhost:8085"
//    ["HTTP_USER_AGENT"]=>
//  string(111) "Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.0.0 Safari/537.36"
//    ["HTTP_UPGRADE_INSECURE_REQUESTS"]=>
//  string(1) "1"
//    ["HTTP_SEC_CH_UA_PLATFORM"]=>
//  string(9) ""Windows""
//    ["HTTP_SEC_CH_UA_MOBILE"]=>
//  string(2) "?0"
//    ["HTTP_SEC_CH_UA"]=>
//  string(66) "".Not/A)Brand";v="99", "Google Chrome";v="103", "Chromium";v="103""
//    ["HTTP_CACHE_CONTROL"]=>
//  string(9) "max-age=0"
//    ["HTTP_CONTENT_LENGTH"]=>
//  string(4) "9521"
//    ["HTTP_CONNECTION"]=>
//  string(10) "keep-alive"
//    ["HTTP_HOST"]=>
//  string(14) "localhost:8085"
//    ["PATH_INFO"]=>
//  string(0) ""
//    ["SCRIPT_FILENAME"]=>
//  string(19) "/var/www/form-1.php"
//    ["REDIRECT_STATUS"]=>
//  string(3) "200"
//    ["SERVER_NAME"]=>
//  string(0) ""
//    ["SERVER_PORT"]=>
//  string(2) "80"
//    ["SERVER_ADDR"]=>
//  string(10) "172.21.0.3"
//    ["REMOTE_PORT"]=>
//  string(5) "58202"
//    ["REMOTE_ADDR"]=>
//  string(10) "172.21.0.1"
//    ["SERVER_SOFTWARE"]=>
//  string(12) "nginx/1.23.1"
//    ["GATEWAY_INTERFACE"]=>
//  string(7) "CGI/1.1"
//    ["REQUEST_SCHEME"]=>
//  string(4) "http"
//    ["SERVER_PROTOCOL"]=>
//  string(8) "HTTP/1.1"
//    ["DOCUMENT_ROOT"]=>
//  string(8) "/var/www"
//    ["DOCUMENT_URI"]=>
//  string(11) "/form-1.php"
//    ["REQUEST_URI"]=>
//  string(11) "/form-1.php"
//    ["SCRIPT_NAME"]=>
//  string(11) "/form-1.php"
//    ["CONTENT_LENGTH"]=>
//  string(4) "9521"
//    ["CONTENT_TYPE"]=>
//  string(68) "multipart/form-data; boundary=----WebKitFormBoundarykWN97EjGQBCduav6"
//    ["REQUEST_METHOD"]=>
//  string(4) "POST"
//    ["QUERY_STRING"]=>
//  string(0) ""
//    ["FCGI_ROLE"]=>
//  string(9) "RESPONDER"
//    ["PHP_SELF"]=>
//  string(11) "/form-1.php"
//    ["REQUEST_TIME_FLOAT"]=>
//  float(1660137775.536731)
//  ["REQUEST_TIME"]=>
//  int(1660137775)
//  ["argv"]=>
//  array(0) {
//    }
//  ["argc"]=>
//  int(0)
//}
