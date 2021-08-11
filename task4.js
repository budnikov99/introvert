//Не лучший способ, но зато можно просто скопипастить в консоль
const BUDNIKOV_MAGNIFYING_GLASS_SVG = `<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="14px" height="14px" x="0px" y="0px"
	 viewBox="0 0 512.005 512.005" style="enable-background:new 0 0 512.005 512.005;" xml:space="preserve">
		<path d="M505.749,475.587l-145.6-145.6c28.203-34.837,45.184-79.104,45.184-127.317c0-111.744-90.923-202.667-202.667-202.667
			S0,90.925,0,202.669s90.923,202.667,202.667,202.667c48.213,0,92.48-16.981,127.317-45.184l145.6,145.6
			c4.16,4.16,9.621,6.251,15.083,6.251s10.923-2.091,15.083-6.251C514.091,497.411,514.091,483.928,505.749,475.587z
			 M202.667,362.669c-88.235,0-160-71.765-160-160s71.765-160,160-160s160,71.765,160,160S290.901,362.669,202.667,362.669z"/>
</svg>`;

budnikovStatusColorChanger = function() {
    var widget = this;
    this.code = null;

    this.bind_actions = function(){};

    this.renderSearchOption = function(){
        return $('<div />').addClass('tips-item').addClass('js-tips-item').text('Нагуглить').prepend(
            $('<span />').addClass('tips-icon').append(BUDNIKOV_MAGNIFYING_GLASS_SVG)
        );
    }

    this.render = function() {
        if(AMOCRM.isCard()){
            $('input[data-type="phone"], input[data-type="email"]').each((i, item) => {
                let tip = widget.renderSearchOption();
                tip.on('click', (e) => {
                    //Потенциальная уязвимость
                    let val = encodeURIComponent($(item).val());
                    window.open('http://letmegooglethat.com/?q='+val, '_blank');
                    window.open('https://yandex.ru/search/?text='+val, '_blank');
                });
                $(item).parent().parent().parent().find('.tips__inner').first().append(tip);
            });
        }
    };

    this.init = function() {};

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
