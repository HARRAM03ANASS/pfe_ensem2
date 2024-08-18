<div>
    @if ($lists->isEmpty())
        <p class="text-white">You have not created any lists yet.</p>
    @else
        <ul class="text-white">
            @foreach ($lists as $list)
                <li>{{ $list->name }}</li>
            @endforeach
        </ul>
    @endif
</div>
