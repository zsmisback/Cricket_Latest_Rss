<?php

function espnnews()
{
	include 'config.php';
	
$url = "https://www.espncricinfo.com/rss/content/story/feeds/0.xml";
$xml = simplexml_load_file($url);

if(!$xml)
{
	echo "Could not retrieve data from espncricinfo";
}


for($i=0;$i<sizeof($xml->channel->item);$i++)
{
	$title = $xml->channel->item[$i]->title;
	$description = $xml->channel->item[$i]->description;
	$pubdate = $xml->channel->item[$i]->pubDate;
	$image = $xml->channel->item[$i]->coverImages;
	$links = $xml->channel->item[$i]->link;
	
	$sql = "INSERT INTO latest_cric_news(title,description,pubdate,image,link)VALUES('$title','$description','$pubdate','$image','$links')";
	$result = $db->query($sql);
	
}

if($result)
	{ 
       echo "Something went wrong";
		
	}
	
echo "Successfully inserted data from espncricinfo";
echo "<br>";


}

function timesofindianews()
{
	include 'config.php';

$url2 = "https://timesofindia.indiatimes.com/rssfeeds/54829575.cms";
$xml2 = simplexml_load_file($url2);

if(!$xml2)
{
	echo "Could not retrieve info from times of india";
}


for($j=0;$j<sizeof($xml2->channel->item);$j++)
{
	$title2 = $xml2->channel->item[$j]->title;
	$description2 = $xml2->channel->item[$j]->description;
	$pubdate2 = $xml2->channel->item[$j]->pubDate;
	$links2 = $xml2->channel->item[$j]->link;
	
	$sql2 = "INSERT INTO latest_cric_news(title,description,pubdate,link)VALUES('$title2','$description2','$pubdate2','$links2')";
	$result2 = $db->query($sql2);
	if(!$result2)
	{
		
	}
}

echo "Successfully inserted data from times of india";
echo "<br>";

}

function gethindunews()
{
	include 'config.php';

$url3 = "https://www.thehindu.com/sport/cricket/feeder/default.rss";
$xml3 = simplexml_load_file($url3);

if(!$xml3)
{
	echo "Could not retrieve info from the hindu news";
}


for($k=0;$k<sizeof($xml3->channel->item);$k++)
{
	$title3 = $xml3->channel->item[$k]->title;
	$description3 = $xml3->channel->item[$k]->description;
	$pubdate3 = $xml3->channel->item[$k]->pubDate;
	$links3 = $xml3->channel->item[$k]->link;
	
	$sql3 = "INSERT INTO latest_cric_news(title,description,pubdate,link)VALUES('$title3','$description3','$pubdate3','$links3')";
	$result3 = $db->query($sql3);
	if(!$result3)
	{
		
	}
}

echo "Successfully inserted data from the hindu news";
echo "<br>";

}


?>