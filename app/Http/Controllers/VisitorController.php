<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Visitor;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class VisitorController extends Controller
{
    /**
     * Display the visitor registration form.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view('visitor.create');
    }

    /**
     * Display the visitors list.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function list()
    {
        $visitors = Visitor::all();
        return view('visitor.list', compact('visitors'));
    }

    /**
     * Store a newly created visitor in the database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'vehicle' => 'required', //national_id
            'purpose' => 'required',
        ]);
        $checkedInBy = Auth::guard('security')->user()->name;

        Visitor::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'vehicle' => $request->vehicle, //national_id
            'purpose' => $request->purpose,
            'checkin_status' => true,
            'checked_in_by' => $checkedInBy,
        
        ]);

        return redirect()->route('visitor.create')->with('success', 'Visitor registered successfully!');
    }

    /**
     * Update the check-in status of a visitor to false (checkout).
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function checkout(Request $request, $id)
    {
        $visitor = Visitor::findOrFail($id);

        $visitor->checkin_status = false;
        $visitor->save();

        return redirect()->route('visitor.index')->with('success', 'Visitor checked out successfully!');
    }
    public function index(Request $request)
    {
        $visitors = collect(); // Create an empty collection

        if ($request->has('national_id')) {
            $visitors = Visitor::where('vehicle', $request->input('national_id'))->get();
        }

        if ($request->ajax()) {
            return view('visitor.partials.visitor_table', compact('visitors'))->render();
        }

        return view('visitor.index', compact('visitors'));
    }
    


}
