<?php

echo "<center><button class='btn btn-lg btn-danger btn-block' id='clarin' name='clarin' onclick='ElegirRSS(this.id)'>RSS de Clarín</button>";
echo "<button class='btn btn-lg btn-danger btn-block' id='bbc' name='bbc' onclick='ElegirRSS(this.id)'>RSS de la BBC</button>";
echo "<button class='btn btn-lg btn-danger btn-block' id='espn' name='espn' onclick='ElegirRSS(this.id)'>RSS de ESPN</button></center></br>";

if(isset($_POST['cualRSS']))
{
	switch ($_POST['cualRSS']) {
	case 'clarin':
		$rss = simplexml_load_file('http://www.clarin.com/rss/lo-ultimo/');

		echo "<a href='".$rss->channel->link."'><img src='".$rss->channel->image->url."'/></a></br></br>";

		foreach ($rss->channel->item as $item) {
			echo "<a href='".$item->link."'>$item->title</a></br>";
			echo $item->description."</br></br>";
		}
		break;
	case 'bbc':
		$rss2 = simplexml_load_file('http://www.bbc.com/mundo/index.xml/');

		echo "<a href='".$rss2->link."'><img src='".$rss2->logo."'/></a></br></br>";

		$i = 0;
		foreach ($rss2->entry as $item) {
			if(++$i > 10) break;
			echo "<a href='".$item->link."'>$item->title</a></br>";
			echo $item->summary."</br></br>";
		} 
		break;
	case 'espn':
		$rss = simplexml_load_file('http://sports.espn.go.com/espn/rss/news/');

		echo "<a href='".$rss->channel->link."'><img src='".$rss->channel->image->url."'/></a></br></br>";

		foreach ($rss->channel->item as $item) {
			echo "<a href='".$item->link."'>$item->title</a></br>";
			echo $item->description."</br></br>";
		}
		break;
	default:
		echo "ninguno de los dos";
		break;
	}
}



?>