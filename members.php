<?php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
	$url = "https://steamcommunity.com/groups/SteamGroupLink"."/memberslistxml/?xml=1";

    $ch = curl_init();
    curl_setopt($ch,CURLOPT_URL,$url);
    curl_setopt($ch,CURLOPT_CONNECTTIMEOUT,2);
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    $data = curl_exec($ch);
    $xml = simplexml_load_string($data);
    $json = json_encode($data);
    $array = json_decode($json,TRUE);
    curl_close($ch);

    $groupname = $xml->groupDetails->groupName;
    $members = $xml->groupDetails->memberCount;
    $groupurl = $xml->groupDetails->groupURL;
?>
