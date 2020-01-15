<?php
    $dbc= mysqli_connect('localhost','root','','knigga')
        OR die(mysqli_connect_error());
    mysqli_set_charset($dbc,'utf-8');