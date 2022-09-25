<?php

namespace App\Http\Livewire;

use App\Models\Interest;
use LivewireUI\Modal\ModalComponent;

class EditInterest extends ModalComponent
{

    public Interest $interest;
    public $interest_id;
    public $name;


    protected $rules = [
        'name' => 'required',
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function mount($id)
    {
        $interest = Interest::where('id', $id)->first();
        $this->interest = $interest;
        $this->interest_id = $id;
        $this->name = $interest->name;
    }

    public function render()
    {
        return view('livewire.edit-interest');
    }

    public function update()
    {
        $form = $this->validate();

        $form['name'] = $this->name;

        $interest = Interest::where('id', $this->interest_id)->first();
        $interest->name = $this->name;

        $interest->save();

        $notification = $interest->name . " has succesfully been updated";

        $this->closeModalWithEvents([
            DataTablesInterests::getName() => 'dataUpdated',
            DataTablesInterests::getName() => [
                'updateNotification', [$notification]
            ]
        ]);
    }
}
