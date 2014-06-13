<?php
$port = fopen('COM6', 'w+');
sleep(1);
fwrite($port, '^'.intval('0').'$'); // End
fclose($port);
?>