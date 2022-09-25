<?php

namespace App\Http\Livewire;

use App\Models\Language;
use LivewireUI\Modal\ModalComponent;

class EditLanguage extends ModalComponent
{

    public Language $language;
    public $language_id;
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
        $language = Language::where('id', $id)->first();
        $this->language = $language;
        $this->language_id = $id;
        $this->name = $language->name;
    }

    public function render()
    {
        return view('livewire.edit-language');
    }

    public function update()
    {
        $form = $this->validate();

        $form['name'] = $this->name;

        $language = Language::where('id', $this->language_id)->first();
        $language->name = $this->name;

        $language->save();

        $notification = $language->name . " has succesfully been updated";

        $this->closeModalWithEvents([
            DataTablesLanguages::getName() => 'dataUpdated',
            DataTablesLanguages::getName() => [
                'updateNotification', [$notification]
            ]
        ]);
    }
}
