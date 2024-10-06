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
        const $halfCharInputElements = $('input.name');
        $halfCharInputElements.each(function() {
            const $halfCharInputElement = $(this);

            // 半角英数字用にIMEのinputmodeを設定
            $halfCharInputElement.prop('inputmode', 'latin'); // ここでinputmodeをセット
            $halfCharInputElement.attr('autocomplete', 'off'); // 自動補完をオフにする（必要に応じて）
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
