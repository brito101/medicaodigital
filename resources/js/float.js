$(document).ready(function () {
    $(".float").inputmask({
        alias: "numeric",
        autoUnmask: true,
        radixPoint: ",",
        groupSeparator: ".",
        allowMinus: false,
        digits: 2,
        digitsOptional: false,
        rightAlign: true,
        unmaskAsNumber: true,
    });
});
