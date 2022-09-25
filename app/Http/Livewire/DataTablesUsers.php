<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class DataTablesUsers extends Component
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
        $users = User::where(function ($query) {
            $query->where('name', 'like', '%' . $this->search . '%')
                ->orWhere('surname', 'like', '%' . $this->search . '%')
                ->orWhere('email', 'like', '%' . $this->search . '%');
        })
            ->whereNull('is_admin')
            ->when($this->sortField, function ($query) {
                $query->orderBy($this->sortField, $this->sortAsc ? "asc" : "desc");
            })->paginate(20);

        return view('livewire.data-tables-users', [
            'users' => $users
        ]);
    }

    public function updateNotification($notification)
    {
        $this->notification = $notification;
    }

    public function delete($id)
    {
        $user = User::find($id);
        $name = $user->name;
        $surname = $user->surname;
        User::destroy($id);
        $this->notification = $name . " " . $surname . ' has been deleted';
    }
}
