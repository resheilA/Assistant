
<html>
<head>
<title>Virtual Assistant </title>
</head>

<script>
function showHint(str) {
    if (str.length == 0) {
        document.getElementById("livesearch").innerHTML = "";
        return;
    } else {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("livesearch").innerHTML = xmlhttp.responseText;
            }
        }
        xmlhttp.open("POST", "doc.php?q=" + str, true);
        xmlhttp.send();
    }
}
</script>

<?php

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

?>

<body style='background-image:url("pic01.jpg");background-size:cover;'>
<center><img src='logo3.png' style='height:3cm;padding-top:1cm;'>
<p style='color:#003399;font-family:ms sans;font-size:.5cm;'>Introduces <br><br><font style='font-size:2cm;'> Ping<font color='red'>_</font><font color='yellow'>U</font>
<br></font><font style='font-size:.4cm;'><br>
Your personal assistant
<table width='100%' style='opacity:0.9;bottom:0;position:fixed;z-index:11;height:17%;'>
<tr>
<td width='10%'>
<img src='ass1.gif' style='position:fixed;bottom:0;' align:'right'></img></td>
<td width='90%' style='color:white;'>
<p style='padding-right:.5cm;padding-bottom:1cm;font-family:sans;opacity:0.6'>
<span id="livesearch" color='red' style='color:red;'></span>
<form method='get' action='' style='display:inline;bottom:0;position:fixed;'>
<input type='text' name='q' size='85' style='padding:0.1cm;' autocomplete="off"  onkeyup="showHint(this.value)"
value='<?php 
if($_GET['q']) 
{
echo $_GET['q'];
}
else
{
echo "";
} 
?>' placeholder='Type in here ...'>
<input type='submit' value='Done' style='width:2cm;height:.8cm;'>
</form>
</td>
</tr>
</table>

</body>
</html>
		
