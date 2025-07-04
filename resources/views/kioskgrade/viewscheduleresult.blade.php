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
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="breadcrumb" style="font-size: 13pt">
                                            <span>Course: {{ $progAcronym ?? 'Not Available' }} {{ $progCodSuffix ?? 'Not Available' }},</span>
                                            <span class="ml-2">School Year: {{ request('schlyear') }},</span>
                                            <span class="ml-2">
                                                Semester: 
                                                @if(request('semester') == 1)
                                                    1st Sem
                                                @elseif(request('semester') == 2)
                                                    2nd Sem
                                                @elseif(request('semester') == 3)
                                                    Summer
                                                @else
                                                    Unknown Semester
                                                @endif
                                            </span>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="breadcrumb">
                                            <button type="button" id="refreshSchedule" class="btn btn-primary btn-sm" style="font-size: 9pt">
                                                <i class="fas fa-sync"></i> Refresh Schedule
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="table-responsive" id="schedule-grid"></div>
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

<script>
    var days = @json($days);
    var times = @json($times);
</script>

@endsection
