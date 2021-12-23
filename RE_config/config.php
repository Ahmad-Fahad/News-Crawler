
<?php

	function bbc($typeOfNews) {

		global $countTitle, $countLink, $titles, $links;

			$url			  = "http://www.bbc.com/news/".$typeOfNews;
			$titleDelimeter   = ' /<span class=\"title-link__title-text\">(.*?)<\/span>/';
			$linkDelimeter    = '/<a href=\"(.*?)\" class="title-link">/';

			$html = getData($url);

			$countTitle = preg_match_all($titleDelimeter, $html, $titles);

			$countLink  = preg_match_all($linkDelimeter, $html, $links);	

	}
	
	

	?>