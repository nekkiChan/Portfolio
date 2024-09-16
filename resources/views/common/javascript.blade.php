@php
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
        setup();
    });

    /**
     * セットアップメソッド
     */
    function setup() {
        initializeSidemenu();
        initializeTriggerButton();
    }

    /**
     * サイドメニューに関するメソッド
     */
    function initializeSidemenu() {
        /**
         * メニューが開いているかを管理する変数
         */
        let menuOpen = false;

        const imagepath = {
            on: "{{ $imagePaths['gray']['triangle'] }}",
            off: "{{ $imagePaths['gray']['bar'] }}",
        };
        const $sidemenuTriggerElement = $('#sidemenu_trigger_field');
        const $sidemenuTriggerImage = $sidemenuTriggerElement.find('img.icon');
        const $sidemenuElement = $('#sidemenu_field');

        // クリック時にメニューを開閉する
        $sidemenuTriggerElement.click(function() {
            if (menuOpen) {
                // メニューを閉じる
                $sidemenuElement.slideUp();
                $sidemenuTriggerImage.prop({
                    src: imagepath.off,
                });
                $sidemenuTriggerElement.removeClass('active');
                menuOpen = false;
            } else {
                // メニューを開く
                $sidemenuElement.slideDown();
                $sidemenuTriggerImage.prop({
                    src: imagepath.on,
                });
                $sidemenuTriggerElement.addClass('active');
                menuOpen = true;
            }
        });

        // マウスホバー時にメニューを一時的に表示する
        $sidemenuTriggerElement.hover(function() {
            // ホバー時にメニューを表示
            if (!menuOpen) {
                $sidemenuElement.stop(true, true).slideDown();
                $sidemenuTriggerImage.prop({
                    src: imagepath.on,
                });
                $sidemenuTriggerElement.addClass('active');
            }
        }, function() {
            // ホバーが外れたらメニューを非表示
            if (!menuOpen) {
                $sidemenuElement.stop(true, true).slideUp();
                $sidemenuTriggerImage.prop({
                    src: imagepath.off,
                });
                $sidemenuTriggerElement.removeClass('active');
            }
        });
    }

    /**
     * トリガーボタンに関するメソッド
     */
    function initializeTriggerButton() {
        const $triggerButtonElements = $('form .button_field.trigger');
        const triggerType = ['update', 'button'];

        $triggerButtonElements.on('click', function() {
            const $triggerButtonElement = $(this);
            const $formElement = $($triggerButtonElement.closest('form'));

            $.each(triggerType, function(index, type) {
                let is_submit = false;
                if ($triggerButtonElement.hasClass(type)) {

                    const $buttonInputElement = $('<input>').prop({
                        type: 'hidden',
                        name: 'button',
                        value: type,
                    });

                    switch (type) {
                        case 'update':
                            is_submit = true;
                            break;
                        case 'back':
                            is_submit = true;
                            break;
                    }

                    if(is_submit){
                        $formElement.append($buttonInputElement);
                        $formElement.submit();
                    }

                }
            });
        });
    }
</script>
