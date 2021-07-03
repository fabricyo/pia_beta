<div class="my-4">
    <div class="card animated fadeIn">
        <h5 class="card-header green darken-4 white-text">Formulário para cadastrar Supressão
            <?php if ($os_id != '') { ?>
                para a OS <a class='cyan-text' href='<?= base_url("oss/details/$os_id") ?>'>
                    <?= $oss[0]->numero ?></a>
            <?php } ?></h5>
        <div class="card-body text-justify green lighten-5">
            <form action="<?= base_url('supressoes/store') ?>" method="post" class="py-4">
                <input name="os_id" value="<?= $os_id ?>" hidden>
                <div class="row mx-2 clearfix">
                    <div class="col-md-6 ">
                        <label for="os" class="ml-0">OS</label>
                        <select class="form-control form-control-sm select input-lg" id="os"
                                name="os" required>
                            <?php foreach ($oss as $o) { ?>
                                <option <?= form_select('os', $o->numero); ?>><?= $o->numero; ?></option>
                            <?php } ?>
                        </select>
                        <?= show_error('os') ?>
                    </div>
                    <div class="col-md-6">
                        <label for="tipo" class="ml-0 text-label">Tipo</label>
                        <select class="form-control form-control-sm select input-lg" id="tipo"
                                name="tipo" required>
                            <option <?= form_select('tipo', 'Remoção de árvore morta'); ?>>Remoção de árvore morta
                            </option>
                            <option <?= form_select('tipo', 'Remoção de árvore caída'); ?>>Remoção de árvore caída
                            </option>
                            <option <?= form_select('tipo', 'Remoção de galho caído'); ?>>Remoção de galho caído
                            </option>
                            <option <?= form_select('tipo', 'Remoção de tronco com Munck'); ?>>Remoção de tronco com
                                Munck
                            </option>
                            <option <?= form_select('tipo', 'Remoção de toco'); ?>>Remoção de toco</option>
                            <option <?= form_select('tipo', 'Supressão'); ?>>Supressão</option>
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
                               class="form-control form-control-sm" value="<?= old('quantidade'); ?>">
                        <?= show_error('quantidade') ?>
                    </div>
                </div>
                <div class="mx-2 clearfix row">
                    <div class="col-md-4">
                        <label for="alt_arv" class="ml-0">Altura da árvore</label>
                        <select class="form-control form-control-sm select input-lg" id="alt_arv"
                                name="alt_arv" required>
                            <option <?= form_select('alt_arv', 'H1: <3m'); ?>>H1: <3m</option>
                            <option <?= form_select('alt_arv', 'H2: 3m-9m'); ?>>H2: 3m-9m</option>
                            <option <?= form_select('alt_arv', 'H3: 9m-15m'); ?>>H3: 9m-15m</option>
                            <option <?= form_select('alt_arv', 'H4: 15m-21m'); ?>>H4: 15m-21m</option>
                            <option <?= form_select('alt_arv', 'H5: >21m'); ?>>H5: >21m</option>
                        </select>
                        <?= show_error('alt_arv') ?>
                    </div>
                    <div class="col-md-4">
                        <label for="alt_copa" class="ml-0">Altura da copa</label>
                        <select class="form-control form-control-sm select input-lg" id="alt_copa"
                                name="alt_copa" required>
                            <option <?= form_select('alt_copa', 'Hc1: <2m'); ?>>Hp1: <2m</option>
                            <option <?= form_select('alt_copa', 'Hc2: 2m-8m'); ?>>Hp2: 2m-8m</option>
                            <option <?= form_select('alt_copa', 'Hc3: 8m-14m'); ?>>Hp3: 8m-14m</option>
                            <option <?= form_select('alt_copa', 'Hc4: 14m-20m'); ?>>Hp4: 14m-20m</option>
                            <option <?= form_select('alt_copa', 'Hc5: >20m'); ?>>Hp5: >20m</option>
                        </select>
                        <?= show_error('alt_copa') ?>
                    </div>
                    <div class="col-md-4">
                        <label for="diametro" class="ml-0">Diâmetro da copa</label>
                        <select class="form-control form-control-sm select input-lg" id="diametro"
                                name="diametro" required>
                            <option <?= form_select('diametro', 'D1: <2m'); ?>>D1: <2m</option>
                            <option <?= form_select('diametro', 'D2: 2m-7m'); ?>>D2: 2m-7m</option>
                            <option <?= form_select('diametro', 'D3: 7m-12m'); ?>>D3: 7m-12m</option>
                            <option <?= form_select('diametro', 'D4: 12m-17m'); ?>>D4: 12m-17m</option>
                            <option <?= form_select('diametro', 'D5: >17m'); ?>>D5: >17m</option>
                        </select>
                        <?= show_error('diametro') ?>
                    </div>
                </div>
                <div class="mx-2 clearfix row">
                    <div class="col-md-6 float-left">
                        <label for="perimetro" class="ml-0">Perímetro</label>
                        <select class="form-control form-control-sm select input-lg" id="perimetro"
                                name="perimetro" required>
                            <option <?= form_select('perimetro', 'P1: <50cm'); ?>>P1: <50cm</option>
                            <option <?= form_select('perimetro', 'P2: 50cm-150cm'); ?>>P2: 50cm-150cm</option>
                            <option <?= form_select('perimetro', 'P3: 150cm-250cm'); ?>>P3: 150cm-250cm</option>
                            <option <?= form_select('perimetro', 'P4: 250cm-350cm'); ?>>P4: 250cm-350cm</option>
                            <option <?= form_select('perimetro', 'P5: >350cm'); ?>>P5: >350cm</option>
                        </select>
                        <?= show_error('diametro') ?>
                    </div>
                    <div class="col-md-6 float-right">
                        <label for="local" class="ml-0 text-label">Local</label>
                        <select class="form-control form-control-sm select input-lg" id="local"
                                name="local" required>
                            <option <?= form_select('local', 'FÁCIL (Com livre acesso e sem interferência)'); ?>>
                                FÁCIL (Com livre acesso e sem interferência)</option>
                            <option <?= form_select('local', 'MÉDIO (Acesso com restrições e interferência leve)'); ?>>
                                MÉDIO (Acesso com restrições e interferência leve)</option>
                            <option <?= form_select('local', 'DIFÍCIL (Necessidade de isolamento, auxílio do DETRAN, desligamento de rede,
                                etc..)'); ?>>
                                DIFÍCIL (Necessidade de isolamento, auxílio do DETRAN, desligamento de rede,
                                etc..)
                            </option>
                        </select>
                    </div>
                </div>
                <button type="submit" class="btn btn-success mt-3" name="submit">Adicionar</button>
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
            let selected = '<?= old('especie');?>';
            select_especie.val(selected);
        });

        $("#quantidade").mask("0000");
    });
</script>
