<!DOCTYPE html>
<html>
    <head>
        <title></title>
    </head>
    <body>
        <h4>Admin Dashboard</h4>
        <!-- Authentication -->
        <form method="POST" action="{{ route('logout') }}">
            @csrf

            <x-responsive-nav-link :href="route('logout')"
                    onclick="event.preventDefault();
                                this.closest('form').submit();">
                {{ __('Log Out') }}
            </x-responsive-nav-link>
        </form>
    </body>
</html>