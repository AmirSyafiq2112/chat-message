<div>
    <ul class="list-group w-75 mx-auto mt-3 container-fluid">
        @foreach($users as $user)
            <li class="list-group-item list-group-item-action bg-dark text-gray-300" wire:click='checkConversation({{$user->id}})'>{{ $user->name }}</li>
        @endforeach
    </ul>
</div>