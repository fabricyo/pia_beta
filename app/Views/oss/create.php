<div class="my-4">
    <div class="card animated fadeIn">
        <h5 class="card-header green darken-4 white-text">Formulário para cadastrar Ordem de Serviço</h5>
        <div class="card-body text-justify green lighten-5">
            <form action="<?= base_url('oss/store') ?>" method="post" class="py-4">
                <div class="row mx-2 clearfix">
                    <div class="col-md-6 md-form mb-0">
                        <label for="numero" class="ml-0">Número da Ordem de Serviço</label>
                        <input type="text" id="numero" name="numero"
                               class="form-control form-control-sm" value="<?= old('numero'); ?>">
                        <?= show_error('numero') ?>
                    </div>
                    <div class="col-md-6">
                        <div class="col-md-6 md-form">
                            <label for="dt_vistoria" class="ml-0">Data da vistoria</label>
                            <input type="date" id="dt_vistoria" name="dt_vistoria"
                                   class="form-control form-control-sm" value="<?= old('dt_vistoria'); ?>">
                            <?= show_error('dt_vistoria') ?>
                        </div>
                    </div>
                </div>
                <div class="row mx-2 clearfix">
                    <div class="col-md-12 md-form">
                        <label for="nome_vistoriador" class="ml-0">Nome do vistoriador</label>
                        <input type="text" id="nome_vistoriador" name="nome_vistoriador"
                               class="form-control form-control-sm" value="<?= old('nome_vistoriador'); ?>">
                        <?= show_error('nome_vistoriador') ?>
                    </div>
                </div>
                <div class="row mx-2 clearfix">
                    <div class="col-md-4">
                        <label for="lote" class="ml-0">Lote</label>
                        <select class="form-control form-control-sm select input-lg" id="lote"
                                name="lote" required>
                            <?php foreach ($lotes as $l) { ?>
                                <option <?= form_select('lote', $l); ?>><?= $l; ?></option>
                            <?php } ?>
                        </select>
                        <?= show_error('lote') ?>
                    </div>
                </div>
                <div class="row mx-2 clearfix">
                    <div class="col-md-8 md-form">
                        <label for="endereco" class="ml-0">Endereço (opcional)</label>
                        <input type="text" id="endereco" name="endereco"
                               class="form-control form-control-sm" value="<?= old('endereco'); ?>">
                        <?= show_error('endereco') ?>
                    </div>
                </div>
                <button type="submit" class="btn btn-success mt-3" name="submit"><i class="fas fa-plus"></i> Adicionar OS</button>
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

        $("#get_loc").on('click', function () {
            $.ajax({
                url: "https://geolocation-db.com/jsonp",
                jsonpCallback: "callback",
                dataType: "jsonp",
                success: function (location) {
                    console.info(location);
                    $("#endereco").val(location.city).focus();

                    $('#latitude').html(location.latitude);
                    $('#longitude').html(location.longitude);
                }
            });
        });
    });
</script>
