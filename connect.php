<?php

$dbc = mysqli_connect // Connect on 'localhost' to database 'onlyforyou'
('localhost', 'root','','onlyforyou')
or die
(mysqli_connect_error()); 

mysqli_set_charset($dbc,'utf8');// Set encoding to match PHP script encoding
?>