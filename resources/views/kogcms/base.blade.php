<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="csrf_token" content="{{ csrf_token() }}">
    <title>King of Games - Administración</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{ asset('js/dropzone/basic.min.css')  }}">
    <link rel="stylesheet" href="{{ asset('js/dropzone/dropzone.min.css')  }}">
    <link rel="stylesheet" href="/css/all.css">
    @include('partials.favicons')
</head>
<body class="mb-5">
@include('partials.modal')
@include('partials.form-delete')
@include('kogcms.partials.menu')
@include('partials.empty-modal')
@yield('content')
<footer>
    @include('common.footer')
</footer>
<script src="/js/all.js"></script>
@stack('scripts')
@if(session('alert'))
    <script type="text/javascript">
        $('#alertModal .modal-title').text("{{ session('alert') }}")
        $('#alertModal').modal('show');
    </script>
@endif
@if(session('message'))
    <div id="alert" class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('message') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif
</body>
</html>