<?php

$message = "Hello World!";
$version = "0.1";

echo "<h1>" . $message . "</h1>";

echo "<table>
<tr>
    <td>
        Servername
    </td>
    <td>";
echo $_ENV['HOSTNAME'];
echo "        </td>
</tr>
<tr>
    <td>
        IP Address
    </td>
    <td>";
echo $_SERVER['SERVER_ADDR'];
echo "        </td>
</tr>
</table>";
//echo "The server I'm running on is called:";
//echo "<h1>" . $_ENV['HOSTNAME'] . "</h1>";
echo '<img src="https://www.docker.com/sites/default/files/horizontal.png">';
echo "<p>Running version " . $version . " </p>";
?>