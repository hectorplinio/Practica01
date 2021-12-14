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
                $('#table_id').DataTable();
            } );
        </script>
    <?= $this->endSection() ?>
    <?= $this->section('section') ?>
        <h1>Home Admin</h1>
        <table id="table_id" class="display">
    <thead>
        <tr>
            <th>Id</th>
            <th>Nombre</th>
            <th>Fecha</th>
            <th>Precio</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        
    </tbody>
</table>
        <a href="<?= route_to('login_page') ?>">Ir a login</a>
    <?= $this->endSection() ?>
