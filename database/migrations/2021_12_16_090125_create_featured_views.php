<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFeaturedViews extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared('
            CREATE VIEW featured_day_trip AS
                SELECT 
                    dtp.*, 
                    COUNT(r.day_trip_plan_id) AS res_count,ROUND(AVG(r2.star_count)) AS star_count, 
                    dti.image_path 
                FROM 
                    day_trip_plan dtp 
                LEFT JOIN 
                    reservation r ON dtp.id = r.day_trip_plan_id 
                LEFT JOIN 
                    review r2 ON r2.reservation_id = r.id 
                LEFT JOIN 
                    day_trip_image dti ON dti.day_trip_plan_id = dtp.id 
                GROUP BY r.day_trip_plan_id 
                ORDER BY res_count DESC LIMIT 3
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
            DROP VIEW IF EXIST featured_day_trip
        ');
    }
}
