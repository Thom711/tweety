<h3 class="font-bold text-xl mb-4">Following</h3>
<ul>
    @forelse(current_user()->follows as $user)
        <li class="{{ $loop->last ? '' : 'mb-4' }}">
            <div class="flex items-center text-sm">
                <a href="{{ route('profile', $user) }}">
                    <img
                        src="{{ $user->avatar }}"
                        alt="Avatar"
                        class="rounded-full mr-2"
                        width="40"
                        height="40"
                    >
                </a>
                <a href="{{ route('profile', $user) }}">
                    {{ $user->name }}
                </a>
            </div>
        </li>
    @empty
        <li class="p-4">No friends yet.</li>
    @endforelse
</ul>
