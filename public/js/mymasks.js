$('.mskTel').each(function () {
    var self = $(this);
    var options = {
        onKeyPress: function (tel) {
            tel = self;
            var mask = tel.val().length > 14 ? "(00) 00000-0000" : "(00) 0000-00000";
            tel.mask(mask, options);
        }
    };
    self.mask(self.val().length === 14 ? "(00) 0000-0000" : "(00) 00000-0000", options);
});

$(".mskCpf").mask('000.000.000-00', {reverse: true});
$(".mskIdtMil").mask('0000000000');
$(".mskRamal").mask("0000 0000", {
    "translation": {
        0: {
            pattern: /\d/
        }
    }
});

