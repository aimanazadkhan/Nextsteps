<section>
    <nav class="navbar navbar-expand-lg p-0" style="border-bottom: 1px solid grey;">
        <div class="container-fluid justify-content-center">
            <ul class="navbar-nav justify-content-evenly w-100">
                <li class="nav-item" style="flex: 1;">
                    <a class="nav-link text-center d-block pt-3" href="#">
                        Personal Information<br>
                        <p class="text-success">Complete</p>
                    </a>
                </li>
                <div class="vr"></div>
                <li class="nav-item" style="flex: 1;">
                    <a class="nav-link text-center d-block pt-3" href="#">
                        Academic Qualification<br>
                        <p class="text-success">Complete</p>
                    </a>
                </li>
                <div class="vr"></div>
                <li class="nav-item" style="flex: 1;">
                    <a class="nav-link text-center d-block pt-3" href="#">
                        Work Experience<br>
                        <p class="text-success">Complete</p>
                    </a>
                </li>
            </ul>
        </div>
    </nav>
</section>

<style>
    .nav-item {
        position: relative;
    }
    
    .nav-link::before {
        content: "";
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: linear-gradient(to top left, rgba(180, 200, 230, 1), rgba(200, 220, 250, 1));
        z-index: -1;
        transform: scaleX(0);
        transform-origin: bottom right;
        transition: transform 0.8s;
    }

    .nav-item:hover .nav-link::before {
        transform: scaleX(1);
        transform-origin: bottom right;
    }
</style>
