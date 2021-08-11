<?php

namespace App\Http\Livewire\Admin;

use App\PermissionName;
use Livewire\Component;
use Livewire\WithPagination;

class PermissionIndex extends Component
{

    use WithPagination;
    protected $paginationTheme = "bootstrap";

    public $search;

    public function updatingSeach(){
        $this->resetPage();
    }

    public function render()
    {
        $permissions = PermissionName::where('name','LIKE', "%$this->search%")
            ->paginate();
        return view('livewire.admin.permission-index',compact('permissions'));
    }
}
