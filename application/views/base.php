<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title><?=$title;?></title>

    <link href="<?=base_url();?>vendor/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="<?=base_url();?>vendor/jquery-ui/themes/base/jquery-ui.css" rel="stylesheet" />
    <link href="<?=base_url();?>css/main.css" rel="stylesheet" />

    <script src="<?=base_url();?>vendor/jquery/dist/jquery.min.js"></script>
</head>
<body>


<?=$content;?>


    <script src="<?=base_url();?>vendor/bootstrap/dist/js/bootstrap.min.js"></script>
</body>
</html>
