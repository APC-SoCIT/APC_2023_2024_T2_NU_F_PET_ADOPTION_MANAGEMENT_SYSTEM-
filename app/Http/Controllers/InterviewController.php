<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Schedule;
use App\Models\ScheduleInterview;
use App\Models\Application;
use App\Models\Adoption;
use App\Models\VolunteerAnswers;
use Illuminate\Support\Facades\Redirect;
use App\Models\User;
use App\Models\Notifications;

class InterviewController extends Controller
{
    public function store(Request $request)
    {
        $adminId = User::where('role', 'admin')->value('id');;
        $possible_characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
        $string_length = 30;

        function pickRandom($possible_characters, $string_length)
        {
            $random_string = substr(str_shuffle($possible_characters), 0, $string_length);
            return $random_string;
        }
        
        $random_string = pickRandom($possible_characters, $string_length);

        $currentUserId = auth()->user()->id; // Change this to your actual way of getting the user ID

        $application = Application::where('user_id', $currentUserId)
        ->where('application_type', 'application_form')
        ->latest('created_at') // Order by created_at in descending order
        ->first();


        // Create a new schedule
        $schedule = new Schedule();
        $schedule->schedule_type = 'Interview'; // Default value
        $schedule->schedule_status = 'Pending'; // Default value
        $schedule->save();
 
        $schedID = $schedule->id;
        
        $scheduleInterview = new ScheduleInterview();
        $scheduleInterview->schedule_id = $schedID;
        $scheduleInterview->application_id = $application->id;
        $scheduleInterview->date = $request->input('date');
        $scheduleInterview->time = $request->input('time');
        $scheduleInterview->room = $random_string;
        $scheduleInterview->save();


        $notificationMessage = 'has submitted an interview schedule request.';

        $notification = new Notifications();
        $notification->application_id = $application->id; 
        $notification->sender_id = $currentUserId;
        $notification->receiver_id = $adminId; 
        $notification->concern = 'Adoption Application';
        $notification->message = $notificationMessage;
        $notification->save();

        // Find the most recent adoption for the current user
        $adoption = Adoption::whereHas('application', function ($query) use ($currentUserId) {
            $query->where('user_id', $currentUserId);
        })->latest('created_at')->first();

        if ($adoption) {
            $adoption->stage += 1; // Increment 'stage' field
            $adoption->save();
        }
        return redirect()->back()->with(['send_schedule' => true]); 
    }
    public function volunteerInterview(Request $request, $userId, $applicationId) 
    {
        try {

            $possible_characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
            $string_length = 30;
    
            function pickRandom($possible_characters, $string_length)
            {
                $random_string = substr(str_shuffle($possible_characters), 0, $string_length);
                return $random_string;
            }
            
            $random_string = pickRandom($possible_characters, $string_length);
            

            // Create a new schedule
            $schedule = new Schedule();
            $schedule->schedule_type = 'Interview'; 
            $schedule->schedule_status = 'Pending'; 
            $schedule->save();

            // Create a new schedule interview
            $scheduleInterview = new ScheduleInterview();
            $scheduleInterview->schedule_id = $schedule->id;
            $scheduleInterview->application_id = $applicationId;
            $scheduleInterview->date = $request->input('date');
            $scheduleInterview->time = $request->input('time');
            $scheduleInterview->room = $random_string;
            $scheduleInterview->save();

            $userId = auth()->user()->id; 
            $adminId = User::where('role', 'admin')->value('id');;
    
            $notificationMessage = 'has submitted an interview schedule request.';
    
            $notification = new Notifications();
            $notification->application_id = $applicationId;
            $notification->sender_id = $userId;
            $notification->receiver_id = $adminId; 
            $notification->concern = 'Volunteer Application';
            $notification->message = $notificationMessage;
            $notification->save();

            // Find the volunteer answers for the user
            $userVolunteerAnswers = VolunteerAnswers::whereHas('volunteer_application.application.user', function ($query) use ($userId) {
                $query->where('id', $userId);
            })->latest()->first();

            // If answers are found, update the stage
            if ($userVolunteerAnswers) {
                $newStage = $userVolunteerAnswers->volunteer_application->stage + 1;

                $userVolunteerAnswers->volunteer_application->update(['stage' => $newStage]);
            }

            return redirect()->back()->with(['send_schedule' => true]);
        } catch (\Exception $e) {
            // Handle any exceptions that might occur
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }

    public function jitsiadmininterview(Request $request, $scheduleId){
        $adminId = auth()->user()->id;

        $result = ScheduleInterview::select(
            'schedule_interviews.interview_id as interview_id',
            'schedule_interviews.room as room',
            // Add other columns as needed
        )
        ->leftJoin('application', 'schedule_interviews.application_id', '=', 'application.id')
        ->leftJoin('users', 'application.user_id', '=', 'users.id')
        ->where('schedule_interviews.interview_id', '=', $scheduleId)
        ->first(); // Use first() instead of get()
    
        $unreadNotificationsCount = Notifications::where('receiver_id', $adminId)
            ->whereNull('read_at')
            ->count();

        $adminNotifications = Notifications::where('receiver_id', $adminId)->orderByDesc('created_at')->take(5)->get();

        return view('admin_contents.interview', ['unreadNotificationsCount' => $unreadNotificationsCount, 'adminNotifications' => $adminNotifications, 'result' => $result]);

    }

    public function jitsiuserinterview(Request $request, $scheduleId){
        $authUser = auth()->user()->id;

        $result = ScheduleInterview::select(
            'schedule_interviews.interview_id as interview_id',
            'schedule_interviews.room as room',
            'users.name as lastname',
            'users.firstname as firstname'
        )
        ->leftJoin('application', 'schedule_interviews.application_id', '=', 'application.id')
        ->leftJoin('users', 'application.user_id', '=', 'users.id')
        ->where('schedule_interviews.interview_id', '=', $scheduleId)
        ->first(); 

        $unreadNotificationsCount = Notifications::where('receiver_id', $authUser)
            ->whereNull('read_at')
            ->count();

        $userNotifications = Notifications::where('receiver_id', $authUser)->orderByDesc('created_at')->take(5)->get();

        return view('user_contents.interview', ['unreadNotificationsCount' => $unreadNotificationsCount, 'userNotifications' => $userNotifications,'result' => $result]);

    }   
}
