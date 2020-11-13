@if(current_user()->isNot($user))
    <form method="POST" action="{{ route('follow', $user->username) }}">
        @csrf
        <button type="submit" class="bg-blue-800 rounded-lg py-2 px-4 shadow text-white text-xs">
            {{ current_user()->isFollowing($user) ? 'Unfollow Me' : 'Follow Me'}}
        </button>
    </form>
@endif
