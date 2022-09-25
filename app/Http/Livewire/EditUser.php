<?php

namespace App\Http\Livewire;

use App\Models\User;
use LivewireUI\Modal\ModalComponent;

class EditUser extends ModalComponent
{
    public User $user;
    public $user_id;
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
        'dob' => 'required',
        'language' => 'required',
        'interests' => 'present|required',
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function mount($id)
    {
        // $this->user = $user;
        $user = User::where('id', $id)->first();
        $this->user = $user;
        $this->user_id = $id;
        $this->name = $user->name;
        $this->surname = $user->surname;
        $this->email = $user->email;
        $this->id_number = $user->id_number;
        $this->language = $user->language;
        $this->interests = explode(",", $user->interests);
        $this->dob = $user->dob;
        $this->mobile = $user->mobile;
    }

    public function render()
    {
        return view('livewire.edit-user');
    }

    public function update()
    {
        $form = $this->validate();

        // also validate email as we don't want the unique rule to apply on the current id
        $form  = $this->validate([
            'email' => 'unique:users,email_address,' . $this->user_id,
        ]);

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
        sleep(2);
        // create user

        $user = User::where('id', $this->user_id)->first();
        $user->name = $this->name;
        $user->surname = $this->surname;
        $user->id_number = $this->id_number;
        $user->mobile = $this->mobile;
        $user->email = $this->email;
        $user->dob = $this->dob;
        $user->language = $this->language;
        $user->interests = $interests;

        $user->save();

        $notification = $user->name . " " . $user->surname . " has succesfully been updated";

        $this->closeModalWithEvents([
            DataTablesUsers::getName() => 'dataUpdated',
            DataTablesUsers::getName() => [
                'updateNotification', [$notification]
            ]
        ]);
    }
}
