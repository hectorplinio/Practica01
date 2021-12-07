<?= $this->extend('PublicSection/base_layout') ?>
    <?= $this->section('title') ?>
        <title><?= $title ?></title>
    <?= $this->endSection() ?>
    <?= $this->section('css') ?>
        <link href="<?= base_url('assets/PublicSection/css/login.css')?>"rel="stylesheet" type="text/css">
    <?= $this->endSection() ?>
    <?= $this->section('js') ?>
        <script type="text/javascript">
            $(document).ready(function(){  
                // $('#btn-ajax').click(function(){
                //     $.ajax({
                //         url: "<?= route_to('prueba_ajax') ?>",
                //         type: "GET",
                //         async: true,
                //         timeout: 5000,
                //         beforeSend:(xhr) =>{

                //         },
                //         success: (response) =>{
                //             console.log("Correcto");
                //         },
                //         error: (xhr, status, error) =>{
                //             alert("Se ha producido un error");
                //         },
                //         complete: () =>{

                //         }
                //     })
                // });
                
                
                $('#formulario').on("submit", function(event){
                    event.preventDefault();
                    let data = new FormData(this);
                    console.log(data.get("email"));
                    $.ajax({
                        url: "<?= route_to('formulario') ?>",
                        type: "POST",
                        data: data,
                        processData: false,
                        contentType: false,
                        async: true,
                        timeout: 5000,
                        beforeSend:(xhr) =>{

                        },
                        success: (response) =>{
                            document.getElementById("toast").style.display("flex");
                            console.log(response);
                            response = JSON.parse(response);
                            // alert(response.message);
                            alert(response.message);
                        },
                        error: (xhr, status, error) =>{
                            alert("Se ha producido un error");
                        },
                        complete: () =>{

                        }
                    })
                });
            });
        </script>
    <?= $this->endSection() ?>
    <?= $this->section('section') ?>
    <div class="toast align-items-center text-white bg-primary border-0" role="alert" aria-live="assertive" aria-atomic="true" id="toast">
        <div class="d-flex">
            <div class="toast-body">
            Hello, world! This is a toast message.
            </div>
            <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
    </div>
        <div class="contenedor">
            <div class="logo">
                <img src="<?= base_url('assets/PublicSection/img/logo.png')?>">
            </div>
                <h1 class="titulo">Please sign in</h1>
                <form class="formulario" id="formulario" method="POST">
                    <input type="text" class="form-control" placeholder="Email address" name="email" id="email">
                    <input type="pass" class="form-control" placeholder="Password" name="password" id="password">
                    <button class="btn btn-primary" id="formulario" type="submit">Sign in</button>
                </form>
                <button id="btn-ajax" class="btn btn-primary" type="submit">AJAX</button>

                <p id="fecha">©️&nbsp2017-2021</p>
                <div class="enlaces">
                    <a href="<?= route_to('home_page') ?>">Ir a inicio publico</a>
                    <a href="<?= route_to('admin_page') ?>">Ir a inicio privado</a>
                </div>

            
        </div>
        
        
    <?= $this->endSection() ?>

