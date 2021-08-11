<?php

namespace App\Http\Livewire\Admin;

use App\User;
use Livewire\Component;

use Livewire\WithPagination;

class UserIndex extends Component
{
    use WithPagination;
    protected $paginationTheme = "bootstrap";

    public $search;

    public function updatingSeach(){
        $this->resetPage();
    }

    public function render()
    {
        $users = User::where('id', '<>',1)
            ->where(function ($q){
                $q->where('name','LIKE', "%$this->search%")
                ->orWhere('email','LIKE', "%$this->search%");
            })
            ->latest('id')
            ->paginate();
        return view('livewire.admin.user-index', compact('users'));
    }
}
