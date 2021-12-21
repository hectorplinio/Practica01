<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?= $this->renderSection("title") ?>
    <!--Boostrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css" rel="stylesheet">
    <!-- Fontawesome -->
    <script src="https://kit.fontawesome.com/9d0561caf3.js" crossorigin="anonymous"></script>
    <!-- JQuery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!--Database -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.css">
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.js"></script>

    <!-- Componentes internos -->
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
                <a href="#" class="nav_logo"><i class="fas fa-solar-panel nav_logo-icon"></i> <span class="nav_logo-name">Panel Admin</span> </a>
                <div class="nav_list"> 
                    <a href="<?= route_to('admin_page') ?>" class="nav_link active" id="home"> <i class="fas fa-home"></i> <span class="nav_name">Inicio</span> </a> 
                    <a href="<?= route_to('festivals_page') ?>" onclick="return activeFestival()" class="nav_link" id="music"> <i class="fas fa-music"></i> <span class="nav_name">Festivales</span> </a> 
                    <a href="<?= route_to('categories_page') ?>" class="nav_link"> <i class="far fa-list-alt"></i> <span class="nav_name">Categorías</span> </a> 
                    <a href="<?= route_to('users_page') ?>" class="nav_link"> <i class="fas fa-users"></i> <span class="nav_name">Usuarios</span> </a> 
                    <a href="<?= route_to('roles_page') ?>" class="nav_link"> <i class="fas fa-user-tag"></i> <span class="nav_name">Roles</span> </a> 
                    <a href="<?= route_to('settings_page') ?>" class="nav_link"> <i class="fas fa-cogs"></i> <span class="nav_name">Configuración</span> </a> 
                </div>
            </div> 
            <a href="#" class="nav_link"> <i class="fas fa-sign-out-alt"></i> <span class="nav_name">Cerrar sesión</span> </a>
        </nav>
    </div>
    <!--Container Main start-->
    <div class="height-100 bg-light">
        <div class="barra">
            <?=$title?>
        </div>
        <?= $this->renderSection('section') ?>
    </div>
    <script type="text/javascript">
            function activeFestival(){
                $("#home").removeClass('nav_link active').addClass('nav_link');            
                $("#music").removeClass('nav_link').addClass('nav_link active');
                preventDefault();
            }
    </script>
</body>

</html>