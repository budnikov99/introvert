'use strict';

$(document).ready(() => {
    let key = $("#apikey").val();
    $("form").each(((i, form) => {
        $(form).submit((evt) => {
            evt.preventDefault();
            console.log(form);
            $(form).each((i, input) => {
                console.log(input);
            });
        });
    }));
});