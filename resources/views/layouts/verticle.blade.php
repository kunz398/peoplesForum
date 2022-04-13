@if (Auth::guest())

@else

    <nav class="navbar navbar-expand-lg navbar-light position-relative " {{--style="background-color: #6f42c1"--}}>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto flex-column vertical-nav">
                <li class="nav-item position-relative"  style="z-index: 99;">
                    <a class="nav-link text-white"  href="javascript:void(0)">&nbsp;</a>
                </li>

                <li class="nav-item position-relative" id="vhomep"  style="z-index: 99;">
                    <a class="nav-link text-white"  href="/">Home</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link text-white" href="/profile/{{Auth::user()->id}}">Dashboard</a>
                </li>

            </ul>

        </div>
    </nav>

@endif
