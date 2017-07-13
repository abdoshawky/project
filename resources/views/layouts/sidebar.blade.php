<!-- <li id="users"><a href="{{ url('dashboard/users') }}"><i class="icon-users"></i><span>Users</span></a></li>
<li id="shops"><a href="{{ url('dashboard/shops') }}"><i class="icon-users"></i><span>Shops</span></a></li>
<li id="products"><a href="{{ url('dashboard/products') }}"><i class="icon-users"></i><span>Products</span></a></li>
<li id="slider"><a href="{{ url('dashboard/slider') }}"><i class="icon-users"></i><span>Slider</span></a></li>
<li id="adds"><a href="{{ url('dashboard/adds') }}"><i class="icon-users"></i><span>Adds</span></a></li> -->
<li id="settings" class="nav-parent">
  <a href="#"><i class="icon-gears"></i><span data-translate="builder">الأعدادت</span> <span class="fa arrow"></span></a>
  <ul class="children collapse">
    <li id="main_settings"><a href="{!! url('dashboard/settings/main') !!}">الإعدادات العامة</a></li>
    <li><a href="../builder/page-builder/index.html"> المدن</a></li>
    <li id="classifications"><a href="{!! url('dashboard/settings/classifications') !!}"> تصنيفات الشركات</a></li>
    <li><a href="ecommerce-pricing-table.html"> اقسام الاعلانات</a></li>
  </ul>
</li>