<?php

require_once '../inc/init.php';

$participant1 = new ParticipantDTO(
    'NameFoo',
    'LastNameBar',
    'Vilnius',
    ['PHP', 'JS'],
    'Lorem ipsum is a placeholder text',
    './face-gen/f1.jpg'
);

//var_dump($participant1);

echo $participant1->getFName() . PHP_EOL;
echo $participant1->getLangs() . PHP_EOL;

echo '<br>';


$ps = new PhotoStamp($participant1);
$photo = $ps->generateProfilePhoto();

var_dump($photo);
