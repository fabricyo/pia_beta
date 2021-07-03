<!-- JQuery -->
<script src="<?= base_url('js/jquery.min.js'); ?>"></script>
<!-- Bootstrap tooltips -->
<script src="<?= base_url('js/popper.min.js'); ?>"></script>
<!-- Bootstrap core JavaScript -->
<script src="<?= base_url('js/bootstrap.min.js'); ?>"></script>
<!-- Font Awesome -->
<script src="<?= base_url('libs/fontawesome/js/all.js'); ?>"></script>
<!-- MDB core JavaScript -->
<script src="<?= base_url('js/mdb.min.js'); ?>"></script>

<script src="<?= base_url('js/wow.min.js'); ?>"></script>


<?php $session = \Config\Services::session(); ?>
<?php if ($session->has("dataTables")) { ?>
    <script src="<?= base_url('libs/datatables/datatables.min.js'); ?>"></script>
    <script src="<?= base_url('js/datatables_scripts.js'); ?>"></script>
<?php } ?>


<?php if ($session->has("calendario")) { ?>
    <script src="<?= base_url('libs/fullcalendar/main.js');?>"></script>
    <script src="<?= base_url('libs/fullcalendar/locales/pt-br.js');?>"></script>
<?php } ?>

<?php if ($session->has("form_utils")) { ?>
    <script src="<?= base_url('js/jquery.mask.js'); ?>"></script>
    <script src="<?= base_url('js/mymasks.js'); ?>"></script>
    <script src="<?= base_url('libs/select2/dist/js/select2.full.js'); ?>"></script>
    <script src="<?= base_url('libs/select2/dist/js/i18n/pt-BR.js'); ?>"></script>
    <script src="<?= base_url('libs/dayjs/dayjs.min.js'); ?>"></script>
    <script src="<?= base_url('libs/dayjs/pt-br.min.js'); ?>"></script>
    <script src="<?= base_url('libs/dayjs/isBetween.min.js'); ?>"></script>
    <script src="<?= base_url('libs/dayjs/weekday.min.js'); ?>"></script>
    <script src="<?= base_url('libs/dayjs/localeData.min.js'); ?>"></script>
    <script src="<?= base_url('libs/dayjs/customParseFormat.min.js'); ?>"></script>
    <script src="<?= base_url('libs/dayjs/duration.min.js'); ?>"></script>
    <script>
        dayjs.locale('pt-br');
        const isBetween = window.dayjs_plugin_isBetween;
        dayjs.extend(isBetween);
        let weekday = window.dayjs_plugin_weekday;
        dayjs.extend(weekday);
        const localeData = window.dayjs_plugin_localeData;
        dayjs.extend(localeData);
        const customParseFormat = window.dayjs_plugin_customParseFormat;
        dayjs.extend(customParseFormat);
        const duration = window.dayjs_plugin_duration;
        dayjs.extend(duration);
    </script>
    <script src="<?= base_url('libs/pickadate/picker.js'); ?>"></script>
    <script src="<?= base_url('libs/pickadate/picker.date.js'); ?>"></script>
    <script src="<?= base_url('libs/pickadate/picker.time.js'); ?>"></script>
    <script src="<?= base_url('libs/pickadate/translations/pt_BR.js'); ?>"></script>

<?php } ?>

<?php if ($session->has("input_file")) { ?>
    <script src="<?= base_url('js/input_file.js'); ?>"></script>
<?php } ?>

<script src="<?= base_url('js/scripts.js'); ?>"></script>
