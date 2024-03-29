<x-guest-layout>
    <div class =  "bg-cover  py-10 px-10 lg:px-28" style="background-image: url('{{ asset('images/yellowbg.png') }}');">
        <div class = "animation">
            <h1 class = "text-4xl lg:text-5xl  font-bold text-white text-center">About Us</h1>
            <p class = "md:text-xl text-lg text-white text-center py-2 px-8 lg:px-40">Noah's Ark Dog and Cat Shelter is a volunteer-based non-government organization. Our primary advocacy is to provide shelter and love for unwanted dogs and cats and find them a forever home.


            </p>

            <div id="default-carousel" class="relative w-5/6 mx-auto mt-6" data-carousel="slide">
                <!-- Carousel wrapper -->
                <div class="relative h-56 overflow-hidden rounded-lg md:h-96">
                    <!-- Item 1 -->
                    <div class="hidden duration-700 ease-in-out" data-carousel-item>
                        <img src="{{ asset('images/aboutus1.png') }}"  
                            class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2"
                            alt="...">
                    </div>
                    <!-- Item 2 -->
                    <div class="hidden duration-700 ease-in-out" data-carousel-item>
                        <img src="{{ asset('images/aboutus2.png') }}" 
                            class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2"
                            alt="...">
                    </div>
                    <!-- Item 3 -->
                    <div class="hidden duration-700 ease-in-out" data-carousel-item>
                        <img src="{{ asset('images/aboutus3.png') }}" 
                            class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2"
                            alt="...">
                    </div>
                 
                </div>
                <!-- Slider indicators -->
                <div class="absolute z-30 flex -translate-x-1/2 bottom-5 left-1/2 space-x-3 rtl:space-x-reverse">
                    <button type="button" class="w-3 h-3 rounded-full" aria-current="true" aria-label="Slide 1"
                        data-carousel-slide-to="0"></button>
                    <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 2"
                        data-carousel-slide-to="1"></button>
                    <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 3"
                        data-carousel-slide-to="2"></button>
                    <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 4"
                        data-carousel-slide-to="3"></button>
                    <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 5"
                        data-carousel-slide-to="4"></button>
                </div>
                <!-- Slider controls -->
                <button type="button"
                    class="absolute top-0 start-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
                    data-carousel-prev>
                    <span
                        class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                        <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M5 1 1 5l4 4" />
                        </svg>
                        <span class="sr-only">Previous</span>
                    </span>
                </button>
                <button type="button"
                    class="absolute top-0 end-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
                    data-carousel-next>
                    <span
                        class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                        <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 9 4-4-4-4" />
                        </svg>
                        <span class="sr-only">Next</span>
                    </span>
                </button>
            </div>
        </div>
    </div>
    <div class =  "bg-cover d py-16 px-10 lg:px-28"
        style="background-image: url('{{ asset('images/redbackground.png') }}');">
        <div class = "animation  grid grid-cols-1 md:grid-cols-2 gap-1 lg:px-10 ">
            <div class = "flex flex-col justify-center py-4 md:py-0 ">
                <h1 class = "text-4xl lg:text-5xl  font-bold text-center py-5 md:text-left text-white">Mission</h1>
                <p class = "text-justify md:text-left text-center px-4 md:px-0 text-white text-base md:text-lg ">Noah’s Ark Dog and Cat Shelter works with volunteers to provide a home for stray dogs and cats, give them medical help, and secure their wellness by educating adopters about proper care. With the growing number of abandoned domestic animals every day, our organization advocates for a world where dogs and cats are loved and cared for; thus, ensuring that no more strays will suffer on the streets.


                </p>
            </div>
            <div class = "flex justify-end py-4 md:py-0  ">
                <img class = "lg:max-w-md lg:h-80 max-w-xs h-60 object-cover rounded-xl"
                    src="{{ asset('images/volunteerprogram.jpg') }}" alt="ark">
            </div>

        </div>
        <div class = "animation grid grid-cols-1 md:grid-cols-2 gap-1 lg:px-10">
            <div class = "order-2 md:order-1 py-4 md:py-0">
                <img class = "lg:max-w-md lg:h-80 max-w-xs h-60 object-cover rounded-xl "
                    src="{{ asset('images/vision.jpg') }}" alt="ark">
            </div>
            <div class = "flex flex-col justify-center order-1 md:order-2 py-4  md:py-0">
                <h1 class = "text-4xl lg:text-5xl  font-bold text-center py-5 md:text-right text-white ">Vision</h1>
                <p class = "text-justify md:text-right md:text-lg text-center  px-4 md:px-0 text-white text-base ">
                    A world where all dogs and cats live a wonderful life with their fur parents.


                </p>
            </div>
        </div>

    </div>

    <div class = "animation p-10 lg:p-20">
        <h1 class = "text-4xl lg:text-5xl  font-bold text-center text-red-600">Our Story</h1>
        <p class = "text-justify text-base md:text-lg p-4 lg:py-4 lg:px-40">From simply giving animal donations, now to building an organization herself, Ms. Leah Ibuna founded a Non-Profit/Non-Government Organization for strays called “Noah’s Ark Dog and Cat Shelter'' in September 2018. As Ms. Ibuna witnessed the increasing number of stray dogs and cats in their area in Mabalacat City and especially online, she decided to start rescuing them by giving them a temporary shelter in a borrowed land. However, given the circumstances, it was not easy for Ms. Ibuna to manage the organization alone. It experienced numerous challenges especially at the height of the pandemic when a demolition at Sitio Irung, Barangay Tabun, Mabalacat City took place in July 2021. She had to stop rescuing strays for a while to find a new area in Sitio Irung to build them a proper shelter. 
        </p>
        <p class = "text-justify text-base md:text-lg p-4 lg:py-4 lg:px-40">At that time, the organization has no regular donors to support the needs of the strays, hence, the presence of a financial crisis on Ms. Ibuna’s part. Fortunately, with the help of her friends and neighbors, the operation of Noah’s Ark Dog and Cat Shelter was able to run effectively. Together with the founder’s perseverance and dedication, along with the organization’s compassionate volunteers, they have saved more than a hundred strays and are housing thirty-two (32) rescued cats and dogs at the present. In August 2021, sixteen (16) dogs went home with their new adoptive families, during an adoption event for strays held at SM Telebastagan. 
        </p>
        <div class = " lg:px-40">

            <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                <div class="grid gap-4">
                    <div>
                        <img class="h-auto max-w-full rounded-lg"
                            src="{{ asset('images/pic8.jpg') }}" alt="">
                    </div>
                    <div>
                        <img class="h-auto max-w-full rounded-lg"
                            src="{{ asset('images/pic10.jpg') }}" alt="">
                    </div>
                    <div>
                        <img class="h-auto max-w-full rounded-lg"
                            src="{{ asset('images/pic6.jpg') }}" alt="">
                    </div>
                </div>
                <div class="grid gap-4">
                    <div>
                        <img class="h-auto max-w-full rounded-lg"
                            src="{{ asset('images/pic13.jpg') }}" alt="">
                    </div>
                    <div>
                        <img class="h-auto max-w-full rounded-lg"
                            src="{{ asset('images/pic3.jpg') }}" alt="">
                    </div>
                    <div>
                        <img class="h-auto max-w-full rounded-lg"
                            src="{{ asset('images/pic4.jpg') }}" alt="">
                    </div>
                </div>
                <div class="grid gap-4">
                    <div>
                        <img class="h-auto max-w-full rounded-lg"
                            src="{{ asset('images/pic2.jpg') }}" alt="">
                    </div>
                    <div>
                        <img class="h-auto max-w-full rounded-lg"
                            src="{{ asset('images/pic11.jpg') }}" alt="">
                    </div>
                    <div>
                        <img class="h-auto max-w-full rounded-lg"
                            src="{{ asset('images/pic9.jpg') }}" alt="">
                    </div>
                </div>
                <div class="grid gap-4">
                    <div>
                        <img class="h-auto max-w-full rounded-lg"
                            src="{{ asset('images/pic12.jpg') }}" alt="">
                    </div>
                    <div>
                        <img class="h-auto max-w-full rounded-lg"
                            src="{{ asset('images/pic1.jpg') }}" alt="">
                    </div>
                    <div>
                        <img class="h-auto max-w-full rounded-lg"
                            src="{{ asset('images/pic5.jpg') }}" alt="">
                    </div>
                </div>
            </div>

        </div>
</x-guest-layout>

{{-- dito about us page. Dito mo lagay content --}}
