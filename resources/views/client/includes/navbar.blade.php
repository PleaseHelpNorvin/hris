<style>
    .offcanvas-collapse {
        position: fixed;
        top: 56px;
        bottom: 0;
        overflow-y: auto;
        padding-right: 1rem;
        padding-left: 1rem;
        border-right: 1px solid #dee2e6;
        width: 250px;
        background-color: #007bff;
        color: #fff;
    }

    @media (max-width: 767.98px) {
        .offcanvas-collapse {
            top: 3.5rem; /* Height of small navbar */
        }
    }

    .logout-btn {
        width: 100%;
    }

    .nav-item:hover {
        background-color:#dee2e6;
        border: 1px solid#cdcdcd;
    }
    .nav-item a:hover{
        text-decoration-color: white;

    }
    .active {
    font-weight: bold;
    background-color: #dee2e6;
    border-radius: 2px;
    /* paddi */

}
</style>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
    <div class="container">
        <a class="navbar-brand" href="{{ route('clientdashboard', ['employee_id' => $employee->employee_id]) }}">Working Station(client)</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample" aria-controls="offcanvasExample">
            <span class="navbar-toggler-icon"></span>
        </button>
    </div>
</nav>


<!-- Sidebar -->
<div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
    <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="offcanvasExampleLabel">Sidebar</h5>
        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link "
                    href="">Tasks</a>
            </li>
            <li class="nav-item">
                <a class="nav-link"
                href="{{route('request.employeeleave',['employee_id' => $employee->employee_id] )}}">Request Leave</a>
            </li>
            <li class="nav-item">
                <a class="nav-link"
                href="{{ route('show.addtimeintimeout', ['employee_id' => $employee->employee_id]) }}">Time Logs</a>
            </li>
            
            <li class="nav-item">
                <a class="nav-link"
                href="">Payroll Data</a>
            </li>
            <li class="nav-item-logout" id="logout-btn">
                <form action="{{route('clientlogout')}}" method="POST" class="logout-btn">
                    @csrf
                    <center>
                        {{-- <a type="submit" href="nav-link">Logout</a> --}}
                        <button type="submit" > Logout</button>
                    </center>
                </form>
            </li>
        </ul>
    </div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        var currentUrl = window.location.pathname;

        var navLinks = document.querySelectorAll('.nav-link');

        navLinks.forEach(function(link) {
            var linkUrl = link.getAttribute('href');

            if (currentUrl === linkUrl) {
                link.parentElement.classList.add('active');
            }
        });
    });
</script>
