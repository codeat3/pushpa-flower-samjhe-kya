<div class="my-2 flex justify-between">
    @if(! empty($dialogue->previous()))
        <a href="{{ $dialogue->previous()->link }}" class="px-4 bg-gray-200 underline rounded-md border border-gray-400">Prev</a>
    @else
        <span class="px-4 bg-gray-200 text-gray-400 rounded-md border border-gray-400">Prev</span>
    @endif
    <a href="/random" class="px-4 bg-gray-200 underline rounded-md border border-gray-400">Random</a>
    @if(! empty($dialogue->next()))
        <a href="{{ $dialogue->next()->link }}" class="px-4 bg-gray-200 underline rounded-md border border-gray-400">Next</a>
    @else
        <span class="px-4 bg-gray-200 text-gray-400 rounded-md border border-gray-400">Next</span>
    @endif
</div>
