<div class="my-4">
    <div class="card animated fadeIn">
        <h5 class="card-header green darken-4 white-text">Formulário para cadastrar Ordem de Serviço</h5>
        <div class="card-body text-justify green lighten-5">
            <form action="<?= base_url('oss/update/'.$os->id) ?>" method="post" class="py-4">
                <div class="row mx-2 clearfix">
                    <div class="col-md-6 md-form mb-0">
                        <label for="numero" class="ml-0">Número da Ordem de Serviço</label>
                        <input type="text" id="numero" name="numero"
                               class="form-control form-control-sm" value="<?= old('numero', $os->numero); ?>">
                        <?= show_error('numero') ?>
                    </div>
                    <div class="col-md-6">
                        <div class="col-md-6 md-form">
                            <label for="dt_vistoria" class="ml-0">Data da vistoria</label>
                            <input type="text" id="dt_vistoria" name="dt_vistoria"
                                   class="form-control form-control-sm" value="<?= old('dt_vistoria', dateSwap($os->dt_vistoria)); ?>">
                            <?= show_error('dt_vistoria') ?>
                        </div>
                    </div>
                </div>
                <div class="row mx-2 clearfix">
                    <div class="col-md-12 md-form">
                        <label for="nome_vistoriador" class="ml-0">Nome do vistoriador</label>
                        <input type="text" id="nome_vistoriador" name="nome_vistoriador"
                               class="form-control form-control-sm" value="<?= old('nome_vistoriador', $os->nome_vistoriador); ?>">
                        <?= show_error('nome_vistoriador') ?>
                    </div>
                </div>
                <button type="submit" class="btn btn-success mt-3" name="submit">Editar OS</button>
            </form>
        </div>
    </div>
</div>

<script>
    window.addEventListener("load", function () {
        $("#numero").mask("00000/2000");
        $('#dt_vistoria').pickadate({
            format: 'dd/mm/yyyy'
        });
    });
</script>