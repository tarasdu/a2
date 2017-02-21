<?php

require('tools.php');
require('Form.php');

$score = 0;
$scoreCard = array(
    'a'=>1, 'b'=>3, 'c'=>3, 'd'=>2,
    'e'=>1, 'f'=>4, 'g'=>2, 'h'=>4, 'i'=>1, 'j'=>8,
    'k'=>5, 'l'=>1, 'm'=>3, 'n'=>1, 'o'=>1, 'p'=>3,
    'q'=>10, 'r'=>1, 's'=>1, 't'=>1, 'u'=>1, 'v'=>4,
    'w'=>4, 'x'=>8, 'y'=>4, 'z'=>10);

$form = new DWA\Form($_GET);

$word = $form->get('word', '');
$bonus = $form->get('bonusPoints', '');

if($word == '') {
    return;
} else {
    $letters = str_split($word);
    foreach ($letters as $letter) {
        $score = $score + $scoreCard[strtolower($letter)];
    }

    if($bonus == 'double')
        $score = $score * 2;
    if($bonus == 'triple')
        $score = $score * 3;
    if($form->isChosen('bingo'))
        $score = $score + 50;
}

dump($score);
dump($bonus);
