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
            var columnsDefinition =[
                {
                    "targets": 0,
                    "render": function(data, type, row, meta){
                        return row["id"];
                    }
                },
                {
                    "targets": 1,
                    "render": function(data, type, row, meta){
                        return row["name"];
                    }
                },
                {
                    "targets": 2,
                    "render": function(data, type, row, meta){
                        return row["date"];
                    }
                },
                {
                    "targets": 3,
                    "render": function(data, type, row, meta){
                        return '<span class="badge bg-primary">'+row["price"]+"€"+'</span>';
                    }
                },
                {
                    "targets": 4,
                    "render": function(data, type, row, meta){
                        return "";
                    }
                },
            ]

            $(document).ready( function () {
                let festivalsDatatable= $('#festivals_datatable').DataTable({
                    "processing": true,
                    "responsive": true,
                    "serverSide": true,
                    "searching": false,
                    "columnDefs": columnsDefinition,
                    "fnDrawCallback": function (oSettings){
                        if (oSettings._iDisplayLength >= oSettings.fnRecordsTotal())
                            $(oSettings.nTableWrapper).find('.dataTables_paginate').hide();
                        else
                            $(oSettings.nTableWrapper).find('.dataTables_paginate').show();
                    },
                    "ajax": {
                        url: "<?= route_to('festivals_data') ?>",
                        type: "POST",
                        data: function() {},
                        error: function (data) {
                            console.log(data)
                        }
                    }
                });
            } );
        </script>
    <?= $this->endSection() ?>
    <?= $this->section('section') ?>
        <table id="festivals_datatable" class="display" style="width: 100%;">
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
