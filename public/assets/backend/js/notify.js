function notify(message, alert, direction) {
    var n = noty({
        text: '<div class="alert alert-'+alert+'">'+message+'</div>',
        layout: direction,
        theme: 'made',
        maxVisible: 10,
        animation: {
            open: 'animated bounceInLeft',
            close: 'animated bounceOutLeft'
        },
        timeout: false,
    });
}
