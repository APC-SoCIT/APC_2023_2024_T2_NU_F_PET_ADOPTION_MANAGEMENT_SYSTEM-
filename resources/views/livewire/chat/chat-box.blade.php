<div x-data="{ height: 0, conversationElement: document.getElementById('conversation') }" x-init="height = conversationElement.scrollHeight;
$nextTick(() => conversationElement.scrollTop = height);"
    @scroll-bottom.window="$nextTick(()=>conversationElement.scrollTop= height);">
    <main>
        <div class="scroll-smooth overflow-auto h-customHeight" id="conversation" x-ref="conversation">
            @if ($selectedConversation)
                <div @class([
                    'flex mb-4',
                    'justify-start' => !($selectedConversation->sender_id === auth()->id()),
                    'justify-end' => $selectedConversation->sender_id === auth()->id(),
                ])>
                    <div @class([
                        'flex items-center',
                        'hidden' => $selectedConversation->sender_id === auth()->id(),
                    ])>
                        <div class="flex justify-center items-center">
                            <img src="{{ asset('storage/' . $selectedConversation->user->profile_image) }}" alt='user profile'
                                class="object-cover h-8 w-8 rounded-full" />
                        </div>
                        <div @class([
                            'ml-2 py-3 px-4 bg-gray-400 rounded-br-3xl rounded-tr-3xl rounded-tl-xl text-white',
                        ])>
                            <div class="grid grid-row">
                                <span class="flex justify-start">{{ $selectedConversation->content }} </span>
                                <span
                                    class="flex justify-start text-xs">{{ $selectedConversation->created_at->format('h:i a') }}</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div @class([
                    'flex mb-4',
                    'justify-start' => !($selectedConversation->sender_id === auth()->id()),
                    'justify-end' => $selectedConversation->sender_id === auth()->id(),
                ])>
                    <div @class([
                        'flex items-center',
                        'hidden' => !($selectedConversation->sender_id === auth()->id()),
                    ])>
                        <div @class([
                            'mr-2 py-3 px-4 bg-blue-400 rounded-bl-3xl rounded-tl-3xl rounded-tr-xl text-white admin_reply',
                        ])>
                            <div class="grid grid-row">
                                <span class="flex justify-end">{{ $selectedConversation->content }} </span>
                                <span
                                    class="flex justify-end text-xs">{{ $selectedConversation->created_at->format('h:i a') }}</span>
                            </div>
                        </div>
                        <img src="{{ asset('storage/' . auth()->user()->profile_image) }}" alt='user profile'
                            class="object-cover h-8 w-8 rounded-full" />
                    </div>
                </div>
            @endif

            @if ($loadedMessages)

                @foreach ($loadedMessages as $message)
                    <div @class([
                        'flex mb-4',
                        'justify-start' => !($message->sender_id === auth()->id()),
                        'justify-end' => $message->sender_id === auth()->id(),
                    ])>
                        <div @class([
                            'flex items-center',
                            'hidden' => $message->sender_id === auth()->id(),
                        ])>
                            <div class="flex justify-center items-center">
                                <img src="{{ asset('storage/' . $message->user->profile_image) }}" alt='user profile'
                                    class="object-cover h-8 w-8 rounded-full" />
                            </div>
                            <div @class([
                                'ml-2 py-3 px-4 bg-gray-400 rounded-br-3xl rounded-tr-3xl rounded-tl-xl text-white',
                            ])>
                                <div class="grid grid-row">
                                    <span class="flex justify-start">{{ $message->content }} </span>
                                    <span
                                        class="flex justify-start text-xs">{{ $message->created_at->format('h:i a') }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div @class([
                        'flex mb-4',
                        'justify-start' => !($message->sender_id === auth()->id()),
                        'justify-end' => $message->sender_id === auth()->id(),
                    ])>
                        <div @class([
                            'flex items-center',
                            'hidden' => !($message->sender_id === auth()->id()),
                        ])>
                            <div @class([
                                'mr-2 py-3 px-4 bg-blue-400 rounded-bl-3xl rounded-tl-3xl rounded-tr-xl text-white admin_reply',
                            ])>
                                <div class="grid grid-row">
                                    <span class="flex justify-end">{{ $message->content }} </span>
                                    <span
                                        class="flex justify-end text-xs">{{ $message->created_at->format('h:i a') }}</span>
                                </div>
                            </div>
                            <img src="{{ asset('storage/' . auth()->user()->profile_image) }}" alt='user profile'
                                class="object-cover h-8 w-8 rounded-full" />
                        </div>
                    </div>
                @endforeach

            @endif
        </div>
    </main>

    <form x-data="{ body: @entangle('body') }" @submit.prevent="$wire.sendMessage" method="POST">
        @csrf
        <div class="flex flex-row items-center h-16 rounded-xl w-full">
            <div>
                <button class="flex items-center justify-center text-gray-400 hover:text-gray-600">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M15.172 7l-6.586 6.586a2 2 0 102.828 2.828l6.414-6.586a4 4 0 00-5.656-5.656l-6.415 6.585a6 6 0 108.486 8.486L20.5 13">
                        </path>
                    </svg>
                </button>
            </div>
            <div class="flex-grow ml-4">
                <div class="relative w-full">
                    <input type="text" x-model="body" required placeholder="Write"
                        class="flex w-full border rounded-xl focus:outline-none focus:border-indigo-300 pl-4 h-10" />
                    <button
                        class="absolute flex items-center justify-center h-full w-12 right-0 top-0 text-gray-400 hover:text-gray-600">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M14.828 14.828a4 4 0 01-5.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z">
                            </path>
                        </svg>
                    </button>
                </div>
            </div>
            <div class="ml-4">
                <button type="submit"
                    class="flex items-center justify-center bg-indigo-500 hover:bg-indigo-600 rounded-xl text-white px-4 py-1 flex-shrink-0">
                    <span>Send</span>
                    <span class="ml-2">
                        <svg class="w-4 h-4 transform rotate-45 -mt-px" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"></path>
                        </svg>
                    </span>
                </button>
            </div>
        </div>
    </form>
    @error('body')
        <p>{{ $message }}</p>
    @enderror
</div>
