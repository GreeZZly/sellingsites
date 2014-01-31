<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('RSS_Tags'))
{
	function RSS_Tags($item)
	{
			$y = array();
			$tnl = $item->getElementsByTagName("title");
			$tnl = $tnl->item(0);
			$title = $tnl->firstChild->textContent;

			$tnl = $item->getElementsByTagName("link");
			$tnl = $tnl->item(0);
			$link = $tnl->firstChild->textContent;

			$tnl = $item->getElementsByTagName("pubDate");
			$tnl = $tnl->item(0);
			$date = $tnl->firstChild->textContent;		

			$tnl = $item->getElementsByTagName("description");
			$tnl = $tnl->item(0);
			$description = $tnl->firstChild->textContent;

			$y["title"] = $title;
			$y["link"] = $link;
			$y["date"] = $date;		
			$y["description"] = $description;

			return $y;
	}
}

if ( ! function_exists('RSS_Read'))
{
	function RSS_Read($url)
	{
		$doc  = new DOMDocument();
		$doc->load($url);

		$items = $doc->getElementsByTagName("item");    

		$RSS_Content = array();

		foreach($items as $item)
		{
			$y = RSS_Tags($item);	// get description of article, type 1
			array_push($RSS_Content, $y);
		} 
	    return $RSS_Content;	
	}
}
