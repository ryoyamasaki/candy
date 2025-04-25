<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <title>削除画面</title>
    <link rel="stylesheet" href="/css/index.css">
</head>

<body>

@extends('adminlte::page')

@section('title', '商品削除')

@section('content_header')

    <h1>商品削除</h1>

    <div class="card card-primary">

    @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                       @foreach ($errors->all() as $error)
                          <li>{{ $error }}</li>
                       @endforeach
                    </ul>
                </div>
            @endif

        <form method="POST" action="/delete_form" enctype="multipart/form-data">
            @csrf
            <div class="card-body">

                <input type="hidden" name="id" value="{{$delete->id}}">

                <div class="form-group">
                    <label for="company_name">会社名</label>
                    <input type="text" class="form-control" id="company_name" name="company_name" value="{{$delete->company_name}}">
                </div>

                <div class="form-group">
                    <label for="name">名前</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{$delete->name}}">
                </div>

                <div class="form-group">
                    <label for="image">現在の画像</label>
                    <div class="image"><img src="{{ asset($delete->image)}}" class="image"></div>
                </div>
            </div>

            <div class="card-footer">
                <button type="submit" class="btn btn-danger">削除</button>
            </div>
        </form>


        <script src="{{ asset('js/image.js') }}"></script>

@stop
    

</body>

</html>