<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>商品一覧画面（管理）</title>
    <link rel="stylesheet" href="/css/index.css">
  </head>
  <body>


@extends('adminlte::page')

@section('title', '商品一覧（管理）')

@section('content_header')
    <h1 class="modan">商品一覧（管理）</h1>
@stop

@section('content')

    <div class="center"><a href="/display" class="btn btn-info">表示画面</a></div>

    <div class="search">
        <form action="{{ route('posts.search') }}" method="post" class="search-form-002">
            @csrf
            <input type="text" name="search"  placeholder="検索">
            <button type="submit" value="検索" >
        </form>
    </div>

    @isset($search_result)
    <h5>{{ $search_result }}</h5>
    @endisset

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="">商品一覧</h3>
                    <div class="card-tools">
                        <div class="input-group input-group-sm">
                            <div class="input-group-append">
                                <a href="{{ url('items/add') }}" class="btn btn-warning">商品登録</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover text-nowrap">
                        <thead>
                            <tr>
                                <!-- <th>ID</th> -->
                                <th>会社名</th>
                                <th>商品名</th>
                                <th>画像</th>
                                <th>編集</th>
                                <th>削除</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($items as $item)
                                <tr>
                                    <!-- <td>{{ $item->id }}</td> -->
                                    <td>{{ $item->company_name }}</td>
                                    <td>{{ $item->name }}</td>
                                  
                                    <td><img src="{{ asset($item->image)}}" class="index_image"></td>
                                    <td><a class="btn btn-success edit" href="/edit/{{$item->id}}" >編集</a></td>
                                    <td><a class="btn btn-danger" href="/delete/{{$item->id}}" >削除</a></td>
                                </tr>
                                
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@stop

@section('css')
@stop

@section('js')
@stop


</body>
</html>