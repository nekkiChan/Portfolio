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
     * unique_config_data
     */
    $unique_config_data = [];
    $config_path = session('config_path');
    $config_data = config("screens.{$config_path}");
    if (in_array('unique', array_keys($config_data))) {
        $unique_config_data = $config_data['unique'];
    }
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
        initializePasswordField();
        initializeOnClick();
        initializeCardIconField();
        initializeUniqueValueField();
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
                                if ($('input[name].unique_alert').length > 0) {
                                    alert('他に同一のデータが利用されています。他のデータを入力してください。');
                                    is_submit = false;
                                }
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
    /**
     * CKEditorに関するメソッド
     */
    function initializeCKEditor() {
        const $ckEditorElements = $('.ckeditor');

        $ckEditorElements.each(function() {
            const $element = $(this);

            // CKEditorのインスタンスを初期化
            ClassicEditor
                .create($element[0], {
                    language: 'ja' // 日本語に設定
                })
                .then(editor => {
                    let previousData = editor.getData(); // 前のデータを保存

                    // CKEditorが完全に初期化された後に、テキストから \r\n を削除
                    editor.model.document.on('change:data', () => {
                        const data = editor.getData();
                    });

                    // 入力中のエンターキーを制御
                    editor.editing.view.document.on('keydown', (evt) => {
                        if (evt.key === 'Enter') {
                            const data = editor.getData();
                            // 空の状態でエンターが押された場合、処理を中止
                            if (data.trim() === '') {
                                evt.preventDefault(); // デフォルトのエンター動作を防ぐ
                                return;
                            }

                            // デフォルトのエンター動作を防ぎ、カスタムで改行を追加
                            evt.preventDefault();

                            // モデルに新しい段落を追加
                            const model = editor.model;
                            model.change(writer => {
                                const insertPosition = model.document.selection
                                    .getFirstPosition();
                                const newParagraph = writer.createElement('paragraph');

                                // 新しい段落を挿入
                                writer.insert(newParagraph, insertPosition);

                                // 新しい段落にカーソルを移動
                                writer.setSelection(newParagraph, 'in');
                            });
                        }
                    });
                })
                .catch(error => {
                    console.error(error);
                });
        });
    }

    /**
     * パスワードに関するメソッド
     */
    function initializePasswordField() {
        const $passwordInputElements = $('input[type=password]');

        $passwordInputElements.each(function() {
            const $passwordInputElement = $(this);

            const view_message = '表示';
            const hidden_message = '非表示';
            const $passwordViewer = $(`<div>${view_message}</div>`);
            $passwordViewer.addClass('password_viewer');

            if ($passwordInputElement.parent().children('div.password_viewer').length == 0) {
                $passwordInputElement.parent().css({
                    position: 'relative',
                });
                $passwordInputElement.parent().append($passwordViewer);
            }

            $passwordViewer.on('click', function() {
                if ($passwordViewer.text().trim() == view_message) {
                    $passwordViewer.text(hidden_message);
                    $passwordInputElement.prop({
                        type: 'text',
                    });
                } else {
                    $passwordViewer.text(view_message);
                    $passwordInputElement.prop({
                        type: 'password',
                    });
                }
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

        // アンカーリンククリック時のスクロール位置調整を追加
        $aLinkElements.on('click', function(event) {
            const target = this.hash; // #以降のIDを取得

            if (target) {
                event.preventDefault(); // デフォルトの動作（即座のスクロール）を防止

                setTimeout(function() {
                    adjustScrollPosition(target); // スクロール位置の調整
                }, 5); // クリック後に少し遅延させて位置を調整
            }

            /**
             * スクロール位置を調整する関数
             */
            function adjustScrollPosition(target) {
                // CSSのカスタムプロパティ（--header-height）の値を取得
                const scrollOffset = parseInt(getComputedStyle(document.documentElement)
                    .getPropertyValue('--header-height'), 10);

                // ターゲットの要素が存在する場合にスクロール位置を調整
                const $targetElement = $(target);
                if ($targetElement.length) {
                    const elementPosition = $targetElement.offset().top; // 要素の位置を取得
                    const offsetPosition = elementPosition - scrollOffset; // オフセットを適用

                    // スムーズにスクロール
                    $('html, body').animate({
                        scrollTop: offsetPosition
                    }, 500); // 500ミリ秒でスムーズにスクロール
                }
            }
        });
    }

    /**
     * onclickに関するメソッド
     */
    function initializeOnClick() {
        const $onclickElements = $('[onclick]');

        $onclickElements.each(function() {

            const $onclickElement = $(this);
            const isBlank = $onclickElement.hasClass('blank');

            // onclick属性の内容を取得
            const onclickAttr = $onclickElement.attr('onclick');

            // location.hrefの部分を抽出する
            if (onclickAttr && onclickAttr.includes('location.href')) {
                // 正規表現でURL部分を抽出する
                const urlMatch = onclickAttr.match(/location\.href=['"]([^'"]+)['"]/);

                if (urlMatch && urlMatch[1]) {
                    const url = urlMatch[1]; // 抽出したURL

                    // onclick属性を削除
                    $onclickElement.removeAttr('onclick');

                    // クリックイベントを追加
                    $onclickElement.on('click', function(event) {
                        event.preventDefault(); // デフォルトの動作を防止（必要であれば）
                        if (isBlank) {
                            window.open(url, '_blank'); // URLを新しいタブで開く
                        } else {
                            window.location.href = url; // クリックされたときにURLに遷移
                        }
                    });
                }
            }
        });
    }

    /**
     * cardiconに関するメソッド
     */
    function initializeCardIconField() {
        const $cardFieldParentElements = $('.card_field').parent();
        const rowitems = parseInt(getComputedStyle(document.documentElement)
            .getPropertyValue('--card-icon-items'), 10);
        // CSSのカスタムプロパティ（--basic-margin）の値を取得
        const basicmargin = parseInt(getComputedStyle(document.documentElement)
            .getPropertyValue('--basic-margin'), 10);

        $cardFieldParentElements.each(function() {
            const $cardFieldParentElement = $(this);
            const $cardFieldHasIconElements = $cardFieldParentElement.children(
                '.card_field:has(.card_icon_field)');
            $cardFieldHasIconElements.each(function(index) {
                const $cardFieldHasIconElement = $(this);
                if (index >= 0 && index < rowitems) {
                    $cardFieldHasIconElement.css('margin-top', basicmargin);
                }
                if ((index + 1) % rowitems === 0 && $cardFieldHasIconElement.find('.card_icon_field')
                    .length > 0) {
                    $cardFieldHasIconElement.css('margin-right', '0');
                }
            });
        });
    }

    /**
     * unique値に関するメソッド
     */
    function initializeUniqueValueField() {
        const unique_config_data = @json($unique_config_data);

        $.each(unique_config_data, function(key, object) {
            const inputuniqueclass = object.class;
            const inputuniquetable = object.table;
            const inputuniquecolumn = object.column;
            const $uniqueElements = $(`input.${inputuniqueclass}`);

            $uniqueElements.each(function() {
                const $uniqueElement = $(this);

                const unique_alert_message = "他に同一のデータが利用されています。<br>他のデータを入力してください。";
                const $alertElement = $(`<div>${unique_alert_message}</div>`);
                $alertElement.addClass('unique_alert');
                if ($uniqueElement.parent().children('div.unique_alert').length == 0) {
                    $uniqueElement.parent().append($alertElement);
                    $alertElement.addClass('hidden');
                    $alertElement.parent().css({
                        position: 'relative',
                    });
                }

                const inputuniquevalue = $uniqueElement.val();
                checkUniqueInputValue(inputuniquetable, inputuniquecolumn, inputuniquevalue,
                    $uniqueElement);

                $uniqueElement.on('input', function() {
                    const inputuniquevalue = $uniqueElement.val(); // 現在の値を取得
                    checkUniqueInputValue(inputuniquetable, inputuniquecolumn,
                        inputuniquevalue, $uniqueElement);
                });
            });
        });

        function checkUniqueInputValue(table, column, value, $inputElement) {
            $.ajax({
                url: '{{ route('checkUniqueData') }}', // ルートを指定
                method: 'POST',
                data: {
                    value: value,
                    table: table,
                    column: column,
                    _token: '{{ csrf_token() }}' // CSRFトークン
                },
                success: function(response) {
                    if (response.exists) {
                        $inputElement.addClass('unique_alert');
                        $inputElement.parent().children('div.unique_alert').removeClass('hidden');
                    } else {
                        $inputElement.removeClass('unique_alert');
                        $inputElement.parent().children('div.unique_alert').addClass('hidden');
                    }
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    console.error("AJAX request failed:");
                    console.error("Status: " + textStatus);
                    console.error("Error: " + errorThrown);
                    console.error("Response Text: " + jqXHR.responseText);
                }
            });
        }
    }

    $(document).ready(function() {
        initializeUniqueValueField(); // ページが読み込まれたときに関数を呼び出す
    });
</script>
