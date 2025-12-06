    <meta http-equiv="content-type" content="text/html;charset=utf-8" />
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="shortcut icon" href="assets/img/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.css">
    <link rel="stylesheet"href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.13.2/themes/base/jquery-ui.min.css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/2.3.4/css/dataTables.dataTables.min.css" />
    <link href="{{ asset('admin/assets/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/assets/css/boxicons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/assets/css/select2.min.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/assets/fonts/remixicon.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/assets/css/main.min.css') }}" rel="stylesheet">
    @stack('css')
