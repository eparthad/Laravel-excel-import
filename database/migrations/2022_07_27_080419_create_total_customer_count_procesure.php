<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateTotalCustomerCountProcesure extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $procedure = "DROP PROCEDURE IF EXISTS `total_customer_count_info`;
                        CREATE PROCEDURE `total_customer_count_info`() NOT DETERMINISTIC NO SQL SQL SECURITY DEFINER 
                        BEGIN

                        SELECT A.branch_id, A.total_customer_count, B.total_male_customer_count, C.total_female_customer_count 
                        FROM
                        (SELECT branch_id, COUNT(last_name) AS `total_customer_count` FROM customers GROUP BY branch_id) A
                        INNER JOIN
                        (SELECT branch_id,COUNT(last_name) AS `total_male_customer_count` from customers where gender = 'M' GROUP BY branch_id ) B
                        ON A.branch_id = B.branch_id
                        INNER JOIN
                        (SELECT branch_id,COUNT(last_name) AS `total_female_customer_count` from customers where gender = 'F' GROUP BY branch_id ) C
                        ON A.branch_id = C.branch_id;

                    END;
        ";

        DB::unprepared($procedure);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('total_customer_count_procesure');
    }
}
