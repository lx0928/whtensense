<?php
    @error_reporting(0);
    //判断用户session是否存在
    if (!isset($_SESSION['username'])) {
        redirect('tensense');
        return false;
    }
?>
