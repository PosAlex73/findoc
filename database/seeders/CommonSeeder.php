<?php

namespace Database\Seeders;

use App\Enums\CommonStatuses;
use App\Enums\User\UserTypes;
use App\Models\Blog;
use App\Models\Category;
use App\Models\Promotion;
use App\Models\Thread;
use App\Models\ThreadMessage;
use App\Models\User;
use App\Models\UserHistory;
use App\Settings\Settings;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Collection;

class CommonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name' => 'Admin Admin',
            'email' => 'admin@admin.ru',
            'email_verified_at' => now(),
            'password' => Hash::make('admin'),
            'remember_token' => Str::random(10),
            'type' => UserTypes::ADMIN,
            'status' => CommonStatuses::ACTIVE
        ]);


        $user = User::create([
            'name' => 'User User',
            'email' => 'user@user.ru',
            'email_verified_at' => now(),
            'password' => Hash::make('admin'),
            'remember_token' => Str::random(10),
            'type' => UserTypes::SIMPLE,
            'status' => CommonStatuses::ACTIVE
        ]);

        $users = User::factory()->count(50)->create();
        $threads = new Collection();
        foreach ($users as $user) {
            $threads->add(Thread::factory()->count(1)->for($user)->create());
            UserHistory::factory()->count(1)->for($user)->create();
        }

        User::factory()->count(30)->create([
            'type' => UserTypes::SPEC
        ]);

        $doctors = User::where('type', UserTypes::SPEC);
        foreach ($doctors as $doctor) {

        }

        $threads = Thread::all();
        foreach ($threads as $thread) {
            ThreadMessage::factory()->count(3)->for($thread, 'thread')->create();
        }

        Category::factory()->count(30)->create();

        $categories = Category::all();

        Promotion::factory()->count(30)->create();
        Blog::factory()->count(30)->create();

        $settings = Settings::getSettings();

        foreach ($settings as $tab => $_settings) {
            foreach ($_settings as $setting) {
                $setting['tab'] = $tab;
                DB::table('settings')->insert($setting);
            }
        }
    }
}
