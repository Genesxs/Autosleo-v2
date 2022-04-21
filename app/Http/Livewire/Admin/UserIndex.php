<?php

namespace App\Http\Livewire\Admin;
use App\Models\User;
use Livewire\Component;
Use Livewire\WithPagination;

class UserIndex extends Component
{
    public $search;
    use WithPagination;

    protected $paginationTheme = "bootstrap";

    public function updatingSearch()
    {
       $this->resetPage();
    }

    public function render()
    {
        $users = User::where('name', 'LIKE', '%' . $this->search . '%')->paginate();

        return view('livewire.admin.user-index', compact('users'));
    }
}
