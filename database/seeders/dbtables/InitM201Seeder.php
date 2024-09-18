<?php

namespace Database\Seeders\dbtables;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Models\common\QueryModel;

class InitM201Seeder extends Seeder
{
    private $query_model;
    private $dbtable;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->query_model = new QueryModel();
        $this->dbtable = "m201_service_categories";

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
            $insertdata = [];
            foreach ($data as $column => $value) {
                switch ($column) {
                    case 'created_by':
                        $tableclass = $value['table'];
                        $data = $value['data'];
                        $insertdata[$column] = $this->query_model->getReferenceId($tableclass, $data);
                        break;
                    case 'icon_image_path':
                        $insertdata[$column] = asset($value);
                        break;
                    default:
                        $insertdata[$column] = $value;
                        break;
                }
            }
            $insertdata['sort'] = $key;
            $dbmodel::create($insertdata);
        }

    }
}
