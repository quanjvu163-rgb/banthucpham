<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use RuntimeException;

class InitialDataSeeder extends Seeder
{
    private array $legacyTables = [
        'chitiethoadon',
        'binhluan',
        'hoadon',
        'sanpham',
        'thanhvien',
        'quanly',
        'nhacungcap',
        'danhmuc',
        'lienhe',
    ];

    public function run()
    {
        $sqlPath = database_path('sql/banthucpham.sql');
        if (! is_file($sqlPath)) {
            throw new RuntimeException('Legacy SQL dump not found: ' . $sqlPath);
        }

        $sql = file_get_contents($sqlPath);
        if ($sql === false) {
            throw new RuntimeException('Unable to read legacy SQL dump.');
        }

        preg_match_all('/INSERT INTO `[^`]+`.*?\);\s*/su', $sql, $matches);
        $statements = $matches[0] ?? [];
        if ($statements === []) {
            throw new RuntimeException('No INSERT statements found in legacy SQL dump.');
        }

        DB::statement('SET FOREIGN_KEY_CHECKS=0');

        try {
            foreach ($this->legacyTables as $table) {
                DB::table($table)->delete();
            }

            foreach ($statements as $statement) {
                DB::unprepared($statement);
            }
        } finally {
            DB::statement('SET FOREIGN_KEY_CHECKS=1');
        }
    }
}
