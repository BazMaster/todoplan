$(document).on('submit','.task-add', function(e){
    e.preventDefault();
    var $form = $(this);
    var data = $form.serialize();
    console.log(data);
    $('.output > *').addClass('loading');
    $.post('/add', { data: data }, function(result){
        console.log('result', result);
        if (result.type == 'success') {
            if(result.content) {
                $('.output').html(result.content);
            }
            $('.output > *').removeClass('loading');
            $form[0].reset();
        }
    },"json");
});

$(document).on('click','.output .btn-edit', function(){
    var id = $(this).closest('.row-item').data('id');
    console.log(id);
    // if(result === true) {
    //     $('.record_output > *').addClass('loading');
    //     $.post('/ajax', { type: 'card_record_remove', id: id, tpl: 'card_records/tpl.cards.record.tpl' }, function(result){
    //         console.log(result);
    //         if (result.type == 'success') {
    //             $('.record_output').html(result.content);
    //             $('.record-filter-form')[0].reset();
    //         }
    //     },"json");
    // }
});