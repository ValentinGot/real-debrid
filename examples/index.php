<?php
require '../vendor/autoload.php';

header('Content-Type: application/json');

$realDebrid = new \RealDebrid\RealDebrid(new \RealDebrid\Auth\Token('LWP3OAYCCX6YFGRGHDXP5O74EA'));

// /user
//----------------------------------------------

//echo json_encode($realDebrid->user->get());

// /unrestrict
//----------------------------------------------

//$realDebrid->unrestrict->link('https://mega.nz/#!Z0snjBCa!7_6P4JygN7FZWOp-cQu544n5QTN0mwEQVhKSQ-NqH0Y');

// /traffic
//----------------------------------------------

//echo json_encode($realDebrid->traffic->get());
//echo json_encode($realDebrid->traffic->details());

// /downloads
//----------------------------------------------

echo json_encode($realDebrid->downloads->get());
//$realDebrid->downloads->delete('UF3VKXU2OCJS4');