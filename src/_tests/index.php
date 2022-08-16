<?php

require_once '../inc/init.php';

$participant1 = new ParticipantDTO();

$participant1->setFirstName('NameFoo');
$participant1->setLastName('LastNameBar');
$participant1->setCity('Vilnius');
$participant1->setLangs(['PHP', 'JS']);
$participant1->setInfo('Lorem ipsum is a placeholder text');
$participant1->setImage([
    'http_path' => '/_tests/face-gen/f1.jpg',
    'fs_path' => './face-gen/f1.jpg'
]);

//var_dump($participant1);

echo $participant1->getFirstName() . PHP_EOL;
echo $participant1->getLangs() . PHP_EOL;

echo '<br>';


$ps = new PhotoFrame($participant1);
$photo = $ps->generateProfilePhoto();

var_dump($photo);
