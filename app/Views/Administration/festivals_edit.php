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
           $('#formulario').on("submit", function(event){
                    event.preventDefault();
                    let data = new FormData(this);
                    console.log(data.get("email"));
                    $.ajax({
                        url: "<?= route_to('festivals_save') ?>",
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
                            window.back();
                        },
                        error: (xhr, status, error) =>{
                            console.log(error);
                            alert("Se ha producido un error");
                        },
                        complete: () =>{

                        }
                    });
                });
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
            <input style="display: none;" type="text" id="id" class="form-control" name="id" value="<?= $festival->id?>">
           <label class="form-label" for="name">Nombre</label>
           <input type="text" id="name" class="form-control" name="name" value="<?= $festival->name?>">
           <label class="form-label" for="email">Email</label>
           <input type="text" id="email" class="form-control" name="email" value="<?= $festival->email?>">
           <label class="form-label" for="date">Fecha</label>
           <input type="date" id="date" class="form-control" name="date" value="<?= $festival->getDateInputFormat($festival->date)?>">
           <label class="form-label" for="price">Price</label>
           <input type="number" id="price" class="form-control" name="price" value="<?= $festival->price?>">
           <label class="form-label" for="address">Direccion</label>
           <input type="text" id="address" class="form-control" name="address" value="<?= $festival->address?>">
           <label class="form-label" for="image_url">Imagen</label>
           <input type="text" id="image_url" class="form-control" name="image_url" value="<?= $festival->image_url?>">
           <label class="form-label" for="category_id">Categoria ID</label>
           <select class="form-select" name="category_id">
               <?php foreach($categories as $cat): ?>
                    <option value="<?=$cat->id?>"<?php if($cat->id == $festival->category_id):?> selected <?php endif ?>>
                        <?=$cat->name?>
                    </option>
                <?php endforeach ?>
           </select>
           <button class="btn btn-primary" id="formulario" type="submit">Guardar</button>
        </form>
        <a href="<?= route_to('login_page') ?>">Ir a login</a>
    <?= $this->endSection() ?>
