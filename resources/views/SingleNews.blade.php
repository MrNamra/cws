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
            <div class="card-text">{!! html_entity_decode($news->dec) !!}</div>
        </div>
        <div class="card-footer text-end text-muted">
          {{$news->created_at->format('d-M-Y')}}
        </div>
      </div>
</div>
@endsection
@section('script')
<style>
    
.card {
  background: transparent;
  backdrop-filter: blur(3px);
  background-color: #ffffff29;
}
</style>
<link rel="stylesheet" href="{{asset('plugins/codemirror/codemirror.css')}}">
  <link rel="stylesheet" href="{{asset('plugins/codemirror/theme/monokai.css')}}">
<script src="{{asset('plugins/codemirror/codemirror.js')}}"></script>
<script src="{{asset('plugins/codemirror/mode/css/css.js')}}"></script>
<script src="{{asset('plugins/codemirror/mode/xml/xml.js')}}"></script>
<script src="{{asset('plugins/codemirror/mode/htmlmixed/htmlmixed.js')}}"></script>
<script>    
    CodeMirror.fromTextArea(document.getElementsByClassName("card-body"), {
        mode: "htmlmixed",
        theme: "monokai",
    });
    function copyToClipboard() {
    const codeElement = document.getElementById('code');
    const range = document.createRange();
    range.selectNode(codeElement);
    window.getSelection().removeAllRanges();
    window.getSelection().addRange(range);

    try {
        const successful = document.execCommand('copy');
        const msg = successful ? 'successful' : 'unsuccessful';
        console.log('Copy command was ' + msg);
    } catch (err) {
        console.log('Oops, unable to copy');
    }

    window.getSelection().removeAllRanges();
}
</script>
<style>
    .card{
        margin: 5%;
    }
    .card-body{
        text-align: justify;
    }

        .code-snippet {
            background-color: #282c34;
            color: #abb2bf;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            max-width: 600px;
            width: 100%;
            position: relative;
            overflow-x: auto;
        }

        pre {
            margin: 0;
        }

        code {
            font-family: 'Courier New', Courier, monospace;
            font-size: 14px;
            display: block;
        }

        .copy-btn {
            position: absolute;
            top: 10px;
            right: 10px;
            background: #61dafb;
            border: none;
            padding: 5px 10px;
            cursor: pointer;
            border-radius: 3px;
            color: #282c34;
        }

        .copy-btn:hover {
            background: #21a1f1;
        }
</style>
@endsection