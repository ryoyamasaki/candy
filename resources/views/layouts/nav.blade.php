<nav class="navbar navbar-expand-sm navbar-dark bg-dark mb-3">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav4" aria-controls="navbarNav4" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <a class="navbar-brand" href="{{ url('/display') }}">在庫画面</a>
        <div class="collapse navbar-collapse justify-content-end">
            <ul class="navbar-nav">
            <!--ホーム画面に遷移-->
                <li class="nav-item active">
                    <a class="nav-link" href=" {{ url('/items') }}">管理画面</a>
                </li>
            </ul>
        </div>
    </nav>