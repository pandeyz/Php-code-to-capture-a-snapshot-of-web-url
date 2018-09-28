<?php
	$siteURL = 'https://www.google.com/';
	
	if(filter_var($siteURL, FILTER_VALIDATE_URL))
	{
	    $googlePagespeedData = file_get_contents("https://www.googleapis.com/pagespeedonline/v2/runPagespeed?url=$siteURL&screenshot=true");
	
	    $googlePagespeedData = json_decode($googlePagespeedData, true);

	    $screenshot = $googlePagespeedData['screenshot']['data'];
	    $screenshot = str_replace(array('_','-'),array('/','+'),$screenshot);
		
	    echo "<img src=\"data:image/jpeg;base64,".$screenshot."\" />";
	}
	else
	{
	    echo "Please enter a valid URL.";
	}
?>