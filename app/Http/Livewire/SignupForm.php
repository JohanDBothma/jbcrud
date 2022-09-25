<?php

namespace App\Http\Livewire;

use App\Mail\SignupMailable;
use App\Models\Language;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;

class SignupForm extends Component
{
    public $name;
    public $surname;
    public $email;
    public $id_number;
    public $language;
    public $interests;
    public $dob;
    public $mobile;
    public $notification;

    protected $rules = [
        'name' => 'required',
        'surname' => 'required',
        'id_number' => 'required|min:10',
        'mobile' => 'required',
        'email' => 'required|unique:users',
        'dob' => 'required',
        'language' => 'required',
        'interests' => 'present|required',
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }
    public function submitForm()
    {
        $form = $this->validate();

        $interests = implode(",", $this->interests);
        $form['name'] = $this->name;
        $form['surname'] = $this->surname;
        $form['id_number'] = $this->id_number;
        $form['mobile'] = $this->mobile;
        $form['email'] = $this->email;
        $form['dob'] = $this->dob;
        $form['language'] = $this->language;
        $form['interests'] = $interests;

        // force loading icon as it happens so quickly
        sleep(1);
        Mail::to($form['email'])->send(new SignupMailable($form));

        // create user

        $user = User::create([
            'name' => $this->name,
            'surname' => $this->surname,
            'id_number' => $this->id_number,
            'mobile' => $this->mobile,
            'email' => $this->email,
            'dob' => $this->dob,
            'language' => $this->language,
            'interests' => $interests,
        ]);

        $user->save();

        $this->notification = "Thank you for submitting your information";

        $this->resetForm();
    }

    private function resetForm()
    {
        $this->name = "";
        $this->surname = "";
        $this->email = "";
        $this->id_number = "";
        $this->language = "";
        $this->interests = [];
        $this->dob = "";
        $this->mobile = "";
    }

    public function render()
    {
        return view('livewire.signup-form');
    }

    // .defer only on submit
    // lazy on focus loss
}
