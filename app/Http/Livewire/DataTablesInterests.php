<?php

namespace App\Http\Livewire;

use App\Models\Interest;
use Livewire\Component;
use Livewire\WithPagination;

class DataTablesInterests extends Component
{
    use WithPagination;
    public $notification;
    public $search;
    public $sortField;
    public $sortAsc = true;
    protected $queryString = ['search', 'sortAsc', 'sortField'];

    // listen for the updated call from the Modal and rerender if ran
    public $listeners = ['dataUpdated' => 'render', 'updateNotification' => 'updateNotification'];


    public function sortBy($field)
    {
        if ($this->sortField === $field) {
            $this->sortAsc = !$this->sortAsc;
        } else {
            $this->sortAsc = true;
        }
        $this->sortField = $field;
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {

        // search in a callback to not interfere with is admin check
        $interests = Interest::where('name', 'like', '%' . $this->search . '%')
            ->when($this->sortField, function ($query) {
                $query->orderBy($this->sortField, $this->sortAsc ? "asc" : "desc");
            })->paginate(10);

        return view('livewire.data-tables-interests', [
            'interests' => $interests
        ]);
    }

    public function updateNotification($notification)
    {
        $this->notification = $notification;
    }

    public function delete($id)
    {
        $interest = Interest::find($id);
        $name = $interest->name;
        Interest::destroy($id);
        $this->notification = $name . ' has been deleted';
    }
}
