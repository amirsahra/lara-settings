<?php

use Amirsahra\LaraSetting\Core\Creator\LaraSettingDefaultData;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLaraSettingTable extends Migration
{
    private $tableName;

    public function __construct()
    {
        $this->tableName = config('larasetting.stores.database.table_name');
    }

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->unique();
            $table->string('value');
            $table->text('description')->nullable();
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });

        $this->setDefault();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists($this->tableName);
    }


    /**
     * @throws \Amirsahra\LaraSetting\Core\Exceptions\ContentsKeysNotExists
     * @throws \Amirsahra\LaraSetting\Core\Exceptions\ContentsValuesIsEmpty
     */
    private function setDefault()
    {
        if (config('larasetting.default_settings_feature')) {
            $Lar = new LaraSettingDefaultData();
            $Lar->run();
        }
    }

}
