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

    <div class="search">
        <form action="{{ route('display.search') }}" method="post" class="search-form-002">
            @csrf
            <input type="text" name="search" class="form-control search" placeholder="検索">
            <button type="submit" value="検索" >
        </form>
    </div>

    @isset($search_result)
    <h5 class="search_result">{{ $search_result }}</h5>
    @endisset


    <div class="card__list">
        @foreach ($items as $item)
        <div class="card__item">
            <a href="/detail/{{$item->id}}"><img src="{{ asset($item->image) }}" class="index_image">
            <div class="card-body">
                <p class="card-text">{{ $item->company_name }}</p>
                <h5 class="card-title">{{ $item->name }}</h5>
            </div>
            </a>
        </div>
        @endforeach
    </div>

    @section('css')
    @stop

    @section('js')


    @stop
</body>

</html>