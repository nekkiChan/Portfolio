<script>
    $(document).ready(function() {
        setupContents();
    });

    /**
     * セットアップメソッド
     */
    function setupContents() {
        initializeIconElements();
    }

    function initializeIconElements() {
        const $iconElements = $('.icon_field');

        $iconElements.each(function() {
            const $iconElement = $(this);

            // クリックイベントを追加
            $iconElement.on('click', function(event) {
                event.stopPropagation(); // 親要素へのイベント伝播を防止
            });
        });
    }
</script>
