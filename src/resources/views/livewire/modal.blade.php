<div>
    <div class="buttons">
        <div class="export-btn">
            <button class="export">エクスポート</button>
        </div>
        <div class="paginate">
            {{ $contacts->links() }}
        </div>
    </div>
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

                            @if($showModal)
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
                            @endif
                        </td>
                    </form>
                </div>
            </tr>
        @endforeach
        </table>
    </div>
</div>