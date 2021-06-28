<div class="my-4">
    <div class="card animated fadeIn">
        <h5 class="card-header green darken-4 white-text">Formulário para editar Supressão</h5>
        <div class="card-body text-justify green lighten-5">
            <form action="<?= base_url('supressoes/update/' . $s->id); ?>" method="post" class="py-4">
                <div class="row mx-2 clearfix">
                    <div class="col-md-6 ">
                        <label for="os" class="ml-0">OS</label>
                        <select class="form-control form-control-sm select input-lg" id="os"
                                name="os" required>
                                <option><?= $s->os; ?></option>
                        </select>
                        <?= show_error('os') ?>
                    </div>
                    <div class="col-md-6">
                        <label for="tipo" class="ml-0 text-label">Tipo</label>
                        <select class="form-control form-control-sm select input-lg" id="tipo"
                                name="tipo" required>
                            <option <?= form_select('tipo', 'Remoção de árvore morta', $s->tipo); ?>>Remoção de árvore morta
                            </option>
                            <option <?= form_select('tipo', 'Remoção de árvore caída', $s->tipo); ?>>Remoção de árvore caída
                            </option>
                            <option <?= form_select('tipo', 'Remoção de galho caído', $s->tipo); ?>>Remoção de galho caído
                            </option>
                            <option <?= form_select('tipo', 'Remoção de tronco com Munck', $s->tipo); ?>>Remoção de tronco com
                                Munck
                            </option>
                            <option <?= form_select('tipo', 'Remoção de toco', $s->tipo); ?>>Remoção de toco</option>
                            <option <?= form_select('tipo', 'Supressão', $s->tipo); ?>>Supressão</option>
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
                               class="form-control form-control-sm" value="<?= old('quantidade', $s->quantidade); ?>">
                        <?= show_error('quantidade') ?>
                    </div>
                </div>
                <div class="mx-2 clearfix row">
                    <div class="col-md-4">
                        <label for="alt_arv" class="ml-0">Altura da árvore</label>
                        <select class="form-control form-control-sm select input-lg" id="alt_arv"
                                name="alt_arv" required>
                            <option <?= form_select('alt_arv', 'H1: <3m', $s->alt_arv); ?>>H1: <3m</option>
                            <option <?= form_select('alt_arv', 'H2: 3m-9m', $s->alt_arv); ?>>H2: 3m-9m</option>
                            <option <?= form_select('alt_arv', 'H3: 9m-15m', $s->alt_arv); ?>>H3: 9m-15m</option>
                            <option <?= form_select('alt_arv', 'H4: 15m-21m', $s->alt_arv); ?>>H4: 15m-21m</option>
                            <option <?= form_select('alt_arv', 'H5: >21m', $s->alt_arv); ?>>H5: >21m</option>
                        </select>
                        <?= show_error('alt_arv') ?>
                    </div>
                    <div class="col-md-4">
                        <label for="alt_copa" class="ml-0">Altura da copa</label>
                        <select class="form-control form-control-sm select input-lg" id="alt_copa"
                                name="alt_copa" required>
                            <option <?= form_select('alt_copa', 'Hc1: <2m', $s->alt_copa); ?>>Hp1: <2m</option>
                            <option <?= form_select('alt_copa', 'Hc2: 2m-8m', $s->alt_copa); ?>>Hp2: 2m-8m</option>
                            <option <?= form_select('alt_copa', 'Hc3: 8m-14m', $s->alt_copa); ?>>Hp3: 8m-14m</option>
                            <option <?= form_select('alt_copa', 'Hc4: 14m-20m', $s->alt_copa); ?>>Hp4: 14m-20m</option>
                            <option <?= form_select('alt_copa', 'Hc5: >20m', $s->alt_copa); ?>>Hp5: >20m</option>
                        </select>
                        <?= show_error('alt_copa') ?>
                    </div>
                    <div class="col-md-4">
                        <label for="diametro" class="ml-0">Diâmetro da copa</label>
                        <select class="form-control form-control-sm select input-lg" id="diametro"
                                name="diametro" required>
                            <option <?= form_select('diametro', 'D1: <2m', $s->diametro); ?>>D1: <2m</option>
                            <option <?= form_select('diametro', 'D2: 2m-7m', $s->diametro); ?>>D2: 2m-7m</option>
                            <option <?= form_select('diametro', 'D3: 7m-12m', $s->diametro); ?>>D3: 7m-12m</option>
                            <option <?= form_select('diametro', 'D4: 12m-17m', $s->diametro); ?>>D4: 12m-17m</option>
                            <option <?= form_select('diametro', 'D5: >17m', $s->diametro); ?>>D5: >17m</option>
                        </select>
                        <?= show_error('diametro') ?>
                    </div>
                </div>
                <div class="mx-2 clearfix row">
                    <div class="col-md-6 float-left">
                        <label for="perimetro" class="ml-0">Perímetro</label>
                        <select class="form-control form-control-sm select input-lg" id="perimetro"
                                name="perimetro" required>
                            <option <?= form_select('perimetro', 'P1: <50cm', $s->perimetro); ?>>P1: <50cm</option>
                            <option <?= form_select('perimetro', 'P2: 50cm-150cm', $s->perimetro); ?>>P2: 50cm-150cm</option>
                            <option <?= form_select('perimetro', 'P3: 150cm-250cm', $s->perimetro); ?>>P3: 150cm-250cm</option>
                            <option <?= form_select('perimetro', 'P4: 250cm-350cm', $s->perimetro); ?>>P4: 250cm-350cm</option>
                            <option <?= form_select('perimetro', 'P5: >350cm', $s->perimetro); ?>>P5: >350cm</option>
                        </select>
                        <?= show_error('diametro') ?>
                    </div>
                    <div class="col-md-6 float-right">
                        <label for="local" class="ml-0 text-label">Local</label>
                        <select class="form-control form-control-sm select input-lg" id="local"
                                name="local" required>
                            <option <?= form_select('local', 'FÁCIL (Com livre acesso e sem interferência)', $s->local); ?>>
                                FÁCIL (Com livre acesso e sem interferência)</option>
                            <option <?= form_select('local', 'MÉDIO (Acesso com restrições e interferência leve)', $s->local); ?>>
                                MÉDIO (Acesso com restrições e interferência leve)</option>
                            <option <?= form_select('local', 'DIFÍCIL (Necessidade de isolamento, auxílio do DETRAN, desligamento de rede,
                                etc..)', $s->local); ?>>DIFÍCIL (Necessidade de isolamento, auxílio do DETRAN, desligamento de rede, etc..)
                            </option>
                        </select>
                    </div>
                </div>
                <button type="submit" class="btn btn-success" name="submit">Editar</button>
            </form>
        </div>
    </div>
</div>

<script>
    window.addEventListener("load", function () {
        //Popular
        let select_especie = $('#especie');
        select_especie.empty();
        $.getJSON('<?=base_url("tipos_arvore.json");?>', function (data) {
            $.each(data, function (key, entry) {
                const tipo = `${entry.nome_popular} - ${entry.nome}`;
                select_especie.append($('<option></option>').attr('value', tipo).text(tipo));
            });
            let selected = '<?= old('especie', $s->especie);?>';
            select_especie.val(selected);
        });

        $("#quantidade").mask("0000");
    });
</script>