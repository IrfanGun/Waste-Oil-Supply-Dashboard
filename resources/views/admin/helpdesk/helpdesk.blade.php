<x-app-layout>
    <div>
        @forelse ($users as $user)
           <a href="{{ route('admin.pesan', $user->id)}}"><p>{{$user->username}}</p></a>
        @empty
            
        @endforelse
    </div>
    
   
</x-app-layout>