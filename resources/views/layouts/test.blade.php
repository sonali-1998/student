
<!doctype html>
<html> 
    <body>
        <div class="container">

            <header class="row">
                @include('layouts.header')
            </header>

            <div id="main" class="row">

                <!-- sidebar content -->
                <div id="sidebar" class="col-md-4">
                    @include('layouts.sidebar')
                </div>

                <!-- main content -->
                <div id="content" class="col-md-8">
                    @yield('content')
                </div>

            </div>
 

        </div>
    </body>
</html>