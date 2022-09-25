<?php

namespace Tests\Feature;

use App\Http\Livewire\DataTablesUsers;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Livewire\Livewire;

class DataTablesUserTest extends TestCase
{
    use RefreshDatabase;

    // data table
    /** @test */
    public function datatable_exists()
    {
        $admin = User::create([
            'name' => 'Admin',
            'surname' => 'User',
            'email' => 'admin@crud.com',
            'is_admin' => 1,
        ]);

        $this->actingAs($admin)
            ->get('/dashboard')
            ->assertSeeLivewire('data-tables-users');
    }

    // sees user
    /** @test */
    public function datatable_contains()
    {
        $admin = User::create([
            'name' => 'Admin',
            'surname' => 'User',
            'email' => 'admin@crud.com',
            'is_admin' => 1,
        ]);

        $this->actingAs($admin)
            ->get("/dashboard");

        $user = User::create([
            'name' => 'User',
            'surname' => 'A',
            'email' => 'user@a.com',
        ]);

        Livewire::test(DataTablesUsers::class)
            ->assertSee($user->name);
    }

    // searches email
    /** @test */
    public function datatable_search()
    {
        $admin = User::create([
            'name' => 'Admin',
            'surname' => 'User',
            'email' => 'admin@crud.com',
            'is_admin' => 1,
        ]);

        $this->actingAs($admin)
            ->get("/dashboard");

        $user_a = User::create([
            'name' => 'Adam',
            'surname' => 'Cat',
            'email' => 'adam@cat.com',
        ]);

        $user_b = User::create([
            'name' => 'Brian',
            'surname' => 'Dog',
            'email' => 'brian@dog.com',
        ]);

        Livewire::test(DataTablesUsers::class)
            ->set('search', 'Adam')
            ->assertSee($user_a->name)
            ->assertDontSee($user_b->name);
    }

    // sort by name asc
    /** @test */
    public function datatable_sort_asc()
    {
        $admin = User::create([
            'name' => 'Admin',
            'surname' => 'User',
            'email' => 'admin@crud.com',
            'is_admin' => 1,
        ]);

        $this->actingAs($admin)
            ->get("/dashboard");

        $user_a = User::create([
            'name' => 'Adam',
            'surname' => 'Cat',
            'email' => 'adam@cat.com',
        ]);

        $user_b = User::create([
            'name' => 'Brian',
            'surname' => 'Dog',
            'email' => 'brian@dog.com',
        ]);

        Livewire::test(DataTablesUsers::class)
            ->call('sortBy', 'name')
            ->assertSeeInOrder(["Adam", "Brian"]);
    }

    // sort by name desc
    /** @test */
    public function datatable_sort_desc()
    {
        $admin = User::create([
            'name' => 'Admin',
            'surname' => 'User',
            'email' => 'admin@crud.com',
            'is_admin' => 1,
        ]);

        $this->actingAs($admin)
            ->get("/dashboard");

        $user_a = User::create([
            'name' => 'Adam',
            'surname' => 'Cat',
            'email' => 'adam@cat.com',
        ]);

        $user_b = User::create([
            'name' => 'Brian',
            'surname' => 'Dog',
            'email' => 'brian@dog.com',
        ]);

        Livewire::test(DataTablesUsers::class)
            ->call('sortBy', 'name')
            ->call('sortBy', 'name')
            ->assertSeeInOrder(["Brian", "Adam"]);
    }
}
