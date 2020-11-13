<div class="flex p-4 {{ $loop->last ? '' : 'border-b border-gray-400' }}">
    <div class="mr-2 flex-shrink-0">
        <a href="{{ route('profile', $tweet->user) }}">
            <img
                src="{{ $tweet->user->avatar }}"
                alt="Avatar"
                class="rounded-full mr-2"
                width="50"
                height="50"
            >
        </a>
    </div>
    <div>
        <div class="flex justify-between items-center mb-4">
            <div>
                <h5 class="font-bold">
                    <a href="{{ route('profile', $tweet->user) }}">
                        {{ $tweet->user->name }}
                    </a>
                </h5>
            </div>
        </div>

        <div>
            <p class="text-sm mb-2">
                {{ $tweet->body }}
            </p>
        </div>

        <x-like-buttons :tweet="$tweet"></x-like-buttons>
    </div>
</div>

