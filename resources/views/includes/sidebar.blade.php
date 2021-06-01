<button class="m-aside-left-close  m-aside-left-close--skin-dark " id="m_aside_left_close_btn"><i
        class="la la-close"></i></button>
<div id="m_aside_left" class="m-grid__item	m-aside-left  m-aside-left--skin-dark ">

    <!-- BEGIN: Aside Menu -->
    <div id="m_ver_menu" class="m-aside-menu  m-aside-menu--skin-dark m-aside-menu--submenu-skin-dark "
         m-menu-vertical="1" m-menu-scrollable="1" m-menu-dropdown-timeout="500" style="position: relative;">
        <ul class="m-menu__nav  m-menu__nav--dropdown-submenu-arrow ">
            <li class="m-menu__item  "
                aria-haspopup="true"><a href="{{ route('index') }}" class="m-menu__link "><i
                        class="m-menu__link-icon flaticon-home"></i><span
                        class="m-menu__link-title"> <span
                            class="m-menu__link-wrap"> <span class="m-menu__link-text">Home</span>
											</span></span></a></li>
            <li class="m-menu__item {{ (request()->is('admin/dashboard')) ? 'activeMenu' : '' }} "
                aria-haspopup="true"><a href="{{ route('admin.dashboard.index') }}" class="m-menu__link "><i
                        class="m-menu__link-icon flaticon-dashboard"></i><span
                        class="m-menu__link-title"> <span
                            class="m-menu__link-wrap"> <span class="m-menu__link-text">Dashboard</span>
											</span></span></a></li>
            <li class="m-menu__item {{ (request()->is('admin/partners') || request()->is('admin/partners/*')) ? 'activeMenu' : '' }} "
                aria-haspopup="true"><a href="{{ route('admin.partners.index') }}" class="m-menu__link "><i
                        class="m-menu__link-icon flaticon-user-add"></i><span
                        class="m-menu__link-title"> <span
                            class="m-menu__link-wrap"> <span class="m-menu__link-text">Partners</span>
											</span></span></a></li>
            <li class="m-menu__item {{ (request()->is('admin/customers') || request()->is('admin/customers/*')) ? 'activeMenu' : '' }} "
                aria-haspopup="true"><a href="{{ route('admin.customers.index') }}" class="m-menu__link "><i
                        class="m-menu__link-icon flaticon-user-add"></i><span
                        class="m-menu__link-title"> <span
                            class="m-menu__link-wrap"> <span class="m-menu__link-text">Customers</span>
											</span></span></a></li>
            <li class="m-menu__item {{ (request()->is('admin/offers') || request()->is('admin/offers/*')) ? 'activeMenu' : '' }} "
                aria-haspopup="true"><a href="{{ route('admin.offers.index') }}" class="m-menu__link "><i
                        class="m-menu__link-icon flaticon-shopping-basket"></i><span
                        class="m-menu__link-title"> <span
                            class="m-menu__link-wrap"> <span class="m-menu__link-text">Offers</span>
											</span></span></a></li>
            <li class="m-menu__item {{ (request()->is('admin/orders') || request()->is('admin/orders/*')) ? 'activeMenu' : '' }} "
                aria-haspopup="true"><a href="{{ route('admin.orders.index') }}" class="m-menu__link "><i
                        class="m-menu__link-icon flaticon-shopping-basket"></i><span
                        class="m-menu__link-title"> <span
                            class="m-menu__link-wrap"> <span class="m-menu__link-text">Orders</span>
											</span></span></a></li>

            <li class="m-menu__item m-menu__item--submenu {{ (request()->is('admin/blogs') || request()->is('admin/blogs/*') || request()->is('admin/category-blogs') ||  request()->is('admin/category-blogs/*') || request()->is('admin/tag') ||  request()->is('admin/tag/*')) ? 'activeMenu m-menu__item--open' : '' }} "
                aria-haspopup="true" data-menu-submenu-toggle="hover">
                <a href="#" class="m-menu__link m-menu__toggle">
                    <i
                        class="m-menu__link-icon flaticon-questions-circular-button"></i>
                    <span class="m-menu__link-text">
												Blogs
											</span>
                    <i class="m-menu__ver-arrow la la-angle-right"></i>
                </a>
                <div class="m-menu__submenu" style="">
                    <span class="m-menu__arrow"></span>
                    <ul class="m-menu__subnav">
                        <li class="m-menu__item  {{ (request()->is('admin/tag') || request()->is('admin/tag/*'))? 'activeSubMenuItem' : ''}}"
                            aria-haspopup="true" data-redirect="true"><a
                                href="{{ route('admin.tag.index') }}" class="m-menu__link "><i
                                    class="m-menu__link-icon flaticon-questions-circular-button"></i><span
                                    class="m-menu__link-title"> <span
                                        class="m-menu__link-wrap"> <span class="m-menu__link-text">Tag</span>
											</span></span></a></li>
                        <li class="m-menu__item  {{ (request()->is('admin/category-blogs') || request()->is('admin/category-blogs/*'))? 'activeSubMenuItem' : ''}}"
                            aria-haspopup="true" data-redirect="true"><a
                                href="{{ route('admin.category-blogs.index') }}" class="m-menu__link "><i
                                    class="m-menu__link-icon flaticon-questions-circular-button"></i><span
                                    class="m-menu__link-title"> <span
                                        class="m-menu__link-wrap"> <span class="m-menu__link-text">Category</span>
											</span></span></a></li>
                        <li class="m-menu__item  {{ (request()->is('admin/blogs') || request()->is('admin/blogs/*'))? 'activeSubMenuItem' : ''}}"
                            aria-haspopup="true" data-redirect="true"><a
                                href="{{ route('admin.blogs.index') }}"
                                class="m-menu__link "><i
                                    class="m-menu__link-icon flaticon-questions-circular-button"></i><span
                                    class="m-menu__link-title"> <span
                                        class="m-menu__link-wrap"> <span class="m-menu__link-text">Blogs</span>
											</span></span></a></li>



                    </ul>
                </div>
            </li>
            <li class="m-menu__item  {{ (request()->is('admin/aboutus') || request()->is('admin/aboutus/*')) ? 'activeMenu' : '' }} "
                aria-haspopup="true"><a href="{{ route('admin.aboutus.index') }}" class="m-menu__link "><i
                        class="m-menu__link-icon flaticon-doc"></i><span
                        class="m-menu__link-title"> <span
                            class="m-menu__link-wrap"> <span class="m-menu__link-text">About Us</span>
											</span></span></a></li>
            <li class="m-menu__item  {{ (request()->is('admin/privacypolicy') || request()->is('admin/privacypolicy/*')) ? 'activeMenu' : '' }} "
                aria-haspopup="true"><a href="{{ route('admin.privacypolicy.index') }}" class="m-menu__link "><i
                        class="m-menu__link-icon flaticon-book"></i><span
                        class="m-menu__link-title"> <span
                            class="m-menu__link-wrap"> <span class="m-menu__link-text">Privacy Policy</span>
											</span></span></a></li>
            <li class="m-menu__item  {{ (request()->is('admin/settings') || request()->is('admin/settings/*')) ? 'activeMenu' : '' }} "
                aria-haspopup="true"><a href="{{ route('admin.settings.index') }}" class="m-menu__link "><i
                        class="m-menu__link-icon flaticon-settings"></i><span
                        class="m-menu__link-title"> <span
                            class="m-menu__link-wrap"> <span class="m-menu__link-text">Settings</span>
											</span></span></a></li>
            <li class="m-menu__item  {{ (request()->is('admin/emailtemplates') || request()->is('admin/emailtemplates/*')) ? 'activeMenu' : '' }} "
                aria-haspopup="true"><a href="{{ route('admin.emailtemplates.index') }}" class="m-menu__link "><i
                        class="m-menu__link-icon flaticon-email"></i><span
                        class="m-menu__link-title"> <span
                            class="m-menu__link-wrap"> <span class="m-menu__link-text">Email Templates</span>
											</span></span></a></li>
            <li class="m-menu__item  {{ (request()->is('admin/meta-tags') || request()->is('admin/meta-tags/*')) ? 'activeMenu' : '' }} "
                aria-haspopup="true"><a href="{{ route('admin.meta-tags.index') }}" class="m-menu__link "><i
                        class="m-menu__link-icon flaticon-information"></i><span
                        class="m-menu__link-title"> <span
                            class="m-menu__link-wrap"> <span class="m-menu__link-text">Meta Tags (SEO)</span>
											</span></span></a></li>


        </ul>

    </div>

    <!-- END: Aside Menu -->
</div>
