<?php

function load_view(string $view, array $data = null)
{
    echo view("base/base", ['page' => view($view, $data ?? [])]);
}

function show_error($input_name)
{
    $validation = \Config\Services::validation();
    if ($validation->getError($input_name)) {
        return "<div class='alert red mt-2 text-white'>" .
            $validation->getError($input_name) .
            "</div>";
    }
}

function load_libs(array $libs)
{
    $session = \Config\Services::session();
    foreach ($libs as $l) {
        $session->setFlashdata($l, true);
    }
}

function form_select(string $campo, string $valor, string $old_value = null)
{
    return old($campo, $old_value) == $valor ? 'selected' : '';
}

/**
 * Seta notificação padrão do sistema
 *
 * @param string $type Pode ser: "danger" em caso de erro, "info" em caso de informação, "warning em caso de aviso
 * e "success" em caso de sucesso
 * @param string $msg Mensagem para o usuário
 */
function setSystemMsg(string $type, string $msg)
{
    $color = "";
    switch ($type) {
        case "danger":
            $color = "red darken-2";
            break;
        case "success":
            $color = "teal darken-2";
            break;
        case "info":
            $color = "light-blue darken-2";
            break;
        case "warning":
            $color = "amber darken-3";
    }
    $session = \Config\Services::session();
    $div = "<div class='alert " . $color . " text-white'>" . $msg . "</div>";
    $session->setFlashdata('message', $div);
}

/**
 * Retorna notificação padrão do sistema
 *
 * @return string HTML com a div da notificação
 */
function getSystemMsg(): string
{
    $session = \Config\Services::session();
    if ($session->has('message')) {
        return $session->getFlashdata('message');
    }
    return '';
}

/**
 * Troca o padrão da data para sql ou ptBr, dependendo do que for passado
 *
 * @param string $date
 * @return string Data invertida
 */
function dateSwap(string $date): string
{
    $data = explode(" ", $date)[0];
    if (preg_match_all('/^(\d{2})\/(\d{2})\/(\d{4})$/', $data)) { //Formato ptbr
        return implode('-', array_reverse(explode('/', $data)));
    } else if (preg_match_all('/^(\d{4})\-(\d{2})\-(\d{2})$/', $data)) { //Formato sql
        if (count(explode(" ", $date)) == 2) {//Se tiver hora, retorna junto
            return implode('/', array_reverse(explode('-', $data))) . " " . explode(" ", $date)[1];
        }
        return implode('/', array_reverse(explode('-', $data)));
    } else {
        die('<code>Formato de data inválido para a função dateSwap!</code>');
    }
}

function validate_file($file, $field, $formats, $size){
    $errors = 0;
    $validation = \Config\Services::validation();
    if(!in_array($file->getMimeType(), $formats)){
        $validation->setError($field, "Formato de arquivo não suportado");
        $errors++;
    }
    if($file->getSizeByUnit('mb') > $size){
        $validation->setError($field, "Tamanho do arquivo muito grande");
        $errors++;
    }
    return $errors == 0;
}
