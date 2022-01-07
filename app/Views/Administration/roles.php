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
                    "targets": 2,
                    "render": function (data, type, row, meta) {
                        return '<button class="btn-danger deleteBtn"><i class="fa fa-trash"></i></button> <button class="btn-success editBtn"><i class="fa fa-edit"></i></button>';
                    }
                }
            ]

            $(document).ready( function () {
                let rolesDatatable= $('#roles_datatable').DataTable({
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
                        url: "<?= route_to('roles_data') ?>",
                        type: "POST",
                        data: function () {},
                        error: function (data) {
                            console.log(data);
                    }
                    }
                });
                $('#roles_datatable tbody').on('click', '.deleteBtn',function () {
                    //obtengo los datos de la fila pulsada
                    var data = rolesDatatable.row($(this).parents('tr')).data();
                    console.log(data.id);
                    event.preventDefault();
                    $json_data ={
                        "id": data.id
                    }
                    $.ajax({
                        url: "<?= route_to('roles_delete') ?>",
                        type: "DELETE",
                        data: JSON.stringify($json_data),
                        processData: false,
                        contentType: false,
                        dataType: "json",
                        async: true,
                        timeout: 5000,
                        beforeSend:(xhr) =>{

                        },
                        success: (response) =>{
                            console.log(response);
                            $('#roles_datatable').DataTable().ajax.reload(null,false);
                            

                        },
                        error: (xhr, status, error) =>{
                            console.log(data);
                            alert("Se ha producido un error");
                        },
                        complete: () =>{

                        }
                    });
                    
            });
            $('.new-rol-btn').click(function(){
                window.location.href ="<?=route_to('roles_view_edit') ?>";
            });
            $('#roles_datatable tbody').on('click', '.editBtn',function () {
                var data = rolesDatatable.row($(this).parents('tr')).data();
                window.location.href ="<?=route_to('roles_view_edit') ?>/"+data.id;
            });
            } );
        </script>
    <?= $this->endSection() ?>
    <?= $this->section('section') ?>
    <button class="btn btn-primary new-rol-btn" id="formulario" type="submit">Nuevo Rol</button>

        <table id="roles_datatable" class="display" style="width: 100%;">
    <thead>
        <tr>
            <th>Id</th>
            <th>Nombre</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        
    </tbody>
</table>
        <a href="<?= route_to('login_page') ?>">Ir a login</a>
    <?= $this->endSection() ?>
