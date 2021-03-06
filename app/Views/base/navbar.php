<!--Navbar -->
<nav class="mb-1 navbar navbar-expand-lg navbar-dark default-color">
    <a class="navbar-brand" href="<?= base_url() ?>">
        <img src="<?=base_url('img/icones/logo_novacap.jpg');?>" width="25" height="30"
             class="d-inline-flex align-top" alt="">
        PIA <br class='d-md-none' /> Painel de Intervenção Árborea</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent-333"
            aria-controls="navbarSupportedContent-333" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent-333">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink-333" data-toggle="dropdown"
                   aria-haspopup="true" aria-expanded="false">Ordens de Serviço
                </a>
                <div class="dropdown-menu dropdown-default" aria-labelledby="navbarDropdownMenuLink-333">
                    <a class="dropdown-item" href="<?= base_url('oss'); ?>">
                        Lista <i class="fas fa-align-left"></i></a>
                    <a class="dropdown-item" href="<?= base_url('oss/create'); ?>">
                        Adicionar Ordem de Serviço <i class="fas fa-plus"></i></a>
                </div>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink-334" data-toggle="dropdown"
                   aria-haspopup="true" aria-expanded="false">Podas
                </a>
                <div class="dropdown-menu dropdown-default" aria-labelledby="navbarDropdownMenuLink-334">
                    <a class="dropdown-item" href="<?= base_url('podas'); ?>">
                        Lista <i class="fas fa-align-left"></i></a>
                    <a class="dropdown-item" href="<?= base_url('podas/create'); ?>">
                        Adicionar poda <i class="fas fa-plus"></i></a>
                </div>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink-335" data-toggle="dropdown"
                   aria-haspopup="true" aria-expanded="false">Supressões
                </a>
                <div class="dropdown-menu dropdown-default" aria-labelledby="navbarDropdownMenuLink-335">
                    <a class="dropdown-item" href="<?= base_url('supressoes'); ?>">
                        Lista <i class="fas fa-align-left"></i></a>
                    <a class="dropdown-item" href="<?= base_url('supressoes/create'); ?>">
                        Adicionar supressão <i class="fas fa-plus"></i></a>
                </div>
            </li>
        </ul>
<!--        <ul class="navbar-nav ml-auto nav-flex-icons">-->
<!--            <li class="nav-item">-->
<!--                <a class="nav-link waves-effect waves-light">-->
<!--                    <i class="fab fa-twitter"></i>-->
<!--                </a>-->
<!--            </li>-->
<!--            <li class="nav-item">-->
<!--                <a class="nav-link waves-effect waves-light">-->
<!--                    <i class="fab fa-google-plus-g"></i>-->
<!--                </a>-->
<!--            </li>-->
<!--            <li class="nav-item dropdown">-->
<!--                <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink-333" data-toggle="dropdown"-->
<!--                   aria-haspopup="true" aria-expanded="false">-->
<!--                    <i class="fas fa-user"></i>-->
<!--                </a>-->
<!--                <div class="dropdown-menu dropdown-menu-right dropdown-default"-->
<!--                     aria-labelledby="navbarDropdownMenuLink-333">-->
<!--                    <a class="dropdown-item" href="#">Action</a>-->
<!--                    <a class="dropdown-item" href="#">Another action</a>-->
<!--                    <a class="dropdown-item" href="#">Something else here</a>-->
<!--                </div>-->
<!--            </li>-->
<!--        </ul>-->
    </div>
</nav>
<!--/.Navbar -->
