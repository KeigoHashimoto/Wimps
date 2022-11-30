$('.animated').waypoint({
    handler(direction){
        if(direction === 'down'){
            $(this.element).addClass('fadeInUp');
            this.destroy();
        }
    },
    offset: '63%',
});