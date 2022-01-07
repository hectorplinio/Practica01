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
                        url: "<?= route_to('users_save') ?>",
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
                            alert(data);
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
            <input style="display: none;" type="text" id="id" class="form-control" name="id" value="<?= $user->id?>">
           <label class="form-label" for="username">Username</label>
           <input required type="text" id="username" class="form-control" name="username" value="<?= $user->username?>">
           <label class="form-label" for="email">Email</label>
           <input required type="text" id="email" class="form-control" name="email" value="<?= $user->email?>">
           <label class="form-label" for="name">Name</label>
           <input required type="text" id="name" class="form-control" name="name" value="<?= $user->name?>">
           <label class="form-label" for="surname">Surname</label>
           <input required type="text" id="surname" class="form-control" name="surname" value="<?= $user->surname?>">
           <label class="form-label" for="password">Password</label>
           <input required type="password" id="password" class="form-control" name="password" value="<?= $user->password?>">
           <label class="form-label" for="rol_id">Rol ID</label>
           <select class="form-select" name="category_id">
               <?php foreach($roles as $rol): ?>
                    <option value="<?=$rol->id?>"<?php if($rol->id == $user->rol_id):?> selected <?php endif ?>>
                        <?=$rol->name?>
                    </option>
                <?php endforeach ?>
           </select>
           <button class="btn btn-primary" id="formulario" type="submit">Guardar</button>
        </form>
    <?= $this->endSection() ?>
