<!-- Divider -->
<hr class="sidebar-divider my-0">

@if(\Illuminate\Support\Facades\Auth::user()->is_admin)
    <li class="nav-item">
        <a class="nav-link" href="{{ url('/admin') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('theater.index') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Theater</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('movie.index') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Movie</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ url('/allTicket') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>All Ticket</span></a>
    </li>
@else
    <!-- Nav Item - Dashboard -->
    <li class="nav-item">
        <a class="nav-link" href="{{ url('/home') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Home</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ url('/myTicket') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>My Ticket</span></a>
    </li>
@endif

