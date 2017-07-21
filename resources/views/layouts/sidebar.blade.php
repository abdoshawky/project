
<li id="settings" class="nav-parent">
    <a href="#"><i class="fa fa-gears"></i><span data-translate="builder">{!! Lang::get('dashboard.settings') !!}</span> <span class="fa arrow"></span></a>
    <ul class="children collapse">
        <li id="main_settings"><a href="{!! url('dashboard/settings/main') !!}">{!! Lang::get('dashboard.main_settings') !!}</a></li>
        <li id="governorates"><a href="{!! url('dashboard/settings/governorates') !!}">{!! Lang::get('dashboard.governorates').' & '.Lang::get('dashboard.cities') !!}</a></li>
        <li id="classifications"><a href="{!! url('dashboard/settings/classifications') !!}"> {!! Lang::get('dashboard.companies_classifications') !!}</a></li>
        <li id="types"><a href="{!! url('dashboard/settings/types') !!}">{!! Lang::get('dashboard.ads_types') !!}</a></li>
        <li id="sections"><a href="{!! url('dashboard/settings/sections') !!}">{!! Lang::get('dashboard.ads_sections') !!}</a></li>
    </ul>
</li>

<li id="contact"><a href="{{ url('dashboard/contact') }}"><i class="fa fa-phone"></i><span>{!! Lang::get('dashboard.contact_requests') !!}</span></a></li>

<li id="members" class="nav-parent">
    <a href="#"><i class="fa fa-users"></i><span data-translate="builder">{!! Lang::get('dashboard.members') !!}</span> <span class="fa arrow"></span></a>
    <ul class="children collapse">
        <li id="users"><a href="{!! url('dashboard/users') !!}"> {!! Lang::get('dashboard.users') !!}</a></li>
        <li id="companies"><a href="{!! url('dashboard/companies') !!}">{!! Lang::get('dashboard.companies') !!}</a></li>
    </ul>
</li>
