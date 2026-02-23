<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Contact;

class DatabaseSeeder extends Seeder
{
public function run(): void
    {
        // 必要ならユーザーも作る
        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        // categoriesの5件を作成
        $this->call([
            CategorySeeder::class,
        ]);

        // contactsを35件作成（Factory作成後に有効）
        Contact::factory()->count(35)->create();
    }
}
