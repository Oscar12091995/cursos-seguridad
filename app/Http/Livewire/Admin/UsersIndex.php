<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\User;
use Livewire\WithPagination;

class UsersIndex extends Component
{
    use WithPagination;
    protected $paginationTheme = "bootstrap";

    public $search;

    public function render()
    {
        $users = User::select(['id', 'name', 'apellidos', 'email', 'telefono', 'empresa'])
        ->where('name', 'LIKE', '%' . $this->search . '%')
        ->orwhere('empresa', 'LIKE', '%' . $this->search . '%')
        ->paginate(8);
        return view('livewire.admin.users-index', compact('users'));
    }
    public function limpiar_page(){
        $this->reset('page');
    }
}