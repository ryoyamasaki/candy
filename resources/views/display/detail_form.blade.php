<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <title>在庫登録画面</title>
    <link rel="stylesheet" href="/css/display.css">
</head>

<body>

    @include('layouts.nav')

    @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                       @foreach ($errors->all() as $error)
                          <li>{{ $error }}</li>
                       @endforeach
                    </ul>
                </div>
            @endif

    <div class="card card-primary">

    <h3>{{$details -> name}}の在庫登録</h3>

        <form method="POST" enctype="multipart/form-data" action="/detail_register">
            @csrf
            <div class="card-body">

            <input type="hidden" value="{{$details -> id}}" name="item_id">

                <div class="form-group">
                    <label for="expiry_date">賞味期限</label>
                    <input type="date" class="form-control" id="expiry_date" name="expiry_date">
                </div>

                <div class="form-group">
                    <label for="quantity">個数</label>
                    <input type="number" class="form-control" id="quantity" name="quantity">
                </div>

           

            </div>

            <div class="card-footer">
                <button type="submit" class="btn btn-primary">登録</button>
            </div>
        </form>
    </div>

</body>