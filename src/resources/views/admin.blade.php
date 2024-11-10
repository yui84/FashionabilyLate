<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>FashionablyLate</title>
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}">
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
    @livewireStyles
</head>

<body>
    @if (Auth::check())
    <header class="header">
        <div class="header__inner">
            <div class="header-utilities">
                <h1>FashionablyLate</h1>
                <nav>
                    <ul class="header-nav">
                        <li class="header-nav__item">
                            <form class="logout-form" action="/logout" method="post">
                                @csrf
                                <button class="header-nav__button">logout</button>
                            </form>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </header>

    <main>
        <div class="admin__content">

            <!--content内のheader-->
            <div class="admin__heading">
                <h2>Admin</h2>
            </div>

            <!--formの記述-->
            <form class="search-form" action="/admin/search" method="get">
                @csrf
                <div class="search-form__item">
                    <input class="search-form__item-input--text" type="text" name="keyword" placeholder="名前やメールアドレスを入力してください" value="{{ old('keyword') }}">
                    <select class="search-form__iem-select--gen" name="gender" id="gender">
                        <option value="">性別</option>
                        <option value="1">男性</option>
                        <option value="2">女性</option>
                        <option value="3">その他</option>
                    </select>
                    <select class="search-form__iem-select--cat" name="category_id">
                        <option value="">お問い合わせの種類</option>
                        @foreach ($categories as $category)
                        <option value="{{ $category['id'] }}">{{ $category['content'] }}</option>
                        @endforeach
                    </select>
                    <input type="date" value="" name="created_at">
                </div>
                <div class="search-form__button">
                    <button class="search-form__button-submit" type="submit">検索</button>
                </div>
            
                <div class="reset-form__button">
                    <?php
                    if (isset($_GET['reset'])) {
                        redirect ('/admin');
                    }
                    ?>
                    <input class="reset-form__button-submit" type="submit" value="リセット" name="submit">
                </div>
            </form>
            @livewire('modal')
        </div>
    </main>
    @endif
    @livewireScripts
</body>

</html>

