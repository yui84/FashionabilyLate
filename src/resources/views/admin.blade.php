<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>FashionablyLate</title>
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}">
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
</head>

<body>
    <header class="header">
        <div class="header__inner">
            <div class="header-utilities">
                <h1>FashionablyLate</h1>
                <nav>
                    <ul class="header-nav">
                        <li class="header-nav__item">
                            <a class="header-nav__link">logout</a>
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
            <form class="search-form" action="/confirm/search" method="get">
                @csrf
                <div class="search-form__item">
                    <input class="search-form__item-input--text" type="text" name="keyword" placeholder="名前やメールアドレスを入力してください" value="{{ old('keyword') }}">
                    <select class="search-form__iem-select--gen" name="gender">
                        <option value="">性別</option>
                    </select>
                    <select class="search-form__iem-select--cat" name="" id="">
                        <option value="">お問い合わせの種類</option>
                    </select>
                    <select class="search-form__iem-select--date" name="" id="">
                        <option value="">年/月/日</option>
                    </select>
                </div>
                <div class="search-form__button">
                    <button class="search-form__button-submit" type="submit">検索</button>
                </div>
                <div class="reset-form__button">
                    <button class="reset-form__button-submit" type="reset">リセット</button>
                </div>
            </form>
            <!--エクスポートの記述まだ-->
            <!--ページネーションの記述まだ-->

            <!--送られてきた値を表示するテーブル-->
            <div class="admin-table">
                <table class="admin-table__inner">
                    <tr class="admin-table__row">
                        <div class="admin-table__header">
                            <th class="admin-table__header-name">
                                <span class="admin-table__header-span">お名前</span>
                            </th>
                            <th class="admin-table__header-name">
                                <span class="admin-table__header-span">性別</span>
                            </th>
                            <th class="admin-table__header-name">
                                <span class="admin-table__header-span">メールアドレス</span>
                            </th>
                            <th class="admin-table__header-name">
                                <span class="admin-table__header-span">お問い合わせの種類</span>
                            </th>
                            <th class="admin-table__header-name">
                                <span class="admin-table__header-span"></span>
                            </th>
                        </div>
                    </tr>
                    <tr class="admin-table__row">
                        <div class="admin-table__item">
                            <form class="detail-form">
                                <div class="detail-form__item">
                                    <td class="detail-form__item-name">
                                        <input class="detail-form__item-input" type="text" name="first_name" value="test">
                                        <input class="detail-form__item-input" type="text" name="last_name" value="test">
                                    </td>
                                    <td class="detail-form__item-name">
                                        <input class="detail-form__item-input" type="text" name="gender" value="test">
                                    </td>
                                    <td class="detail-form__item-name">
                                        <input class="detail-form__item-input" type="text" name="email" value="test">
                                    </td>
                                    <td class="detail-form__item-name">
                                        <input class="detail-form__item-input" type="text" name="category_id" value="test">
                                    </td>
                                </div>
                                <td class="detail-form__button">
                                    <button class="detail-form__button-submit" type="submit">詳細</button>
                                </td>
                            </form>
                        </div>
                    </tr>
                </table>

            </div>

        </div>
    </main>

</body>

</html>

