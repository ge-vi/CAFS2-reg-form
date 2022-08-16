<?php

require_once 'init.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $participant = new ParticipantDTO();

    if (str_contains($_SERVER['CONTENT_TYPE'], 'multipart/form-data')) {

        $participant->setFirstName($_POST['f_name'] ?? '');
        $participant->setLastName($_POST['l_name'] ?? '');
        $participant->setCity($_POST['city'] ?? '');
        $participant->setLangs($_POST['lang'] ?? []);
        $participant->setInfo($_POST['info'] ?? '');

        try {
            $image = saveFormImage($_FILES['user-image']);
            $participant->setImage($image);

            $ps = new PhotoFrame($participant);
            $participant = $ps->generateProfilePhoto();

        } catch (Exception $e) {
            http_response_code(500);
            exit;
        }
    }


    http_response_code(200);
    echo json_encode(['participant' => $participant]);
    exit;
}
