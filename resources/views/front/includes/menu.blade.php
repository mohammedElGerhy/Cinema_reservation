<div class="mainmenu-area">
    <div class="container">
        <div class="row">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>
            <div class="navbar-collapse collapse">
                <ul class="nav navbar-nav">
                    <li class="active"><a href="{{route('front.home')}}">Home</a></li>

                    <li><a href="#">Contact</a></li>
                    @if(auth()->user())
                    <li><a href="{{route('logout')}}">Logout</a></li>
@endif
                </ul>
            </div>
        </div>
    </div>
</div> <!-- End mainmenu area -->
