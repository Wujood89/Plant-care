<li class="nav-item">
    <a href="/dashboard" class="nav-link {{ str_contains(url()->current(), '/dashboard')? 'active':' ' }}">
        <i class="fas fa-tachometer-alt" style="{{ App::isLocale('ar')? 'margin-right: 1rem;' : 'margin-left: 1rem;' }}"></i>
        <p class="ml-2">Monitoring</p>
    </a>
</li>
<li class="nav-item">
    <a href="/allReadings" class="nav-link {{ str_contains(url()->current(), '/allReadings')? 'active':' ' }}">
        <i class="fas fa-poll-h" style="{{ App::isLocale('ar')? 'margin-right: 1rem;' : 'margin-left: 1rem;' }}"></i>
        <p class="ml-2">All Readings</p>
    </a>
</li>
<li class="nav-item">
    <a href="/warnings" class="nav-link {{ str_contains(url()->current(), '/warnings')? 'active':' ' }}">
        <i class="fas fa-exclamation-circle" style="{{ App::isLocale('ar')? 'margin-right: 1rem;' : 'margin-left: 1rem;' }}"></i>
        <p class="ml-2">Warnings</p>
    </a>
</li>
<li class="nav-item">
    <a href="/penalties" class="nav-link {{ str_contains(url()->current(), '/penalties')? 'active':' ' }}">
        <i class="fas fa-exclamation-triangle" style="{{ App::isLocale('ar')? 'margin-right: 1rem;' : 'margin-left: 1rem;' }}"></i>
        <p class="ml-2">Penalties</p>
    </a>
</li>
<li class="nav-item">
    <a href="/admin" class="nav-link {{ str_contains(url()->current(), '/admin')? 'active':' ' }}">
        <i class="fas fa-cog" style="{{ App::isLocale('ar')? 'margin-right: 1rem;' : 'margin-left: 1rem;' }}"></i>
        <p class="ml-2">Admin</p>
    </a>
</li>
