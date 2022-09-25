<?php

namespace Tests\Feature\Livewire;

use App\Http\Livewire\SignupForm;
use App\Mail\SignupMailable;
use App\Models\Interest;
use App\Models\Language;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Mail;
use Livewire\Livewire;
use Tests\TestCase;

class SignupFormTest extends TestCase
{
    use RefreshDatabase;
    // form is present
    /** @test */
    public function signup_form_exists()
    {
        $this->get('/')->assertSeeLivewire('signup-form');
    }

    // form submits
    /** @test */
    public function signup_form_submits()
    {
        Language::create([
            'id' => 1,
            'name' => 'English',
        ]);
        Interest::create([
            'id' => 1,
            'name' => 'Cricket',
        ]);
        Interest::create([
            'id' => 2,
            'name' => 'Cooking',
        ]);

        Livewire::test(SignupForm::class)
            ->set('name', 'Johan')
            ->set('surname', 'Bothma')
            ->set('email', 'mail@me.com')
            ->set('mobile', '12345678901')
            ->set('id_number', '12345678901')
            ->set('dob', date('Y-m-d'))
            ->set('language', 1)
            ->set('interests', [1, 2])
            ->call('submitForm')
            ->assertSee('Thank you for submitting your information');
    }

    // form submits and emails
    /** @test */
    public function signup_form_submits_and_emails()
    {
        Mail::fake();

        Language::create([
            'id' => 1,
            'name' => 'English',
        ]);
        Interest::create([
            'id' => 1,
            'name' => 'Cricket',
        ]);
        Interest::create([
            'id' => 2,
            'name' => 'Cooking',
        ]);

        Livewire::test(SignupForm::class)
            ->set('name', 'Johan')
            ->set('surname', 'Bothma')
            ->set('email', 'mail@me.com')
            ->set('mobile', '12345678901')
            ->set('id_number', '12345678901')
            ->set('dob', date('Y-m-d'))
            ->set('language', 1)
            ->set('interests', [1, 2])
            ->call('submitForm')
            ->assertSee('Thank you for submitting your information');


        Mail::assertSent(function (SignupMailable $mail) {
            $mail->build();

            return $mail->hasFrom('mail@me.com') &&
                $mail->subject === "JBCRUD Submission for Johan Bothma";
        });
    }

    // form submits and emails and creates user
    /** @test */
    public function signup_form_submits_and_emails_and_creates_user()
    {
        Mail::fake();

        Language::create([
            'id' => 1,
            'name' => 'English',
        ]);
        Interest::create([
            'id' => 1,
            'name' => 'Cricket',
        ]);
        Interest::create([
            'id' => 2,
            'name' => 'Cooking',
        ]);

        Livewire::test(SignupForm::class)
            ->set('name', 'Johan')
            ->set('surname', 'Bothma')
            ->set('email', 'mail@me.com')
            ->set('mobile', '12345678901')
            ->set('id_number', '12345678901')
            ->set('dob', date('Y-m-d'))
            ->set('language', 1)
            ->set('interests', [1, 2])
            ->call('submitForm')
            ->assertSee('Thank you for submitting your information');


        Mail::assertSent(function (SignupMailable $mail) {
            $mail->build();

            return $mail->hasFrom('mail@me.com') &&
                $mail->subject === "JBCRUD Submission for Johan Bothma";
        });

        $this->assertModelExists(User::where('email', 'mail@me.com')->first());
    }

    /** @test */
    public function signup_form_name_field_is_required()
    {
        Livewire::test(SignupForm::class)
            ->set('surname', 'Bothma')
            ->set('email', 'johandanielbothma@gmail.com')
            ->set('id_number', '123456789')
            ->call('submitForm')
            ->assertHasErrors(['name' => 'required']);
    }

    /** @test */
    public function signup_form_id_number_field_has_minimum_characters()
    {
        Livewire::test(SignupForm::class)
            ->set('surname', 'Bothma')
            ->set('email', 'johandanielbothma@gmail.com')
            ->set('id_number', '123')
            ->call('submitForm')
            ->assertHasErrors(['id_number' => 'min']);
    }
}
