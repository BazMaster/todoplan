import toastr from "toastr";


$(document).on('submit','.task-add', function(e){
    e.preventDefault();
    var $form = $(this);
    var data = $form.serialize();
    // console.log(data);
    $('.output > *').addClass('loading');
    $form.find('.error').removeClass('error');
    $.post('/add', { data: data }, function(result){
        console.log('result', result);
        if (result.status == 'success') {
            if(result.content) {
                if(result.output) {
                    $('.output').html(result.output);
                }
                if(result.msg) {
                    toastr.success(result.msg);
                }
            }
            $('.output > *').removeClass('loading');
            $form[0].reset();
        }
        else {
            console.log(result.errors);
            $.each(result.errors, function( index, value ) {
                console.log(index, value);
                $form.find('[name=' + value + ']').addClass('error');
            });
            if(result.msg) {
                toastr.error(result.msg);
            }
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