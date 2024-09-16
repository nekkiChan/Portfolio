<?php

namespace Database\Seeders\dbtables;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class InitS002Seeder extends Seeder
{
    private $dbtable;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->dbtable = "s002_roles";

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
            $dbmodel::create($data);
        }

    }
}
