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
        setup();
    });

    /**
     * セットアップメソッド
     */
    function setup() {
        initializeSidemenu();
        initializeTriggerButton();
        initializeFiles();
        initializeCKEditor();
        initializeATag();
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
        const triggerType = ['update', 'back'];

        $triggerButtonElements.each(function() {
            const $triggerButtonElement = $(this);
            const $formElement = $($triggerButtonElement.closest('form'));

            // ボタンクリックイベント
            $triggerButtonElement.on('click', function() {
                submitForm();
            });

            // フォーム全体でのキーイベント
            $formElement.on('keydown', function(event) {
                // Enterキーを押した場合
                if (event.key === 'Enter') {
                    // フォームの最後のinput要素にフォーカスがある場合に実行
                    if ($(':focus').is($formElement.find('input:last'))) {
                        event.preventDefault(); // デフォルトのフォーム送信を防ぐ
                        submitForm();
                    }
                }
            });

            function submitForm() {
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

                        if (is_submit) {
                            $formElement.append($buttonInputElement);
                            $formElement.submit();
                        }

                    }
                });
            }
        });
    }

    /**
     * ファイルに関するメソッド
     */
    function initializeFiles() {
        const $fileInputElements = $('input.file[type=file]');

        $fileInputElements.each(function() {
            const $fileInputElement = $(this);
            const $formElement = $(this.closest('form'));
            const $inputFieldElement = $(this.closest('.input_field'));
            const $fileNameInputElement = $inputFieldElement.find('input.flag');
            const $closeIconElement = $inputFieldElement.find('.file.close');
            const $imageIconElement = $inputFieldElement.find('.file.image');
            const $deleteIconElement = $inputFieldElement.find('.file.delete');
            const uploadDirPath = @json($uploadsDirPath);

            // ファイルが選択された時の処理
            $fileInputElement.on('change', function() {
                const file = this.files[0];
                if (file) {
                    // closeアイコンのhiddenクラスを削除
                    $closeIconElement.removeClass('hidden');
                    // ファイル名をfileNameInputElementに設定
                    $fileNameInputElement.val(file.name);
                }
            });

            // closeIconElementがクリックされた時の処理
            $closeIconElement.on('click', function() {
                // ファイルデータを削除
                $fileInputElement.val('');
                // closeアイコンにhiddenクラスを追加
                $closeIconElement.addClass('hidden');
                // ファイル名をリセット
                $fileNameInputElement.val('');
            });

            // imageIconElementがクリックされた時の処理
            $imageIconElement.on('click', function() {
                const filename = $fileNameInputElement.val();
                const fullPath = uploadDirPath + filename;

                // サーバー上では file:// は不要、WebのURL形式で処理
                const urlPath = "{{ asset('storage/uploads') }}/" + filename;

                console.log(urlPath); // URLパスを確認
                window.open(urlPath, '_blank');
            });

            // deleteIconElementがクリックされた時の処理
            $deleteIconElement.on('click', function() {
                // deleteフラグ
                $fileNameInputElement.val('delete');
                // button
                const $buttonInputElement = $('<input>').prop({
                    type: 'hidden',
                    name: 'button',
                    value: 'update',
                });
                $formElement.append($buttonInputElement);
                // formElementをsubmitする
                $formElement.submit();
            });
        });
    }

    /**
     * CKEditorに関するメソッド
     */
    function initializeCKEditor() {

        const $ckEditorElements = $('.ckeditor');

        $ckEditorElements.each(function() {
            const $elementName = $(this).attr('name');

            // CKEditorのインスタンスを初期化
            CKEDITOR.replace($elementName);

            // CKEditorが完全に初期化された後に、テキストから \r\n を削除
            CKEDITOR.on('instanceReady', function(event) {
                const editor = event.editor;

                // 入力中に \r\n を削除
                editor.on('change', function() {
                    const data = editor.getData();
                    const cleanedData = data.replace(/\r\n/g, ''); // \r\n を削除
                    editor.setData(cleanedData);
                });
            });
        });
    }

    /**
     * aタグに関するメソッド
     */
    function initializeATag() {
        const $aLinkElements = $('a');
        $aLinkElements.prop({
            tabindex: -1,
        });
    }
</script>
