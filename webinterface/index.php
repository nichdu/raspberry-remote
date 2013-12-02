<?php
/*
 * Raspberry Remote
 * http://xkonni.github.com/raspberry-remote/
 *
 * webinterface
 *
*/

/*
 * get configuration
 * don't forget to edit config.php
 */
include("config.php");?>
<html>
  <head>
    <title>Switches</title>
    <link rel="stylesheet" href="style.css">
    <link rel="icon"
          type="image/png"
          href="favicon.png">
    <meta name="viewport"
          content="
              height = device-height,
              width = device-width,
              initial-scale = 1.0,
              user-scalable = no ,
              target-densitydpi = device-dpi" />
  </head>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
  <script>
  	$(document).ready(function() {
  		$('a.ajax').click(function() {
  			$.get($(this).attr('href'), function(data) {
  				if (data.code != 0) {
  					alert(data.message);
  				}
  			});
  			return false;
  		});
  	});
  </script>
<body>
<?php
/*
 * table containing all configured sockets
 */
$index=0;
echo "<TABLE BORDER=\"0\">\n";
foreach($config as $current) {
  if ($current != "") {
    $ig = $current[0];
    $is = $current[1];
    $id = $current[2];

    echo "<TR>\n";
    
    echo "<TD class=outer BGCOLOR=\"#00C000\">\n";
    echo "<TABLE><TR><TD class=inner BGCOLOR=\"#000000\">";
    echo "<A CLASS=\"on ajax\" HREF=\"api.php?group=".$ig;
    echo "&switch=".$is;
    echo "&action=1";
    echo "\">";
    echo "<H3>".$id."</H3><BR />";
    echo $ig.":".$is."<BR />";
    echo "switch on";
    echo "</A>";
    echo "</TD>";
    echo "</TR></TABLE>\n";
    echo "</TD>\n";
    echo "<TD class=outer BGCOLOR=\"#C00000\">\n";
    echo "<TABLE><TR><TD class=inner BGCOLOR=\"#000000\">";
    echo "<A CLASS=\"off ajax\" HREF=\"api.php?group=".$ig;
    echo "&switch=".$is;
    echo "&action=0";
    echo "\">";
    echo "<H3>".$id."</H3><BR />";
    echo $ig.":".$is."<BR />";
    echo "switch off";
    echo "</A>";
    echo "</TD>";
    echo "</TR></TABLE>\n";
    echo "</TD>\n";
  }
  else {
    echo "<TD></TD>\n";
  }
echo "</TR>\n";
  $index++;
}
echo "</TR></TABLE>";
?>
</body>
</html>
