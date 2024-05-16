@extends('layouts.app')
@section('main')
<div class="content flex-grow-1">
    <div class="card">
        <div class="card-header text-center">
            {{$news->short_dec}}
            @if (Auth::user())
            <div class="float-end">
                <a href="{{route('updatenews', $news->id)}}" class="btn btn-warning">Update This</a>
            </div>
            @endif
        </div>
        <div class="card-body">
            <h5 class="card-title">{{$news->title}}</h5>
          <p class="card-text">{!! html_entity_decode($news->dec) !!}</p>
        </div>
        <div class="card-footer text-end text-muted">
          {{$news->created_at->format('d-M-Y')}}
        </div>
      </div>
</div>
@endsection
@section('script')
<script>
</script>
<style>
    .card{
        margin: 5%;
    }
    .card-body{
        text-align: justify;
    }
</style>
@endsection