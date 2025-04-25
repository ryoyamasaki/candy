<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <title>商品一覧画面</title>
    <link rel="stylesheet" href="/css/display.css">
</head>

<body>

    @include('layouts.nav')

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="detail_header">
                        <h3 class="card-title">{{$detail -> name}}の在庫一覧</h3>
                        <img class="detail_image" src="{{ asset($detail -> image)}}">
                    </div>
                    <div class="btn_register"><a href="/detail_form/{{$detail->id}}" class="btn btn-warning">在庫登録</a></div>
                </div>
                <div class="card-body table-responsive p-0">
                    <input type="hidden" value="{{$detail -> id}}">
                    <table class="table table-hover text-nowrap">
                        <thead>
                            <tr>
                                <th>賞味期限</th>
                                <th>セット数</th>
                                <th>編集</th>
                                <th>削除</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($stock as $value)
                            <tr>
                                <td>{{ $value->expiry_date }}</td>
                                <td>{{ $value->quantity }}</td>
                                <td><a href="/display/edit/{{$value->id}}" class="btn btn-success">編集</a></td>
                                <td><a class="btn btn-danger edit" href="/display/delete/{{$value->id}}">削除</a></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    @section('css')
    @stop

    @section('js')
    @stop
</body>

</html>