<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Livewire\WithPagination;
use Spatie\Permission\Models\Role;

class RoleIndex extends Component
{
    use WithPagination;
    protected $paginationTheme = "bootstrap";

    public $search;

    public function updatingSeach(){
        $this->resetPage();
    }

    public function render()
    {
        $roles = Role::where('id', '<>',1)
            ->where(function ($q){
                $q->where('name','LIKE', "%$this->search%");
            })
            ->paginate();
        return view('livewire.admin.role-index', compact('roles'));
    }
}
