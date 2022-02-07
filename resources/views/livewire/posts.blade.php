<div>
    <div wire:poll.10s>
        @foreach($posts as $post)
            <div class="mt-6">
                <div class="relative max-w-4xl p-5 overflow-hidden bg-white border border-gray-100 rounded-lg shadow-sm">
                    <div class="flex flex-col items-start justify-start">
                            <div class="flex items-center mr-2">
                                <img src="{{ $post->user->profile_photo_url }}" alt="avatar" class="hidden object-cover w-10 h-10 rounded-full sm:block">
                                <div class="ml-2">
                                    <p class="font-bold text-gray-700">{{ $post->user->name }}</p>
                                    <p class="text-xs font-light text-gray-600">{{ $post->created_at->format('F jS h:i A') }}</p>
                                </div>
                            </div>

                    </div>

                    <div class="pt-4 pl-10 mt-4 border-t border-gray-100">
                        <p class="text-gray-600">
                            {!! Markdown::convertToHtml($post->body) !!}
                        </p>
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
