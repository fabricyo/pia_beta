<!-- Font Awesome -->
<link rel="stylesheet" href="<?=base_url('libs/fontawesome/css/all.css');?>">
<!-- Google Fonts -->
<link rel="stylesheet" href="<?=base_url('css/fonts.css');?>">
<!-- Bootstrap core CSS -->
<link rel="stylesheet" href="<?=base_url('css/bootstrap.min.css');?>">
<!-- Material Design Bootstrap -->
<link rel="stylesheet" href="<?=base_url('css/mdb.min.css');?>">

<link rel="stylesheet" href="<?=base_url('css/style.css');?>">

<?php $session = \Config\Services::session();?>

<?php if ($session->has("dataTables")) { ?>
    <link rel="stylesheet" href="<?=base_url('libs/datatables/datatables.min.css')?>">
<?php } ?>

<?php if ($session->has("calendario")) { ?>
    <link rel="stylesheet" type="text/css" href="<?= base_url('libs/fullcalendar/main.css');?>" />
<?php } ?>

<?php if ($session->has("form_utils")) { ?>
    <link rel="stylesheet" href="<?=base_url('libs/select2/dist/css/select2.css')?>">
    <link rel="stylesheet" href="<?=base_url('css/select2_custom.css')?>">
    <link rel="stylesheet" href="<?=base_url('libs/pickadate/themes/classic.css')?>">
    <link rel="stylesheet" href="<?=base_url('libs/pickadate/themes/classic.date.css')?>">
    <link rel="stylesheet" href="<?=base_url('libs/pickadate/themes/classic.time.css')?>">
<!--    <link rel="stylesheet" href="--><?//=base_url('css/pickadate_custom.css')?><!--">-->
<?php } ?>

<?php if ($session->has("input_file")) { ?>
    <link rel="stylesheet" type="text/css" href="<?= base_url('css/input_file.css');?>" />
<?php } ?>
