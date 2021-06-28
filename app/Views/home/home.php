<div class="container-fluid my-auto row">
    <div class="col-12 col-md-4 mt-3 mx-auto">
        <div class="card grey darken-3">
            <h5 class="card-header warning-color-dark white-text text-center py-4">
                <strong>Ordens de Serviço</strong>
            </h5>
            <div class="card-body grey darken-3">
                <p class="card-text text-white">Cadastre e gere relatórios por Ordem de Serviço.</p>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item bg-transparent text-center">
                        <a href="<?= base_url('oss/create'); ?>"
                           class="btn default-color-dark waves-effect white-text">Cadastrar nova OS <i
                                class="fas fa-file-alt"></i></a>
                    </li>
                    <li class="list-group-item bg-transparent text-center">
                        <a href="<?= base_url('oss') ?>"
                           class="btn blue darken-4 waves-effect text-white">Visualizar os <i
                                class="fas fa-align-left"></i></a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="col-12 col-md-4 mt-3 mx-auto">
        <div class="card grey darken-3">
            <h5 class="card-header success-color-dark white-text text-center py-4">
                <strong>Podas</strong>
            </h5>
            <div class="card-body white-text grey darken-3">
                <p class="card-text text-white">Gerencie todas as podas.</p>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item bg-transparent text-center">
                        <a href="<?= base_url('podas/create'); ?>"
                           class="btn default-color-dark waves-effect">Cadastrar nova poda <i
                                class="fas fa-file-alt"></i></a>
                    </li>
                    <li class="list-group-item bg-transparent text-center">
                        <a href="<?= base_url('podas') ?>"
                           class="btn blue darken-4 waves-effect text-white">Visualizar podas <i
                                class="fas fa-align-left"></i></a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="col-12 col-md-4 mt-3 mx-auto">
        <div class="card grey darken-3">
            <h5 class="card-header info-color-dark white-text text-center py-4">
                <strong>Supressões</strong>
            </h5>
            <div class="card-body white-text grey darken-3">
                <p class="card-text text-white">Gerencie todas as supressões.</p>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item bg-transparent text-center">
                        <a href="<?= base_url('supressoes/create'); ?>"
                           class="btn default-color-dark waves-effect">Cadastrar nova supressão <i
                                class="fas fa-file-alt"></i></a>
                    </li>
                    <li class="list-group-item bg-transparent text-center">
                        <a href="<?= base_url('supressoes'); ?>"
                           class="btn blue darken-4 waves-effect text-white">Visualizar supressoes <i
                                class="fas fa-align-left"></i></a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>

<script>
    window.addEventListener("load", function () {
        containerMaior();
    });
</script>
