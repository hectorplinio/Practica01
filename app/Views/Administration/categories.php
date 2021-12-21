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
            var columnsDefinition = [
                {
                    "targets": 0,
                    "render": function (data, type, row, meta) {
                        return row["id"];
                    }
                },
                {
                    "targets": 1,
                    "render": function (data, type, row, meta) {
                        return row["name"];
                    }
                },
                {
                    "targets": 4,
                    "render": function (data, type, row, meta) {
                        return '<button class="btn"><i class="fa fa-trash"></i></button> <button class="btn"><i class="fa fa-edit"></i></button>';
                    }
                }
            ]

            $(document).ready( function () {
                let festivalsDatatable= $('#categories_datatable').DataTable({
                    "processing": true, //Para mostrar el loading
                    "responsive": true,
                    "serverSide": true, //Activar Ajax
                    "searching": false, //Si queremos que apareza la barra buscador
                    "columnDefs": columnsDefinition, //Array de columnas que hemos definido arriba
                    "fnDrawCallback": function (oSettings) {
                        if (oSettings._DisplayLength >= oSettings.fnRecordsTotal())
                            $(oSettings.nTableWrapper).find('.dataTables_paginated').hide();
                        else 
                            $(oSettings.nTableWrapper).find('.dataTables_paginate').show();
                    },
                    "ajax": {
                        url: "<?= route_to('categories_data') ?>",
                        type: "POST",
                        data: function () {},
                        error: function (data) {
                            console.log(data);
                    }
                    }
                });
            } );
        </script>
    <?= $this->endSection() ?>
    <?= $this->section('section') ?>
        <table id="categories_datatable" class="display">
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
