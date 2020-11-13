<x-app>
    <div>
        @foreach($users as $user)
            <a href="{{ $user->path() }}" class="mb-5 flex items-center border border-blue-800 rounded-lg shadow-lg">
                <img src="{{ $user->avatar }}" alt="{{ $user->username }}'s avatar" width="60" class="rounded-lg mr-4">

                <div>
                    <h4 class="font-bold mb-2">{{ '@' . $user->username }}</h4>
                    <h5 class="text-xs">{{ $user->name }}</h5>
                </div>
            </a>

        @endforeach

        {{ $users->links() }}
    </div>
</x-app>
