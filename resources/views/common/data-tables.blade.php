<script type="text/javascript">
        $('#data-table').DataTable({
            processing: true,
            serverSide: false,
            ajax: routeAjax,
            columns: columns,
            order: [ [0, 'desc'] ],
            "language": {
                "lengthMenu": "{{ trans('admin.lengthMenu') }}",
                "zeroRecords": "{{ trans('admin.zeroRecords') }}",
                "info": "{{ trans('admin.info')}}",
                "infoEmpty": "{{ trans('admin.infoEmpty')}}",
                "infoFiltered": "{{ trans('admin.infoFiltered') }}",
                "processing" : "{{ trans('admin.processing') }}",
                "paginate": {
                    "first": "{{ trans('admin.first_page') }}",
                    "next": "{{ trans('admin.next_page') }}",
                    "previous": "{{ trans('admin.prev_page') }}"
                },
                "search": "{{ trans('admin.search') }}"
            }
        });
</script>