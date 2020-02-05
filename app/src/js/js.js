import toastr from "toastr";


$(document).on('submit','.task-add', function(e){
    e.preventDefault();
    var $form = $(this);
    var data = $form.serialize();
    var page = $('.pagination').data('page');
    // console.log(data);
    $('.output > *').addClass('loading');
    $form.find('.error').removeClass('error');
    $.post('/add', { data: data, page: page }, function(result){
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
        $('.output > *').removeClass('loading');
    },"json");
});
$(document).on('submit','.edit-form', function(e){
    e.preventDefault();
    var $form = $(this);
    var $modal = $('#editModal');
    var data = $form.serialize();
    var page = $('.pagination').data('page');
    // console.log(data);
    $form.find('.modal-body').addClass('loading');
    $form.find('.error').removeClass('error');
    $.post('/edit', { data: data, page: page }, function(result){
        console.log('result', result);
        if (result.status == 'success') {
            if(result.content) {
                if(result.output) {
                    $('.output').html(result.output);
                    $modal.modal('hide');
                }
                if(result.msg) {
                    toastr.success(result.msg);
                }
            }
            $form[0].reset();
        }
        else if (result.status == 'login') {
            if(result.msg) {
                toastr.error(result.msg);
            }
            setTimeout(function () {
                location.reload();
            },1500);
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
        $('.output > *').removeClass('loading');
    },"json");
});

$(document).on('click','.output .btn-edit', function(){
    var id = $(this).closest('.row-item').data('id');
    var $modal = $('#editModal');
    console.log(id);
    $.post('/get-task', { id: id }, function(result){
        console.log(result);
        if (result.status == 'success') {
            $modal.find('.modal-content').html(result.output);
            $modal.modal('show');
            if(result.msg) {
                toastr.info(result.msg);
            }
        }
        else {
            if(result.msg) {
                toastr.error(result.msg);
            }
        }
    },"json");
});
$(document).on('click','.pagination a', function(e){
    e.preventDefault();
    var sortby = $('.output .table').data('sortby');
    var sortdir = $('.output .table').data('sortdir');
    var page = $(this).attr('href');
    console.log(sortby, sortdir, page);
    $('.output > *').addClass('loading');
    $.post(page, { sortby: sortby, sortdir: sortdir, page: page }, function(result){
        $('.output').html(result);
        $('.output > *').removeClass('loading');
    });
});
$(document).on('click','.sort', function(e){
    e.preventDefault();
    var sortby = $(this).data('sortby');
    var sortdir = $(this).find('i').data('sortdir');
    var page = $('.output .table').data('page');
    console.log(sortby, sortdir, page);
    $('.output > *').addClass('loading');
    $.post('get/' + page, { sortby: sortby, sortdir: sortdir, page: page }, function(result){
        $('.output').html(result);
        $('.output > *').removeClass('loading');
    });
});
$(document).on('submit','.login-form', function(e){
    e.preventDefault();
    var $form = $(this);
    var data = $form.serialize();
    console.log(data);
    $form.addClass('loading');
    $form.find('.error').removeClass('error');
    $.post('/login', { data: data }, function(result){
        console.log('result', result);
        if (result.status == 'success') {
            toastr.success(result.msg);
            setTimeout(function () {
                location.reload();
            },1000);
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
        $form.removeClass('loading');
    },"json");
});

$(function () {
    $('[data-toggle="tooltip"]').tooltip()
});