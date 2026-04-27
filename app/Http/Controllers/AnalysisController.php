<?php

namespace App\Http\Controllers;

use App\Models\AdmissionSession;
use App\Models\Application;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AnalysisController extends Controller
{
    public function __construct()
    {
        $permissionMap = [
            // 'analytics review' => ['overview',session_spring,'session_fall'],
        ];
        foreach ($permissionMap as $permission => $methods) {
            $this->middleware("permission:$permission")->only($methods);
        }
    }
    public function overview(Request $request)
    {
        $value = null;
        $sessions = AdmissionSession::get();
        $applications = Application::query();
        if ($request->isMethod('post')) {
            $applications->where('session', $request->filter);
            $value = $request->filter;
        }
        $total_applications = $applications->count();
        $eligible = $applications->where('ok_for_admission', 1)->count();
        return view('pages.analytics.overview', compact('total_applications', 'eligible', 'sessions', 'value'));
    }

    public function session_spring()
    {
        $currentYear = date('Y');
        $years = [
            (string) $currentYear,
            (string) ($currentYear - 1),
            (string) ($currentYear - 2)
        ];
        // Yearly confirmed/unconfirmed applications (Spring only)
        $confirmedData = [];
        $unconfirmedData = [];
        foreach ($years as $year) {
            $confirmedData[] = Application::where('session', 'like', "Spring%$year%")
                ->where('application_status', 1)
                ->count();

            $unconfirmedData[] = Application::where('session', 'like', "Spring%$year%")
                ->where('application_status', 0)
                ->count();
        }

        // Daily applications (total, Spring only)
        $dailyData = [];
        foreach ($years as $year) {
            $data = Application::select(
                DB::raw("DATE(created_at) as date"),
                DB::raw("COUNT(*) as total")
            )
                ->whereYear('created_at', $year)
                ->where('session', 'like', "Spring%$year%")
                ->groupBy(DB::raw("DATE(created_at)"))
                ->orderBy('date')
                ->get();
            $dailyData[$year] = $data;
        }
        // Department-wise applications (Spring only)
        $departments = \App\Models\Department::pluck('department_name', 'id')->toArray();
        $departmentData = [];

        foreach ($years as $year) {
            $applications = Application::with('preferenceOne.department')
                ->whereYear('created_at', $year)
                ->where('session', 'like', "Spring%$year%")
                ->get();

            $counts = [];
            foreach ($departments as $id => $name) {
                $counts[$id] = 0;
            }

            foreach ($applications as $app) {
                if ($app->preferenceOne && $app->preferenceOne->department) {
                    $deptId = $app->preferenceOne->department->id;
                    $counts[$deptId]++;
                }
            }

            $departmentData[$year] = $counts;
        }
        return view('pages.analytics.chartSpring', compact(
            'years',
            'confirmedData',
            'unconfirmedData',
            'dailyData',
            'departments',
            'departmentData'
        ));
    }

    public function session_fall()
    {
        $currentYear = date('Y');
        $years = [
            (string) $currentYear,
            (string) ($currentYear - 1),
            (string) ($currentYear - 2)
        ];
        // Yearly confirmed/unconfirmed applications (Fall only)
        $confirmedData = [];
        $unconfirmedData = [];
        foreach ($years as $year) {
            $confirmedData[] = Application::where('session', 'like', "Fall%$year%")
                ->where('application_status', 1)
                ->count();

            $unconfirmedData[] = Application::where('session', 'like', "Fall%$year%")
                ->where('application_status', 0)
                ->count();
        }

        // Daily applications (total, Fall only)
        $dailyData = [];
        foreach ($years as $year) {
            $data = Application::select(
                DB::raw("DATE(created_at) as date"),
                DB::raw("COUNT(*) as total")
            )
                ->whereYear('created_at', $year)
                ->where('session', 'like', "Fall%$year%")
                ->groupBy(DB::raw("DATE(created_at)"))
                ->orderBy('date')
                ->get();
            $dailyData[$year] = $data;
        }
        // Department-wise applications (Fall only)
        $departments = \App\Models\Department::pluck('department_name', 'id')->toArray();
        $departmentData = [];

        foreach ($years as $year) {
            $applications = Application::with('preferenceOne.department')
                ->whereYear('created_at', $year)
                ->where('session', 'like', "Fall%$year%")
                ->get();

            $counts = [];
            foreach ($departments as $id => $name) {
                $counts[$id] = 0;
            }

            foreach ($applications as $app) {
                if ($app->preferenceOne && $app->preferenceOne->department) {
                    $deptId = $app->preferenceOne->department->id;
                    $counts[$deptId]++;
                }
            }

            $departmentData[$year] = $counts;
        }
        return view('pages.analytics.chartFall', compact(
            'years',
            'confirmedData',
            'unconfirmedData',
            'dailyData',
            'departments',
            'departmentData'
        ));
    }
}
