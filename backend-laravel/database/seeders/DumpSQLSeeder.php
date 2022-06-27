<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DumpSQLSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $path = public_path('sample-sql/sip_test.sql');

        $sql = file_get_contents($path);

        DB::unprepared($sql);
    }
}
