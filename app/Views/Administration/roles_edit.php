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
        $(document).ready(function(){  
           $('#formulario').on("submit", function(event){
                    event.preventDefault();
                    let data = new FormData(this);
                    console.log(data.get("email"));
                    $.ajax({
                        url: "<?= route_to('roles_save') ?>",
                        type: "POST",
                        data: data,
                        processData: false,
                        contentType: false,
                        dataType: "json",
                        async: true,
                        timeout: 5000,
                        beforeSend:(xhr) =>{

                        },
                        success: (response) =>{
                            console.log("De una");
                            window.history.back();
                            
                        },
                        error: (xhr, status, error) =>{
                            console.log(error);
                            alert("Se ha producido un error");
                        },
                        complete: () =>{

                        }
                    });
                });
        })
        </script>
    <?= $this->endSection() ?>
    <?= $this->section('section') ?>
    <div class="toast" style=" height: 3em; position: absolute; margin-top: 2em; text-align: right;">
        <div class="toast align-items-center text-white bg-primary border-0" id="bg-primary" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="d-flex">
                <div class="toast-body" id="toast">
                
                </div>
                <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
        </div>
    </div>
       <form class="formulario" id="formulario" method="POST" >
            <input style="display: none;" type="text" id="id" class="form-control" name="id" value="<?= $rol->id?>">
           <label class="form-label" for="name">Nombre</label>
           <input required type="text" id="name" class="form-control" name="name" value="<?= $rol->name?>">
           <button class="btn btn-primary" id="formulario" type="submit">Guardar</button>
        </form>
    <?= $this->endSection() ?>
