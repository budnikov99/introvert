budnikovStatusColorChanger = function() {
    var widget = this;
    this.code = null;

    this.bind_actions = function(){};

    this.paintStatusTitle = function(elem){
        console.log($(elem).find('.pipeline_status__head_title'));
        console.log($(elem).find('.pipeline_status__head_line'));
        $(elem).find('.pipeline_status__head_title').css(
            'color',
            $(elem).find('.pipeline_status__head_line').css('background-color')
        );
        console.log('Pipeline status color applied!');
    };


    this.render = function() {
        if(AMOCRM.data.current_entity == 'leads-pipeline'){
            //4, так как везде есть скрытый статус "неразобранное"
            if(AMOCRM.data.current_view.pipeline.$pipeline_content[0].children.length >= 4){
                widget.paintStatusTitle(AMOCRM.data.current_view.pipeline.$pipeline_content[0].children[3]);                   
            }
        }
};

    this.init = function(){};

    this.bootstrap = function(code) {
        widget.code = code;
        var status = 1;

        if (status) {
            widget.init();
            widget.render();
            widget.bind_actions();
            $(document).on('widgets:load', function () {
                widget.render();
            });
        }
    }
};

yadroWidget.widgets['budnikov-status-color-changer'] = new budnikovStatusColorChanger();
yadroWidget.widgets['budnikov-status-color-changer'].bootstrap('budnikov-status-color-changer');
