<?php
	$url = 'https://torrentwal.net/bbs//rss.php?k='.$_GET[k].'&b='.$_GET[b];
	$content = get_html($url);
	$content = preg_replace('/&(?![a-z]{2,5};)/', '&amp;', $content);
	
	print_r('<?xml version="1.0" encoding="UTF-8"?>');
	print_r($content);
	
function get_html($url) {
	
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
	curl_setopt($ch, CURLOPT_HEADER, 0);
	curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows NT 10.0; Win64; x64; Trident/7.0; rv:11.0) like Gecko" );
	
	$data = curl_exec($ch);
	curl_close($ch);
	
	return $data;
}
	
	
?>