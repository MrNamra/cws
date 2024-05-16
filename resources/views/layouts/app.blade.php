@php
    use Illuminate\Http\Request;
@endphp
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Assignment') }}</title>
    <!-- Google Font: Source Sans Pro -->
    {{-- <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback"> --}}
    <link href="{{ url('css/1.css') }}" rel="stylesheet" />
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    {{-- datatable --}}
    <link href="https://cdn.datatables.net/2.0.6/css/dataTables.dataTables.min.css" />
    <script src="https://cdn.datatables.net/2.0.6/js/dataTables.min.js"></script>
    {{-- datatable end --}}

    {{-- bootstrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
    {{-- bootstrapend --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/js/all.min.js" integrity="sha512-u3fPA7V8qQmhBPNT5quvaXVa1mnnLSXUep5PS1qo5NRzHwG19aHmNJnj1Q8hpA/nBWZtZD4r4AX6YOt5ynLN2g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- Scripts -->
    <style>
        .dt-length,
        .dt-search {
            display: none;
        }
    </style>
</head>

<body class="d-flex flex-column min-vh-100" id="bodyid" data-bs-theme="dark">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Assignment</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{ url('/') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('new') }}">News</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="javascript:void(0);" id="navbarDropdown"
                            role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Need Help?
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="{{route('ans')}}">Submit Answer</a></li>
                            <li><a class="dropdown-item" href="report.html">Report Mistake</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="contact.html">Contact Us</a></li>
                        </ul>
                    </li>
                </ul>
                <form class="d-flex">
                    <input class="form-control me-2" id="search" type="search" placeholder="Search..."
                        aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
            </div>
        </div>
    </nav>

    <!-- Page Content -->
    {{-- <main> --}}
    @yield('main')
    {{-- </main> --}}
    <footer class="bg-dark text-white text-center py-3">
        {{-- @yield('footer') --}}
        <a href="https://github.com/CwsHelp" target="_blank">
            <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="30" height="30" viewBox="0 0 96 96">
                <path fill="#0fd2ff"
                    d="M56.999,83.827c-0.885,0-1.694-0.592-1.932-1.488c-0.283-1.067,0.353-2.162,1.42-2.445 C70.92,76.062,81,62.947,81,48c0-18.196-14.804-33-33-33S15,29.804,15,48c0,14.063,8.924,26.505,22,31.118v-5.567 c-3.012,0.376-6.001-0.297-8.465-1.92c-1.856-1.227-3.278-2.929-4.006-4.793c-0.084-0.202-0.18-0.455-0.275-0.71 c-0.143-0.38-0.277-0.739-0.422-1.018c-0.533-1.106-1.543-1.962-2.667-2.292c-0.034-0.01-0.067-0.021-0.101-0.032 c-1.344-0.474-2.138-1.803-1.931-3.231c0.207-1.43,1.343-2.479,2.764-2.552c3.775-0.278,7.491,2.055,9.422,5.927 c0.018,0.035,0.034,0.071,0.05,0.107c0.446,1.046,1.533,1.77,2.769,1.844c0.044,0.002,0.089,0.007,0.133,0.012 c0.955,0.126,1.991-0.119,2.886-0.653c0.086-0.483,0.208-0.958,0.362-1.42C29.317,61.615,23,54.531,23,46v-2 c0-4.172,1.268-8.138,3.675-11.529c-0.445-2.235-0.636-5.389,0.402-9.021c0.217-0.762,0.864-1.322,1.648-1.432 c0.201-0.027,4.646-0.595,8.843,2.747C39.354,24.257,41.176,24,43,24c1.104,0,2,0.896,2,2s-0.896,2-2,2 c-1.76,0-3.524,0.303-5.243,0.898c-0.709,0.243-1.493,0.074-2.034-0.44c-1.871-1.78-3.871-2.309-5.144-2.45 c-0.5,2.679-0.197,4.925,0.187,6.422c0.155,0.602,0.021,1.24-0.362,1.729C28.177,37.005,27,40.408,27,44v2c0,7.168,5.832,13,13,13 h0.76c0.77,0,1.47,0.441,1.803,1.135c0.333,0.693,0.238,1.517-0.243,2.117c-0.755,0.94-1.204,2.071-1.299,3.27 c-0.043,0.543-0.305,1.044-0.727,1.39c-1.851,1.515-4.201,2.223-6.462,1.958c-2.031-0.14-3.843-1.064-5.072-2.523 c0.486,0.741,1.162,1.407,1.978,1.947c1.76,1.159,3.942,1.601,6.135,1.234c0.048-0.008,0.096-0.014,0.144-0.018 c0.15-0.015,0.579-0.074,1.308-0.336c0.612-0.217,1.294-0.127,1.826,0.247C40.683,69.796,41,70.406,41,71.057v10.77 c0,0.621-0.289,1.207-0.781,1.585c-0.492,0.379-1.131,0.507-1.732,0.348C22.303,79.464,11,64.759,11,48c0-20.402,16.598-37,37-37 s37,16.598,37,37c0,16.759-11.303,31.464-27.487,35.759C57.341,83.805,57.168,83.827,56.999,83.827z M22.172,60.993 c-0.01,0-0.02,0.001-0.03,0.002C22.152,60.994,22.163,60.994,22.172,60.993z"
                    opacity=".3"></path>
                <path fill="#0fd2ff"
                    d="M56.998,84.827c-1.327,0-2.541-0.888-2.897-2.231c-0.425-1.602,0.528-3.244,2.13-3.669 C70.226,75.212,80,62.494,80,48c0-17.645-14.355-32-32-32c-6.313,0-12.206,1.838-17.17,5.007c1.976,0.184,4.541,0.892,6.951,2.664 C39.5,23.226,41.249,23,43,23c1.657,0,3,1.343,3,3s-1.343,3-3,3c-1.648,0-3.302,0.283-4.916,0.843 c-1.061,0.367-2.238,0.113-3.051-0.66c-1.253-1.193-2.571-1.753-3.621-2.011c-0.241,2.068,0.012,3.801,0.322,5.009 c0.231,0.902,0.031,1.861-0.543,2.595C29.104,37.444,28,40.634,28,44v2c0,6.617,5.383,12,12,12h0.76 c1.154,0,2.206,0.662,2.705,1.702c0.5,1.041,0.357,2.275-0.365,3.175c-0.628,0.784-1.002,1.726-1.082,2.724 c-0.064,0.813-0.458,1.566-1.09,2.084c-0.259,0.211-0.526,0.409-0.801,0.592c0.209,0.085,0.41,0.194,0.599,0.327 C41.525,69.165,42,70.08,42,71.057v10.77c0,0.932-0.433,1.81-1.171,2.378c-0.739,0.569-1.699,0.76-2.599,0.521 C21.609,80.314,10,65.212,10,48c0-20.953,17.047-38,38-38s38,17.047,38,38c0,17.212-11.609,32.314-28.23,36.726 C57.512,84.794,57.253,84.827,56.998,84.827z M19.917,63.335C23.412,69.729,29.046,74.862,36,77.671v-3.032 c-2.863,0.117-5.659-0.622-8.015-2.172c-2.029-1.342-3.585-3.21-4.388-5.266c-0.081-0.192-0.18-0.456-0.28-0.722 c-0.132-0.352-0.256-0.683-0.373-0.906c-0.429-0.889-1.202-1.543-2.062-1.796c-0.051-0.015-0.101-0.031-0.151-0.049 C20.44,63.626,20.168,63.493,19.917,63.335z M32.038,62.142c0.061,0.112,0.119,0.227,0.177,0.341 c0.026,0.054,0.051,0.107,0.075,0.162c0.299,0.7,1.048,1.187,1.909,1.238c0.067,0.004,0.133,0.01,0.2,0.019 c0.595,0.077,1.231-0.035,1.825-0.3C34.754,63.286,33.351,62.792,32.038,62.142z M22.263,61.989 c-0.016,0.001-0.033,0.002-0.049,0.003C22.23,61.991,22.247,61.99,22.263,61.989z M25.661,25.108C19.704,30.924,16,39.037,16,48 c0,4.017,0.75,7.896,2.133,11.486c0.003-0.025,0.007-0.05,0.01-0.075c0.276-1.908,1.799-3.31,3.703-3.407 c1.176-0.082,2.352,0.06,3.476,0.404C23.231,53.468,22,49.875,22,46v-2c0-4.237,1.245-8.272,3.615-11.756 C25.203,29.912,25.219,27.493,25.661,25.108z"
                    opacity=".3"></path>
                <path fill="#0fd2ff"
                    d="M57,82.826c-0.442,0-0.847-0.296-0.966-0.743c-0.142-0.534,0.176-1.082,0.71-1.224 C71.614,76.913,82,63.4,82,48c0-18.748-15.252-34-34-34S14,29.252,14,48c0,14.962,9.805,28.143,24,32.5v-8.114 c-0.252,0.054-0.49,0.091-0.709,0.111c-2.871,0.479-5.81-0.124-8.206-1.701c-1.685-1.113-2.971-2.647-3.625-4.322 c-0.088-0.212-0.179-0.453-0.271-0.696c-0.154-0.41-0.299-0.798-0.472-1.13c-0.646-1.344-1.864-2.375-3.271-2.789 c-0.938-0.328-1.462-1.211-1.324-2.161c0.137-0.95,0.888-1.647,1.826-1.696c3.394-0.246,6.727,1.868,8.477,5.375 c0.627,1.467,2.018,2.404,3.654,2.503c1.38,0.172,2.832-0.217,4-1.048c0.13-1.003,0.427-1.969,0.878-2.864 C30.619,61.427,24,54.472,24,46v-2c0-4.106,1.293-8.003,3.746-11.302c-0.48-2.131-0.759-5.291,0.293-8.973 c0.109-0.381,0.432-0.662,0.824-0.716c0.187-0.03,4.504-0.576,8.479,2.867C39.198,25.295,41.099,25,43,25c0.552,0,1,0.447,1,1 s-0.448,1-1,1c-1.872,0-3.746,0.321-5.571,0.953c-0.352,0.123-0.746,0.039-1.017-0.22c-2.583-2.457-5.39-2.771-6.631-2.773 c-0.782,3.235-0.435,5.959,0.017,7.718c0.077,0.301,0.01,0.621-0.181,0.865C27.25,36.566,26,40.183,26,44v2c0,7.72,6.28,14,14,14 h0.76c0.385,0,0.735,0.221,0.901,0.567c0.167,0.347,0.119,0.759-0.122,1.059c-0.88,1.098-1.404,2.417-1.515,3.816 c-0.021,0.271-0.153,0.522-0.363,0.694c-1.658,1.357-3.762,1.986-5.769,1.732c-2.331-0.138-4.38-1.54-5.282-3.654 c-1.028-2.057-3.379-4.437-6.539-4.218c1.881,0.514,3.562,1.938,4.435,3.754c0.215,0.412,0.389,0.876,0.558,1.324 c0.083,0.221,0.165,0.439,0.252,0.65c0.513,1.314,1.529,2.515,2.871,3.401c1.973,1.299,4.407,1.792,6.85,1.388 c0.476-0.047,1.028-0.185,1.626-0.399c0.305-0.109,0.646-0.063,0.913,0.124C39.842,70.426,40,70.731,40,71.057v10.77 c0,0.311-0.144,0.604-0.39,0.793s-0.567,0.254-0.866,0.174C22.997,78.613,12,64.307,12,48c0-19.851,16.149-36,36-36 s36,16.149,36,36c0,16.307-10.997,30.613-26.744,34.793C57.17,82.815,57.084,82.826,57,82.826z">
                </path>
                <g>
                    <path fill="#0fd2ff"
                        d="M57,83.826c-1.104,0-2-0.896-2-2V66c0-1.376-0.457-2.672-1.32-3.748 c-0.481-0.601-0.576-1.424-0.243-2.117C53.77,59.441,54.47,59,55.24,59H56c7.168,0,13-5.832,13-13v-2 c0-3.463-1.106-6.771-3.198-9.565c-0.372-0.496-0.492-1.137-0.326-1.734c0.432-1.552,0.783-3.89,0.257-6.694 c-1.285,0.144-3.323,0.683-5.217,2.521c-0.549,0.534-1.354,0.708-2.075,0.445C56.664,28.327,54.833,28,53,28h-2.5 c-1.104,0-2-0.896-2-2s0.896-2,2-2H53c1.905,0,3.803,0.279,5.659,0.833c4.22-3.418,8.726-2.839,8.929-2.814 c0.784,0.109,1.431,0.671,1.648,1.432c1.083,3.793,0.837,7.067,0.33,9.375C71.815,36.145,73,39.987,73,44v2 c0,8.533-6.319,15.617-14.523,16.82C58.82,63.84,59,64.915,59,66v15.826C59,82.931,58.104,83.826,57,83.826z"
                        opacity=".3"></path>
                    <path fill="#0fd2ff"
                        d="M57,84.826c-1.657,0-3-1.343-3-3V66c0-1.146-0.38-2.226-1.1-3.123 c-0.722-0.899-0.864-2.135-0.365-3.175C53.034,58.662,54.086,58,55.24,58H56c6.617,0,12-5.383,12-12v-2 c0-3.245-1.037-6.346-2.999-8.966c-0.558-0.744-0.738-1.705-0.489-2.602c0.351-1.262,0.644-3.081,0.387-5.264 c-1.063,0.263-2.411,0.837-3.687,2.075c-0.825,0.8-2.033,1.06-3.113,0.668C56.432,29.307,54.716,29,53,29h-2.5 c-1.657,0-3-1.343-3-3s1.343-3,3-3H53c1.832,0,3.656,0.246,5.445,0.732c4.436-3.326,9.064-2.732,9.28-2.704 c1.177,0.163,2.146,1.006,2.473,2.147c1.075,3.763,0.903,7.044,0.432,9.444C72.839,36.022,74,39.928,74,44v2 c0,8.646-6.126,15.887-14.265,17.61C59.91,64.392,60,65.193,60,66v15.826C60,83.483,58.657,84.826,57,84.826z"
                        opacity=".3"></path>
                    <path fill="#0fd2ff"
                        d="M57,82.826c-0.552,0-1-0.447-1-1V66c0-1.605-0.533-3.118-1.54-4.374 c-0.241-0.3-0.288-0.712-0.122-1.059C54.504,60.221,54.855,60,55.24,60H56c7.72,0,14-6.28,14-14v-2 c0-3.681-1.175-7.195-3.397-10.164c-0.186-0.248-0.246-0.568-0.163-0.867c0.505-1.817,0.908-4.638,0.092-8.01 c-1.251,0.003-4.105,0.32-6.711,2.851c-0.275,0.266-0.679,0.353-1.038,0.223C56.895,27.347,54.95,27,53,27h-2.5 c-0.552,0-1-0.447-1-1s0.448-1,1-1H53c1.983,0,3.959,0.319,5.884,0.951c3.998-3.526,8.375-2.97,8.566-2.941 c0.393,0.054,0.715,0.335,0.824,0.716c1.096,3.836,0.758,7.107,0.216,9.305C70.788,36.264,72,40.045,72,44v2 c0,8.473-6.62,15.429-14.959,15.967C57.666,63.213,58,64.598,58,66v15.826C58,82.379,57.552,82.826,57,82.826z">
                    </path>
                </g>
            </svg>
        </a>
        <a href="https://instagram.com/CwsHelp" target="_blank">
            <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="30" height="30" viewBox="0 0 48 48">
                <path fill="#304ffe"
                    d="M41.67,13.48c-0.4,0.26-0.97,0.5-1.21,0.77c-0.09,0.09-0.14,0.19-0.12,0.29v1.03l-0.3,1.01l-0.3,1l-0.33,1.1 l-0.68,2.25l-0.66,2.22l-0.5,1.67c0,0.26-0.01,0.52-0.03,0.77c-0.07,0.96-0.27,1.88-0.59,2.74c-0.19,0.53-0.42,1.04-0.7,1.52 c-0.1,0.19-0.22,0.38-0.34,0.56c-0.4,0.63-0.88,1.21-1.41,1.72c-0.41,0.41-0.86,0.79-1.35,1.11c0,0,0,0-0.01,0 c-0.08,0.07-0.17,0.13-0.27,0.18c-0.31,0.21-0.64,0.39-0.98,0.55c-0.23,0.12-0.46,0.22-0.7,0.31c-0.05,0.03-0.11,0.05-0.16,0.07 c-0.57,0.27-1.23,0.45-1.89,0.54c-0.04,0.01-0.07,0.01-0.11,0.02c-0.4,0.07-0.79,0.13-1.19,0.16c-0.18,0.02-0.37,0.03-0.55,0.03 l-0.71-0.04l-3.42-0.18c0-0.01-0.01,0-0.01,0l-1.72-0.09c-0.13,0-0.27,0-0.4-0.01c-0.54-0.02-1.06-0.08-1.58-0.19 c-0.01,0-0.01,0-0.01,0c-0.95-0.18-1.86-0.5-2.71-0.93c-0.47-0.24-0.93-0.51-1.36-0.82c-0.18-0.13-0.35-0.27-0.52-0.42 c-0.48-0.4-0.91-0.83-1.31-1.27c-0.06-0.06-0.11-0.12-0.16-0.18c-0.06-0.06-0.12-0.13-0.17-0.19c-0.38-0.48-0.7-0.97-0.96-1.49 c-0.24-0.46-0.43-0.95-0.58-1.49c-0.06-0.19-0.11-0.37-0.15-0.57c-0.01-0.01-0.02-0.03-0.02-0.05c-0.1-0.41-0.19-0.84-0.24-1.27 c-0.06-0.33-0.09-0.66-0.09-1c-0.02-0.13-0.02-0.27-0.02-0.4l1.91-2.95l1.87-2.88l0.85-1.31l0.77-1.18l0.26-0.41v-1.03 c0.02-0.23,0.03-0.47,0.02-0.69c-0.01-0.7-0.15-1.38-0.38-2.03c-0.22-0.69-0.53-1.34-0.85-1.94c-0.38-0.69-0.78-1.31-1.11-1.87 C14,7.4,13.66,6.73,13.75,6.26C14.47,6.09,15.23,6,16,6h16c4.18,0,7.78,2.6,9.27,6.26C41.43,12.65,41.57,13.06,41.67,13.48z">
                </path>
                <path fill="#4928f4"
                    d="M42,16v0.27l-1.38,0.8l-0.88,0.51l-0.97,0.56l-1.94,1.13l-1.9,1.1l-1.94,1.12l-0.77,0.45 c0,0.48-0.12,0.92-0.34,1.32c-0.31,0.58-0.83,1.06-1.49,1.47c-0.67,0.41-1.49,0.74-2.41,0.98c0,0,0-0.01-0.01,0 c-3.56,0.92-8.42,0.5-10.78-1.26c-0.66-0.49-1.12-1.09-1.32-1.78c-0.06-0.23-0.09-0.48-0.09-0.73v-7.19 c0.01-0.15-0.09-0.3-0.27-0.45c-0.54-0.43-1.81-0.84-3.23-1.25c-1.11-0.31-2.3-0.62-3.3-0.92c-0.79-0.24-1.46-0.48-1.86-0.71 c0.18-0.35,0.39-0.7,0.61-1.03c1.4-2.05,3.54-3.56,6.02-4.13C14.47,6.09,15.23,6,16,6h10.8c5.37,0.94,10.32,3.13,14.47,6.26 c0.16,0.39,0.3,0.8,0.4,1.22c0.18,0.66,0.29,1.34,0.32,2.05C42,15.68,42,15.84,42,16z">
                </path>
                <path fill="#6200ea"
                    d="M42,16v4.41l-0.22,0.68l-0.75,2.33l-0.78,2.4l-0.41,1.28l-0.38,1.19l-0.37,1.13l-0.36,1.12l-0.19,0.59 l-0.25,0.78c0,0.76-0.02,1.43-0.07,2c-0.01,0.06-0.02,0.12-0.02,0.18c-0.06,0.53-0.14,0.98-0.27,1.36 c-0.01,0.06-0.03,0.12-0.05,0.17c-0.26,0.72-0.65,1.18-1.23,1.48c-0.14,0.08-0.3,0.14-0.47,0.2c-0.53,0.18-1.2,0.27-2.02,0.32 c-0.6,0.04-1.29,0.05-2.07,0.05H31.4l-1.19-0.05L30,37.61l-2.17-0.09l-2.2-0.09l-7.25-0.3l-1.88-0.08h-0.26 c-0.78-0.01-1.45-0.06-2.03-0.14c-0.84-0.13-1.49-0.35-1.98-0.68c-0.7-0.45-1.11-1.11-1.35-2.03c-0.06-0.22-0.11-0.45-0.14-0.7 c-0.1-0.58-0.15-1.25-0.18-2c0-0.15,0-0.3-0.01-0.46c-0.01-0.01,0-0.01,0-0.01v-0.58c-0.01-0.29-0.01-0.59-0.01-0.9l0.05-1.61 l0.03-1.15l0.04-1.34v-0.19l0.07-2.46l0.07-2.46l0.07-2.31l0.06-2.27l0.02-0.6c0-0.31-1.05-0.49-2.22-0.64 c-0.93-0.12-1.95-0.23-2.56-0.37c0.05-0.23,0.1-0.46,0.16-0.68c0.18-0.72,0.45-1.4,0.79-2.05c0.18-0.35,0.39-0.7,0.61-1.03 c2.16-0.95,4.41-1.69,6.76-2.17c2.06-0.43,4.21-0.66,6.43-0.66c7.36,0,14.16,2.49,19.54,6.69c0.52,0.4,1.03,0.83,1.53,1.28 C42,15.68,42,15.84,42,16z">
                </path>
                <path fill="#673ab7"
                    d="M42,18.37v4.54l-0.55,1.06l-1.05,2.05l-0.56,1.08l-0.51,0.99l-0.22,0.43c0,0.31,0,0.61-0.02,0.9 c0,0.43-0.02,0.84-0.05,1.22c-0.04,0.45-0.1,0.86-0.16,1.24c-0.15,0.79-0.36,1.47-0.66,2.03c-0.04,0.07-0.08,0.14-0.12,0.2 c-0.11,0.18-0.24,0.35-0.38,0.51c-0.18,0.22-0.38,0.41-0.61,0.57c-0.34,0.26-0.74,0.47-1.2,0.63c-0.57,0.21-1.23,0.35-2.01,0.43 c-0.51,0.05-1.07,0.08-1.68,0.08l-0.42,0.02l-2.08,0.12h-0.01L27.5,36.6l-2.25,0.13l-3.1,0.18l-3.77,0.22l-0.55,0.03 c-0.51,0-0.99-0.03-1.45-0.09c-0.05-0.01-0.09-0.02-0.14-0.02c-0.68-0.11-1.3-0.29-1.86-0.54c-0.68-0.3-1.27-0.7-1.77-1.18 c-0.44-0.43-0.82-0.92-1.13-1.47c-0.07-0.13-0.14-0.25-0.2-0.39c-0.3-0.59-0.54-1.25-0.72-1.97c-0.03-0.12-0.06-0.25-0.08-0.38 c-0.06-0.23-0.11-0.47-0.14-0.72c-0.11-0.64-0.17-1.32-0.2-2.03v-0.01c-0.01-0.29-0.02-0.57-0.02-0.87l-0.49-1.17l-0.07-0.18 L9.5,25.99L8.75,24.2l-0.12-0.29l-0.72-1.73l-0.8-1.93c0,0,0,0-0.01,0L6.29,18.3L6,17.59V16c0-0.63,0.06-1.25,0.17-1.85 c0.05-0.23,0.1-0.46,0.16-0.68c0.85-0.49,1.74-0.94,2.65-1.34c2.08-0.93,4.31-1.62,6.62-2.04c1.72-0.31,3.51-0.48,5.32-0.48 c7.31,0,13.94,2.65,19.12,6.97c0.2,0.16,0.39,0.32,0.58,0.49C41.09,17.48,41.55,17.91,42,18.37z">
                </path>
                <path fill="#8e24aa"
                    d="M42,21.35v5.14l-0.57,1.19l-1.08,2.25l-0.01,0.03c0,0.43-0.02,0.82-0.05,1.17c-0.1,1.15-0.38,1.88-0.84,2.33 c-0.33,0.34-0.74,0.53-1.25,0.63c-0.03,0.01-0.07,0.01-0.1,0.02c-0.16,0.03-0.33,0.05-0.51,0.05c-0.62,0.06-1.35,0.02-2.19-0.04 c-0.09,0-0.19-0.01-0.29-0.02c-0.61-0.04-1.26-0.08-1.98-0.11c-0.39-0.01-0.8-0.02-1.22-0.02h-0.02l-1.01,0.08h-0.01l-2.27,0.16 l-2.59,0.2l-0.38,0.03l-3.03,0.22l-1.57,0.12l-1.55,0.11c-0.27,0-0.53,0-0.79-0.01c0,0-0.01-0.01-0.01,0 c-1.13-0.02-2.14-0.09-3.04-0.26c-0.83-0.14-1.56-0.36-2.18-0.69c-0.64-0.31-1.17-0.75-1.6-1.31c-0.41-0.55-0.71-1.24-0.9-2.07 c0-0.01,0-0.01,0-0.01c-0.14-0.67-0.22-1.45-0.22-2.33l-0.15-0.27L9.7,26.35l-0.13-0.22L9.5,25.99l-0.93-1.65l-0.46-0.83 l-0.58-1.03l-1-1.79L6,19.75v-3.68c0.88-0.58,1.79-1.09,2.73-1.55c1.14-0.58,2.32-1.07,3.55-1.47c1.34-0.44,2.74-0.79,4.17-1.02 c1.45-0.24,2.94-0.36,4.47-0.36c6.8,0,13.04,2.43,17.85,6.47c0.22,0.17,0.43,0.36,0.64,0.54c0.84,0.75,1.64,1.56,2.37,2.41 C41.86,21.18,41.94,21.26,42,21.35z">
                </path>
                <path fill="#c2185b"
                    d="M42,24.71v7.23c-0.24-0.14-0.57-0.31-0.98-0.49c-0.22-0.11-0.47-0.22-0.73-0.32 c-0.38-0.17-0.79-0.33-1.25-0.49c-0.1-0.04-0.2-0.07-0.31-0.1c-0.18-0.07-0.37-0.13-0.56-0.19c-0.59-0.18-1.24-0.35-1.92-0.5 c-0.26-0.05-0.53-0.1-0.8-0.14c-0.87-0.15-1.8-0.24-2.77-0.25c-0.08-0.01-0.17-0.01-0.25-0.01l-2.57,0.02l-3.5,0.02h-0.01 l-7.49,0.06c-2.38,0-3.84,0.57-4.72,0.8c0,0-0.01,0-0.01,0.01c-0.93,0.24-1.22,0.09-1.3-1.54c-0.02-0.45-0.03-1.03-0.03-1.74 l-0.56-0.43l-0.98-0.74l-0.6-0.46l-0.12-0.09L8.88,24.1l-0.25-0.19l-0.52-0.4l-0.96-0.72L6,21.91v-3.4 c0.1-0.08,0.19-0.15,0.29-0.21c1.45-1,3-1.85,4.64-2.54c1.46-0.62,3-1.11,4.58-1.46c0.43-0.09,0.87-0.18,1.32-0.24 c1.33-0.23,2.7-0.34,4.09-0.34c6.01,0,11.53,2.09,15.91,5.55c0.66,0.52,1.3,1.07,1.9,1.66c0.82,0.78,1.59,1.61,2.3,2.49 c0.14,0.18,0.28,0.36,0.42,0.55C41.64,24.21,41.82,24.46,42,24.71z">
                </path>
                <path fill="#d81b60"
                    d="M42,28.72V32c0,0.65-0.06,1.29-0.18,1.91c-0.18,0.92-0.49,1.8-0.91,2.62c-0.22,0.05-0.47,0.05-0.75,0.01 c-0.63-0.11-1.37-0.44-2.17-0.87c-0.04-0.01-0.08-0.03-0.11-0.05c-0.25-0.13-0.51-0.27-0.77-0.43c-0.53-0.29-1.09-0.61-1.65-0.91 c-0.12-0.06-0.24-0.12-0.35-0.18c-0.64-0.33-1.3-0.63-1.96-0.86c0,0,0,0-0.01,0c-0.14-0.05-0.29-0.1-0.44-0.14 c-0.57-0.16-1.15-0.26-1.71-0.26l-1.1-0.32l-4.87-1.41c0,0,0,0-0.01,0l-2.99-0.87h-0.01l-1.3-0.38c-3.76,0-6.07,1.6-7.19,0.99 c-0.44-0.23-0.7-0.81-0.79-1.95c-0.03-0.32-0.04-0.68-0.04-1.1l-1.17-0.57l-0.05-0.02h-0.01l-0.84-0.42L9.7,26.35l-0.07-0.03 l-0.17-0.09L7.5,25.28L6,24.55v-3.43c0.17-0.15,0.35-0.29,0.53-0.43c0.19-0.15,0.38-0.29,0.57-0.44c0.01,0,0.01,0,0.01,0 c1.18-0.85,2.43-1.6,3.76-2.22c1.55-0.74,3.2-1.31,4.91-1.68c0.25-0.06,0.51-0.12,0.77-0.16c1.42-0.27,2.88-0.41,4.37-0.41 c5.27,0,10.11,1.71,14.01,4.59c1.13,0.84,2.18,1.77,3.14,2.78c0.79,0.83,1.52,1.73,2.18,2.67c0.05,0.07,0.1,0.14,0.15,0.2 c0.37,0.54,0.71,1.09,1.03,1.66C41.64,28.02,41.82,28.37,42,28.72z">
                </path>
                <path fill="#f50057"
                    d="M41.82,33.91c-0.18,0.92-0.49,1.8-0.91,2.62c-0.19,0.37-0.4,0.72-0.63,1.06c-0.14,0.21-0.29,0.41-0.44,0.6 c-0.36-0.14-0.89-0.34-1.54-0.56c0,0,0,0,0-0.01c-0.49-0.17-1.05-0.35-1.65-0.52c-0.17-0.05-0.34-0.1-0.52-0.15 c-0.71-0.19-1.45-0.36-2.17-0.46c-0.6-0.1-1.19-0.16-1.74-0.16l-0.46-0.13h-0.01l-2.42-0.7l-1.49-0.43l-1.66-0.48h-0.01l-0.54-0.15 l-6.53-1.88l-1.88-0.54l-1.4-0.33l-2.28-0.54l-0.28-0.07c0,0,0,0-0.01,0l-2.29-0.53c0-0.01,0-0.01,0-0.01l-0.41-0.09l-0.21-0.05 l-1.67-0.39l-0.19-0.05l-1.42-1.17L6,27.9v-4.08c0.37-0.36,0.75-0.7,1.15-1.03c0.12-0.11,0.25-0.21,0.38-0.31 c0.12-0.1,0.25-0.2,0.38-0.3c0.91-0.69,1.87-1.31,2.89-1.84c1.3-0.7,2.68-1.26,4.13-1.66c0.28-0.09,0.56-0.17,0.85-0.23 c1.64-0.41,3.36-0.62,5.14-0.62c4.47,0,8.63,1.35,12.07,3.66c1.71,1.15,3.25,2.53,4.55,4.1c0.66,0.79,1.26,1.62,1.79,2.5 c0.05,0.07,0.09,0.13,0.13,0.2c0.32,0.53,0.62,1.08,0.89,1.64c0.25,0.5,0.47,1,0.67,1.52C41.34,32.25,41.6,33.07,41.82,33.91z">
                </path>
                <path fill="#ff1744"
                    d="M40.28,37.59c-0.14,0.21-0.29,0.41-0.44,0.6c-0.44,0.55-0.92,1.05-1.46,1.49c-0.47,0.39-0.97,0.74-1.5,1.04 c-0.2-0.05-0.4-0.11-0.61-0.19c-0.66-0.23-1.35-0.61-1.99-1.01c-0.96-0.61-1.79-1.27-2.16-1.57c-0.14-0.12-0.21-0.18-0.21-0.18 l-1.7-0.15L30,37.6l-2.2-0.19l-2.28-0.2l-3.37-0.3l-5.34-0.47l-0.02-0.01l-1.88-0.91l-1.9-0.92l-1.53-0.74l-0.33-0.16l-0.41-0.2 l-1.42-0.69L7.43,31.9l-0.59-0.29L6,31.35v-4.47c0.47-0.56,0.97-1.09,1.5-1.6c0.34-0.32,0.7-0.64,1.07-0.94 c0.06-0.05,0.12-0.1,0.18-0.14c0.04-0.05,0.09-0.08,0.13-0.1c0.59-0.48,1.21-0.91,1.85-1.3c0.74-0.47,1.52-0.89,2.33-1.24 c0.87-0.39,1.78-0.72,2.72-0.97c1.63-0.46,3.36-0.7,5.14-0.7c4.08,0,7.85,1.24,10.96,3.37c1.99,1.36,3.71,3.08,5.07,5.07 c0.45,0.64,0.85,1.32,1.22,2.02c0.13,0.26,0.26,0.52,0.37,0.78c0.12,0.25,0.23,0.5,0.34,0.75c0.21,0.52,0.4,1.04,0.57,1.58 c0.32,1,0.56,2.02,0.71,3.08C40.21,36.89,40.25,37.24,40.28,37.59z">
                </path>
                <path fill="#ff5722"
                    d="M38.39,39.42c0,0.08,0,0.17-0.01,0.26c-0.47,0.39-0.97,0.74-1.5,1.04c-0.22,0.12-0.44,0.24-0.67,0.34 c-0.23,0.11-0.46,0.21-0.7,0.3c-0.34-0.18-0.8-0.4-1.29-0.61c-0.69-0.31-1.44-0.59-2.02-0.68c-0.14-0.03-0.27-0.04-0.39-0.04 l-1.64-0.21h-0.02l-2.04-0.27l-2.06-0.27l-0.96-0.12l-7.56-0.98c-0.49,0-1.01-0.03-1.55-0.1c-0.66-0.06-1.35-0.16-2.04-0.3 c-0.68-0.12-1.37-0.28-2.03-0.45c-0.69-0.16-1.37-0.35-2-0.53c-0.73-0.22-1.41-0.43-1.98-0.62c-0.47-0.15-0.87-0.29-1.18-0.4 c-0.18-0.43-0.33-0.88-0.44-1.34C6.1,33.66,6,32.84,6,32v-1.67c0.32-0.53,0.67-1.05,1.06-1.54c0.71-0.94,1.52-1.8,2.4-2.56 c0.03-0.04,0.07-0.07,0.1-0.09l0.01-0.01c0.31-0.28,0.63-0.53,0.97-0.77c0.04-0.04,0.08-0.07,0.12-0.1 c0.16-0.12,0.33-0.24,0.51-0.35c1.43-0.97,3.01-1.73,4.7-2.24c1.6-0.48,3.29-0.73,5.05-0.73c3.49,0,6.75,1.03,9.47,2.79 c2.01,1.29,3.74,2.99,5.06,4.98c0.16,0.23,0.31,0.46,0.46,0.7c0.69,1.17,1.26,2.43,1.68,3.75c0.05,0.15,0.09,0.3,0.13,0.46 c0.08,0.27,0.15,0.55,0.21,0.83c0.02,0.07,0.04,0.14,0.06,0.22c0.14,0.63,0.24,1.29,0.31,1.95c0,0.01,0,0.01,0,0.01 C38.36,38.22,38.39,38.82,38.39,39.42z">
                </path>
                <path fill="#ff6f00"
                    d="M36.33,39.42c0,0.35-0.02,0.73-0.06,1.11c-0.02,0.18-0.04,0.36-0.06,0.53c-0.23,0.11-0.46,0.21-0.7,0.3 c-0.45,0.17-0.91,0.31-1.38,0.41c-0.32,0.07-0.65,0.13-0.98,0.16h-0.01c-0.31-0.19-0.67-0.42-1.04-0.68 c-0.67-0.47-1.37-1-1.93-1.43c-0.01-0.01-0.01-0.01-0.02-0.02c-0.59-0.45-1.01-0.79-1.01-0.79l-1.06,0.04l-2.04,0.07l-0.95,0.04 l-3.82,0.14l-3.23,0.12c-0.21,0.01-0.46,0.01-0.77,0h-0.01c-0.42-0.01-0.92-0.04-1.47-0.09c-0.64-0.05-1.34-0.11-2.05-0.18 c-0.69-0.08-1.39-0.16-2.06-0.24c-0.74-0.08-1.44-0.17-2.04-0.25c-0.47-0.06-0.88-0.11-1.21-0.15c-0.28-0.32-0.53-0.65-0.77-1.01 c-0.36-0.54-0.67-1.11-0.91-1.72c-0.18-0.43-0.33-0.88-0.44-1.34c0.29-0.89,0.67-1.73,1.12-2.54c0.36-0.66,0.78-1.29,1.24-1.89 c0.45-0.59,0.94-1.14,1.47-1.64v-0.01c0.15-0.15,0.3-0.29,0.45-0.42c0.28-0.26,0.57-0.5,0.87-0.73h0.01 c0.01-0.02,0.02-0.02,0.03-0.03c0.24-0.19,0.49-0.36,0.74-0.53c1.48-1.01,3.15-1.76,4.95-2.2c1.19-0.29,2.44-0.45,3.73-0.45 c2.54,0,4.94,0.61,7.05,1.71h0.01c1.81,0.93,3.41,2.21,4.7,3.75c0.71,0.82,1.32,1.72,1.82,2.67c0.35,0.64,0.65,1.31,0.9,1.99 c0.02,0.06,0.04,0.11,0.06,0.16c0.17,0.5,0.32,1.02,0.45,1.54c0.09,0.37,0.16,0.75,0.22,1.13c0.02,0.12,0.04,0.23,0.05,0.35 C36.28,37.99,36.33,38.7,36.33,39.42z">
                </path>
                <path fill="#ff9800"
                    d="M34.28,39.42v0.1c0,0.34-0.03,0.77-0.06,1.23c-0.03,0.34-0.06,0.69-0.09,1.02c-0.32,0.07-0.65,0.13-0.98,0.16 h-0.01C32.76,41.98,32.39,42,32,42h-1.75l-0.38-0.11l-1.97-0.6l-2-0.6l-4.63-1.39l-2-0.6c0,0-0.83,0.33-2,0.72h-0.01 c-0.45,0.15-0.94,0.31-1.46,0.47c-0.65,0.19-1.34,0.38-2.02,0.53c-0.7,0.16-1.39,0.28-2.01,0.33c-0.19,0.02-0.38,0.03-0.55,0.03 c-0.56-0.31-1.1-0.68-1.59-1.09c-0.43-0.36-0.83-0.75-1.2-1.18c-0.28-0.32-0.53-0.65-0.77-1.01c0.07-0.45,0.15-0.89,0.27-1.32 c0.3-1.19,0.77-2.33,1.39-3.37c0.34-0.59,0.72-1.16,1.16-1.69c0.01-0.03,0.04-0.06,0.07-0.08c-0.01-0.01,0-0.01,0-0.01 c0.13-0.17,0.27-0.33,0.41-0.48c0-0.01,0-0.01,0-0.01c0.41-0.44,0.83-0.86,1.29-1.25c0.16-0.13,0.31-0.26,0.48-0.39 c0.03-0.03,0.06-0.05,0.1-0.08c2.25-1.72,5.06-2.76,8.09-2.76c3.44,0,6.57,1.29,8.94,3.41c1.14,1.03,2.11,2.26,2.84,3.63 c0.06,0.1,0.12,0.21,0.17,0.32c0.09,0.18,0.18,0.37,0.26,0.57c0.33,0.72,0.59,1.48,0.77,2.26c0.02,0.08,0.04,0.16,0.06,0.24 c0.08,0.37,0.15,0.75,0.2,1.13C34.24,38.21,34.28,38.81,34.28,39.42z">
                </path>
                <path fill="#ffc107"
                    d="M32.22,39.42c0,0.2-0.01,0.42-0.02,0.65c-0.02,0.37-0.05,0.77-0.1,1.18c-0.02,0.25-0.06,0.5-0.1,0.75h-5.48 l-1.06-0.17l-4.14-0.66l-0.59-0.09l-1.35-0.22c-0.59,0-1.87,0.26-3.22,0.51c-0.71,0.13-1.43,0.27-2.08,0.36 c-0.08,0.01-0.16,0.02-0.23,0.03h-0.01c-0.7-0.15-1.38-0.38-2.02-0.68c-0.2-0.09-0.4-0.19-0.6-0.3c-0.56-0.31-1.1-0.68-1.59-1.09 c-0.01-0.12-0.02-0.22-0.02-0.27c0-0.26,0.01-0.51,0.03-0.76c0.04-0.64,0.13-1.26,0.27-1.86c0.22-0.91,0.54-1.79,0.97-2.6 c0.08-0.17,0.17-0.34,0.27-0.5c0.04-0.08,0.09-0.15,0.13-0.23c0.18-0.29,0.38-0.57,0.58-0.85c0.42-0.55,0.89-1.07,1.39-1.54 c0.01,0,0.01,0,0.01,0c0.04-0.04,0.08-0.08,0.12-0.11c0.05-0.04,0.09-0.09,0.14-0.12c0.2-0.18,0.4-0.34,0.61-0.49 c0-0.01,0.01-0.01,0.01-0.01c1.89-1.41,4.23-2.24,6.78-2.24c1.98,0,3.82,0.5,5.43,1.38h0.01c1.38,0.76,2.58,1.79,3.53,3.03 c0.37,0.48,0.7,0.99,0.98,1.53h0.01c0.05,0.1,0.1,0.2,0.15,0.3c0.3,0.59,0.54,1.21,0.72,1.85h0.01c0.01,0.05,0.03,0.1,0.04,0.15 c0.12,0.43,0.22,0.87,0.29,1.32c0.01,0.09,0.02,0.19,0.03,0.28C32.19,38.43,32.22,38.92,32.22,39.42z">
                </path>
                <path fill="#ffd54f"
                    d="M30.17,39.31c0,0.16,0,0.33-0.02,0.49v0.01c0,0.01,0,0.01,0,0.01c-0.02,0.72-0.12,1.43-0.28,2.07 c0,0.04-0.01,0.07-0.03,0.11h-4.67l-3.85-0.83l-0.51-0.11l-0.08,0.02l-4.27,0.88L16.27,42H16c-0.64,0-1.27-0.06-1.88-0.18 c-0.09-0.02-0.18-0.04-0.27-0.06h-0.01c-0.7-0.15-1.38-0.38-2.02-0.68c-0.02-0.11-0.04-0.22-0.05-0.33 c-0.07-0.43-0.1-0.88-0.1-1.33c0-0.17,0-0.34,0.01-0.51c0.03-0.54,0.11-1.07,0.23-1.58c0.08-0.38,0.19-0.75,0.32-1.1 c0.11-0.31,0.24-0.61,0.38-0.9c0.12-0.25,0.26-0.49,0.4-0.73c0.14-0.23,0.29-0.45,0.45-0.67c0.4-0.55,0.87-1.06,1.39-1.51 c0.3-0.26,0.63-0.51,0.97-0.73c1.46-0.96,3.21-1.52,5.1-1.52c0.37,0,0.73,0.02,1.08,0.07h0.02c1.07,0.12,2.07,0.42,2.99,0.87 c0.01,0,0.01,0,0.01,0c1.45,0.71,2.68,1.78,3.58,3.1c0.15,0.22,0.3,0.46,0.43,0.7c0.11,0.19,0.21,0.39,0.3,0.59 c0.14,0.31,0.27,0.64,0.38,0.97h0.01c0.11,0.37,0.21,0.74,0.28,1.13v0.01C30.11,38.16,30.17,38.73,30.17,39.31z">
                </path>
                <path fill="#ffe082"
                    d="M28.11,39.52v0.03c0,0.59-0.07,1.17-0.21,1.74c-0.05,0.24-0.12,0.48-0.21,0.71h-4.48l-2.29-0.63L18.63,42H16 c-0.64,0-1.27-0.06-1.88-0.18c-0.02-0.03-0.03-0.06-0.04-0.09c-0.14-0.43-0.25-0.86-0.3-1.31c-0.04-0.29-0.06-0.59-0.06-0.9 c0-0.12,0-0.25,0.02-0.37c0.01-0.47,0.08-0.93,0.2-1.37c0.06-0.3,0.15-0.59,0.27-0.87c0.04-0.14,0.1-0.27,0.17-0.4 c0.15-0.34,0.33-0.67,0.53-0.99c0.22-0.32,0.46-0.62,0.73-0.9c0.32-0.36,0.68-0.69,1.09-0.96c0.7-0.51,1.5-0.89,2.37-1.1 c0.58-0.16,1.19-0.24,1.82-0.24c2,0,3.79,0.8,5.09,2.09c0.05,0.05,0.11,0.11,0.16,0.18h0.01c0.14,0.15,0.27,0.3,0.4,0.47 c0.37,0.47,0.68,0.98,0.92,1.54c0.12,0.26,0.22,0.53,0.3,0.81c0.01,0.04,0.02,0.07,0.03,0.11c0.14,0.49,0.23,1,0.25,1.53 C28.1,39.2,28.11,39.36,28.11,39.52z">
                </path>
                <path fill="#ffecb3"
                    d="M26.06,39.52c0,0.41-0.05,0.8-0.16,1.17c-0.1,0.4-0.25,0.78-0.44,1.14c-0.03,0.06-0.1,0.17-0.1,0.17h-8.88 c-0.01-0.01-0.02-0.03-0.02-0.04c-0.12-0.19-0.22-0.38-0.3-0.59c-0.2-0.46-0.32-0.96-0.36-1.48c-0.02-0.12-0.02-0.25-0.02-0.37 c0-0.06,0-0.13,0.01-0.19c0.01-0.44,0.07-0.86,0.19-1.25c0.1-0.36,0.23-0.69,0.4-1.01c0,0,0.01-0.01,0.01-0.02 c0.12-0.21,0.25-0.42,0.4-0.62c0.49-0.66,1.14-1.2,1.89-1.55c0.01,0,0.01,0,0.01,0c0.24-0.12,0.49-0.22,0.75-0.29c0,0,0,0,0.01,0 c0.46-0.14,0.96-0.21,1.47-0.21c0.59,0,1.16,0.09,1.68,0.28c0.19,0.05,0.37,0.13,0.55,0.22c0,0,0,0,0.01,0 c0.86,0.41,1.59,1.05,2.09,1.85c0.1,0.15,0.19,0.31,0.27,0.48c0.04,0.07,0.08,0.15,0.11,0.22c0.23,0.52,0.37,1.09,0.41,1.69 c0.01,0.05,0.01,0.1,0.01,0.16C26.06,39.36,26.06,39.44,26.06,39.52z">
                </path>
                <g>
                    <path fill="none" stroke="#fff" stroke-linecap="round" stroke-linejoin="round"
                        stroke-miterlimit="10" stroke-width="2"
                        d="M30,11H18c-3.9,0-7,3.1-7,7v12c0,3.9,3.1,7,7,7h12c3.9,0,7-3.1,7-7V18C37,14.1,33.9,11,30,11z">
                    </path>
                    <circle cx="31" cy="16" r="1" fill="#fff"></circle>
                </g>
                <g>
                    <circle cx="24" cy="24" r="6" fill="none" stroke="#fff"
                        stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" stroke-width="2">
                    </circle>
                </g>
            </svg>
        </a>
        <h6>
            All Rights Resived
        </h6>
        </a>
    </footer>
</body>

<script>
    $(document).ready(function() {
        let table = new DataTable('#maintable', {
            responsive: true,
        });
        $('#search').keyup(function() {
            table.search($(this).val()).draw();
        });
    });
</script>
@yield('script')

</html>