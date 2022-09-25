<?php

namespace App\Http\Livewire;

use App\Models\Interest;
use LivewireUI\Modal\ModalComponent;

class CreateInterest extends ModalComponent
{
    public $name;

    protected $rules = [
        'name' => 'required',
    ];
    public function render()
    {
        return view('livewire.create-interest');
    }

    public function create()
    {
        $form = $this->validate();

        $form['name'] = $this->name;

        $interest = new Interest;

        $interest->name = $this->name;
        $interest->save();

        $notification = $interest->name . " has succesfully been created";

        $this->closeModalWithEvents([
            DataTablesInterests::getName() => 'dataUpdated',
            DataTablesInterests::getName() => [
                'updateNotification', [$notification]
            ]
        ]);
    }
}
