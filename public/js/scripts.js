/**
 * Dia de hoje
 *
 * @type Date
 */
var hj = new Date(),
    hjLong = hj.toLocaleString('pt-BR', {
        weekday: 'long',
        year: 'numeric',
        month: 'long',
        day: 'numeric'
    }) + ' às ' + hj.toLocaleTimeString();

var getUrl = window.location;

/**
 * Url base do sistema, vai servir como o base_url() do CodeIgniter
 */
var baseUrl = window.location.origin;

/**
 * Inicializa o listener de animações do MDBootstrap ao descer a tela (scroll) em
 * qualquer elemento que possuir a classe "wow"
 *
 * Animations: @link https://mdbootstrap.com/css/animations/
 */
new WOW().init();

var containerMaior = function () {
    $('.conteudo').removeClass('container').addClass('container-fluid');
    $('[data-toggle=container]').text('Diminuir');
    $('.table').css('width', '100%');
};

/**
 * Pega os elementos que possuem "data-onload" e simula o evento "onload"
 */
$('[data-onload]').each(function () {
    eval($(this).data('onload'));
});

$('.input_capital').on('input', function(evt) {
    $(this).val(function(_, val) {
        return val.toUpperCase();
    });
});
/**
 * Cria o alert do bootstrap de forma dinâmica de acordo com os parâmetros passados, baseia-se nas cores padrões de
 * alerts do MDBootstrap
 *
 * @see https://mdbootstrap.com/javascript/alerts/
 *
 * @param {String} color Opções: primary, secondary, success, danger, warning, info, light, dark
 * @param {String} header Um título para o alert
 * @param {String} msg Mensagem para o usuário
 * @returns {String} HTML contendo o alert
 */
var alert = function (color, header, msg) {
    return '<hr><div class="alert alert-'+color+' darken-4 alert-dismissible fade show animated bounceIn z-depth-2" role="alert">'+
        '<button type="button" class="close" data-dismiss="alert" aria-label="Close">'+
        '<span aria-hidden="true" class="text-dark">&times;</span>'+
        '</button>'+
        '<b class="float-left">'+header+'</b><br><br>'+
        '<p class="text-justify text-dark" style="font-size:small">'+msg+'</p>'+
        '</div>';
};

