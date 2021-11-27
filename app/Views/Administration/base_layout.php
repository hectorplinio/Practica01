<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?= $this->renderSection("title") ?>
    <!--Boostrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <!--Fontawesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!--Jquery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <?= $this->renderSection("css") ?>
    <?= $this->renderSection("js") ?>
</head>
<body id="body-pd">
    <header class="header" id="header">
        <div class="header_toggle"> <i class='bx bx-menu' id="header-toggle"></i> </div>
        <div class="header_img"> <img src="https://i.imgur.com/hczKIze.jpg" alt=""> </div>
    </header>
    <div class="l-navbar" id="nav-bar">
        <nav class="nav">
            <div> 
                <a href="#" class="nav_logo"> <i class="fa-regular fa-solar-panel"></i> <span class="nav_logo-name">Panel Admin</span> </a>
                <div class="nav_list"> 
                    <a href="#" class="nav_link active"> <i class="fa-regular fa-house"></i> <span class="nav_name">Inicio</span> </a> 
                    <a href="#" class="nav_link"> <i class="fa-regular fa-music"></i> <span class="nav_name">Festivales</span> </a> 
                    <a href="#" class="nav_link"> <i class="fa-regular fa-newspaper"></i> <span class="nav_name">Categorias</span> </a> 
                    <a href="#" class="nav_link"> <i class="fa-regular fa-users"></i> <span class="nav_name">Usuarios</span> </a> 
                    <a href="#" class="nav_link"> <i class="fa-regular fa-user-tag"></i> <span class="nav_name">Roles</span> </a> 
                    <a href="#" class="nav_link"> <i class="fa-regular fa-gears"></i> <span class="nav_name">Configuración</span> </a> 
                </div>
            </div> 
            <a href="#" class="nav_link"> <i class="fa-regular fa-right-from-bracket"></i> <span class="nav_name">Cerrar sesión</span> </a>
        </nav>
    </div>
    <!--Container Main start-->
    <div class="height-100 bg-light">
        <h4>Main Components</h4>
        <?= $this->renderSection('section') ?>
    </div>
</body>
</html>