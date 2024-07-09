<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin;
use App\Models\Visitor;
use App\Models\Staff;
use App\Models\CheckInOut;
use Carbon\Carbon;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\VisitorsExport;
use App\Exports\StaffExport;

class AdminController extends Controller
{
    public function showLoginForm()
    {
        return view('admin.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::guard('admin')->attempt($credentials)) {
            return redirect()->route('admin.dashboard');
        }

        return redirect()->back()->with('error', 'Invalid email or password');
    }

    public function dashboard()
    {
        $visitorsCheckedIn = Visitor::whereDate('created_at', Carbon::today())->count();
        $staffCheckedIn = CheckInOut::whereDate('check_in_time', Carbon::today())->count();

        return view('admin.dashboard', compact('visitorsCheckedIn', 'staffCheckedIn'));
    }

    public function showVisitors()
    {
        $visitors = Visitor::all();
        return view('admin.visitors', compact('visitors'));
    }

    public function showStaff()
    {
        $today = Carbon::today();
        $checkIns = CheckInOut::whereDate('check_in_time', $today)
            ->whereNull('check_out_time')
            ->with('staff')
            ->get();

        return view('admin.staff', compact('checkIns'));
    }

    public function filterVisitors(Request $request)
    {
        $query = Visitor::query();

        if ($request->filled('date')) {
            $query->whereDate('created_at', $request->date);
        }

        if ($request->filled('purpose')) {
            $query->where('purpose', $request->purpose);
        }

        $visitors = $query->get();

        return view('admin.visitors', compact('visitors'));
    }

    public function filterStaff(Request $request)
    {
        $query = CheckInOut::query()->with('staff');

        if ($request->filled('date')) {
            $query->whereDate('check_in_time', $request->date);
            $query->whereNull('status', $request->status);/* new change*/
        }

        if ($request->filled('staff_id')) {
            $query->whereHas('staff', function ($q) use ($request) {
                $q->where('staff_id', $request->staff_id);
            });
        }

        if ($request->filled('department')) {
            $query->whereHas('staff', function ($q) use ($request) {
                $q->where('department', $request->department);
            });
        }

        $checkIns = $query->get();

        return view('admin.staff', compact('checkIns'));
    }
    public function exportVisitors(Request $request)
    {
        $export = new VisitorsExport($request->all());
        return $export->export();
    }

    public function exportStaff(Request $request)
    {
        $staff_id = $request->get('staff_id');
        $checkIns = CheckInOut::where('staff_id', $staff_id)->with('staff')->get();

        if ($checkIns->isEmpty()) {
            return redirect()->back()->with('error', 'No check-ins found for the selected staff.');
        }

        $pdf = PDF::loadView('exports.staff', compact('checkIns'));
        return $pdf->download('staff_report.pdf');
    }
    
    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('admin.login');
    }
    public function showVisitorsReport()
    {
        $visitors = Visitor::all();
        return view('admin.visitors_report', compact('visitors'));
    }

    public function showStaffReport()
    {
        $staff = CheckInOut::with('staff')->get();
        return view('admin.staff_report', compact('staff'));
    }
    public function staffReport()
    {
    $staff = Staff::all(); // Fetch necessary data
    return view('admin.partials.staff_report', compact('staff'));
    }

    public function visitorsReport()
    {
    $visitors = Visitor::all(); // Fetch necessary data
    return view('admin.partials.visitors_report', compact('visitors'));
    } 

    public function checkedInToday()
    {
        $today = Carbon::today();
        $checkedInToday = CheckInOut::whereDate('check_in_time', $today)
            ->with('staff')
            ->get();

        // Add status based on whether check_out_time is null
        foreach ($checkedInToday as $entry) {
            $entry->status = $entry->check_out_time ? 'Completed' : 'Pending';
        }

        return view('admin.partials.checked_in_today', ['checkedInToday' => $checkedInToday]);
    }


    public function visitors_in_today()
    {
        $visitors = Visitor::where('created_at', '>=', Carbon::now()->subMinutes(1))->get();
        return view('list', compact('visitors'));
    }
    public function profile()
    {
        $admin = Auth::guard('admin')->user();
        return view('admin.profile', compact('admin'));
    }
    

    
}
