$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
    contentType: "application/x-www-form-urlencoded; charset=UTF-8"
});

$(document).ready(function (){
    $(document).on('click','table a.delete',function (e){
        e.preventDefault();
        $('#myModal .modal-body').text(delete_body);
        $('#myModal .modal-title').text(delete_title);
        $('#myModal').modal('show');
        $('#deleteForm').attr('action',$(this).attr('href'));
        $('#myModal #confirm').click(function (e){
            $('#deleteForm').submit();
        })
    });

    if ($('#alert').length)
    {
        $('#alert').delay(2000).fadeOut()
    }

    if ($('.tiny-mce').length)
    {
        $('.tiny-mce').trumbowyg({
            btns: [
                ['viewHTML'],
                ['undo', 'redo'], // Only supported in Blink browsers
                ['h1','h2'],
                ['strong', 'em'],
                ['link'],
                ['unorderedList', 'orderedList'],
                ['justifyLeft', 'justifyCenter', 'justifyRight', 'justifyFull']
            ],
            svgPath: '/js/trumbowyg/icons.svg',
            removeformatPasted: true,
            lang: 'es'
        });
    }

    $(document).on('tbwconfirm', function(e){

        var regex = /^(http\:\/\/|https\:\/\/|mailto\:)/g;
        var str = $(e.target).find('input[name="url"]').val();
        var myArray = regex.exec(str);
        if (regex.lastIndex === 0)
        {
            alert(protocol_alert)
        }
    });

    $(document).on('focusout', 'div.position', function (e) {
            var inputOrder = $(this);
            $.get('/change-position', {
                id: inputOrder.data('id'),
                value: inputOrder.text(),
                table: inputOrder.data('table')
            }, function (data) {
                if (data.status) {
                    inputOrder.text(inputOrder.text());
                } else {
                    inputOrder.text(0);
                    alert(order_alert);
                }
            });
        }
    );

    $(document).on('click', '.change-boolean', function(e){
        e.preventDefault();
        var $this = $(this);
        var href = $this.data('href');

        $.get(href, function (response) {
            if(response.success){
                $this.removeClass('fa-circle-o');
                $this.removeClass('fa-check-circle-o');
                $this.addClass(response.class)
            }
        });
    })

    $(document).on('blur','.change-order',function(e){
        e.preventDefault();
        var $this = $(this);
        var href = $this.data('href');
        var value = $this.val();

        $.get(href, {value: value}, function(response){
            if(!response.success){
                location.reload();
            }
        })
    })

});

