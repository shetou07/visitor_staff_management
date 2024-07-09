<?php

namespace App\Exports;

use App\Models\Visitor;
use PDF;

class VisitorsExport
{
    protected $filters;

    public function __construct($filters)
    {
        $this->filters = $filters;
    }

    public function export()
    {
        $query = Visitor::query();

        if (!empty($this->filters['date'])) {
            $query->whereDate('created_at', $this->filters['date']);
        }

        if (!empty($this->filters['purpose'])) {
            $query->where('purpose', $this->filters['purpose']);
        }

        $data = $query->get();

        $pdf = PDF::loadView('exports.visitors', ['data' => $data]);

        return $pdf->download('visitors.pdf');
    }
}

