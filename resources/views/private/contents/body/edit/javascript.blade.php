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
        const $subcategoryOptionElements = $subcategorySelectElement.children('option:not(.empty)');

        changeSubcategorySelectElement();

        $categorySelectElement.on('change', function() {
            changeSubcategorySelectElement();
        });

        function changeSubcategorySelectElement() {

            if ($subcategorySelectElement.val() == false) {
                // subcategorySelectElementの値をoption.emptyにする
                $subcategorySelectElement.val($subcategorySelectElement.find('option.empty').val());
            }
            $subcategorySelectElement.children('option:not(.empty)').addClass('hidden');

            const categoryId = $categorySelectElement.val();
            $.each(contents_subcategories_data, function(key, object) {
                if (object.content_category_id == categoryId) {
                    $subcategoryOptionElements.each(function() {
                        const $subcategoryOptionElement = $(this);
                        if ($subcategoryOptionElement.val() == object.id) {
                            $subcategoryOptionElement.removeClass('hidden');
                        }
                    });
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
        let contentBodyId = null;
        $.each(content_bodies_data, function(key, object) {
            contentBodyId = object.id;
        });

        const $categorySelectElement = $('select.content_category_id');
        const $subcategorySelectElement = $('select.content_subcategory_id');
        const $bodySelectElement = $('select.sort');
        const $bodyOptionElements = $bodySelectElement.children('option:not(.empty)');

        changeBodySelectElement();

        $categorySelectElement.on('change', function() {
            changeBodySelectElement();
        });

        $subcategorySelectElement.on('change', function() {
            changeBodySelectElement();
        });

        function changeBodySelectElement() {
            if ($bodySelectElement.val() == false) {
                // bodySelectElementの値をoption.emptyにする
                $bodySelectElement.val($bodySelectElement.find('option.empty')).val();
            }

            $bodyOptionElements.addClass('hidden');
            const subcategoryId = $subcategorySelectElement.val();

            $.each(content_bodies_sumdata, function(key, object) {
                if (object.content_subcategory_id == subcategoryId) {
                    $bodyOptionElements.each(function() {
                        if (contentBodyId != null && contentBodyId == object.id) {
                            return;
                        }
                        const $bodyOptionElement = $(this);
                        if ($bodyOptionElement.val() == object.sort) {
                            $bodyOptionElement.removeClass('hidden');
                        }
                    });
                }
            });
        }
    }
</script>
