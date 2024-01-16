<x-app-layout>
    <x-slot name="title">Applications Page</x-slot>
    @include('admin_top_navbar.user_top_navbar')

    @include('sidebars.user_sidebar')

    <section class="sm:ml-64 mb-5 dark:bg-gray-900 p-2 antialiased">
        <div class="mx-auto max-w-screen-2xl px-4 lg:px-12">
            <div class="flex flex-col items-stretch justify-between py-4 dark:border-gray-700">
                <div class="flex items-center justify-between lg:mx-0">
                    <h1 class = "text-2xl text-red-500 font-bold">My Applications</h1>
                </div>
            </div>
            <!-- WEB RESPONSIVENESS TABLE -->
            <div
                class="relative overflow-y-hidden  bg-white overflow-x-hidden flex-col  items-stretch rounded-2xl lg:shadow-lg justify-between lg:px-4 lg:py-6">
                <div
                    class="text-sm font-medium text-center text-gray-500 border-b border-gray-200 dark:text-gray-400 dark:border-gray-700">
                    <ul class="flex flex-wrap -mb-px">
                        <li class="me-2 relative">
                            <a href="{{ route('user.applications') }}" id="allLink"
                                class="inline-block p-4 text-base border-b-2 text-red-500 border-red-600 rounded-t-lg active  flex items-center justify-between">All
                                <span id="all"
                                    class="bg-red-100 ms-1 text-red-600 font-bold flex justify-center items-center rounded-3xl w-2 h-2 p-2 text-center text-sm">{{ $totalApplicationsForUser }}</span>
                            </a>
                        </li>
                        <li class="me-2">
                            <a href="{{ route('user.applications') }}" id="pendingLink"
                                class="inline-block p-4 text-base rounded-t-lg flex items-center justify-between">Pending
                                <span id="pending"
                                    class="hidden ms-1 bg-red-100 text-red-600 font-bold flex justify-center items-center rounded-3xl w-2 h-2 p-2 text-center text-sm">{{ $totalPendingApplicationsForUser + $volunteerPending }}</span>
                            </a>
                        </li>
                        <li class="me-2">
                            <a href="{{ route('user.applications') }}" id="approvedLink"
                                class="inline-block text-base p-4 rounded-t-lg flex items-center justify-between">Approved
                                <span id="approved"
                                    class="hidden ms-1 bg-red-100 text-red-600 font-bold flex justify-center items-center rounded-3xl w-2 h-2 p-2 text-center text-sm
                                ">{{ $approvedApplicationForUser + $volunteerApproved }}
                                </span>
                            </a>
                        </li>
                        <li class="me-2">
                            <a href="{{ route('user.applications') }}" id="rejectedLink"
                                class="inline-block text-base p-4 rounded-t-lg  flex items-center justify-between">Rejected
                                <span id="rejected"
                                    class="hidden ms-1 bg-red-100 text-red-600 font-bold flex justify-center items-center rounded-3xl w-2 h-2 p-2 text-center text-sm">
                                    {{ $rejectedApplicationForUser }}
                                </span>
                            </a>
                        </li>
                    </ul>
                </div>

                <table
                    class=" w-full text-sm text-left text-gray-500 dark:text-gray-400 md:space-x-3 space-y-3 md:space-y-0">
                    <thead
                        class="text-xs lg:contents hidden text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                Date of Application
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Application Type
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Status
                            </th>
                            <th scope="col" class="">
                                Actions
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($answers as $answerData)
                            <tr class="pet-container bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600"
                                id="adoptionDataContainer" data-stage="{{ $answerData->adoption->stage }}">
                                <td class="px-6 py-4  hidden lg:table-cell">
                                    <div class="text-base text-gray-500 ">{{ $answerData->created_at }}</div>
                                </td>
                                <td class="px-6 py-4   lg:table-cell">
                                    <div class="text-base text-gray-500 ">
                                        @if ($answerData->adoption->application->application_type === 'application_form')
                                            Adoption
                                        @else
                                        @endif
                                    </div>
                                </td>
                                <td class="px-6 py-4 lg:table-cell">
                                    @if ($answerData->adoption->stage >= 0 && $answerData->adoption->stage < 9)
                                        <div class="text-yellow-600 w-24 rounded-lg py-1 font-semibold bg-yellow-200">
                                            <p class="text-center">Pending</p>
                                        </div>
                                    @elseif($answerData->adoption->stage == 10)
                                        <div class="text-red-600 w-24 rounded-lg py-1 font-semibold bg-red-200">
                                            <p class="text-center">Rejected</p>
                                        </div>
                                    @else
                                        <div class="text-green-600 w-24 rounded-lg py-1 font-semibold bg-green-200">
                                            <p class="text-center">Accepted</p>
                                        </div>
                                    @endif

                                </td>
                                <td class=" px-6 lg:px-0 items-center lg:gap-1   lg:table-cell">
                                    <a href="{{ route('user.adoptionprogress', ['petId' => $answerData->adoption->pet_id, 'applicationId' => $answerData->adoption->application_id]) }}"
                                        type="button" onclick=""
                                        class="py-2 px-3 text-sm font-medium text-center text-white bg-cyan-400 hover:bg-cyan-600 rounded-lg shadow-md">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                            class="w-4 h-4 ">
                                            <path d="M12 15a3 3 0 100-6 3 3 0 000 6z" />
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="M1.323 11.447C2.811 6.976 7.028 3.75 12.001 3.75c4.97 0 9.185 3.223 10.675 7.69.12.362.12.752 0 1.113-1.487 4.471-5.705 7.697-10.677 7.697-4.97 0-9.186-3.223-10.675-7.69a1.762 1.762 0 010-1.113zM17.25 12a5.25 5.25 0 11-10.5 0 5.25 5.25 0 0110.5 0z" />
                                        </svg>
                                    </a>

                                </td>
                            </tr>
                        @endforeach
                        @if (isset($volunteer) && !$volunteer->isEmpty())
                            <!-- Your foreach loop and table data -->
                            @foreach ($volunteer as $vol)
                                <tr class="pet-container bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600"
                                    id="adoptionDataContainer" data-stage="{{ $vol->volunteer_application->stage }}">
                                    <td class="px-6 py-4  hidden lg:table-cell">
                                        <div class="text-base text-gray-500 ">{{ $vol->created_at }}</div>
                                    </td>
                                    <td class="px-6 py-4 lg:table-cell">
                                        <div class="text-base text-gray-500 ">
                                            @if ($vol->volunteer_application->application->application_type === 'application_volunteer')
                                                Volunteer
                                            @else
                                            @endif
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 lg:table-cell">
                                        @if ($vol->volunteer_application->stage >= 0 && $vol->volunteer_application->stage < 5)
                                            <div
                                                class="text-yellow-600 w-24 rounded-lg py-1 font-semibold bg-yellow-200">
                                                <p class="text-center">Pending</p>
                                            </div>
                                        @elseif($vol->volunteer_application->stage == 10)
                                            <div class="text-red-600 w-24 rounded-lg py-1 font-semibold bg-red-200">
                                                <p class="text-center">Rejected</p>
                                            </div>
                                        @else
                                            <div class="text-green-600 w-24 rounded-lg py-1 font-semibold bg-green-200">
                                                <p class="text-center">Accepted</p>
                                            </div>
                                        @endif

                                    </td>
                                    <td class=" px-6 lg:px-0 items-center lg:gap-1   lg:table-cell">
                                        <a href="{{ route('user.volunteerprogress', ['userId' => auth()->user()->id]) }}"
                                            type="button"
                                            class="py-2 px-3 text-sm font-medium text-center text-white bg-cyan-400 hover:bg-cyan-600 rounded-lg shadow-md">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                fill="currentColor" class="w-4 h-4 ">
                                                <path d="M12 15a3 3 0 100-6 3 3 0 000 6z" />
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M1.323 11.447C2.811 6.976 7.028 3.75 12.001 3.75c4.97 0 9.185 3.223 10.675 7.69.12.362.12.752 0 1.113-1.487 4.471-5.705 7.697-10.677 7.697-4.97 0-9.186-3.223-10.675-7.69a1.762 1.762 0 010-1.113zM17.25 12a5.25 5.25 0 11-10.5 0 5.25 5.25 0 0110.5 0z" />
                                            </svg>
                                        </a>

                                    </td>
                                </tr>
                            @endforeach
                        @else
                        @endif
                    </tbody>
                </table>
                <div
                    class=" bg-white flex flex-col md:flex-row items-stretch md:items-center md:space-x-3 space-y-20 md:space-y-0 justify-between p-4 lg:px-4 lg:py-6">
                    <div class="w-full md:w-1/2">
                    </div>
                    <div
                        class="w-full md:w-auto flex flex-col md:flex-row space-y-2 md:space-y-0 items-stretch md:items-center justify-end md:space-x-3 flex-shrink-0">
                    </div>
                </div>

            </div>

        </div>
        <div class="mx-auto max-w-screen-2xl px-4 lg:pt-8 lg:px-12">
            <div class="flex flex-col items-stretch justify-between py-4 dark:border-gray-700">
                <div class="flex items-center justify-between lg:mx-0">
                    <h1 class = "text-2xl text-red-500 font-bold">My Schedule Request</h1>
                </div>
            </div>
            <!-- WEB RESPONSIVENESS TABLE -->
            <div
                class="relative overflow-y-hidden  bg-white overflow-x-hidden flex-col  items-stretch rounded-2xl lg:shadow-lg justify-between lg:px-4 lg:py-6">
                <div
                    class="text-sm font-medium text-center text-gray-500 border-b border-gray-200 dark:text-gray-400 dark:border-gray-700">
                    <ul class="flex flex-wrap -mb-px">
                        <li class="me-2 relative">
                            <a href="{{ route('user.applications') }}" id="allLink"
                                class="inline-block p-4 text-base border-b-2 text-red-500 border-red-600 rounded-t-lg active  flex items-center justify-between">All
                                <span id="all"
                                    class="bg-red-100 ms-1 text-red-600 font-bold flex justify-center items-center rounded-3xl w-2 h-2 p-2 text-center text-sm">{{ $totalApplicationsForUser }}</span>
                            </a>
                        </li>
                        <li class="me-2">
                            <a href="{{ route('user.applications') }}" id="pendingLink"
                                class="inline-block p-4 text-base rounded-t-lg flex items-center justify-between">Pending
                                <span id="pending"
                                    class="hidden ms-1 bg-red-100 text-red-600 font-bold flex justify-center items-center rounded-3xl w-2 h-2 p-2 text-center text-sm">{{ $totalPendingApplicationsForUser + $volunteerPending }}</span>
                            </a>
                        </li>
                        <li class="me-2">
                            <a href="{{ route('user.applications') }}" id="approvedLink"
                                class="inline-block text-base p-4 rounded-t-lg flex items-center justify-between">Approved
                                <span id="approved"
                                    class="hidden ms-1 bg-red-100 text-red-600 font-bold flex justify-center items-center rounded-3xl w-2 h-2 p-2 text-center text-sm
                                ">{{ $approvedApplicationForUser + $volunteerApproved }}
                                </span>
                            </a>
                        </li>
                        <li class="me-2">
                            <a href="{{ route('user.applications') }}" id="rejectedLink"
                                class="inline-block text-base p-4 rounded-t-lg  flex items-center justify-between">Rejected
                                <span id="rejected"
                                    class="hidden ms-1 bg-red-100 text-red-600 font-bold flex justify-center items-center rounded-3xl w-2 h-2 p-2 text-center text-sm">
                                    {{ $rejectedApplicationForUser }}
                                </span>
                            </a>
                        </li>
                    </ul>
                </div>

                <table
                    class=" w-full text-sm text-left text-gray-500 dark:text-gray-400 md:space-x-3 space-y-3 md:space-y-0">
                    <thead
                        class="text-xs lg:contents hidden text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                Date of Application
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Application Type
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Status
                            </th>
                            <th scope="col" class="">
                                Actions
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($answers as $answerData)
                            <tr class="pet-container bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600"
                                id="adoptionDataContainer" data-stage="{{ $answerData->adoption->stage }}">
                                <td class="px-6 py-4  hidden lg:table-cell">
                                    <div class="text-base text-gray-500 ">{{ $answerData->created_at }}</div>
                                </td>
                                <td class="px-6 py-4   lg:table-cell">
                                    <div class="text-base text-gray-500 ">
                                        @if ($answerData->adoption->application->application_type === 'application_form')
                                            Adoption
                                        @else
                                        @endif
                                    </div>
                                </td>
                                <td class="px-6 py-4 lg:table-cell">
                                    @if ($answerData->schedule_status = 'Pending')
                                        <div class="text-yellow-600 w-24 rounded-lg py-1 font-semibold bg-yellow-200">
                                            <p class="text-center">Pending</p>
                                        </div>
                                    @elseif($answerData->schedule_status = 'Approved')
                                        <div class="text-green-600 w-24 rounded-lg py-1 font-semibold bg-green-200">
                                            <p class="text-center">Approved</p>
                                        </div>
                                    @else
                                        <div class="text-red-600 w-24 rounded-lg py-1 font-semibold bg-red-200">
                                            <p class="text-center">Rejected</p>
                                        </div>
                                    @endif


                                </td>
                                <td class=" px-6 lg:px-0 items-center lg:gap-1   lg:table-cell">
                                    <a href="{{ route('user.adoptionprogress', ['petId' => $answerData->adoption->pet_id, 'applicationId' => $answerData->adoption->application_id]) }}"
                                        type="button" onclick=""
                                        class="py-2 px-3 text-sm font-medium text-center text-white bg-cyan-400 hover:bg-cyan-600 rounded-lg shadow-md">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                            fill="currentColor" class="w-4 h-4 ">
                                            <path d="M12 15a3 3 0 100-6 3 3 0 000 6z" />
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="M1.323 11.447C2.811 6.976 7.028 3.75 12.001 3.75c4.97 0 9.185 3.223 10.675 7.69.12.362.12.752 0 1.113-1.487 4.471-5.705 7.697-10.677 7.697-4.97 0-9.186-3.223-10.675-7.69a1.762 1.762 0 010-1.113zM17.25 12a5.25 5.25 0 11-10.5 0 5.25 5.25 0 0110.5 0z" />
                                        </svg>
                                    </a>

                                </td>
                            </tr>
                        @endforeach
                        @if (isset($volunteer) && !$volunteer->isEmpty())
                            <!-- Your foreach loop and table data -->
                            @foreach ($volunteer as $vol)
                                <tr class="pet-container bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600"
                                    id="adoptionDataContainer" data-stage="{{ $vol->volunteer_application->stage }}">
                                    <td class="px-6 py-4  hidden lg:table-cell">
                                        <div class="text-base text-gray-500 ">{{ $vol->created_at }}</div>
                                    </td>
                                    <td class="px-6 py-4 lg:table-cell">
                                        <div class="text-base text-gray-500 ">
                                            @if ($vol->volunteer_application->application->application_type === 'application_volunteer')
                                                Volunteer
                                            @else
                                            @endif
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 lg:table-cell">


                                    </td>
                                    <td class=" px-6 lg:px-0 items-center lg:gap-1   lg:table-cell">
                                        <a href="{{ route('user.volunteerprogress', ['userId' => auth()->user()->id]) }}"
                                            type="button"
                                            class="py-2 px-3 text-sm font-medium text-center text-white bg-cyan-400 hover:bg-cyan-600 rounded-lg shadow-md">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                fill="currentColor" class="w-4 h-4 ">
                                                <path d="M12 15a3 3 0 100-6 3 3 0 000 6z" />
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M1.323 11.447C2.811 6.976 7.028 3.75 12.001 3.75c4.97 0 9.185 3.223 10.675 7.69.12.362.12.752 0 1.113-1.487 4.471-5.705 7.697-10.677 7.697-4.97 0-9.186-3.223-10.675-7.69a1.762 1.762 0 010-1.113zM17.25 12a5.25 5.25 0 11-10.5 0 5.25 5.25 0 0110.5 0z" />
                                            </svg>
                                        </a>

                                    </td>
                                </tr>
                            @endforeach
                        @else
                        @endif
                    </tbody>
                </table>
                <div
                    class=" bg-white flex flex-col md:flex-row items-stretch md:items-center md:space-x-3 space-y-20 md:space-y-0 justify-between p-4 lg:px-4 lg:py-6">
                    <div class="w-full md:w-1/2">
                    </div>
                    <div
                        class="w-full md:w-auto flex flex-col md:flex-row space-y-2 md:space-y-0 items-stretch md:items-center justify-end md:space-x-3 flex-shrink-0">
                    </div>
                </div>

            </div>

        </div>



    </section>
</x-app-layout>
