<div class="border border-blue-800 rounded-lg px-8 py-6 mb-8">
    <form action="/tweets" method="post">
        @csrf

        <textarea name="body" class="w-full text-black rounded-lg" placeholder="What's up doc?" rows="5"></textarea>

        <hr class="my-4">

        <footer class="flex justify-between items-center">
            <img
                src="{{ current_user()->avatar }}"
                alt="Avatar"
                class="rounded-full mr-2"
                width="50"
                height="50"
            >

            <button type="submit" name="Submit"
                    class="bg-blue-800 hover:bg-blue-700 rounded-full px-8 py-4 shadow-lg text-white">
                Submit
            </button>
        </footer>
    </form>

    @error('body')
        <p class="text-red-500 text-sm mt-2">
            {{ $message }}
        </p>
    @enderror
</div>
