<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html>
    <head>
        <title>MedPlus</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" \
            integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" \
            crossorigin="anonymous">
    </head>
    <body>

        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">MedPlus</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDarkDropdown" aria-controls="navbarNavDarkDropdown" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavDarkDropdown">
                    <ul class="navbar-nav">
                        <li class="nav-item dropdown" onclick="javascript: dropOptions(this);">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDarkDropdownMenuLink" \
                                role="button" data-bs-toggle="dropdown" aria-expanded="false" \>Pacientes</a>
                            <ul class="dropdown-menu dropdown-menu-dark patients-options" aria-labelledby="navbarDarkDropdownMenuLink">
                                <li><a class="dropdown-item" href="<?php echo base_url(); ?>patients">Listar todos</a></li>
                                <li><a class="dropdown-item" href="<?php echo base_url(); ?>patients-register-view">Registrar</a></li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown" onclick="javascript: dropOptions(this);">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDarkDropdownMenuLink" \
                                role="button" data-bs-toggle="dropdown" aria-expanded="false">Doctor</a>
                            <ul class="dropdown-menu dropdown-menu-dark patients-options" aria-labelledby="navbarDarkDropdownMenuLink">
                                <li><a class="dropdown-item" href="<?php echo base_url(); ?>doctor">Perfil</a></li>
                                <li><a class="dropdown-item" href="<?php echo base_url(); ?>logout">Sair</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav> 
        
        <script type="text/javascript">   

            function dropOptions(element){
                let options = element.querySelector('ul');
                (options.style.display == 'none')? options.style.display = 'block': options.style.display = 'none';
            }
            
        </script>
    </body>
</html>