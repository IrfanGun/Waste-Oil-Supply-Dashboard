<?php

namespace App\Livewire;



use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Livewire\WithPagination;

class UserSearch extends Component
{
    use WithPagination;
    public $search = '';
    public $perPage = 5;
    public $city = '';
    public $sortBy = 'created_at';
    public $sortDir = 'DESC';  
    


    
    public function sortTable($sortByField) {
        $this->sortBy = $sortByField;
        if ($this->sortBy == $sortByField) {
            $this->sortDir = $this->sortDir === 'DESC' ? 'ASC' : 'DESC';
            return;
        }
        else
        {
             $this->sortDir = 'DESC';
        };

      
    }
    

    public function render()
    {
        if (!Gate::allows('view-users')) {
            abort(403);
        }
         
        $users = User::query()->search($this->search)
        ->when($this->city !== '', function ($query) {
            $query->where('kota', $this->city);
        })
        ->whereDoesntHave('roles', function ($query) {
            $query->where('name', 'admin');
        })
        ->orderBy($this->sortBy, $this->sortDir)
        ->paginate(5);

        $dataCount = User::count();  


        return view('livewire.user-search',compact('users'));
   
        }

        public function delete($id)
        {
            $post = User::find($id);
            $post->delete();
        }


}
