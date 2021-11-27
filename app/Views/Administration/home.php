<?= $this->extend('Administration/base_layout') ?>
    <?= $this->section('title') ?>
        <title><?= $title ?></title>
    <?= $this->endSection() ?>
    <?= $this->section('css') ?>
        <link href="<?= base_url('assets/Administration/css/home.css')?>"rel="stylesheet" type="text/css">
    <?= $this->endSection() ?>
    <?= $this->section('js') ?>
        <script type="text/javascript">
            $(document).ready(function(){  
                console.log("Pantalla de Login")
            });
        </script>
    <?= $this->endSection() ?>
    <?= $this->section('section') ?>
        <h1>HomeAdmin</h1>
        <a href="<?= route_to('login_page') ?>">Ir a login</a>
    <?= $this->endSection() ?>
