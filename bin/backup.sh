#!/bin/bash

# 現在のディレクトリを取得（スクリプトの場所）
SCRIPT_DIR="$( cd "$( dirname "${BASH_SOURCE[0]}" )" && pwd )"

# Laravel プロジェクトのルートディレクトリへ移動
cd "$SCRIPT_DIR/.."

# php artisan コマンドを実行
php artisan backup:create

