<header class="header-admin navbar-fixed-top navbar navbar-light">
    <a class='navbar-brand btn-menuside' href="#"></a>
    <span class="navbar-brand logo"><img class="logo-img" src="{{ asset('assets/img/logo.png') }}" alt="{{ config('app.name') }}"></span>
    <span class="slash-container">
        <span class="slash"></span>
    </span>
    <div class="breadcums-header hidden-md-down">
        <div class="breadcums-container">
            <div class="protect-items">
            @section('breadcums-header')
            @show
            </div>
        </div>
    </div>
    <?php /*<ul class="nav navbar-nav">
        <li class="nav-item active">
            <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">Link</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">Link</a>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="http://example.com" id="supportedContentDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Dropdown</a>
            <div class="dropdown-menu" aria-labelledby="supportedContentDropdown">
                <a class="dropdown-item" href="#">Action</a>
                <a class="dropdown-item" href="#">Another action</a>
                <a class="dropdown-item" href="#">Something else here</a>
            </div>
        </li>
    </ul>*/ ?>
</header>