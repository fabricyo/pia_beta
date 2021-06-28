<!DOCTYPE HTML>
<html lang=”pt-br”>

<head>
    <link rel='shortcut icon' type='image/x-icon' href="<?=base_url('logo_novacap.ico');?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PIA</title>
    <?= view('base/css');?>
</head>
<body>
    <?= view('base/navbar');?>
    <div class="conteudo container" style="margin-top: 1rem;">
        <?= getSystemMsg();?>
        <?= $page ?? '';?>
    </div>
<!--    --><?//= view('base/footer');?>
    <?= view('base/js');?>
</body>
</html>