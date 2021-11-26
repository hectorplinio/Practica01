<?= $this->extend('PublicSection/base_layout') ?>
    <?= $this->section('css') ?>
        <link href="<?= base_url('assets/PublicSection/css/login.css')?>"rel="stylesheet" type="text/css">
    <?= $this->endSection() ?>
    <?= $this->section('js') ?>
        <script type="text/javascript">
            $(document).ready(function(){  
                console.log("Pantalla de Login")
            });
        </script>
    <?= $this->endSection() ?>
    <?= $this->section('section') ?>
        <div class="contenedor">
            <div class="logo">
                <img src="<?= base_url('assets/PublicSection/img/logo.png')?>">
            </div>
                <h1 class="titulo">Please sign in</h1>
                <form class="formulario">
                    <input type="text" class="form-control" placeholder="Email address">
                    <input type="pass" class="form-control" placeholder="Password">
                    <button class="btn btn-primary" id="boton">Sign in</button>
                </form>
                <p id="fecha">©️&nbsp2017-2021</p>
                <div class="enlaces">
                    <a href="<?= route_to('home_page') ?>">Ir a inicio publico</a>
                    <a href="<?= route_to('admin_page') ?>">Ir a inicio privado</a>
                </div>
            
        </div>
        
        
    <?= $this->endSection() ?>

