<div class="my-4">
    <div class="card animated fadeIn">
        <h5 class="card-header grey darken-4">Formulário para editar Viatura</h5>
        <div class="card-body text-justify grey darken-3">
            <form action="<?= base_url('viaturas/update/' . $vtr->id); ?>" method="post" class="py-4">
                <div class="clearfix">
                    <div class="col-md-4 float-left">
                        <label for="espec_veiculo" class="ml-0 text-label">Especifique o Veículo</label>
                        <select class="form-control form-control-sm select input-lg" id="espec_veiculo"
                                name="espec_veiculo" required>
                            <option value="Veículo"
                                <?= form_select('espec_veiculo', 'Veículo', $vtr->espec_veiculo); ?>>Veículo Comum
                                (Carro, SUV...)
                            </option>
                            <option value="Ônibus/Micro-ônibus"
                                <?= form_select('espec_veiculo', 'Ônibus/Micro-ônibus', $vtr->espec_veiculo); ?>>Ônibus,
                                Micro-ônibus, etc
                            </option>
                            <option value="Moto"
                                <?= form_select('espec_veiculo', 'Moto', $vtr->espec_veiculo); ?>>Moto
                            </option>
                        </select>
                    </div>
                </div>
                <div class="row mx-2">
                    <div class="col-md-4 md-form mb-0">
                        <input type="text" id="marca" maxlength="20" name="marca"
                               class="form-control form-control-sm input_capital"
                               value="<?= old('marca', $vtr->marca); ?>">
                        <label for="fAddVtr_marca" class="ml-0">Montadora</label>
                        <?= show_error('marca') ?>
                    </div>
                    <div class="col-md-4 md-form mb-0">
                        <input type="text" id="modelo" maxlength="20" name="modelo"
                               class="form-control form-control-sm input_capital"
                               value="<?= old('modelo', $vtr->modelo); ?>">
                        <label for="fRequerirCartaoModelo" class="ml-0">Modelo</label>
                        <?= show_error("modelo") ?>
                    </div>
                    <div class="col-md-4 md-form mb-0">
                        <input type="text" id="cor" maxlength="20" name="cor"
                               class="form-control form-control-sm input_capital" value="<?= old('cor', $vtr->cor); ?>">
                        <label for="cor" class="ml-0">Cor</label>
                        <?= show_error("cor") ?>
                    </div>
                </div>
                <div class="clearfix">
                    <div class="col-md-6 float-left md-form mb-0">
                        <input type="text" id="placa" maxlength="7" name="placa"
                               class="form-control form-control-sm placaCarro"
                               value="<?= old('placa', $vtr->placa); ?>">
                        <label for="placa" class="ml-0">Placa do veículo</label>
                        <?= show_error("placa") ?>
                    </div>
                    <div class="col-md-6 float-right">
                        <div id="alert_placa"></div>
                    </div>
                </div>
                <div class="clearfix">
                    <div class="col-md-6 float-left md-form mb-0">
                        <input type="text" id="placa_vinculada" maxlength="20"
                               name="placa_vinculada" class="form-control form-control-sm"
                               value="<?= old('placa_vinculada', $vtr->placa_vinculada); ?>">
                        <label for="placa_vinculada" class="ml-0">Placa Vinculada (apenas se houver)</label>
                        <?= show_error("placa_vinculada") ?>
                    </div>
                </div>
                <div class="row mx-2">
                    <div class="col-md-6 md-form mb-0">
                        <input type="text" id="funcao" maxlength="20" name="funcao"
                               class="form-control form-control-sm input_capital"
                               value="<?= old('funcao', $vtr->funcao); ?>">
                        <label for="funcao" class="ml-0">Função</label>
                        <?= show_error('funcao') ?>
                    </div>
                    <div class="col-md-6 float-left">
                        <label for="impedimento" class="ml-0 text-label">Viatura disponível?</label>
                        <select class="form-control form-control-sm select input-lg" id="disponivel"
                                name="disponivel" required>
                            <option <?= form_select('disponivel', 'Sim', $vtr->disponivel); ?>>Sim</option>
                            <option <?= form_select('disponivel', 'Não', $vtr->disponivel); ?>>Não</option>
                        </select>
                    </div>

                </div>
                <div class="clearfix">
                    <div class="col-md-6 float-left md-form mb-0">
                        <input type="text" id="capacidade" maxlength="20"
                               name="capacidade" class="form-control form-control-sm"
                               value="<?= old('capacidade', $vtr->capacidade); ?>">
                        <label for="capacidade" class="ml-0">Capacidade de passageiros do veículo</label>
                        <?= show_error("capacidade") ?>
                    </div>
                </div>
                <div class="clearfix">
                    <div class="col-md-8 md-form mb-0">
                        <input type="text" id="obs" maxlength="20" name="obs"
                               class="form-control form-control-sm input_capital" value="<?= old('obs', $vtr->obs); ?>">
                        <label for="obs" class="ml-0">Observações</label>
                        <?= show_error("obs") ?>
                    </div>
                </div>
                <button type="submit" class="btn btn-success" name="submit">Editar</button>
            </form>
        </div>
    </div>
</div>

<script>
    window.addEventListener("load", function () {
        $(".placaCarro").blur(function () {
            $("#alert_placa").empty();
            var regex = '[A-Z]{3}[0-9][0-9A-Z][0-9]{2}';
            var placa = $(this).val();
            if (!placa.match(regex)) {
                return $("#alert_placa").html(alert("danger", 'Erro', 'Informe uma placa válida'));
            }
        });
    });
</script>