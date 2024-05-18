<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div>
    </div>
    {{-- <body class="font-sans antialiased dark:bg-black dark:text-white/50"> --}}
        <table id="myTable">
            <thead>
                <tr>
                    <td>
                        <b>College Short Name</b>
                    </td>
                    <td>
                        <b>College Full Name</b>
                    </td>
                    <td>
                        <b>Link</b>
                    </td>
                </tr>
            </thead>
            <tbody>
                
                @foreach ($clgs as $clg)
                <tr>
                    <td>
                        {{$clg->short_name}}
                    </td>
                    <td>
                        {{$clg->full_name}}
                    </td>
                    <td>
                        <a href="{{url($clg->short_name)}}">
                            <button>Go</button>
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </x-app-layout>
