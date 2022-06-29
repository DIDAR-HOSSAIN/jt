<!-- Left Panel -->

<aside id="left-panel" class="left-panel">
    <nav class="navbar navbar-expand-sm navbar-default">

        <div class="navbar-header">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fa fa-bars"></i>
            </button>
            <a class="navbar-brand" href="{{route('dashboard.index')}}"><img src="{{asset('backend-lib/images/sliders/4nslogo.jpg')}}" alt="Logo"></a>
            <a class="navbar-brand hidden" href="./"><img src="images/logo2.png" alt="Logo"></a>
        </div>

        <div id="main-menu" class="main-menu collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li class="active">
                    <a href="{{route('dashboard.index')}}"> <i class="menu-icon fa fa-dashboard"></i>Dashboard </a>
                </li>
                <h3 class="menu-title">UI Elements</h3><!-- /.menu-title -->
                <li class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-bank"></i>Bank Menu</a>
                    <ul class="sub-menu children dropdown-menu">
                        <li><i class="menu-icon fa fa-th"></i><a href="{{route('customers.create')}}">Add Customer</a></li>
                        <li><i class="menu-icon fa fa-th"></i><a href="{{route('customers.index')}}">Customer List</a></li>
                        <li><i class="menu-icon fa fa-th"></i><a href="{{route('balancebd.create')}}">Add Balance B/D</a></li>
                        <li><i class="menu-icon fa fa-th"></i><a href="{{route('balancebd.index')}}">Balance B/D List</a></li>
                        <li><i class="menu-icon fa fa-th"></i><a href="{{route('virtualbd.create')}}">Add Virtual B/D</a></li>
                        <li><i class="menu-icon fa fa-th"></i><a href="{{route('virtualbd.index')}}">Virtual B/D List</a></li>
                        <li><i class="menu-icon fa fa-th"></i><a href="{{route('incomes.create')}}">Add Trading</a></li>
                        <li><i class="menu-icon fa fa-th"></i><a href="{{route('incomes.index')}}">Trading List</a></li>
                        <li><i class="menu-icon fa fa-th"></i><a href="{{route('expenses.create')}}">Expense Entry</a></li>
                        <li><i class="menu-icon fa fa-th"></i><a href="{{route('expenses.index')}}">Expense List</a></li>
                    </ul>
                </li>

                <li class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-mobile"></i>Rocket Menu</a>
                    <ul class="sub-menu children dropdown-menu">

                        {{--                        <li><i class="menu-icon fa fa-th"></i><a href="{{route('balancecash.create')}}">Add Balance Cash</a></li>--}}
                        {{--                        <li><i class="menu-icon fa fa-th"></i><a href="{{route('balancecash.index')}}">Balance Cash List</a></li>--}}
                        <li><i class="menu-icon fa fa-th"></i><a href="{{route('virtualcash.create')}}">Add Virtual Cash (Rocket)</a></li>
                        <li><i class="menu-icon fa fa-th"></i><a href="{{route('virtualcash.index')}}">Virtual Cash List (Rocket)</a></li>
                    </ul>
                </li>

                <li class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-list"></i>Category Entry</a>
                    <ul class="sub-menu children dropdown-menu">

                        <li><i class="menu-icon fa fa-th"></i><a href="{{route('incomecategories.create')}}">Income Category Entry</a></li>
                        <li><i class="menu-icon fa fa-th"></i><a href="{{route('incomecategories.index')}}">Income Category List</a></li>
                        <li><i class="menu-icon fa fa-th"></i><a href="{{route('expensecategories.create')}}">Expense Category Entry</a></li>
                        <li><i class="menu-icon fa fa-th"></i><a href="{{route('expensecategories.index')}}">Expense Category List</a></li>
                        <li><i class="menu-icon fa fa-th"></i><a href="{{route('relations.create')}}">Relation Category Create</a></li>
                        <li><i class="menu-icon fa fa-th"></i><a href="{{route('relations.index')}}">Relation Category List</a></li>

                    </ul>
                </li>

                <li class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-credit-card"></i>Others Elements</a>
                    <ul class="sub-menu children dropdown-menu">

                        <li><i class="fa fa-table"></i><a href="{{route('sliders.create')}}">Add Slider</a></li>
                        <li><i class="fa fa-table"></i><a href="{{route('sliders.index')}}">Slider List</a></li>
                        <li><i class="menu-icon fa fa-th"></i><a href="{{route('salaries.create')}}">Add Empployee</a></li>
                        <li><i class="menu-icon fa fa-th"></i><a href="{{route('salaries.index')}}">Empployee List</a></li>
                    </ul>
                </li>

                <li class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-credit-card"></i>User Setup</a>
                    <ul class="sub-menu children dropdown-menu">
                        @role('Admin')
                        <li><i class="fa fa-table"></i><a href="{{route('users.create')}}">Create User</a></li>
                        <li><i class="fa fa-table"></i><a href="{{route('users.index')}}">User List</a></li>
                        <li><i class="menu-icon fa fa-th"></i><a href="{{route('roles.create')}}">Create Role</a></li>
                        <li><i class="menu-icon fa fa-th"></i><a href="{{route('roles.index')}}">Role List</a></li>
                     @endrole
                    </ul>
                </li>

                <h3 class="menu-title">Reports</h3><!-- /.menu-title -->

                <li class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-bar-chart"></i>Reports</a>
                    <ul class="sub-menu children dropdown-menu">
                        <li><i class="fa fa-table"></i><a href="{{URL::to('commiSearch')}}">Commission Summary</a></li>
                        <li><i class="fa fa-table"></i><a href="{{URL::to('incomeExpSearch')}}">Income Expense Statement</a></li>
                        <li><i class="fa fa-table"></i><a href="{{URL::to('incomeExpenseSearch')}}">Income Expense Summary</a></li>
                        <li><i class="fa fa-table"></i><a href="{{URL::to('expensesSearch')}}">Expense Summary</a></li>
                        <li><i class="fa fa-table"></i><a href="{{URL::to('expSearch')}}">Details Expense Summary</a></li>
                    </ul>
                </li>

                <h3 class="menu-title">Login/Register</h3><!-- /.menu-title -->
                <li class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-glass"></i>Pages</a>
                    <ul class="sub-menu children dropdown-menu">
                        <li><i class="menu-icon fa fa-sign-in"></i><a href="page-login.html">Login</a></li>
                        <li><i class="menu-icon fa fa-sign-in"></i><a href="page-register.html">Register</a></li>
                        <li><i class="menu-icon fa fa-paper-plane"></i><a href="pages-forget.html">Forget Pass</a></li>
                    </ul>
                </li>

            </ul>
        </div><!-- /.navbar-collapse -->
    </nav>
</aside><!-- /#left-panel -->

<!-- Left Panel -->
