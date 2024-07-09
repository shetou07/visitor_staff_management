<?php
namespace App\Http\Controllers;

use App\Models\Staff;
use App\Models\CheckInOut;
use Illuminate\Http\Request;
use Carbon\Carbon;

class StaffController extends Controller
{
    public function showCheckInForm()
    {
        return view('staff.check_in');
    }

    public function checkIn(Request $request)
    {
        $request->validate(['staff_id' => 'required|string']);

        $staff = Staff::where('staff_id', $request->staff_id)->first();

        if (!$staff) {
            return redirect()->back()->with('message', 'Staff not found.');
        }

        $today = Carbon::today();
        $existingCheckIn = CheckInOut::where('staff_id', $staff->id)
            ->whereDate('check_in_time', $today)
            ->whereNull('check_out_time')
            ->first();

        if ($existingCheckIn) {
            return redirect()->back()->with('message', "{$staff->name} already checked in today.");
        }

        CheckInOut::create([
            'staff_id' => $staff->id, 
            'check_in_time' => Carbon::now(),
            'status' => 'pending'
        ]);

        return redirect()->back()->with('message', "{$staff->name} checked in successfully.");
    }

    public function showCheckOutForm()
    {
        return view('staff.check_out');
    }

    public function checkOut(Request $request)
    {
        $request->validate(['staff_id' => 'required|string']);
    
        $staff = Staff::where('staff_id', $request->staff_id)->first();
    
        if (!$staff) {
            return redirect()->back()->with('message', 'Staff not found.');
        }
    
        $today = Carbon::today();
        $checkIn = CheckInOut::where('staff_id', $staff->id)
            ->whereDate('check_in_time', $today)
            ->whereNull('check_out_time')
            ->first();
    
        if (!$checkIn) {
            return redirect()->back()->with('message', "No check-in record found for {$staff->name} today.");
        }
    
        $checkIn->check_out_time = Carbon::now();
        $checkIn->status = 'completed';
        $checkIn->save();
    
        return redirect()->back()->with('message', "{$staff->name} checked out successfully.");
    }
    public function checkedInToday()
    {
        $today = Carbon::today();
        $checkedInToday = CheckInOut::with('staff')
            ->whereDate('check_in_time', $today)
            ->get();

        return view('staff.checked_in_today', compact('checkedInToday'));
    }
}
