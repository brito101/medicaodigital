<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateViewApartments extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement("
        CREATE OR REPLACE VIEW apartments_view AS
        SELECT a.id, a.name, b.id as block_id, b.name as block_name, c.id as complex_id, c.name as complex_name
        FROM apartments as a
        LEFT JOIN blocks as b ON a.block_id = b.id
        LEFT JOIN complexes as c ON b.complex_id = c.id
        WHERE a.deleted_at IS NULL
        ");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement("DROP VIEW apartments_view");
    }
}
