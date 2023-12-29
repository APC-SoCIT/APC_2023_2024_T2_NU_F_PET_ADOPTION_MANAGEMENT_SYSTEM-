<x-app-layout>
    <x-slot name="title">Adoption Form Page</x-slot>
    @include('admin_top_navbar.user_top_navbar')

    @include('sidebars.user_sidebar')

    <section class="sm:ml-64 mb-5 dark:bg-gray-900 p-2 antialiased">
        @if($pets && is_object($pets))

        <div class = "flex gap-2  py-4 px-10">

            <a href = "{{ route('user.dashboard') }}" class = "text-lg hover:font-bold hover:cursor-pointer hover:text-red-500">Home</a>
            <p class = "text-lg">>></p>
            <a href = "{{ route('user.pet', $pets->id) }}"class=" hover:text-red-500 font-bold text-lg">{{$pets->pet_name}}</a>
            <p class = "text-lg">>></p>
            <h2 class="font-bold text-lg text-red-500">Adoption Form</h2>
        </div>

        <div class="flex justify-center items-center">
        <div class="grid grid-cols-1 lg:grid-cols-2 px-4 py-4">
            <div class = "bg-white p-10 max-w-2xl shadow-lg rounded-2xl items-center justify-center flex">
            <form method="POST" action="{{ route('send.form') }}" class="max-w-lg">
                @csrf
                <div id="section1" class="block">
                    <h1 class="text-xl font-bold text-left">Fill out your answers down below</h1>
                    <p class = "font-bold">Part 1 </p>  
                    <div class = "mt-2">
                        <x-input-label for="social_media" :value="__('Social Media (FB/IG/Twitter)')" />
                        <x-text-input id="social_media" class="block mt-1 w-full" type="text" name="social_media" :value="old('social_media')" required autocomplete="social_media" />
                        
                    </div>
                    <div class = "mt-2">
                        <x-input-label for="prompted" :value="__('What prompted you to adopt from us?')" />
                        <x-select id="prompted" name="prompted" :value="old('prompted')" required autocomplete="prompted">
                            <option selected>Friends</option>
                            <option value="Website">Website</option>
                            <option value="Social Media">Social Media</option>
                            <option value="Other">Other</option>
                        </x-select>
                    </div>
                    <div class = "mt-2">
                        <x-input-label for="adopted_before" :value="__('Have you adopted from us before?')" />
                        <x-select id="adopted_before" name="adopted_before" :value="old('adopted_before')" required autocomplete="adopted_before">
                            <option selected>Yes</option>
                            <option value="Yes">Yes</option>
                            <option value="No">No</option>
                        </x-select>
                    </div>
                    <div class = "mt-2 ">
                        <x-input-label for="for_whom" :value="__('For whom are you adopting a pet?')" />
                        <x-select id="for_whom" name="for_whom" :value="old('for_whom')" required autocomplete="for_whom">
                            <option selected>For Myself</option>
                            <option value="For Myself">For Myself</option>
                            <option value="For Someone Else">For Someone Else</option>
                        </x-select>
                    </div>
                    <div class = "mt-2">
                        <x-input-label for="children" :value="__('Are there children below 18 in your house?')" />
                        <x-select id="children" name="children" :value="old('children')" required autocomplete="children">
                            <option selected>Yes</option>
                            <option value="Yes">Yes</option>
                            <option value="No">No</option>
                        </x-select>
                    </div>
                      
                    <div class = "mt-2">
                        <x-input-label for="other_pets" :value="__('Do you have other pets?')" />
                        <x-select id="other_pets" name="other_pets" :value="old('other_pets')" required autocomplete="other_pets">
                            <option selected>Yes</option>
                            <option value="Yes">Yes</option>
                            <option value="No">No</option>
                        </x-select>
                    </div>
                    <div class = "mt-2">
                        <x-input-label for="pets_past" :value="__('Have you had pets in the past?')" />
                        <x-select id="pets_past" name="pets_past" :value="old('pets_past')" required autocomplete="pets_past">
                            <option selected>Yes</option>
                            <option value="Yes">Yes</option>
                            <option value="No">No</option>
                        </x-select>
                       
                    </div>
                    <div class = "mt-2">
                        <x-input-label for="live_with" :value="__('Who else do you live with?')" />
                        <x-select id="live_with" name="live_with" :value="old('live_with')" required autocomplete="live_with">
                            <option selected>Spouse</option>
                            <option value="Spouse">Spouse</option>
                            <option value="Parents">Parents</option>
                            <option value="Roommates">Roommates</option>
                            <option value="Others">Others</option>
                        </x-select>
                    </div>
                    <div class = "mt-2">
                        
                        <x-input-label for="allergic" :value="__('Are any members of your house hold allergic to animals?')" />
                        <x-select id="allergic" name="allergic" :value="old('allergic')" required autocomplete="allergic">
                            <option selected>Yes</option>
                            <option value="Yes">Yes</option>
                            <option value="No">No</option>
                        </x-select>
                    
                    </div>
                    <div class = "mt-2">
                        <x-input-label for="responsible" :value="__('Who will be responsible for feeding, grooming, and generally caring of your pet?')" />
                        <x-text-input id="responsible" class="block mt-1 w-full" type="text" name="responsible" :value="old('responsible')" required autocomplete="responsible" />
                    </div>
                    <div class = "mt-2">
                        <x-input-label for="financially" :value="__('Who will be financially responsible for your pets needs (i.e food,vet,bills,etc)?')" />
                        <x-text-input id="financially" class="block mt-1 w-full" type="text" name="financially" :value="old('financially')" required autocomplete="financially" />
                    </div>
                
                    <div class = "mt-3">
                    <x-primary-button type="button" onclick="showSection(1, 2)">Next</x-primary-button>
                    </div>
                </div>


                <div id="section2" class="hidden">
                    <h1 class="text-xl font-bold text-left">Fill out your answers down below</h1>
                    <p class = "font-bold">Part 2</p>
                   
                    <div class = "mt-2">
                        <x-input-label for="look_after" :value="__('Who will look after your pet if you go on vacation or in case of emergency?
                        ')" />
                        <x-text-input id="look_after" class="block mt-1 w-full" type="text" name="look_after" :value="old('look_after')" required autocomplete="look_after" />
                    </div>

                    <div class = "mt-2">
                        <x-input-label for="many_hours" :value="__('How many hours in an average work day will your pet be left alone?
                        ')" />
                        <x-text-input id="many_hours" class="block mt-1 w-full" type="text" name="many_hours" :value="old('many_hours')" required autocomplete="many_hours" />

                    </div>
                    <div class = "mt-2">
                        <x-input-label for="support_decision" :value="__('Does everyone in the family support your decision to adopt a pet?
                        ')" />
                        <x-text-input id="support_decision" class="block mt-1 w-full" type="text" name="support_decision" :value="old('support_decision')" required autocomplete="support_decision" />
                    </div>
                    <div class = "mt-2">
                        <x-input-label for="steps" :value="__('What steps will you take to familiarize your new pet with his/her new surrounding?
                        ')" />
                        <x-text-input id="steps" class="block mt-1 w-full" type="text" name="steps" :value="old('steps')" required autocomplete="steps" />
                    </div>
                    <div class = "mt-2">
                        <x-input-label for="home" :value="__('What type of building do you live in?
                        ')" />
                        <x-select id="home" name="home" :value="old('home')" required autocomplete="home">
                            <option selected>House</option>
                            <option value="Apartment">Apartment</option>
                            <option value="Condo">Condo</option>
                            <option value="House">House</option>
                            <option value="Other">Other</option>
                        </x-select>
                        
                    </div>
                    <div class = "mt-2">
                        <x-input-label for="rent" :value="__('Do you rent?
                        ')" />
                        <x-select id="rent" name="rent" :value="old('rent')" required autocomplete="rent">
                            <option selected>Yes</option>
                            <option value="Yes">Yes</option>
                            <option value="No">No</option>
                        </x-select>
                     
                    </div>
                    <div class = "mt-2">
                        <x-input-label for="happens" :value="__('What happens to your pet if or when you move?
                        ')" />
                        <x-text-input id="happens" class="block mt-1 w-full" type="text" name="happens" :value="old('happens')" required autocomplete="happens" />
                       
                    </div>
                        @if($pets->pet_type === 'Dog')
                            <div class = "mt-2">
                                
                                <x-input-label for="fenced_yard" :value="__('Do you have a fenced yard?                            ')" />
                                <x-select id="fenced_yard" name="fenced_yard" :value="old('fenced_yard')" required autocomplete="fenced_yard">
                                    <option selected>Yes</option>
                                    <option value="Yes">Yes</option>
                                    <option value="No">No</option>
                                </x-select>
                            
                            </div>
                            <div class = "mt-2">
                                <x-input-label for="spend" :value="__('How much time will your dog spend in the yard?
                                ')" />
                                <x-text-input id="spend" class="block mt-1 w-full" type="text" name="spend" :value="old('spend')" required autocomplete="spend" />
        
                            </div>
                            <div class = "mt-2">
                                <x-input-label for="train" :value="__('Are you prepared to walk and potty train your dog?                            ')" />
                                <x-select id="train" name="train" :value="old('train')" required autocomplete="train">
                                    <option selected>Yes</option>
                                    <option value="Yes">Yes</option>
                                    <option value="No">No</option>
                                </x-select>
        
                            </div>
                            <div class = "mt-2">
                                <x-input-label for="chewing" :value="__('Are you prepared to manage chewing, marking, excessive barking, etc?
                                ')" />
                                <x-select id="chewing" name="chewing" :value="old('chewing')" required autocomplete="chewing">
                                    <option selected>Yes</option>
                                    <option value="Yes">Yes</option>
                                    <option value="No">No</option>
                                </x-select>
                            </div>
                        @elseif($pets->pet_type === 'Cat')
                            <div class = "mt-2">
                                    
                                <x-input-label for="fenced_yard" :value="__('Can your cat get out of the house?                        ')" />
                                <x-select id="fenced_yard" name="fenced_yard" :value="old('fenced_yard')" required autocomplete="fenced_yard">
                                    <option selected>Yes</option>
                                    <option value="Yes">Yes</option>
                                    <option value="No">No</option>
                                </x-select>
                            
                            </div>
                            <div class = "mt-2">
                                <x-input-label for="spend" :value="__('Where will the litter box be located?
                                ')" />
                                <x-text-input id="spend" class="block mt-1 w-full" type="text" name="spend" :value="old('spend')" required autocomplete="spend" />
        
                            </div>
                            <div class = "mt-2">
                                <x-input-label for="train" :value="__('Are you prepared for the unpleasant odor of cat feces?                            ')" />
                                <x-select id="train" name="train" :value="old('train')" required autocomplete="train">
                                    <option selected>Yes</option>
                                    <option value="Yes">Yes</option>
                                    <option value="No">No</option>
                                </x-select>
        
                            </div>
                            <div class = "mt-2">
                                <x-input-label for="chewing" :value="__('Are you prepared to manage furniture sratching, climbing, and shedding?
                                ')" />
                                <x-select id="chewing" name="chewing" :value="old('chewing')" required autocomplete="chewing">
                                    <option selected>Yes</option>
                                    <option value="Yes">Yes</option>
                                    <option value="No">No</option>
                                </x-select>
                            </div>
                        @endif
                    <div class = "flex gap-2 mt-3">
                        <x-primary-button type="button" onclick="showSection(2, 1)" class="bg-blue-500 text-white px-4 py-2 rounded mr-2">Previous</x-primary-button>
                        <x-primary-button type="button" onclick="showSection(2, 3)" class="bg-blue-500 text-white px-4 py-2 rounded">Next</x-primary-button>
                    </div>
                   
            
                </div>
                <div id="section3" class="hidden">
                    <h1 class="text-xl font-bold text-left">Fill out your answers down below</h1>
                    <p class = "font-bold">Part 3</p>
                        <div class="px-4 py-3">
                            <div id="image-preview" class="max-w-sm p-6 mb-4 bg-gray-100 border-dashed border-2 border-gray-400 rounded-lg items-center mx-auto text-center cursor-pointer">
                                <input id="upload" type="file" class="hidden" accept="image/*" />
                                <label for="upload" class="cursor-pointer">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-8 text-gray-700 mx-auto mb-4">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M3 16.5v2.25A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75V16.5m-13.5-9L12 3m0 0l4.5 4.5M12 3v13.5" />
                                </svg>
                                <h5 class="mb-2 text-xl font-bold tracking-tight text-gray-700">Upload your Valid ID</h5>
                                <p class="font-normal text-sm text-gray-400 md:px-6">Choose photo size should be less than <b class="text-gray-600">2mb</b></p>
                                <p class="font-normal text-sm text-gray-400 md:px-6">and should be in <b class="text-gray-600">JPG, PNG, or GIF</b> format.</p>
                                <span id="filename" class="text-gray-500 bg-gray-200 z-50"></span>
                                </label>
                            </div>
                        </div>

                        <div class="px-4 py-3">
                            <div id="image-preview2" class="max-w-sm p-6 mb-4 bg-gray-100 border-dashed border-2 border-gray-400 rounded-lg items-center mx-auto text-center cursor-pointer">
                                <input id="upload2" type="file" class="hidden" accept="image/*" />
                                <label for="upload2" class="cursor-pointer">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-8 text-gray-700 mx-auto mb-4">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M3 16.5v2.25A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75V16.5m-13.5-9L12 3m0 0l4.5 4.5M12 3v13.5" />
                                </svg>
                                <h5 class="mb-2 text-xl font-bold tracking-tight text-gray-700">Upload your Signature</h5>
                                <p class="font-normal text-sm text-gray-400 md:px-6">Choose photo size should be less than <b class="text-gray-600">2mb</b></p>
                                <p class="font-normal text-sm text-gray-400 md:px-6">and should be in <b class="text-gray-600">JPG, PNG, or GIF</b> format.</p>
                                <span id="filename2" class="text-gray-500 bg-gray-200 z-50"></span>
                                </label>
                            </div>
                        </div>
                        
                    <div class = "flex gap-2 mt-3">
                        <x-primary-button type="button" onclick="showSection(3, 2)" >Previous</x-primary-button>
                        <x-primary-button type="submit" >Submit</x-primary-button>
                    </div>
                </div>
                {{-- <button type="submit" class="my-4 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button> --}}
            </form>
            </div>

            <div>
                <div class="grid grid-cols-1 p-5   ">
                    <div class="flex justify-center">
                        <div class="overflow-hidden bg-white w-full lg:w-10/12 rounded-t-2xl">
                            <img src="{{ asset('storage/images/' . $pets->dropzone_file) }}" class=" w-full object-cover"  style ="max-height: 30em"/>
                            <div class="flex justify-center -mt-11">
                                <div class="rounded-2xl p-5 w-4/5 -mt-3 w-423.355 h-24 rotate-[-0.205deg] p-21.892 flex-col items-center gap-17.513 flex-shrink-0 border-26.27 bg-[rgba(255,255,255,0.40)] shadow-[0px 5.473px 43.784px 0px rgba(0,0,0,0.05)] backdrop-blur-[27.364822387695312px]">
                                    <div class="flex justify-between items-center">
                                        <div>
                                            <p class="text-base lg:text-xl font-bold">{{ $pets->pet_name }}</p>	
                                            <p class="text-base">{{ $pets->breed }} · {{ $pets->age }}yr</p>
                                        </div>
                                        <div class = "bg-green-700 p-3 rounded-lg text-white">
                                            <svg xmlns="http://www.w3.org/2000/svg" height="30" width="30" viewBox="0 0 384 512">
                                                <path fill ="currentColor" d="M80 176a112 112 0 1 1 224 0A112 112 0 1 1 80 176zM224 349.1c81.9-15 144-86.8 144-173.1C368 78.8 289.2 0 192 0S16 78.8 16 176c0 86.3 62.1 158.1 144 173.1V384H128c-17.7 0-32 14.3-32 32s14.3 32 32 32h32v32c0 17.7 14.3 32 32 32s32-14.3 32-32V448h32c17.7 0 32-14.3 32-32s-14.3-32-32-32H224V349.1z"/>
                                            </svg>
                                        </div>	
                                    </div>
                                </div>
                            </div>
                            <div class="px-12  pt-2">
                                <div class = "flex gap-2 py-3">
                                    <svg xmlns="http://www.w3.org/2000/svg" height="25" width="25" viewBox="0 0 512 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2023 Fonticons, Inc.-->
                                        <path fill = "currentColor" d="M226.5 92.9c14.3 42.9-.3 86.2-32.6 96.8s-70.1-15.6-84.4-58.5s.3-86.2 32.6-96.8s70.1 15.6 84.4 58.5zM100.4 198.6c18.9 32.4 14.3 70.1-10.2 84.1s-59.7-.9-78.5-33.3S-2.7 179.3 21.8 165.3s59.7 .9 78.5 33.3zM69.2 401.2C121.6 259.9 214.7 224 256 224s134.4 35.9 186.8 177.2c3.6 9.7 5.2 20.1 5.2 30.5v1.6c0 25.8-20.9 46.7-46.7 46.7c-11.5 0-22.9-1.4-34-4.2l-88-22c-15.3-3.8-31.3-3.8-46.6 0l-88 22c-11.1 2.8-22.5 4.2-34 4.2C84.9 480 64 459.1 64 433.3v-1.6c0-10.4 1.6-20.8 5.2-30.5zM421.8 282.7c-24.5-14-29.1-51.7-10.2-84.1s54-47.3 78.5-33.3s29.1 51.7 10.2 84.1s-54 47.3-78.5 33.3zM310.1 189.7c-32.3-10.6-46.9-53.9-32.6-96.8s52.1-69.1 84.4-58.5s46.9 53.9 32.6 96.8s-52.1 69.1-84.4 58.5z"/>
                                    </svg>
                                    <h3 class="text-xl font-extrabold ">About {{ $pets->pet_name }}</h3>
                                </div>
                                <div class = "max-w-40">
                                    <p class="text-lg font-light py-3" style="overflow-wrap: break-word;">{{ $pets->description }}</p>
                                </div>
                                <div class = "grid grid-cols-1 lg:grid-cols-3 gap-4">
                                    <div class = "bg-green-100 p-4  rounded-2xl">
                                        <h1>Weight</h1>
                                        <h1 class = " text-xl font-extrabold">{{ $pets->weight }}kg</h1>
                                    </div>
                                    <div class = "bg-green-100 p-4  rounded-2xl">
                                        <h1 class =>Size</h1>
                                        <h1 class = " text-xl font-extrabold">{{ $pets->size }}</h1>
                                    </div>
                                    <div class = "bg-green-100 p-4 rounded-2xl">
                                        <h1>Color</h1>
                                        <h1 class = " text-xl font-extrabold">{{ $pets->color }}</h1>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                    </div>
    
                    <div class="flex  justify-center">
                        <div class = "bg-white overflow-hidden w-full pt-3 lg:w-10/12 rounded-b-2xl ">
                            <div class = "flex  lg:justify-start justify-center gap-2 lg:pl-12  p-3">
                                <svg xmlns="http://www.w3.org/2000/svg" height="25" width="25" viewBox="0 0 512 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2023 Fonticons, Inc.-->
                                    <path fill = "currentColor" d="M226.5 92.9c14.3 42.9-.3 86.2-32.6 96.8s-70.1-15.6-84.4-58.5s.3-86.2 32.6-96.8s70.1 15.6 84.4 58.5zM100.4 198.6c18.9 32.4 14.3 70.1-10.2 84.1s-59.7-.9-78.5-33.3S-2.7 179.3 21.8 165.3s59.7 .9 78.5 33.3zM69.2 401.2C121.6 259.9 214.7 224 256 224s134.4 35.9 186.8 177.2c3.6 9.7 5.2 20.1 5.2 30.5v1.6c0 25.8-20.9 46.7-46.7 46.7c-11.5 0-22.9-1.4-34-4.2l-88-22c-15.3-3.8-31.3-3.8-46.6 0l-88 22c-11.1 2.8-22.5 4.2-34 4.2C84.9 480 64 459.1 64 433.3v-1.6c0-10.4 1.6-20.8 5.2-30.5zM421.8 282.7c-24.5-14-29.1-51.7-10.2-84.1s54-47.3 78.5-33.3s29.1 51.7 10.2 84.1s-54 47.3-78.5 33.3zM310.1 189.7c-32.3-10.6-46.9-53.9-32.6-96.8s52.1-69.1 84.4-58.5s46.9 53.9 32.6 96.8s-52.1 69.1-84.4 58.5z"/>
                                </svg>
                                <h3 class="text-xl font-extrabold ">Adoption Status</h3>
                            </div>
                            <div class ="flex lg:pl-12   lg:justify-start justify-center">
                            <div class = "bg-green-100 py-2 px-10 rounded-2xl text-center" >
                                <h1 class = "text-xl font-bold text-green-700">Available</h1>
                            </div>
                            </div>
                            <div class = "flex lg:pl-12 lg:justify-start justify-center gap-2 p-5">
                                <svg xmlns="http://www.w3.org/2000/svg" height="25" width="25" viewBox="0 0 512 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2023 Fonticons, Inc.-->
                                    <path fill = "currentColor" d="M226.5 92.9c14.3 42.9-.3 86.2-32.6 96.8s-70.1-15.6-84.4-58.5s.3-86.2 32.6-96.8s70.1 15.6 84.4 58.5zM100.4 198.6c18.9 32.4 14.3 70.1-10.2 84.1s-59.7-.9-78.5-33.3S-2.7 179.3 21.8 165.3s59.7 .9 78.5 33.3zM69.2 401.2C121.6 259.9 214.7 224 256 224s134.4 35.9 186.8 177.2c3.6 9.7 5.2 20.1 5.2 30.5v1.6c0 25.8-20.9 46.7-46.7 46.7c-11.5 0-22.9-1.4-34-4.2l-88-22c-15.3-3.8-31.3-3.8-46.6 0l-88 22c-11.1 2.8-22.5 4.2-34 4.2C84.9 480 64 459.1 64 433.3v-1.6c0-10.4 1.6-20.8 5.2-30.5zM421.8 282.7c-24.5-14-29.1-51.7-10.2-84.1s54-47.3 78.5-33.3s29.1 51.7 10.2 84.1s-54 47.3-78.5 33.3zM310.1 189.7c-32.3-10.6-46.9-53.9-32.6-96.8s52.1-69.1 84.4-58.5s46.9 53.9 32.6 96.8s-52.1 69.1-84.4 58.5z"/>
                                </svg>
                                <h3 class="text-xl font-extrabold ">Vaccination Status</h3>
                            </div>
                            <div class ="flex lg:pl-12  lg:justify-start justify-center">
                            <div class = "bg-green-100 py-2 px-10 rounded-2xl text-center">
                                <h1 class = "text-xl font-bold text-green-700">Fully Vaccinated</h1>
                            </div>
                            </div>
                            <div class = "flex lg:pl-12  lg:justify-start justify-center gap-2 p-5">
                                <svg xmlns="http://www.w3.org/2000/svg" height="25" width="25" viewBox="0 0 512 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2023 Fonticons, Inc.-->
                                    <path fill = "currentColor" d="M226.5 92.9c14.3 42.9-.3 86.2-32.6 96.8s-70.1-15.6-84.4-58.5s.3-86.2 32.6-96.8s70.1 15.6 84.4 58.5zM100.4 198.6c18.9 32.4 14.3 70.1-10.2 84.1s-59.7-.9-78.5-33.3S-2.7 179.3 21.8 165.3s59.7 .9 78.5 33.3zM69.2 401.2C121.6 259.9 214.7 224 256 224s134.4 35.9 186.8 177.2c3.6 9.7 5.2 20.1 5.2 30.5v1.6c0 25.8-20.9 46.7-46.7 46.7c-11.5 0-22.9-1.4-34-4.2l-88-22c-15.3-3.8-31.3-3.8-46.6 0l-88 22c-11.1 2.8-22.5 4.2-34 4.2C84.9 480 64 459.1 64 433.3v-1.6c0-10.4 1.6-20.8 5.2-30.5zM421.8 282.7c-24.5-14-29.1-51.7-10.2-84.1s54-47.3 78.5-33.3s29.1 51.7 10.2 84.1s-54 47.3-78.5 33.3zM310.1 189.7c-32.3-10.6-46.9-53.9-32.6-96.8s52.1-69.1 84.4-58.5s46.9 53.9 32.6 96.8s-52.1 69.1-84.4 58.5z"/>
                                </svg>
                                <h3 class="text-xl font-extrabold ">{{ $pets->pet_name }}'s Behavior</h3>
                            </div>
                            <div class ="flex lg:pl-12 pb-5  lg:justify-start justify-center">
                            <div class = "py-2 px-10  rounded-2xl border-2 border-green-400 text-center">
                                <h1 class = "text-xl font-bold ">Fully Vaccinated</h1>
                            </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
              
            </div>
        </div>
        </div>
        @else
            <p>No pet found</p>
        @endif
    </section>


    
</x-app-layout>
