<x-app>
    <header class="mb-6 relative">
        <div class="relative">
            <img
                src="https://loremflickr.com/700/233"
                alt="Banner"
                class="mb-2 rounded-xl"
                width="700"
                height="233"
            >

            <img
                src="{{ $user->avatar }}"
                alt="Avatar"
                class="rounded-full mr-2 absolute bottom-0 transform -translate-x-1/2 translate-y-1/2"
                style="left: 50%"
                width="150"
            >
        </div>

        <div class="flex justify-between items-center mb-6">
            <div style="max-width: 270px">
                <h2 class="font-bold text-2xl mb-1">{{ $user->name }}</h2>
                <p class="text-sm">Joined: {{ $user->created_at->diffForHumans() }}</p>
            </div>

            <div class="flex">
                @can('edit', $user)
                    <a href="{{ $user->path('edit') }}"
                       class="bg-blue-500 rounded-lg py-2 px-4 shadow text-white text-xs mr-2">
                        Edit Profile
                    </a>
                @endcan
                <x-follow-button :user="$user"></x-follow-button>
            </div>
        </div>

        <p class="text-sm">
            The name’s Bugs. Bugs Bunny. Don’t wear it out. Bugs is an anthropomorphic gray
            and white rabbit or hare who is famous for his flippant, insouciant personality.
            He is also characterized by a Brooklyn accent, his portrayal as a trickster,
            and his catch phrase "Eh...What's up, doc?"
        </p>
    </header>

    @include('_timeline', [
     'tweets' => $tweets
    ])
</x-app>

