<?php

namespace Database\Seeders;

use App\Enums\CommonStatuses;
use App\Enums\User\Gender;
use App\Enums\User\UserTypes;
use App\Models\Blog;
use App\Models\Category;
use App\Models\Clinic;
use App\Models\Promotion;
use App\Models\Spec;
use App\Models\SpecReview;
use App\Models\Thread;
use App\Models\ThreadMessage;
use App\Models\User;
use App\Models\UserDocument;
use App\Models\UserHistory;
use App\Models\Vacancy;
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
            'first_name' => 'Admin',
            'last_name' => 'Admin',
            'age' => '33',
            'gender' => Gender::MALE,
            'email' => 'admin@admin.ru',
            'email_verified_at' => now(),
            'password' => Hash::make('admin'),
            'remember_token' => Str::random(10),
            'type' => UserTypes::ADMIN,
            'status' => CommonStatuses::ACTIVE
        ]);


        $user = User::create([
            'first_name' => 'user',
            'last_name' => 'user',
            'age' => '33',
            'gender' => Gender::MALE,
            'email' => 'user@user.ru',
            'email_verified_at' => now(),
            'password' => Hash::make('admin'),
            'remember_token' => Str::random(10),
            'type' => UserTypes::SIMPLE,
            'status' => CommonStatuses::ACTIVE
        ]);

        Category::factory()->count(30)->create();
        $categories = Category::all();
        $users = User::factory()->count(50)->create();
        $threads = new Collection();
        foreach ($users as $user) {
            $threads->add(Thread::factory()->count(1)->for($user)->create());
            UserHistory::factory()->count(rand(1, 10))->for($user)->create();
            UserDocument::factory()->count(rand(1, 5))->for($user)->create();
        }

        User::factory()->count(30)->create([
            'type' => UserTypes::SPEC
        ]);

        foreach ($categories as $category) {
            Spec::factory()->count(1)->for($category)->create();
        }

        $threads = Thread::all();
        foreach ($threads as $thread) {
            ThreadMessage::factory()->count(3)->for($thread, 'thread')->create();
        }

        foreach ($categories as $category) {
            Blog::factory()->count(rand(1, 3))->for($category)->create();
            Vacancy::factory()->count(rand(1, 3))->for($category)->create();
        }

        Promotion::factory()->count(30)->create();

        $settings = Settings::getSettings();

        foreach ($settings as $tab => $_settings) {
            foreach ($_settings as $setting) {
                $setting['tab'] = $tab;
                unset($setting['variants']);
                DB::table('settings')->insert($setting);
            }
        }

        foreach (range(1, 10) as $_) {
            Clinic::factory()->count(3)->hasAttached($categories->random(rand(1, 3)))->create();
        }

        $specs = Spec::all();

        $users = User::where('type', UserTypes::SIMPLE)->get();
        foreach ($specs as $spec) {
            $user = $users->random();
            SpecReview::factory()->count(rand(1, 5))->for($spec)->create([
                'user_id' => $user->id
            ]);
        }
    }
}
