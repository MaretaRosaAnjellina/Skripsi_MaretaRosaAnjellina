<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        DB::statement("
            CREATE VIEW `gmm_result_view` AS
            SELECT
                `assessment_id`,
                `team_id`,
                MAX(CASE WHEN `criteria_id` = 1 THEN `value` END) AS `criteria_1`,
                MAX(CASE WHEN `criteria_id` = 2 THEN `value` END) AS `criteria_2`,
                MAX(CASE WHEN `criteria_id` = 3 THEN `value` END) AS `criteria_3`,
                MAX(CASE WHEN `criteria_id` = 4 THEN `value` END) AS `criteria_4`,
                MAX(CASE WHEN `criteria_id` = 5 THEN `value` END) AS `criteria_5`,
                MAX(CASE WHEN `criteria_id` = 6 THEN `value` END) AS `criteria_6`,
                MAX(CASE WHEN `criteria_id` = 7 THEN `value` END) AS `criteria_7`,
                MAX(CASE WHEN `criteria_id` = 8 THEN `value` END) AS `criteria_8`,
                MAX(CASE WHEN `criteria_id` = 9 THEN `value` END) AS `criteria_9`,
                MAX(CASE WHEN `criteria_id` = 10 THEN `value` END) AS `criteria_10`
            FROM `assessment_results`
            GROUP BY `assessment_id`, `team_id`
        ");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement("DROP VIEW IF EXISTS `gmm_result_view`");
    }
};
