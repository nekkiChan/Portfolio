@php
    /**
     * アップロードパス
     */
    $uploadsDirPath = Storage::disk('uploads')->path('');
    /**
     * 画像パス
     */
    $imagePaths = [
        'gray' => [
            'triangle' => asset('storage/assets/img/gray/triangle.svg'),
            'bar' => asset('storage/assets/img/gray/bar.svg'),
        ],
    ];
    /**
     * データ
     */
    $content_bodies_data = session('content_bodies_data');
    $contents_subcategories_data = session('contents_subcategories_data');
    $content_bodies_sumdata = session('content_bodies_sumdata');
@endphp

<script>
    $(document).ready(function() {
        setupContents();
    });

    /**
     * セットアップメソッド
     */
    function setupContents() {
        initializeReadonlyInputElements();
        initializeSubCategoriesInputElements();
        initializeBodiesInputElements();
    }

    /**
     * 読み取り専用入力欄メソッド
     */
    function initializeReadonlyInputElements() {
        const $sortInputElements = $('input.sort');
        $sortInputElements.prop({
            'readonly': true,
        });
    }

    /**
     * サブカテゴリ設定メソッド
     */
    function initializeSubCategoriesInputElements() {

        /**
         * データ
         */
        const contents_subcategories_data = @json($contents_subcategories_data);

        const $categorySelectElement = $('select.content_category_id');
        const $subcategorySelectElement = $('select.content_subcategory_id');

        changeSubcategorySelectElement();

        $categorySelectElement.on('change', function() {
            changeSubcategorySelectElement();
        });

        function changeSubcategorySelectElement() {

            const categoryId = $categorySelectElement.val();
            const subcategoryId = $subcategorySelectElement.val();

            const $emptyOption = $subcategorySelectElement.find('option.empty');

            if (categoryId == false) {
                // subcategorySelectElementの値をoption.emptyにする
                $subcategorySelectElement.val($emptyOption.val());
            }

            // 既存のオプション（.empty 以外）を全て削除
            $subcategorySelectElement.children('option:not(.empty)').remove();
            $subcategorySelectElement.val('');

            // 新しいオプションを追加する
            $.each(contents_subcategories_data, function(key, object) {
                if (object.content_category_id == categoryId) {
                    // 該当するオプションを生成して追加
                    const $newOption = $('<option></option>')
                        .val(object.id)
                        .text(object.view);

                    if ($subcategorySelectElement.val() == false) {
                        if (subcategoryId == false) {
                            $newOption.prop({
                                selected: true,
                            });
                        } else {
                            if (object.id == subcategoryId) {
                                $newOption.prop({
                                    selected: true,
                                });
                            }
                        }
                    }

                    $subcategorySelectElement.append($newOption);
                }
            });
        }
    }

    /**
     * ボディ設定メソッド
     */
    function initializeBodiesInputElements() {

        /**
         * データ
         */
        const content_bodies_sumdata = @json($content_bodies_sumdata);
        const content_bodies_data = @json($content_bodies_data);
        let contentBodySort = null;

        // contentBodySort の取得
        $.each(content_bodies_data, function(key, object) {
            contentBodySort = object.sort;
        });

        const $categorySelectElement = $('select.content_category_id');
        const $subcategorySelectElement = $('select.content_subcategory_id');
        const $bodySelectElement = $('select.sort');

        // 初期状態でのボディオプション設定
        changeBodySelectElement();

        // カテゴリとサブカテゴリが変更された際のイベントリスナー
        $categorySelectElement.on('change', function() {
            changeBodySelectElement();
        });

        $subcategorySelectElement.on('change', function() {
            changeBodySelectElement();
        });

        function changeBodySelectElement() {

            const subcategoryId = $subcategorySelectElement.val();

            const $emptyOption = $bodySelectElement.find('option.empty');

            if ($bodySelectElement.val() == false) {
                // bodySelectElementの値をoption.emptyに設定
                $bodySelectElement.val($emptyOption.val());
            }

            // 既存のオプション（.empty以外）をすべて削除
            $bodySelectElement.children('option:not(.empty)').remove();

            // 最初のオプションを作成
            const $firstOption = $('<option></option>')
                .addClass('first')
                .val('0')
                .text('最初');
            $bodySelectElement.append($firstOption);

            // 適切なボディオプションを生成して再追加
            $.each(content_bodies_sumdata, function(key, object) {
                if (object.content_subcategory_id == subcategoryId) {

                    if (contentBodySort == object.sort) {
                        return;
                    }
                    console.log(contentBodySort);
                    console.log(object.sort);

                    // contentBodySort が一致しない場合、新しいオプションを作成
                    const $newOption = $('<option></option>')
                        .val(object.sort)
                        .text(object.title); // object.name はオプションの表示名

                    if (contentBodySort > object.sort) {
                        $bodySelectElement.children('option').prop({
                            selected: false,
                        });
                        $newOption.prop({
                            selected: true,
                        });
                    }
                    // 新しいオプションを追加
                    $bodySelectElement.append($newOption);
                    console.log($bodySelectElement.val());
                }
            });

        }
    }
</script>
