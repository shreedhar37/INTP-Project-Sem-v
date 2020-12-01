<?php

session_start();

if (isset($_SESSION['uid'])){
    session_destroy();
    echo "<script type='text/javascript'>location.href='index.html'</script>";

}

else{
    echo "<script type='text/javascript'>location.href='index.html'</script>";
}