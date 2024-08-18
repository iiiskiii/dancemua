<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

if(!function_exists('get_html_from_url')) {
	function get_html_from_url($url){

		if (!function_exists('curl_init')) return $html = file_get_contents($url);
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
		curl_setopt($ch, CURLOPT_HEADER, 0); 
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
		curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.7.5) Gecko/20041107 Firefox/1.0');
		$html = curl_exec($ch);
		curl_close($ch);
		return $html;
		
	}
}

if(!function_exists('get_og_from_html')) {
	function get_og_from_html($html){
		
		$enc = mb_detect_encoding($html, array("UTF-8", "EUC-KR", "SJIS"));
		
		libxml_use_internal_errors(true);
		$doc = new DomDocument();
		$doc->loadHTML(mb_convert_encoding($html, 'HTML-ENTITIES', $enc));
		$xpath = new DOMXPath($doc);
		$query = '//*/meta[starts-with(@property, \'og:\')]';
		$metas = $xpath->query($query);
		$og = array();
		foreach ($metas as $meta) {
			$property = $meta->getAttribute('property');
			$content = $meta->getAttribute('content');
			$og[$property] = $content;
		}
		
		return $og;
	}
}

if(!function_exists('get_og_from_url')) {
	function get_og_from_url($url){
		
		$html = get_html_from_url($url);
		if($html) return get_og_from_html($html);
		else return false;
		
	}
}

if($wr_link1 && ($wr_link1 != $write['wr_link1'])) {

	$og = get_og_from_url($wr_link1);
	if(isset($og['og:video:url'])) 		$wr_1 = str_replace("autoplay=1", "autoplay=0", $og['og:video:url']);
	if(isset($og['og:image'])) 			$wr_2 = $og['og:image'];
	if(isset($og['og:title'])) 			$wr_3 = addslashes($og['og:title']);
	if(isset($og['og:description'])) 	$wr_4 = addslashes($og['og:description']);
	if(isset($og['og:site_name'])) 		$wr_5 = addslashes($og['og:site_name']);
	else 								$wr_5 = strtoupper(preg_replace("/(https?:\/\/)([^\/]*).*/i", "$2", $wr_link1));

} else if($wr_link1){
	
	for($i=1; $i<=5; $i++){
		${'wr_'.$i} = $write['wr_'.$i];
	}

}
?>
