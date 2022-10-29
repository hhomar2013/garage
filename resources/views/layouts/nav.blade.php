<nav class="navbar navbar-expand-md navbar-dark bg-dark shadow-sm">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ url('/') }}">
            {{ config('app.name', 'Laravel') }}
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav me-auto">
                <a href="{{ url('/') }}" class="nav-link text-warning active">الرئيسية</a>

                {{--Settings--}}
                <li class="nav-item dropdown">
                    <a class="nav-link " href="#" id="navbarDarkDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        الاعدادات
                    </a>
                    <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDarkDropdownMenuLink">
                        <li><a class="dropdown-item" href="{{route('group.index')}}">المجموعات</a></li>
                        <li><a class="dropdown-item" href="{{route('park.index')}}">البارك</a></li>
                    </ul>
                </li>


                {{--users--}}
                <li class="nav-item dropdown">
                    <a class="nav-link " href="#" id="navbarDarkDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        إدارة المستخدمين
                    </a>
                    <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDarkDropdownMenuLink">
                        <li><a class="dropdown-item" href="{{route('users.index')}}">المستخدمين</a></li>
                        <li><a class="dropdown-item" href="{{route('roles.index')}}">الصلاحيــات</a></li>
                    </ul>
                </li>

                    <a href="{{ route('customers.index') }}" class="nav-link  ">إدارة العملاء</a>{{--Customers--}}


                {{--reports--}}
                <li class="nav-item dropdown">
                    <a class="nav-link " href="#" id="navbarDarkDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        التقارير
                    </a>
                    <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDarkDropdownMenuLink">
                        <li><a class="dropdown-item" href="{{route('show_parking')}}">مبيت السيارات</a></li>

                    </ul>
                </li>

            </ul>
        </div>



            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ms-auto">
                <!-- Authentication Links -->
                @guest

                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }}
                        </a>

                        <div class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDropdown">
{{--                            <a class="dropdown-item" href="{{ route('logout') }}"--}}
{{--                               onclick="event.preventDefault();--}}
{{--                                                     document.getElementById('logout-form').submit();">--}}
{{--                                {{ __('Logout') }}--}}
{{--                            </a>--}}
{{--                            <form id="logout-form" action="{{ route('users.logout') }}" method="POST" class="d-none">--}}
{{--                                @csrf--}}
{{--                            </form>--}}
                            <a class="dropdown-item" href="{{ route('users.logout') }} ">
                                تسجيل خروج
                            </a>

                        </div>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>
