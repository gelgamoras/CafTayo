<!-- 
I'mma keep layouts for admin and concessionaire separate muna habang wala pang log in/users, 
saka ko na ipagsama if meron na. Sorry still learning ✌️
-->
<div class="page-header row no-gutters py-4" style="justify-content: space-between;">
    <div class="col-12 col-sm-4 text-center text-sm-left mb-0">
        <span class="text-uppercase page-subtitle">@yield('subheader')</span>
        <h3 class="page-title">
            @yield('page_header')
        </h3>
    </div>
    <div class="col-12 col-sm-4 text-center text-sm-right mb-0">
        <span class="text-uppercase page-subtitle">@yield('subheader2')</span>
        <h3 class="page-title">
            @yield('page_top_buttons')
        </h3>
    </div>
</div>