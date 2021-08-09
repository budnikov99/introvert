'use strict';

$(document).ready(() => {
    $("form.goto").each(((i, form) => {
        $(form).submit((evt) => {
            $(form).append($("#apikey").clone());
            $(form).find("input").each((i, input) => {
                switch (input.type) {
                    //Преобразование всех дат в timestamp
                    case "date":
                        input.type = "text";
                        let val = new Date(input.value).getTime() / 1000;
                        input.value = val ? val : "";
                        break;
                }
            });
        });
    }));

    //TODO
    $("form.ajax").each(((i, form) => {
        $(form).submit((evt) => {
            let key = $("#apikey").val();
            let data = {};
            $(form).find("input").each((i, input) => {
                if(empty(input.name)){
                    return;
                }
                let converted = input.value;
                switch (input.type) {
                    case "date":
                        converted = new Date(input.value).getTime();
                        break;
                    default:
                        data[input.name] = converted;
                }
            });

            
        });
    }));
});