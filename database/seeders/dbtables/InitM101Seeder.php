<?php

namespace Database\Seeders\dbtables;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class InitM101Seeder extends Seeder
{
    private $dbtable;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->dbtable = "m101_content_categories";

        /**
         * @var array データベースの設定データ
         */
        $dbconfigdata = config("dbtables.{$this->dbtable}");

        /**
         * @var array 初期データ
         */
        $initdata = $dbconfigdata['initdata'];

        /**
         * @var Model dbtableのモデル
         */
        $dbmodel = $dbconfigdata['dbmodel'];

        foreach ($initdata as $key => $data) {
            $count = $dbmodel::where('is_delete', false)->count();
            $data['sort'] = $count;
            $dbmodel::create($data);
        }

    }
}
