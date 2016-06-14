<?php
if($_GET['q']) 
{
//Initialize
$q = $_GET['q'];
include("connect.php");
$parts = explode(' ', $q);
$offset = count($parts)-1;
$size = sizeof($parts);
$r = 0;
$score;

// Turn off all error reporting
error_reporting(0);

	// echo $size;
	//$sql="SELECT * FROM search_iglo WHERE keywords='$q'";

// :P BLACK LISTED WORDS ACTUALLY
	function whitelist($str)
	{
	$str = $str;
	$worda = array("This","what","What","your","will","how","tell","about");
	$tr = sizeof($worda);
	while($tr != 0)
	{
	if($worda[$tr] == $str)
	{return 1;}
	$tr--;
	}
	return 0; 
	}

/*

//  THE WRONG SEARCH SCRIPT 
$sqls = "SELECT * FROM search_iglo
WHERE Keywords LIKE '%$q%'";

$results=mysql_query($sqls);
if(!$results)
{
echo "Error: Please try again sometime later.<br><br>".mysql_error();die();
}
$counts=mysql_num_rows($results);
while($row = mysql_fetch_array($results))
 {	
  $contenta = $row['Content'];	
 }
 echo $contenta."<br> You were expecting something else then please";break;
// THIS IS IT //
 echo '<bR><BR><BR>';
*/

//TO CREATE A SHORT STRING FOR SEARCHING WORST
$re=0;$g=0;
$sizer = $size;
while($sizer != 0)
{
$key = $parts[$re];
$whitelists = whitelist($key);

if($whitelists != 1 && strlen($key) > 3 )
{
$de[$g] = $key;
$g++;
}
$sizer--;$re++;
}
$str = $comma_separated = implode(" ", $de);

//NOW IT BEGANS
while($size != 0)
{
$key = $parts[$r];
$whitelist = whitelist($key);


//echo strlen($key);
if($whitelist != 1 && strlen($key) > 3 )
{

$sql = "SELECT * FROM search_iglo
WHERE Keywords LIKE '%$key%'";

$result=mysql_query($sql);
if(!$result)
{
echo "Error: Please try again sometime later.<br><br>".mysql_error();die();
}
$count=mysql_num_rows($result);

$score[$size] = $count; 
$count;

$size--;$r++;
}
else{$size--;$r++;}
}
// echo $parts[3];

if($count==0)
{
echo "<tr><td> Try writing in a other way...</td></tr>";
}
$counters =0;

if($count > 1)
{
//IF MANY RESULTS THEN TO CHOOSE BEST WE USE ABOVE $STR STRING TO SEARCH
$sqls = "SELECT * FROM search_iglo
WHERE Keywords LIKE '%$str%'";

$results=mysql_query($sqls);
if(!$results)
{
echo "Error: Please try again sometime later.<br><br>".mysql_error();die();
}
$counts=mysql_num_rows($results);
while($rows = mysql_fetch_array($results))
 {	
  $contenta = $rows['Content'];	
 }
 echo $contenta.'<br>';
 $content = "If you were expecting something else please specify more. Tell me excatly which '".$_GET['q']."'";
}
else
{
while($row = mysql_fetch_array($result))
 {	
 $content = $row['Content'];
 }
}

}

//This is for making in-funtions // NOW A WASTE
if($content == "Key-13")
{
$content = '
<div  style="width:88%;height:100%;padding-bottom:.7cm;">
<a href="http://www.accuweather.com/en/in/mumbai/204842/weather-forecast/204842" class="aw-widget-legal">
<!--
By accessing and/or using this code snippet, you agree to AccuWeather’s terms and conditions (in English) which can be found at http://www.accuweather.com/en/free-weather-widgets/terms and AccuWeather’s Privacy Statement (in English) which can be found at http://www.accuweather.com/en/privacy.
-->
</a><div id="awcc1440767572013" class="aw-widget-current"  data-locationkey="204842" data-unit="c" data-language="en-us" data-useip="false" data-uid="awcc1440767572013"></div><script type="text/javascript" src="http://oap.accuweather.com/launch.js"></script>
';
}

//PRINTING FINALLY :)
if($_GET['q']) 
{
echo $content."<bR><br>";
}
else
{
echo "Hi, Im PingU your personal virtual assistant.";
} 
?>

