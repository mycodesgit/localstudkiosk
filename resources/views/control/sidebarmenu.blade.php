@php
    $curr_route = request()->route()->getName();

    $schedviewActive = in_array($curr_route, ['schedclassRead','schedclassShow']) ? 'active-link' : '';
@endphp
<div class="sidebar__list">
    <a href="{{ route('kioskhome') }}" class="sidebar__link {{ request()->routeIs('kioskhome') ? 'active-link' : '' }}">
        <i class="fas fa-graduation-cap"></i>
        <span>View Grades</span>
    </a>

    <a href="{{ route('kioskaccount') }}" class="sidebar__link {{ request()->routeIs('kioskaccount') ? 'active-link' : '' }}">
        <i class="fas fa-file-invoice"></i>
        <span>View Accounts</span>
    </a>

    <a href="{{ route('schedclassRead') }}" class="sidebar__link {{ $schedviewActive }}">
        <i class="fas fa-calendar-alt"></i>
        <span>Class Schedule</span>
    </a>
</div>