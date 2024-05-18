@extends('layouts.app')
@section('main')
    <div class="content text-center flex-grow-1">
        {{-- <h1 style="color: rgb(255, 255, 255)">Jay Shree Ram</h1> --}}
        <div>
            <div class="row">
        <div class="container text-center mt-6">
            <mark>Please Help Us To Provide Assignment Answer.<br> Click Here To Submit Assignment Answer</mark>
        </div>
        </div>
            <center>
                <br>
                <table class="tcenter" id="maintable">
                    <thead>
                        <th>Index</th>
                        <th>CollegeShort Name</th>
                        <th>CollegeFull Name</th>
                        <th>Link</th>
                        <!-- <th>3</th> -->
                    </thead>
                    <tbody>
                        @foreach ($clgs as $clg)
                        <tr onclick="window.location='{{ url($clg->short_name) }}';" style="cursor:pointer;">
                                <td>{{$i++}}</td>
                                <td>{{$clg->short_name}}</td>
                                <td>{{$clg->full_name}}</td>
                                <td><a href="{{url($clg->short_name)}}"><button class="btn btn-primary"><i class="fa fa-folder-open" aria-hidden="true"></i></button></a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </center>
        </div>
    </div>
@endsection

