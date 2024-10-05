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
@endphp

<script>
    $(document).ready(function() {
        setupContents();
    });

    /**
     * セットアップメソッド
     */
    function setupContents() {
        initializeHalfCharInputElements();
    }

    /**
     * 半角英数字専用入力欄メソッド
     */
    function initializeHalfCharInputElements() {

        const $halfCharInputElements = $('input.link_path');
        $halfCharInputElements.each(function() {
            const $halfCharInputElement = $(this);

            // 半角英数字用にIMEのinputmodeを設定
            $halfCharInputElement.prop('inputmode', 'latin'); // ここでinputmodeをセット
            $halfCharInputElement.attr('autocomplete', 'off'); // 自動補完をオフにする
            $halfCharInputElement.css('ime-mode', 'disabled'); // IME制御（古いブラウザ向け）


            // 全角文字を制限する
            $halfCharInputElement.on('input', function() {
                // 半角英数字の範囲に収まらない全角文字を削除
                const sanitizedValue = $halfCharInputElement.val().replace(/[^\x00-\x7F]/g, '');
                $halfCharInputElement.val(sanitizedValue);
            });
        });
    }
</script>
