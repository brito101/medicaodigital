<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateViewMeters extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement("
        CREATE OR REPLACE VIEW meters_view AS
        SELECT m.id, m.register, m.apartment_id, a.name as apartment_name, b.id as block_id, b.name as block_name, c.id as complex_id, c.name as complex_name
        FROM meters as m
        LEFT JOIN apartments as a ON m.apartment_id = a.id
        LEFT JOIN blocks as b ON a.block_id = b.id
        LEFT JOIN complexes as c ON b.complex_id = c.id
        WHERE m.deleted_at IS NULL
        ");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement("DROP VIEW meters_view");
    }
}
