$('.animated').waypoint({
    handler(direction){
        if(direction === 'down'){
            $(this.element).addClass('fadeInUp');
            this.destroy();
        }
    },
    offset: '63%',
});


function deleteConfirm(){
    const result = confirm("本当に削除しますか？");
    if(result){
        alert('削除しました');
    }else{
        alert('削除を中止しました。');
        this.event.preventDefault();
    }
}
