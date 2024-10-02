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
    $contents_subcategories_data = session('contents_subcategories_data');
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
        console.log(contents_subcategories_data);

        const $categorySelectElement = $('select.content_category_id');
        const $subcategorySelectElement = $('select.content_subcategory_id');

    }
</script>
