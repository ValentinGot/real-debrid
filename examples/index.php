<?php
require '../vendor/autoload.php';

header('Content-Type: application/json');

$realDebrid = new \RealDebrid\RealDebrid(new \RealDebrid\Auth\Token('LWP3OAYCCX6YFGRGHDXP5O74EA'));

// /user
//----------------------------------------------

//echo json_encode($realDebrid->user->get());

// /unrestrict
//----------------------------------------------

//echo json_encode($realDebrid->unrestrict->link('https://mega.nz/#!Zp1FFDSC!fo7PcxtdkyDO52x0VdNaeP_W5CiCV84iPtuOqV2y0As'));

// /traffic
//----------------------------------------------

//echo json_encode($realDebrid->traffic->get());
//echo json_encode($realDebrid->traffic->details());
//echo json_encode($realDebrid->traffic->details(\Carbon\Carbon::createFromDate(2015, 11, 24)));
//echo json_encode($realDebrid->traffic->details(\Carbon\Carbon::createFromDate(2015, 11, 24), \Carbon\Carbon::now()));

// /downloads
//----------------------------------------------

//echo json_encode($realDebrid->downloads->get());
//$realDebrid->downloads->delete('UF3VKXU2OCJS4');

// /torrents
//----------------------------------------------

//echo json_encode($realDebrid->torrents->get());
//echo json_encode($realDebrid->torrents->torrent('2KB2OULS7HKUK'));
//echo json_encode($realDebrid->torrents->availableHosts());
//$realDebrid->torrents->delete('URKH6JUQYKXPU');

// /hosts
//----------------------------------------------

//echo json_encode($realDebrid->hosts->get());
//echo json_encode($realDebrid->hosts->status());
//echo json_encode($realDebrid->hosts->regex());
//echo json_encode($realDebrid->hosts->domains());

// /forum
//----------------------------------------------

//echo json_encode($realDebrid->forum->forums());
//echo json_encode($realDebrid->forum->topics(4));

// /settings
//----------------------------------------------

//echo json_encode($realDebrid->settings->get());
//$realDebrid->settings->deleteAvatar();