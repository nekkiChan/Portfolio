#!/bin/bash

# 現在のディレクトリを取得（スクリプトの場所）
SCRIPT_DIR="$( cd "$( dirname "${BASH_SOURCE[0]}" )" && pwd )"

# cache.shを実行
"$SCRIPT_DIR/cache.sh"

# Laravel プロジェクトのルートディレクトリへ移動
cd "$SCRIPT_DIR/.."

# php artisan コマンドを実行
php artisan migrate:reset
php artisan migrate
php artisan db:seed --class=InitializeSeeder


