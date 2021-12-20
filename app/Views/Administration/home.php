<?= $this->extend('Administration/base_layout') ?>
    <?= $this->section('title') ?>
        <title><?= $title ?></title>
    <?= $this->endSection() ?>
    <?= $this->section('css') ?>
        <link href="<?= base_url('assets/Administration/css/menu.css')?>"rel="stylesheet" type="text/css">
    <?= $this->endSection() ?>
    <?= $this->section('js') ?>
    <script src="<?= base_url('assets/Administration/js/menu.js')?>" type="text/javascript"></script>

        <script type="text/javascript">
            $(document).ready( function () {
            } );
        </script>
    <?= $this->endSection() ?>
    <?= $this->section('section') ?>
        <h1>Bienvenido al Panel de Admin</h1>
        <h5>Desde aquí podrás gestionar todos los contenidos de tu aplicación</h5>
        
</table>
        <!-- <a href="<?= route_to('login_page') ?>">Ir a login</a> -->
    <?= $this->endSection() ?>
