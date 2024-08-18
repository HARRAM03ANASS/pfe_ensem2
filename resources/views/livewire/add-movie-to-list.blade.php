<div>
    <button wire:click="toggleLists" class="text-white p-2 rounded-lg bg-gray-800 hover:bg-gray-700 transition-colors">
        <i class="fa-solid fa-list"></i>
    </button>

    @if ($showLists)
        <ul>
            @foreach ($lists as $list)
                <li>
                    <button wire:click="addToList({{ $list->id }})">{{ $list->name }}</button>
                </li>
            @endforeach
        </ul>
    @endif

    @if (session()->has('message'))
        <div>{{ session('message') }}</div>
    @endif
</div>
