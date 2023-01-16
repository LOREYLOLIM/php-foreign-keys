<?php

$connection = mysqli_connect('localhost', 'root', '', 'course');

if ($connection){
    echo '';
}else{
    echo 'connection failed' . mysqli_error($connection);
}

?>