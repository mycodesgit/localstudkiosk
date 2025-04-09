<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\EnrollmentDB\Student;
use App\Models\EnrollmentDB\StudentLevel;
use App\Models\EnrollmentDB\Grade;
use App\Models\EnrollmentDB\GradeCode;
use App\Models\EnrollmentDB\YearLevel;
use App\Models\EnrollmentDB\StudentStatus;
use App\Models\EnrollmentDB\StudEnrolmentHistory;

use App\Models\ScheduleDB\ClassEnroll;
use App\Models\ScheduleDB\College;
use App\Models\ScheduleDB\EnPrograms;
use App\Models\ScheduleDB\Subject;
use App\Models\ScheduleDB\SubjectOffered;
use App\Models\ScheduleDB\ClassesSubjects;

//use App\Models\ScholarshipDB\Scholar;

use App\Models\AssessmentDB\StudentFee;
use App\Models\AssessmentDB\StudentAppraisal;
use App\Models\AssessmentDB\StudPayment;

class KioskDashController extends Controller
{
    public function getGuard()
    {
        if(\Auth::guard('kioskstudent')->check()) {
            return 'kioskstudent';
        }
    }

    public function kioskhome()
    {
        $guard= $this->getGuard();
        $studentowner = Auth::guard($guard)->user()->studid;

        $studauth = Student::where('stud_id', '=', $studentowner)->first();

        $studsub = Grade::leftJoin('coasv2_db_schedule.sub_offered', 'studgrades.subjID', '=', 'coasv2_db_schedule.sub_offered.id')
                    ->leftJoin('coasv2_db_schedule.subjects', 'coasv2_db_schedule.sub_offered.subCode', '=', 'coasv2_db_schedule.subjects.sub_code')
                    ->select( 'studgrades.*', 'coasv2_db_schedule.sub_offered.*', 'coasv2_db_schedule.subjects.*')
                    ->where('studgrades.studID', $studentowner)
                    ->orderBy('coasv2_db_schedule.sub_offered.id', 'ASC')
                    ->get();

        return view('kioskgrade.viewdash', compact('guard', 'studauth', 'studsub'));
    }

    public function kioskaccount()
    {
        $guard= $this->getGuard();
        $studentowner = Auth::guard($guard)->user()->studid;

        $studauth = Student::where('stud_id', '=', $studentowner)->first();

        $studfees = StudentAppraisal::select('student_appraisal.*')
                    ->where('student_appraisal.studID', $studentowner)
                    ->orderBy('student_appraisal.id', 'ASC')
                    ->get();

        

        return view('kioskgrade.viewaccount', compact('guard', 'studauth', 'studfees'));
    }

    public function logout()
    {
        // if (\Auth::guard('web')->check() || \Auth::guard('faculty')->check()) {
        //     auth()->guard('web')->logout();
        //     auth()->guard('faculty')->logout();
        //     return redirect()->route('login')->with('success', 'You have been Successfully Logged Out');
        // } else {
        //     return redirect()->route('home')->with('error', 'No authenticated user to log out');
        // }

        if (\Auth::guard('kioskstudent')->check()) {
            auth()->guard('kioskstudent')->logout();
            return redirect()->route('loginkioskstud')->with('success', 'You have been Successfully Logged Out');
        }  else {
            return redirect()->route('kioskhome')->with('error', 'No authenticated user to log out');
        }

    }
}
