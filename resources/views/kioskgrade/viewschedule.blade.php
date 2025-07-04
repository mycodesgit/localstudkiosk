@extends('layouts.master_kiosk')

@section('body')
<div class="text-xs">
    <div class="row" style="padding-top: 0px;">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header text-center">
                    <div class="h3"><b>Student</b> Class Schedule</div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="tab-content" id="vert-tabs-right-tabContent">
                                <div class="tab-pane fade show active" id="vert-tabs-right-one" role="tabpanel">
                                    <div class="card-body table-responsive p-0">
                                        <table id="ss" class="table table-striped">
                                            <thead>
                                                <tr>
                                                    <th>A.Y. Semester</th>
                                                    <th>Course Yr&Section</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($enrollmentHistory as $history)
                                                    <tr>
                                                        <td>{{ $history->schlyear }}
                                                            @if($history->semester == 1)
                                                                <span class="badge badge-primary">1st Sem</span>
                                                            @elseif($history->semester == 2)
                                                                <span class="badge badge-success">2nd Sem</span>
                                                            @elseif($history->semester == 3)
                                                                <span class="badge badge-secondary">Summer</span>
                                                            @endif
                                                        </td>
                                                        <td>{{ $history->progAcronym }} {{ $history->studYear }}-{{ $history->studSec }}</td>
                                                        <td>
                                                            <a href="{{ route('schedclassShow', ['schlyear' => $history->schlyear, 'semester' => $history->semester, 'progCod' => $history->progCod.'+'.$history->studYear.'-'.$history->studSec]) }}" class="btn btn-outline-success btn-xs">
                                                                View Sched
                                                            </a>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="vert-tabs-right-two" role="tabpanel" aria-labelledby="vert-tabs-right-two-tab">
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    CISS V.1.0: Maintained and Managed by Management Information System Office (MISO) under the Leadership of Dr. Aladino C. Moraca Copyright © 2023 CPSU, All Rights Reserved
                </div>
            </div>
        </div>
    </div>
</div>
@endsection