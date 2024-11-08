<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>FashionablyLate</title>
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}">
    <link rel="stylesheet" href="{{ asset('css/confirm.css') }}">
</head>

<body>
    <header class="header">
        <div class="header__inner">
            <h1>FashionablyLate</h1>
        </div>
    </header>

    <main>
        <div class="confirm__content">

            <!--content内のheader-->
            <div class="confirm__heading">
                <h2>Confirm</h2>
            </div>

            <!--formの記述-->
            <form class="form" action="/thanks" method="post">
                @csrf

                <!--テーブルの記述-->
                <div class="confirm-table">
                    <table class="confirm-table__inner">

                        <!--名前-->
                        <tr class="confirm-table__row">
                            <th class="confirm-table__header">お名前</th>
                            <td class="confirm-table__text-name">
                                <input type="text" name="first_name" value="{{ $contact['first_name'] }}" readonly>
                                <input type="text" name="last_name" value="{{ $contact['last_name'] }}" readonly>
                            </td>
                        </tr>

                        <!--性別-->
                        <tr class="confirm-table__row">
                            <th class="confirm-table__header">性別</th>
                            <td class="confirm-table__text">
                                <input type="hidden" name="gender" value="{{ $contact['gender'] }}" readonly>
                                <?php
                                if ($contact['gender'] == '1') {
                                    echo '男性';
                                }elseif ($contact['gender'] == '2') {
                                    echo '女性';
                                } else {
                                    echo 'その他';
                                }
                                ?>
                            </td>
                        </tr>

                        <!--メールアドレス-->
                        <tr class="confirm-table__row">
                            <th class="confirm-table__header">メールアドレス</th>
                            <td class="confirm-table__text">
                                <input type="email" name="email" value="{{ $contact['email'] }}" readonly>
                            </td>
                        </tr>

                        <!--電話番号-->
                        <tr class="confirm-table__row">
                            <th class="confirm-table__header">電話番号</th>
                            <td class="confirm-table__text">
                                <input type="tell" name="tell" value="{{ $contact['tell'] }}" readonly>
                            </td>
                        </tr>

                        <!--住所-->
                        <tr class="confirm-table__row">
                            <th class="confirm-table__header">住所</th>
                            <td class="confirm-table__text">
                                <input type="text" name="address" value="{{ $contact['address'] }}" readonly>
                            </td>
                        </tr>

                        <!--建物名-->
                        <tr class="confirm-table__row">
                            <th class="confirm-table__header">建物名</th>
                            <td class="confirm-table__text">
                                <input type="text" name="building" value="{{ $contact['building'] }}" readonly>
                            </td>
                        </tr>

                        <!--問い合わせの種類-->
                        <tr class="confirm-table__row">
                            <th class="confirm-table__header">お問い合わせの種類</th>
                            <td class="confirm-table__text">
                                <input type="hidden" name="category_id" value="{{ $contact['category_id'] }}">
                                <input type="text" name="content"
                                @foreach ($categories as $category)
                                    @if ($contact['category_id'] == $category['id'])
                                        value="{{$category['content']}}"
                                    @endif
                                @endforeach readonly>
                            </td>
                        </tr>

                        <!--問い合わせ内容-->
                        <tr class="confirm-table__row">
                            <th class="confirm-table__header">お問い合わせ内容</th>
                            <td class="confirm-table__text">
                                <input type="text" name="detail" value="{{ $contact['detail'] }}" readonly>
                            </td>
                        </tr>
                    </table>
                </div>
                <div class="form__button">
                    <button class="form__button-submit" type="submit">送信</button>
                    <a class="form-fixed" href="/">修正</a>
                </div>
            </form>
        </div>
    </main>

</body>
</html>