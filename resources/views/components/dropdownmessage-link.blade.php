<!-- x-notifdropdown-link.blade.php -->

@props(['href', 'imageSource', 'name'])

<a href="{{ $href }}"
    class="block w-full px-4 py-2 text-start text-sm leading-5 text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-800 focus:outline-none focus:bg-gray-100 dark:focus:bg-gray-800 transition duration-150 ease-in-out">
    <div class="flex items-center">

        <div class = "flex items-center relative">
            <div
                class="absolute bottom-0 right-0 bg-green-500 text-white rounded-full w-5 h-5 flex items-center justify-center text-xs pointer-events-none">
                <div class="flex items-center justify-center">

                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-3 h-3">
                        <path fill-rule="evenodd"
                            d="M4.804 21.644A6.707 6.707 0 0 0 6 21.75a6.721 6.721 0 0 0 3.583-1.029c.774.182 1.584.279 2.417.279 5.322 0 9.75-3.97 9.75-9 0-5.03-4.428-9-9.75-9s-9.75 3.97-9.75 9c0 2.409 1.025 4.587 2.674 6.192.232.226.277.428.254.543a3.73 3.73 0 0 1-.814 1.686.75.75 0 0 0 .44 1.223ZM8.25 10.875a1.125 1.125 0 1 0 0 2.25 1.125 1.125 0 0 0 0-2.25ZM10.875 12a1.125 1.125 0 1 1 2.25 0 1.125 1.125 0 0 1-2.25 0Zm4.875-1.125a1.125 1.125 0 1 0 0 2.25 1.125 1.125 0 0 0 0-2.25Z"
                            clip-rule="evenodd" />
                    </svg>
                </div>

            </div>


            <!-- Profile image -->
            <img src="{{ $imageSource ?? asset('default_image_url.jpg') }}" alt="Profile Image"
                class="w-10 h-10 rounded-full mr-2">
        </div>


        
        <div class="flex-1 ">
            <div class = "flex-1 ps-1">
            <span class = "font-bold">{{ $name }}</span>
            {{ $slot }}
            </div>
            <p class = "text-xs p-1">3 hours ago</p>
        </div>

        <div class="w-2 h-2 bg-red-500 rounded-full ml-2"></div>
    </div>
</a>