<?php
require __DIR__ . '/../vendor/autoload.php';

$dotenv = new Dotenv\Dotenv(dirname(__DIR__));
$dotenv->load();

header('Content-Type: application/json');

$realDebrid = new \RealDebrid\RealDebrid(new \RealDebrid\Auth\Token('AAA'));
echo json_encode($realDebrid->user->get());

// /user
//----------------------------------------------

//echo '<pre>' . var_export($realDebrid->user->get(), true) . '</pre>';

// /unrestrict
//----------------------------------------------

//echo json_encode($realDebrid->unrestrict->check('https://mega.nz/#!Zp1FFDSC!fo7PcxtdkyDO52x0VdNaeP_W5CiCV84iPtuOqV2y0Assdmlfksmlfk'));
//echo json_encode($realDebrid->unrestrict->check('https://megaaa.nz/#!Zp1FFDSC!fo7PcxtdkyDO52x0VdNaeP_W5CiCV84iPtuOqV2y0Assdmlfksmlfk'));
//echo json_encode($realDebrid->unrestrict->link('https://mega.nz/#!Zp1FFDSC!fo7PcxtdkyDO52x0VdNaeP_W5CiCV84iPtuOqV2y0As'));
//echo json_encode($realDebrid->unrestrict->link('https://www.youtube.com/watch?v=gd7iyNv1qEA'));
//echo json_encode($realDebrid->unrestrict->link('https://mega.nz/#!Zp1FFDSC!fo7PcxtdkyDO52x0VdNaeP_W5CiCV84iPtuOqV2y0As', 'password'));
//echo json_encode($realDebrid->unrestrict->folder('https://mega.nz/#F!F90nET7a!Dg0pH7gTTG_jmrRBemM77g'));

// /traffic
//----------------------------------------------

//echo json_encode($realDebrid->traffic->get());
//echo json_encode($realDebrid->traffic->details());
//echo json_encode($realDebrid->traffic->details(\Carbon\Carbon::createFromDate(2015, 11, 24)));
//echo json_encode($realDebrid->traffic->details(\Carbon\Carbon::createFromDate(2015, 11, 24), \Carbon\Carbon::now()));

// /downloads
//----------------------------------------------

// First 50 downloads
//echo json_encode($realDebrid->downloads->get());

// Page 2, 50 downloads
//echo json_encode($realDebrid->downloads->get(2));

// Page 2, 5 downloads
//echo json_encode($realDebrid->downloads->get(2, 5));

// 5 downloads from offset 1
//echo json_encode($realDebrid->downloads->get(null, 5, 1));

// Delete a link from download list
//$realDebrid->downloads->delete('YIGVDNFEBBGCA');

// /torrents
//----------------------------------------------

// First 50 torrents
//echo json_encode($realDebrid->torrents->get());

// First 50 active torrents
//echo json_encode($realDebrid->torrents->get(true));

// Page 2, 50 torrents
//echo json_encode($realDebrid->torrents->get(false, 2));

// Page 2, 5 torrents
//echo json_encode($realDebrid->torrents->get(false, 2, 5));

// 5 torrents from offset 1
//echo json_encode($realDebrid->torrents->get(false, null, 5, 1));

// Torrent information
//echo json_encode($realDebrid->torrents->torrent('427EGNLB6FDY2'));

// Available hosts to upload a torrent
//echo json_encode($realDebrid->torrents->availableHosts());

// Add torrent file
//echo json_encode($realDebrid->torrents->addTorrent('C:\Users\v.got\Downloads\[kat.cr]game.of.thrones.s05e01.720p.hdtv.x264.immerse.torrent'));

// Add torrent magnet
//echo json_encode($realDebrid->torrents->addMagnet('magnet:?xt=urn:btih:637CE466AEC75A977D8BD02923ACF2788B2FA782&dn=game+of+thrones+s05e01+720p+hdtv+x264+immerse&tr=udp%3A%2F%2Fcoppersurfer.tk%3A6969%2Fannounce&tr=udp%3A%2F%2Fglotorrents.pw%3A6969%2Fannounce'));
//echo json_encode($realDebrid->torrents->addMagnet('magnet:?xt=urn:btih:DA36686169A9696D875FB413F8B034C06C48AB1B&dn=game+of+thrones+s05e02+720p+hdtv+x264+immerse&tr=udp%3A%2F%2Fopen.demonii.com%3A1337%2Fannounce&tr=udp%3A%2F%2Fglotorrents.pw%3A6969%2Fannounce', 1));
//echo json_encode($realDebrid->torrents->addMagnet('magnet:?xt=urn:btih:DA36686169A9696D875FB413F8B034C06C48AB1B&dn=game+of+thrones+s05e02+720p+hdtv+x264+immerse&tr=udp%3A%2F%2Fopen.demonii.com%3A1337%2Fannounce&tr=udp%3A%2F%2Fglotorrents.pw%3A6969%2Fannounce', 1, 10));

// Select files
//$realDebrid->torrents->selectFiles('3BQR3NVCVDB2M');
//$realDebrid->torrents->selectFiles('NKGCN7RWCPGXC', [1, 3]);

// Delete a link from torrents list
//$realDebrid->torrents->delete('NQWCZ4BPWGRGE');

// /hosts
//----------------------------------------------

//echo json_encode($realDebrid->hosts->get());
//echo json_encode($realDebrid->hosts->status());
//echo json_encode($realDebrid->hosts->regex());
//echo json_encode($realDebrid->hosts->domains());

// /forum
//----------------------------------------------

//echo json_encode($realDebrid->forum->forums());

// Forum '4'
//echo json_encode($realDebrid->forum->topics(4));

// Forum '4', no meta
//echo json_encode($realDebrid->forum->topics(4, false));

// Forum '4', no meta, page 2
//echo json_encode($realDebrid->forum->topics(4, false, 1, 5));

// Forum '4', no meta, page 2, limit 5
//echo json_encode($realDebrid->forum->topics(4, false, 1, 5));

// Forum '4', no meta, limit 5, offset 1
//echo json_encode($realDebrid->forum->topics(4, false, null, 5, 1));

// /settings
//----------------------------------------------

// User settings
//echo json_encode($realDebrid->settings->get());

// Update setting
// FIXME Throwing an unknown_method error
//$realDebrid->settings->update(\RealDebrid\Api\Settings::DOWNLOAD_PORT, 'secured');

// Convert fidelity points
// FIXME Throwing an unknown_method error
//$realDebrid->settings->convertPoints();

// Change password
// FIXME Throwing an unknown_method error
//$realDebrid->settings->changePassword();

// Upload avatar
//$realDebrid->settings->addAvatar('C:\fakepath\avatar.png');

// Delete avatar
//$realDebrid->settings->deleteAvatar();