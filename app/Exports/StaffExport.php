<?php 

namespace App\Exports;

use App\Models\CheckInOut;
use PDF;

class StaffExport
{
    protected $filters;

    public function __construct(array $filters)
    {
        $this->filters = $filters;
    }

    public function export()
    {
        $query = CheckInOut::query();

        if (!empty($this->filters['date'])) {
            $query->whereDate('check_in_time', $this->filters['date']);
        }

        if (!empty($this->filters['staff_id'])) {
            $query->whereHas('staff', function($q) {
                $q->where('staff_id', $this->filters['staff_id']);
            });
        }

        if (!empty($this->filters['department'])) {
            $query->whereHas('staff', function($q) {
                $q->where('department', $this->filters['department']);
            });
        }

        $data = $query->with('staff')->get();

        $pdf = PDF::loadView('exports.staff', ['data' => $data]);

        return $pdf->download('staff.pdf');
    }
}

