<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>FashionablyLate</title>
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}">
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
</head>

<body>
    <header class="header">
        <div class="header__inner">
            <h1>FashionablyLate</h1>
        </div>
    </header>

    <main>
        <div class="contact__content">

            <!--content内のheader-->
            <div class="contact__heading">
                <h2>Contact</h2>
            </div>

            <!--formの記述-->
            <form class="form" action="/confirm" method="post">
            @csrf

                <!--form:名前-->
                <div class="form__group">
                    <div class="form__group-title">
                        <span class="form__label--item">お名前</span>
                        <span class="form__label--required">※</span>
                    </div>
                    <div class="form__group-content">
                        <div class="form__input--text-name">
                            <input type="text" name="first_name" placeholder="例:山田" value="{{ old('first_name') }}">
                            <input type="text" name="last_name" placeholder="例:太郎" value="{{ old('last_name') }}">
                        </div>
                        <div class="form__error">
                            @error('first_name')
                            {{ $message }}
                            @enderror
                            @error('last_name')
                            {{ $message }}
                            @enderror
                        </div>
                    </div>
                </div>

                <!--form:性別-->
                <div class="form__group">
                    <div class="form__group-title">
                        <span class="form__label--item">性別</span>
                        <span class="form__label--required">※</span>
                    </div>
                    <div class="form__group-content">
                        <div class="form__input--radio">
                            <input type="radio" name="gender" id="男性" value="1" checked>
                            <label for="男性" name="gender" value="男性">男性</label>
                            <input type="radio" name="gender" id="女性" value="2">
                            <label for="女性" name="gender" value="女性">女性</label>
                            <input type="radio" name="gender" id="その他" value="3">
                            <label for="その他" name="gender" value="その他">その他</label>
                        </div>
                        <div class="form__error">
                            @error('gender')
                            {{ $message }}
                            @enderror
                        </div>
                    </div>
                </div>

                <!--form:メールアドレス-->
                <div class="form__group">
                    <div class="form__group-title">
                        <span class="form__label--item">メールアドレス</span>
                        <span class="form__label--required">※</span>
                    </div>
                    <div class="form__group-content">
                        <div class="form__input--text">
                            <input type="email" name="email" placeholder="例:test@example.com" value="{{ old('email') }}">
                        </div>
                        <div class="form__error">
                            @error('email')
                            {{ $message }}
                            @enderror
                        </div>
                    </div>
                </div>

                <!--form:電話番号-->
                <div class="form__group">
                    <div class="form__group-title">
                        <span class="form__label--item">電話番号</span>
                        <span class="form__label--required">※</span>
                    </div>
                    <div class="form__group-content">
                        <div class="form__input--text-tel">
                            <input type="text" name="phone_area_code" maxlength="3" placeholder="080" value="{{ old('phone_area_code') }}">ー
                            <input type="text" name="phone_prefix" maxlength="4" placeholder="1234" value="{{ old('phone_prefix') }}">ー
                            <input type="text" name="phone_line_number" maxlength="4" placeholder="5678" value="{{ old('phone_line_number') }}">
                        </div>
                        <div class="form__error">
                            <!--後でエラー入力-->
                        </div>
                    </div>
                </div>

                <!--form:住所-->
                <div class="form__group">
                    <div class="form__group-title">
                        <span class="form__label--item">住所</span>
                        <span class="form__label--required">※</span>
                    </div>
                    <div class="form__group-content">
                        <div class="form__input--text">
                            <input type="text" name="address" placeholder="例:東京都渋谷区千駄ヶ谷1-2-3" value="{{ old('address') }}">
                        </div>
                        <div class="form__error">
                            @error('address')
                            {{ $message }}
                            @enderror
                        </div>
                    </div>
                </div>

                <!--form:建物名-->
                <div class="form__group">
                    <div class="form__group-title">
                        <span class="form__label--item">建物名</span>
                    </div>
                    <div class="form__group-content">
                        <div class="form__input--text">
                            <input type="text" name="building" placeholder="例:千駄ヶ谷マンション101" value="{{ old('building') }}">
                        </div>
                    </div>
                </div>

                <!--form:問い合わせの種類-->
                <div class="form__group">
                    <div class="form__group-title">
                        <span class="form__label--item">お問い合わせの種類</span>
                        <span class="form__label--required">※</span>
                    </div>
                    <div class="form__group-content">
                        <div class="form__select--text">
                            <select class="form__select--text-item" name="category_id">
                                <option value="">選択してください</option>
                                @foreach ($categories as $category)
                                <option value="{{ $category['id'] }}">{{ $category['content'] }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form__error">
                            @error('category_id')
                            {{ $message }}
                            @enderror
                        </div>
                    </div>
                </div>

                <!--form:問い合わせ内容-->
                <div class="form__group">
                    <div class="form__group-title">
                        <span class="form__label--item">お問い合わせ内容</span>
                        <span class="form__label--required">※</span>
                    </div>
                    <div class="form__group-content">
                        <div class="form__input--textarea">
                            <textarea name="detail" placeholder="お問い合わせ内容をご記載ください" value="{{ old('detail') }}"></textarea>
                        </div>
                        <div class="form__error">
                            @error('detail')
                            {{ $message }}
                            @enderror
                        </div>
                    </div>
                </div>

                <!--form:確認画面ボタン-->
                <div class="form__button">
                    <button class="form__button-submit" type="submit">確認画面</button>
                </div>

            </form>
        </div>
    </main>

</body>

</html>