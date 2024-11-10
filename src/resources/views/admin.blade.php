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
                    <select class="search-form__iem-select--gen" name="gender">
                        <option value="">性別</option>
                        @foreach ($contacts as $contact)
                        <option value="{{ $contact['gender'] }}">
                        <?php
                            if ($contact['gender'] == '1') {
                                echo '男性';
                            }elseif ($contact['gender'] == '2') {
                                echo '女性';
                            }else {
                                echo 'その他';
                            }
                        ?>
                        </option>
                        @endforeach
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
            <!--エクスポートの記述まだ-->
            <div class="export__button">
                <button class="export__button-submit">エクスポート</button>
            </div>
            <!--ページネーションの記述まだ-->
            <div class="paginate">
            </div>
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
                </div>
            </tr>
        @foreach ($contacts as $contact)
            <tr class="admin-table__row">
                <div class="admin-table__item">
                    <form class="detail-form">
                        <div class="detail-form__item">
                            <td class="detail-form__item-name">
                                <p class="detail-form__item--name">{{ $contact['first_name'] }}</p>
                                <p class="detail-form__item--name">{{ $contact['last_name'] }}</p>
                            </td>
                            <td class="detail-form__item-name">
                                <p class="detail-form__item--gender">
                                    @if ($contact->gender == 1)
                                    男性
                                    @elseif ($contact->gender == 2)
                                    女性
                                    @else
                                    その他
                                    @endif
                                </p>
                            </td>
                            <td class="detail-form__item-name">
                                <p class="detail-form__item--email">{{ $contact['email'] }}</p>
                            </td>
                            <td class="detail-form__item-name">
                                <p class="detail-form__item--cat">{{ $contact['category']['content']}}</p>
                            </td>
                        </div>
                        <td class="detail-form__button">
                            <button wire:click="openModal()" type="button" class="detail-form__button-submit">
                                詳細
                            </button>

                            
                            <div class="modal">
                                <div class="modal-content">
                                    <button wire:click="closeModal()" class="modal-close" type="button">×</button>
                                    <table class="modal-table">
                                        <tr class="modal-inner">
                                            <th class="modal-table__title">お名前</th>
                                            <td class="modal-table__data">{{ $contact['first_name'] }}<span> </span>{{ $contact['last_name' ]}}</td>
                                        </tr>
                                        <tr class="modal-inner">
                                            <th class="modal-table__title">性別</th>
                                            <td class="modal-table__data">
                                            <input type="hidden" value="{{ $contact['gender'] }}">
                                                @if ($contact->gender == 1)
                                                男性
                                                @elseif ($contact->gender == 2)
                                                女性
                                                @else
                                                その他
                                                @endif
                                            </td>
                                        </tr>
                                        <tr class="modal-inner">
                                            <th class="modal-table__title">メールアドレス</th>
                                            <td class="modal-table__data">{{ $contact['email'] }}</td>
                                        </tr>
                                        <tr class="modal-inner">
                                            <th class="modal-table__title">電話番号</th>
                                            <td class="modal-table__data">{{ $contact['tell'] }}</td>
                                        </tr>
                                        <tr class="modal-inner">
                                            <th class="modal-table__title">住所</th>
                                            <td class="modal-table__data">{{ $contact['address'] }}</td>
                                        </tr>
                                        <tr class="modal-inner">
                                            <th class="modal-table__title">建物名</th>
                                            <td class="modal-table__data">{{ $contact['building'] }}</td>
                                        </tr>
                                        <tr class="modal-inner">
                                            <th class="modal-table__title">お問い合わせの種類</th>
                                            <td class="modal-table__data">{{ $contact['category']['content'] }}</td>
                                        </tr>
                                        <tr class="modal-inner">
                                            <th class="modal-table__title">お問い合わせの内容</th>
                                            <td class="modal-table__data">{{ $contact['detail'] }}</td>
                                        </tr>
                                    </table>
                                    <form class="delete-form" action="/delete" method="post">
                                    @method('DELETE')
                                    @csrf
                                        <input type="hidden" name="" value="{{ $contact['id'] }}">
                                        <button class="delete-button">削除</button>
                                    </form>
                                </div>
                            </div>
                            
                        </td>
                    </form>
                </div>
            </tr>
        @endforeach
        </table>
    </div>
    </main>
    @endif
    @livewireScripts
</body>

</html>

