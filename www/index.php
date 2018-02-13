<?php
          if (isset($_REQUEST['submit'])) {
            phpinfo();
          }
?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Webserver-Test</title>
    </head>
    <body>
        <?php
          echo 'Der Webserver läuft!';
        ?>


        <form name="PHP-Info anzeigen" action="index.php">
            <input type="submit" name="submit" Value="PHP-Info">
        </form>


        </body>
</html>
