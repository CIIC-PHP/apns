<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8" />
        <title><?php echo isset($title) ? $title : 'Default'; ?></title>
        <link type="text/css" rel="stylesheet" href="<?php echo base_url('resource/bootstrap/css/bootstrap.min.css'); ?>" />
        <link type="text/css" rel="stylesheet" href="<?php echo base_url('resource/bootstrap/css/bootstrap-responsive.min.css'); ?>" />
        <?php if (isset($styles)) : ?>
        <?php foreach ($styles as $style) : ?>
        <link type="text/css" rel="stylesheet" href="<?php echo base_url('resource/style/'.$style); ?>" />
        <?php endforeach; ?>
        <?php endif; ?>
        <script type="text/javascript" src="<?php echo base_url('resource/jquery/jquery-1.9.1.min.js'); ?>"></script>
        <script type="text/javascript" src="<?php echo base_url('resource/bootstrap/js/bootstrap.min.js'); ?>"></script>
        <?php if (isset($scripts)) : ?>
        <?php foreach ($scripts as $script) : ?>
        <script type="text/javascript" src="<?php echo base_url('resource/script/'.$script); ?>"></script>
        <?php endforeach; ?>
        <?php endif; ?>
    </head>
    <body>