<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStoredProcedure extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared('
            CREATE PROCEDURE GetAllTransactionHistory()
            BEGIN
                SELECT * FROM reservation r INNER JOIN day_trip_plan dtp ON r.day_trip_plan_id = dtp.id INNER JOIN users u ON u.id = r.user_id WHERE status = 3;
            END
        ');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        
        DB::unprepared('
            DROP PROCEDURE IF EXISTS GetAllTransactionHistory;
    '   );
    }
}
