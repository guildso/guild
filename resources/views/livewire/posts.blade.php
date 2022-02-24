<div>
    <div wire:poll.10s>
        @foreach($posts as $post)
            <div class="w-full">
                <div class="relative w-full max-w-4xl p-5 overflow-hidden border-t border-b border-gray-100 dark:border-gray-800 shadow-sm">
                    <div class="flex flex-col items-start justify-start">
                            <div class="flex items-center mr-2">
                                <img src="{{ $post->user->profile_photo_url }}" alt="avatar" class="hidden object-cover w-10 h-10 rounded-full sm:block">
                                <div class="ml-2 text-gray-500 dark:text-gray-300">
                                    <div class="flex items-center space-x-2">
                                        <p class="font-bold text-gray-700 dark:text-gray-300">{{ $post->user->name }}</p>
                                        <p class="text-xs font-light text-gray-600 dark:text-gray-400">{{ $post->created_at->format('F jS h:i A') }}</p>
                                    </div>
                                    <p class="text-gray-600 dark:text-gray-400">
                                        {!! Markdown::convertToHtml($post->body) !!}
                                    </p>
                                </div>
                            </div>
                    </div>

                    @if(auth()->user()->id === $post->user_id)
                        <a wire:click.prevent="delete({{ $post->id }})" role="button" href="#"
                            class="absolute right-0 hover:underline bg-red-400 text-white text-xs p-0.5 px-2 bottom-0 rounded-tl-lg">Delete
                        </a>
                    @endif
                </div>
            </div>
        @endforeach
    </div>
</div>

<script type="text/javascript">
    window.onscroll = function(ev) {
        if ((window.innerHeight + window.scrollY) >= document.body.offsetHeight) {
            window.livewire.emit('load-more');
        }
    };
</script>
