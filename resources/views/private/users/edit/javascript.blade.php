<script>
    $(document).ready(function() {
        setupContents();
    });

    /**
     * セットアップメソッド
     */
    function setupContents() {
        initializeSortInputElements();
    }

    /**
     * 表示順入力欄メソッド
     */
    function initializeSortInputElements() {
        const $sortInputElements = $('input.sort');
        $sortInputElements.prop({
            'readonly': true,
        });
    }
</script>
