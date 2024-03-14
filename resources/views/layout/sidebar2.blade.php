<!-- Sidebar -->
<nav id="sidebar" class="sidebar-wrapper">
    <div class="sidebar-content">
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ url('/') }}">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">Kuliah</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item {{ Request::is('mahasiswa') ? 'active' : '' }}">
                <a class="nav-link" href="{{ url('/mahasiswa') }}">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Mahasiswa</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider bg-light">

            <li class="nav-item {{ Request::is('mahasiswa') ? 'active' : '' }}">
                <a class="nav-link" href="{{ url('/dosen') }}">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dosen</span></a>
            </li>
            <hr class="sidebar-divider bg-light">

            <li class="nav-item {{ Request::is('matkul') ? 'active' : '' }}">
                <a class="nav-link" href="{{ url('/matkul') }}">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Mata Kuliah</span></a>
            </li>
            <hr class="sidebar-divider bg-light">
        </ul>
    </div>
</nav>
<!-- End of Sidebar -->


<script>
    document.addEventListener("DOMContentLoaded", function () {
        // Toggle sidebar
        const sidebarToggle = document.querySelector("#sidebarToggle");
        const sidebar = document.querySelector("#sidebar");

        sidebarToggle.addEventListener("click", function () {
            sidebar.classList.toggle("toggled");
        });

        // Highlight active menu item
        const currentURL = window.location.href;
        const navLinks = document.querySelectorAll(".nav-item a");

        navLinks.forEach(function (link) {
            if (link.href === currentURL) {
                link.parentElement.classList.add("active");
            }
        });
    });

</script>
