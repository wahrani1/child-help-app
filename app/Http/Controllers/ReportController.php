<?php

namespace App\Http\Controllers;

use App\Models\Report;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ReportController extends Controller
{
    public function create()
    {
        return view('reports.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'location' => 'required|string',
            'latitude' => 'nullable|numeric',
            'longitude' => 'nullable|numeric',
            'description' => 'nullable|string',
            'emergency_level' => 'required|in:urgent,standard',
            'child_age_group' => 'nullable|in:infant,toddler,child,teenager',
        ]);

        // Generate a unique report ID for anonymous tracking
        $reportId = 'REP-' . uniqid();
        $validated['report_id'] = $reportId;

        // Save report
        $report = Report::create($validated);

        // In a real application, this would trigger notifications to nearby centers
        // and potentially emergency services depending on emergency_level
        $this->notifyRelevantServices($report);

        return redirect()->route('report.success')->with('report_id', $reportId);
    }

    public function success()
    {
        // Check if we have a report ID in the session
        if (!session('report_id')) {
            return redirect()->route('home');
        }

        return view('reports.success', [
            'reportId' => session('report_id')
        ]);
    }

    public function nearbyCenters(Request $request)
    {
        // This would typically connect to a service that finds nearby centers
        // based on lat/long passed in the request

        $centers = [
            [
                'id' => 1,
                'name' => 'Child Care Center A',
                'distance' => '1.2 km',
                'address' => '123 Main St',
                'phone' => '555-1234',
                'availability' => 'Available now'
            ],
            [
                'id' => 2,
                'name' => 'Foster Home B',
                'distance' => '2.4 km',
                'address' => '456 Oak Ave',
                'phone' => '555-5678',
                'availability' => 'Available now'
            ],
            [
                'id' => 3,
                'name' => 'Emergency Youth Center',
                'distance' => '3.1 km',
                'address' => '789 Pine Rd',
                'phone' => '555-9012',
                'availability' => 'Limited space'
            ],
        ];

        return response()->json(['centers' => $centers]);
    }

    protected function notifyRelevantServices(Report $report)
    {
        // In a production app, this would:
        // 1. Find nearby foster homes and rescue teams
        // 2. Send notifications via SMS, email, or app notifications
        // 3. Potentially notify emergency services for urgent cases

        Log::info('Emergency child report received', [
            'report_id' => $report->report_id,
            'location' => $report->location,
            'emergency_level' => $report->emergency_level
        ]);

        // Example of sending notifications would go here
        // This could use Laravel notifications, broadcasting, etc.
    }
}
