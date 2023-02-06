<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateViewBills extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement("
        CREATE OR REPLACE VIEW bills_view AS
        SELECT b.id, b.date_ref, b.value, b.consumption, c.id as complex_id, c.name as complex_name
        FROM bills as b
        LEFT JOIN complexes as c ON b.complex_id = c.id
        WHERE b.deleted_at IS NULL
        ");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement("DROP VIEW bills_view");
    }
}
