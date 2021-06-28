<div class="my-4">
    <div class="card animated fadeIn">
        <h5 class="card-header green darken-4 white-text">Formulário para editar poda</h5>
        <div class="card-body text-justify green lighten-5">
            <form action="<?= base_url('podas/update/'.$p->id) ?>" method="post" class="py-4">
                <div class="row mx-2 clearfix">
                    <div class="col-md-6 ">
                        <label for="os" class="ml-0">OS</label>
                        <select class="form-control form-control-sm select input-lg" id="os"
                                name="os" required>
                                <option><?=$p->os;?></option>
                        </select>
                        <?= show_error('os') ?>
                    </div>
                    <div class="col-md-6">
                        <label for="tipo" class="ml-0 text-label">Tipo</label>
                        <select class="form-control form-control-sm select input-lg" id="tipo"
                                name="tipo" required>
                        </select>
                    </div>
                </div>
                <div class="row mx-2 clearfix">
                    <div class="col-md-6">
                        <label for="especie" class="ml-0 text-label">Espécie</label>
                        <select class="form-control form-control-sm select input-lg" id="especie"
                                name="especie" required>
                        </select>
                    </div>
                    <div class="col-md-6 md-form">
                        <label for="quantidade" class="ml-0">Quantidade</label>
                        <input type="number" id="quantidade" name="quantidade"
                               class="form-control form-control-sm" value="<?= old('quantidade', $p->quantidade); ?>">
                        <?= show_error('quantidade') ?>
                    </div>
                </div>
                <div class="mx-2 clearfix row">
                    <div class="col-md-4">
                        <label for="alt_arv" class="ml-0">Altura da árvore</label>
                        <select class="form-control form-control-sm select input-lg" id="alt_arv"
                                name="alt_arv" required>
                            <option <?= form_select('alt_arv', 'H1: <3m', $p->alt_arv); ?>>H1: <3m</option>
                            <option <?= form_select('alt_arv', 'H2: 3m-9m', $p->alt_arv); ?>>H2: 3m-9m</option>
                            <option <?= form_select('alt_arv', 'H3: 9m-15m', $p->alt_arv); ?>>H3: 9m-15m</option>
                            <option <?= form_select('alt_arv', 'H4: 15m-21m', $p->alt_arv); ?>>H4: 15m-21m</option>
                            <option <?= form_select('alt_arv', 'H5: >21m', $p->alt_arv); ?>>H5: >21m</option>
                        </select>
                        <?= show_error('alt_arv') ?>
                    </div>
                    <div class="col-md-4">
                        <label for="alt_poda" class="ml-0">Altura da poda</label>
                        <select class="form-control form-control-sm select input-lg" id="alt_poda"
                                name="alt_poda" required>
                            <option <?= form_select('alt_poda', 'Hp1: <2m', $p->alt_poda); ?>>Hp1: <2m</option>
                            <option <?= form_select('alt_poda', 'Hp2: 2m-8m', $p->alt_poda); ?>>Hp2: 2m-8m</option>
                            <option <?= form_select('alt_poda', 'Hp3: 8m-14m', $p->alt_poda); ?>>Hp3: 8m-14m</option>
                            <option <?= form_select('alt_poda', 'Hp4: 14m-20m', $p->alt_poda); ?>>Hp4: 14m-20m</option>
                            <option <?= form_select('alt_poda', 'Hp5: >20m', $p->alt_poda); ?>>Hp5: >20m</option>
                        </select>
                        <?= show_error('alt_poda') ?>
                    </div>
                    <div class="col-md-4">
                        <label for="diametro" class="ml-0">Diâmetro da copa</label>
                        <select class="form-control form-control-sm select input-lg" id="diametro"
                                name="diametro" required>
                            <option <?= form_select('diametro', 'D1: <2m', $p->diametro); ?>>D1: <2m</option>
                            <option <?= form_select('diametro', 'D2: 2m-7m', $p->diametro); ?>>D2: 2m-7m</option>
                            <option <?= form_select('diametro', 'D3: 7m-12m', $p->diametro); ?>>D3: 7m-12m</option>
                            <option <?= form_select('diametro', 'D4: 12m-17m', $p->diametro); ?>>D4: 12m-17m</option>
                            <option <?= form_select('diametro', 'D5: >17m', $p->diametro); ?>>D5: >17m</option>
                        </select>
                        <?= show_error('diametro') ?>
                    </div>
                </div>
                <div class="mx-2 clearfix row">
                    <div class="col-md-6 float-left">
                        <label for="intensidade" class="ml-0 text-label">Intensidade da poda</label>
                        <select class="form-control form-control-sm select input-lg" id="intensidade"
                                name="intensidade" required>
                            <option <?= form_select('intensidade', 'LEVE (Não interfere na arquitetura da árvore)', $p->intensidade); ?>>
                                LEVE (Não interfere na arquitetura da árvore)</option>
                            <option <?= form_select('intensidade', 'MEDIANA (Remoção de até 30% da copa)', $p->intensidade); ?>>
                                MEDIANA (Remoção de até 30% da copa)</option>
                            <option <?= form_select('intensidade', 'DRÁSTICA (Remoção de mais de 30% da copa)', $p->intensidade); ?>>
                                DRÁSTICA (Remoção de mais de 30% da copa)</option>
                        </select>
                    </div>
                    <div class="col-md-6 float-right">
                        <label for="local" class="ml-0 text-label">Local</label>
                        <select class="form-control form-control-sm select input-lg" id="local"
                                name="local" required>
                            <option <?= form_select('local', 'FÁCIL (Com livre acesso e sem interferência)', $p->local); ?>>
                                FÁCIL (Com livre acesso e sem interferência)</option>
                            <option <?= form_select('local', 'MÉDIO (Acesso com restrições e interferência leve)', $p->local); ?>>
                                MÉDIO (Acesso com restrições e interferência leve)</option>
                            <option <?= form_select('local', 'DIFÍCIL (Necessidade de isolamento, auxílio do DETRAN, desligamento de rede,
                                etc..)', $p->local); ?>>DIFÍCIL (Necessidade de isolamento, auxílio do DETRAN, desligamento de rede, etc..)
                            </option>
                        </select>
                    </div>
                </div>
                <button type="submit" class="btn btn-success mt-3" name="submit">Adicionar</button>
                <a href="<?=base_url('podas/details/'.$p->id);?>" class="btn btn-warning mt-3">Cancelar edição</a>
            </form>
        </div>
    </div>
</div>

<script>
    window.addEventListener("load", function () {
        //Popular
        let select_tipo = $('#tipo');
        select_tipo.empty();
        $.getJSON('<?=base_url("tipos_poda.json");?>', function (data) {
            $.each(data, function (key, entry) {
                select_tipo.append($('<option></option>').attr('value', entry.tipo).text(entry.tipo));
            });
            let selected = '<?= old('tipo', $p->tipo);?>';
            select_tipo.val(selected);
        });

        let select_especie = $('#especie');
        select_especie.empty();
        $.getJSON('<?=base_url("tipos_arvore.json");?>', function (data) {
            $.each(data, function (key, entry) {
                const tipo = `${entry.nome_popular} - ${entry.nome}`;
                select_especie.append($('<option></option>').attr('value', tipo).text(tipo));
            });
            let selected = '<?= old('especie', $p->especie);?>';
            select_especie.val(selected);
        });

        $("#quantidade").mask("0000");
    });
</script>
