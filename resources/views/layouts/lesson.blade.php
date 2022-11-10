@push('css')
    <link href='https://unpkg.com/@fullcalendar/core@4.3.1/main.min.css' rel='stylesheet' />
    <link href='https://unpkg.com/@fullcalendar/daygrid@4.3.0/main.min.css' rel='stylesheet' />
    <link href='https://unpkg.com/@fullcalendar/timegrid@4.3.0/main.min.css' rel='stylesheet' />
    <link href='https://unpkg.com/@fullcalendar/list@4.3.0/main.min.css' rel='stylesheet' />
    <link rel="stylesheet" href="{{ asset('css/schedule.css') }}">
@endpush

@push('js')
    <script src='https://unpkg.com/@fullcalendar/core@4.3.1/main.min.js'></script>
    <script src='https://unpkg.com/@fullcalendar/interaction@4.3.0/main.min.js'></script>
    <script src='https://unpkg.com/@fullcalendar/daygrid@4.3.0/main.min.js'></script>
    <script src='https://unpkg.com/@fullcalendar/timegrid@4.3.0/main.min.js'></script>
    <script src='https://unpkg.com/@fullcalendar/list@4.3.0/main.min.js'></script>
    <script src='https://unpkg.com/@fullcalendar/core/locales/ja'></script>
@endpush