$(document).ready(function (){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $(document).on('click','a.delete',function (e){
        e.preventDefault();
        $('#myModal .modal-body').text('Quieres eliminar este registro?');
        $('#myModal .modal-title').text('Eliminar registro');
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
});
