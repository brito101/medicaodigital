$(document).ready(function () {
    $(".money_format_2").inputmask("currency", {
        autoUnmask: true,
        radixPoint: ",",
        groupSeparator: ".",
        allowMinus: false,
        prefix: "R$ ",
        digits: 2,
        digitsOptional: false,
        rightAlign: true,
        unmaskAsNumber: true,
    });
});
