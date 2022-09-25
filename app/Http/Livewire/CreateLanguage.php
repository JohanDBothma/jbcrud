<?php

namespace App\Http\Livewire;

use App\Models\Language;
use LivewireUI\Modal\ModalComponent;

class CreateLanguage extends ModalComponent
{
    public $name;

    protected $rules = [
        'name' => 'required',
    ];
    public function render()
    {
        return view('livewire.create-language');
    }

    public function create()
    {
        $form = $this->validate();

        $form['name'] = $this->name;

        $language = new Language;

        $language->name = $this->name;
        $language->save();

        $notification = $language->name . " has succesfully been created";

        $this->closeModalWithEvents([
            DataTablesLanguages::getName() => 'dataUpdated',
            DataTablesLanguages::getName() => [
                'updateNotification', [$notification]
            ]
        ]);
    }
}
