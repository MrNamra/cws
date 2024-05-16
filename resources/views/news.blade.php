@extends('layouts.app')
@section('main')
    <div class="content text-center flex-grow-1">
        <center>
            <table class="mt-3" id="maintable">
                <thead>
                    <th>
                    <h1 class="text-center">News Area</h1>
                </th>
            </thead>
            <tbody>
                @foreach ($newses as $news)
                    <tr>
                        <td>
                            <a href="{{route('newsid', $news->id)}}" class="card col-12 main-card-body">
                                <div class="card-body">
                                    <h3 class="card-title">{{ $news->title }}</h3>
                                    <h5 class="card-text">{{ $news->short_dec }}</h5>
                                </div>
                                <small class="text-end">Post: {{ $news->created_at->format('d-m-Y') }} </small>
                            </a>
                        </td>
                    </tr>
                    @endforeach
            <tbody>
        </table>
    </div>
@endsection
@section('script')
<script>
$(document).ready(function(){
    let table = new DataTable('#newsTable',{
                 responsive: true,
                pageLength : 5,
            });
    $('#search').keyup(function(){
        table.search($(this).val()).draw() ;
    });
});
</script>
@endsection