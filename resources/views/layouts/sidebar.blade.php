<style>
    .countMessage {
        position: absolute;
        top: -5px;
        left: 15px;
        width: 15px;
        height: 15px;
        border-radius: 50px;
        background: #ff0000;
        display: flex;
        justify-content: center;
        align-items: center;
        color: #fff;
        font-size: 8px;
        text-indent: 0;
    }
</style>

<!--Sidebar-Menu-Section-->
<div class="app-sidebar sidebar-shadow">
    <div class="scrollbar-sidebar">

        <div class="branding-logo">
            <a href="/" target="_blank"><img src="#" alt="logo">
            </a>
        </div>


        <div class="branding-logo-forMobile mb-4">
            <a href="/" target="_blank"><img src="#" alt=""></a>
        </div>
        <div class="app-sidebar-inner border-top">
            <ul class="vertical-nav-menu">

                {{-- dashboard start --}}
                <li class="menu-divider">
                    <span class="menu-title">{{ __('Dashboard') }}</span>
                </li>

                {{-- @if (Auth::user()->hasRole('admin')) --}}
                    <li>
                        <a class="menu {{ request()->is('admin') ? 'active' : '' }}" href="">
                            <span>
                                <img class="menu-icon" src="{{ asset('assets/images/menu/home-roof.svg') }}" alt="icon"
                                     loading="lazy"/>
                                {{ __('Dashboard') }}
                            </span>
                        </a>
                    </li>
                {{-- @elseif(Auth::user()->hasRole('instructor')) --}}
                    <li>
                        <a class="menu {{ request()->is('admin') ? 'active' : '' }}" href="">
                            <span>
                                <img class="menu-icon" src="{{ asset('assets/images/menu/home-roof.svg') }}" alt="icon"
                                     loading="lazy"/>
                                {{ __('Dashboard') }}
                            </span>
                        </a>
                    </li>
                {{-- @endif --}}
                {{-- dashboard start --}}


                {{-- category start --}}
                <li class="menu-divider">
                    <span class="menu-title">{{ __('Exam or Course Category') }}</span>
                </li>

                <li>
                    <a class="menu {{ request()->is('admin/category/*') ? 'active' : '' }}"
                       href="#">
                        <span>
                            <img class="menu-icon" src="{{ asset('assets/images/menu/home-roof.svg') }}" alt="icon"
                                 loading="lazy"/>
                            {{ __('Category') }}

                        </span>
                    </a>
                </li>
                {{-- Caegory start --}}


                {{-- course start --}}
                {{-- @canany(['course.index', 'chapter.index']) --}}
                    <li class="menu-divider">
                        <span class="menu-title">{{ __('Course') }}</span>
                    </li>
                    <li>
                        <a class="menu {{ request()->is('admin/course*') || request()->is('admin/chapter*') ? 'active' : '' }}"
                           data-bs-toggle="collapse" href="#ordersCourse">
                            <span>
                                <img class="menu-icon" src="{{ asset('assets/images/menu/book-open-text.svg') }}"
                                     alt="icon"
                                     loading="lazy"/>
                                {{ __('Course Management') }}
                            </span>
                            <img src="{{ asset('assets/images/menu/angle-down-small.svg') }}" alt="icon"
                                 class="downIcon"/>
                        </a>
                        <div
                            class="collapse dropdownMenuCollapse {{ request()->is('admin/category*', 'admin/course*', 'admin/chapter*') ? 'show' : '' }}"
                            id="ordersCourse">
                            <div class="listBar">

                                {{-- @can('course.index') --}}
                                    <a href="#"
                                       class="subMenu hasCount {{ request()->is('admin/course*') ? 'active' : '' }}">
                                        {{ __('Course') }}
                                    </a>
                                {{-- @endcan --}}
                                {{-- @can('chapter.index') --}}
                                    <a href="#"
                                       class="subMenu hasCount {{ request()->is('admin/chapter*') ? 'active' : '' }}">
                                        {{ __('Chapter') }}
                                    </a>
                                {{-- @endcan --}}
                            </div>
                        </div>
                    </li>
                {{-- @endcanany --}}
                {{-- course end --}}


                {{-- Exam event start --}}

                {{-- @canany(['exam_event.index']) --}}
                    <li class="menu-divider">
                        <span class="menu-title">{{ __('Exam Event') }}</span>
                    </li>
                    <li>
                        <a class="menu {{
                    request()->is('admin/exam_events/*')
                    || request()->is('admin/exam_material/*')
                    || request()->is('admin/exam_certificate/*')
                    || request()->is('admin/exam_events/transaction/*') }}" data-bs-toggle="collapse"
                           href="#examEvent">
                                    <span>
                                        <img class="menu-icon"
                                             src="{{ asset('assets/images/menu/book-open-text.svg') }}" alt="icon"
                                             loading="lazy"/>
                                        {{ __('Exam Events') }}
                                    </span>
                            <img src="{{ asset('assets/images/menu/angle-down-small.svg') }}" alt="icon"
                                 class="downIcon"/>
                        </a>
                        <div class="collapse dropdownMenuCollapse {{
                    request()->is('admin/exam_events/*')
                    || request()->is('admin/exam_material/*')
                    || request()->is('admin/exam_certificate/*')
                    || request()->is('admin/exam_events/transaction/*') ? 'show' : '' }}" id="examEvent">
                            <div class="listBar">
                                {{-- @can('exam_event.dashboard') --}}
                                    <a href="#"
                                       class="subMenu hasCount {{ request()->is('admin/exam_events/dashboard') ? 'active' : '' }}">
                                        {{ __('Dashboard') }}
                                    </a>
                                {{-- @endcan --}}

                                {{-- @can('exam_event.index') --}}
                                    <a href="#" class="subMenu hasCount {{ request()->is('admin/exam_events/*')
                                            && !request()->is('admin/exam_events/dashboard')
                                            && !request()->is('admin/exam_events/transaction/*') ? 'active' : '' }}">
                                        {{ __('Exam Event') }}
                                    </a>
                                {{-- @endcan --}}
                                {{-- @can('exam_material.select_exam_event') --}}
                                    <a href="#"
                                       class="subMenu hasCount {{ request()->is('admin/exam_material/*') ? 'active' : '' }}">
                                        {{ __('Exam Material') }}
                                    </a>
                                {{-- @endcan --}}

                                {{-- @can('exam_certificate.select_exam_event') --}}
                                    <a href="#"
                                       class="subMenu hasCount {{ request()->is('admin/exam_certificate/select_exam*') ? 'active' : '' }}">
                                        {{ __('Candidates') }}
                                    </a>
                                {{-- @endcan --}}

                                {{-- @can('exam_certificate.select_exam_event') --}}
                                    <a href="#"
                                       class="subMenu hasCount {{ request()->is('admin/exam_certificate/branch*') ? 'active' : '' }}">
                                        {{ __('Branch Candidates') }}
                                    </a>
                                {{-- @endcan --}}

                                {{-- @can('exam_event_transaction.index') --}}
                                    <a href="#"
                                       class="subMenu hasCount {{ request()->is('admin/exam_events/transaction/*') ? 'active' : '' }}">
                                        {{ __('Transactions') }}
                                    </a>
                                {{-- @endcan --}}

                            </div>
                        </div>
                    </li>
                {{-- @endcanany --}}
                {{-- Exam event end --}}

                {{-- exam start --}}
                {{-- @canany(['exam.select_course', 'quiz.select_course']) --}}
                    <li>
                        <a class="menu {{ request()->is('admin/exam/*') || request()->is('admin/quiz/*') ? 'active' : '' }}"
                           data-bs-toggle="collapse" href="#ordersExam">
                            <span>
                                <img class="menu-icon" src="{{ asset('assets/images/menu/pencil-paper.svg') }}"
                                     alt="icon"
                                     loading="lazy"/>
                                {{ __('Exam Management') }}
                            </span>
                            <img src="{{ asset('assets/images/menu/angle-down-small.svg') }}" alt="icon"
                                 class="downIcon"/>
                        </a>
                        <div
                            class="collapse dropdownMenuCollapse {{ request()->is('admin/exam/*', 'admin/quiz/*') ? 'show' : '' }}"
                            id="ordersExam">
                            <div class="listBar">
                                {{-- @can('exam.select_course') --}}
                                    <a href="#"
                                       class="subMenu hasCount {{ request()->is('admin/exam/*') ? 'active' : '' }}">
                                        {{ __('Exam') }}
                                    </a>
                                {{-- @endcan --}}
                                {{-- @can('quiz.select_course') --}}
                                    <a href="#"
                                       class="subMenu hasCount {{ request()->is('admin/quiz/*') ? 'active' : '' }}">
                                        {{ __('Quiz') }}
                                    </a>
                                {{-- @endcan --}}
                            </div>
                        </div>
                    </li>
                {{-- @endcanany --}}
                {{-- exam end --}}

                {{-- coupon start --}}
                {{-- @canany(['coupon.index', 'coupon.create']) --}}
                    <li>
                        <a class="menu {{ request()->is('admin/coupon*') ? 'active' : '' }}" data-bs-toggle="collapse"
                           href="#ordersCoupon">
                            <span>
                                <img class="menu-icon" src="{{ asset('assets/images/menu/coupon-percent.svg') }}"
                                     alt="icon"
                                     loading="lazy"/>
                                {{ __('Coupon Management') }}
                            </span>
                            <img src="{{ asset('assets/images/menu/angle-down-small.svg') }}" alt="icon"
                                 class="downIcon"/>
                        </a>
                        <div class="collapse dropdownMenuCollapse {{ request()->is('admin/coupon*') ? 'show' : '' }}"
                             id="ordersCoupon">
                            <div class="listBar">
                                @can('coupon.index')
                                    <a href="#"
                                       class="subMenu hasCount {{ request()->is('admin/coupon/list*') ? 'active' : '' }}">
                                        {{ __('Coupon List') }}
                                    </a>
                                @endcan
                                @can('coupon.create')
                                    <a href="#"
                                       class="subMenu hasCount {{ request()->is('admin/coupon/create*') ? 'active' : '' }}">
                                        {{ __('New Coupon') }}
                                    </a>
                                @endcan
                            </div>
                        </div>
                    </li>
                {{-- @endcanany --}}
                {{-- coupon end --}}

                <li class="menu-divider">
                    <span class="menu-title">{{ __('Subscribers') }}</span>
                </li>

                <li>
                    <a class="menu" href="#">
                        <span>
                            <img class="menu-icon" src="{{ asset('assets/images/menu/subscription_plan.svg') }}"
                                 alt="icon" loading="lazy"/>
                            {{ __('Subscribers Management') }}
                        </span>
                    </a>
                </li>

                {{-- @canany(['user.index', 'enrollment.index', 'review.index']) --}}
                    <li class="menu-divider">
                        <span class="menu-title">{{ __('Student') }}</span>
                    </li>
                {{-- @endcanany --}}

                {{-- enrollment start --}}
                {{-- @canany(['enrollment.index', 'review.index']) --}}
                    <li>
                        <a class="menu {{ request()->is('admin/enrollment*') || request()->is('admin/review*') ? 'active' : '' }}"
                           data-bs-toggle="collapse" href="#ordersEnrollmentReview">
                            <span>
                                <img class="menu-icon" src="{{ asset('assets/images/menu/students.svg') }}" alt="icon"
                                     loading="lazy"/>
                                {{ __('Enrollment Management') }}
                            </span>
                            <img src="{{ asset('assets/images/menu/angle-down-small.svg') }}" alt="icon"
                                 class="downIcon"/>
                        </a>
                        <div
                            class="collapse dropdownMenuCollapse {{ request()->is('admin/enrollment*') || request()->is('admin/review*') ? 'show' : '' }}"
                            id="ordersEnrollmentReview">
                            <div class="listBar">
                                @can('enrollment.index')
                                    <a href="#"
                                       class="subMenu hasCount {{ request()->is('admin/enrollment*') ? 'active' : '' }}">
                                        {{ __('Enrollment') }}
                                    </a>
                                @endcan
                                @can('review.index')
                                    <a href="#"
                                       class="subMenu hasCount {{ request()->is('admin/review*') ? 'active' : '' }}">
                                        {{ __('Review') }}
                                    </a>
                                @endcan
                            </div>
                        </div>
                    </li>
                {{-- @endcanany --}}
                {{-- enrollment end --}}



                {{-- student start --}}
                {{-- @canany(['user.index', 'group.index']) --}}
                    <li>
                        <a class="menu {{ request()->is('admin/user*') || request()->is('admin/group*') ? 'active' : '' }}"
                           data-bs-toggle="collapse" href="#studentsManagement">
                            <span>
                                <img class="menu-icon" src="{{ asset('assets/images/menu/users-group.svg') }}"
                                     alt="icon"
                                     loading="lazy"/>
                                {{ __('Students Management') }}
                            </span>
                            <img src="{{ asset('assets/images/menu/angle-down-small.svg') }}" alt="icon"
                                 class="downIcon"/>
                        </a>
                        <div
                            class="collapse dropdownMenuCollapse {{ request()->is('admin/user*') || request()->is('admin/group*') ? 'show' : '' }}"
                            id="studentsManagement">
                            <div class="listBar">
                                @can('user.index')
                                    <a href="#"
                                       class="subMenu hasCount {{ request()->is('admin/user/*') ? 'active' : '' }}">
                                        {{ __('Students') }}
                                    </a>
                                @endcan
                                @can('group.index')
                                    <a href="#"
                                       class="subMenu hasCount {{ request()->is('admin/group/*') ? 'active' : '' }}">
                                        {{ __('Group') }}
                                    </a>
                                @endcan
                                @can('group.course.index')
                                    <a href="#"
                                       class="subMenu hasCount {{ request()->is('admin/group/course/*') ? 'active' : '' }}">
                                        {{ __('Group Courses') }}
                                    </a>
                                @endcan
                            </div>
                        </div>
                    </li>
                {{-- @endcanany --}}
                {{-- student end --}}



                {{-- instructor start --}}
                @canany(['instructor.index', 'instructor.create'])
                    <li class="menu-divider">
                        <span class="menu-title">{{ __('Instructor') }}</span>
                    </li>
                    <li>
                        <a class="menu {{ request()->is('admin/instructor*') ? 'active' : '' }}"
                           data-bs-toggle="collapse"
                           href="#ordersInstructor">
                            <span>
                                <img style="text-primary" class="menu-icon"
                                     src="{{ asset('assets/images/menu/teacher 01.svg') }}" alt="icon" loading="lazy"/>
                                {{ __('Instructor Management') }}
                            </span>
                            <img src="{{ asset('assets/images/menu/angle-down-small.svg') }}" alt="icon"
                                 class="downIcon"/>
                        </a>
                        <div
                            class="collapse dropdownMenuCollapse {{ request()->is('admin/instructor*') ? 'show' : '' }}"
                            id="ordersInstructor">
                            <div class="listBar">
                                @can('instructor.index')
                                    <a href="#"
                                       class="subMenu hasCount {{ request()->is('admin/instructor/list*') || request()->is('admin/instructor/edit*') ? 'active' : '' }}">
                                        {{ __('Instructor List') }}
                                    </a>
                                @endcan
                                @can('instructor.create')
                                    <a href="#"
                                       class="subMenu hasCount {{ request()->is('admin/instructor/create') ? 'active' : '' }}">
                                        {{ __('New Instructor') }}
                                    </a>
                                @endcan
                                @can('instructor.featured')
                                    <a href="#"
                                       class="subMenu hasCount {{ request()->is('admin/instructor/featured*') ? 'active' : '' }}">
                                        {{ __('Featured Instructors') }}
                                    </a>
                                @endcan
                            </div>
                        </div>
                    </li>
                @endcanany
                {{-- instructor end --}}

                {{-- company management start --}}
                @canany(['branch_manager.index', 'branch_manager.create'])
                    <li class="menu-divider">
                        <span class="menu-title">{{ __('Branches') }}</span>
                    </li>
                    <li>
                        <a class="menu {{ request()->is('admin/branch*') ? 'active' : '' }}"
                           data-bs-toggle="collapse" href="#branch">
                            <span>
                                <img style="text-primary" class="menu-icon"
                                     src="{{ asset('assets/images/menu/company_registration.svg') }}" alt="icon"
                                     loading="lazy"/>
                                {{ __('Branch Management') }}
                            </span>
                            <img src="{{ asset('assets/images/menu/angle-down-small.svg') }}" alt="icon"
                                 class="downIcon"/>
                        </a>
                        <div class="collapse dropdownMenuCollapse {{ request()->is('admin/branch*') ? 'show' : '' }}"
                             id="branch">
                            <div class="listBar">
                                @can('branch.index')
                                    <a href="#"
                                       class="subMenu hasCount {{ request()->is('admin/branch/list*') || request()->is('admin/branch/edit*') ? 'active' : '' }}">
                                        {{ __('Branch List') }}
                                    </a>
                                @endcan
                                @can('branch.create')
                                    <a href="#"
                                       class="subMenu hasCount {{ request()->is('admin/branch/create') ? 'active' : '' }}">
                                        {{ __('New Branch') }}
                                    </a>
                                @endcan
                                @can('branch_manager.index')
                                    <a href="#"
                                       class="subMenu hasCount {{ request()->is('admin/branch-manager/list') || request()->is('admin/branch-manager/edit/*') ? 'active' : '' }}">
                                        {{ __('Branch Operator List') }}
                                    </a>
                                @endcan
                                @can('branch_manager.create')
                                    <a href="#"
                                       class="subMenu hasCount {{ request()->is('admin/branch-manager/create') ? 'active' : '' }}">
                                        {{ __('New Branch Operator') }}
                                    </a>
                                @endcan

                            </div>
                        </div>
                    </li>
                @endcanany
                {{-- company management end --}}




                {{-- Blog --}}
                @can('blog.index')
                    <li class="menu-divider">
                        <span class="menu-title">{{ __('Blogs') }}</span>
                    </li>
                    <li>
                        <a class="menu {{ request()->is('admin/blog*') ? 'active' : '' }}" data-bs-toggle="collapse"
                           href="#ordersBlog">
                            <span>
                                <img style="text-primary" class="menu-icon"
                                     src="{{ asset('assets/images/menu/blog.svg') }}"
                                     alt="icon" loading="lazy"/>
                                {{ __('Blog Management') }}
                            </span>
                            <img src="{{ asset('assets/images/menu/angle-down-small.svg') }}" alt="icon"
                                 class="downIcon"/>
                        </a>
                        <div class="collapse dropdownMenuCollapse {{ request()->is('admin/blog*') ? 'show' : '' }}"
                             id="ordersBlog">
                            <div class="listBar">
                                @can('blog.index')
                                    <a href="#"
                                       class="subMenu hasCount {{ request()->is('admin/blog/list*') ? 'active' : '' }}">
                                        {{ __('Blog Lists') }}
                                    </a>
                                @endcan
                                @can('instructor.create')
                                    <a href="#"
                                       class="subMenu hasCount {{ request()->is('admin/blog/create') ? 'active' : '' }}">
                                        {{ __('New Blog') }}
                                    </a>
                                @endcan
                            </div>
                        </div>
                    </li>
                @endcan


                {{-- Blog end --}}

                {{-- payment start --}}
                @canany(['transaction.index', 'payment_gateway.index'])
                    <li class="menu-divider">
                        <span class="menu-title">{{ __('Payment') }}</span>
                    </li>
                @endcanany

                {{-- trsaction start --}}
                @canany(['transaction.index'])
                    <li>
                        <a class="menu {{ request()->is('admin/transaction*') ? 'active' : '' }}"
                           href="{{ route('transaction.index') }}">
                            <span>
                                <img class="menu-icon" src="{{ asset('assets/images/menu/invoice.svg') }}" alt="icon"
                                     loading="lazy"/>
                                {{ __('Transaction') }}
                            </span>
                        </a>
                    </li>
                @endcanany
                {{-- trsaction end --}}

                {{-- payment gateway start --}}
                @can('payment_gateway.index')
                    <li>
                        <a class="menu {{ request()->is('admin/payment_gateway*') ? 'active' : '' }}"
                           href="#">
                            <span>
                                <img class="menu-icon" src="{{ asset('assets/images/menu/user-change.svg') }}"
                                     alt="icon"
                                     loading="lazy"/>
                                {{ __('Payment Method') }}
                            </span>
                        </a>
                    </li>
                @endcan



                {{-- payment gateway end --}}

                <li class="menu-divider">
                    <span class="menu-title">{{ __('Query & Profile Management') }}</span>
                </li>

                {{-- testimonial start --}}
                @can('testimonial.index')
                    <li>
                        <a class="menu {{ request()->is('admin/testimonial*') ? 'active' : '' }}"
                           href="#">
                            <span>
                                <img class="menu-icon" src="{{ asset('assets/images/menu/testimonial.svg') }}"
                                     alt="icon"
                                     loading="lazy"/>
                                {{ __('Testimonial') }}
                            </span>
                        </a>
                    </li>
                @endcan

                {{-- testimonial end --}}

                {{-- newsletter start --}}
                @can('newslatter.index')
                    <li>
                        <a class="menu {{ request()->is('admin/newslatter*') ? 'active' : '' }}"
                           href="#">
                            <span>
                                <img class="menu-icon" src="{{ asset('assets/images/menu/subscription.svg') }}"
                                     alt="icon"
                                     loading="lazy"/>
                                {{ __('Newslatter Subscribers') }}
                            </span>
                        </a>
                    </li>
                @endcan

                {{-- newsletter end --}}

                {{-- Notification start --}}
                @canany(['notification.index'])
                    <li>
                        <a class="menu {{ request()->is('admin/notification/*') ? 'active' : '' }}"
                           data-bs-toggle="collapse" href="#notificationManagement">
                            <span>
                                <img style="text-primary" class="menu-icon"
                                     src="{{ asset('assets/images/menu/bell-on.svg') }}" alt="icon" loading="lazy"/>
                                {{ __('Notification Management') }}
                            </span>
                            <img src="{{ asset('assets/images/menu/angle-down-small.svg') }}" alt="icon"
                                 class="downIcon"/>
                        </a>
                        <div
                            class="collapse dropdownMenuCollapse {{ request()->is('admin/notification*') ? 'show' : '' }}"
                            id="notificationManagement">
                            <div class="listBar">
                                @can('notification.index')
                                    <a href="#"
                                       class="subMenu hasCount {{ request()->is('admin/notification/list*') ? 'active' : '' }}">
                                        {{ __('Pre-defined Notification') }}
                                    </a>
                                @endcan
                                <a href="#"
                                   class="subMenu hasCount {{ request()->is('admin/notification/custom/*') ? 'active' : '' }}">
                                    {{ __('Custom Notification') }}
                                </a>
                            </div>
                        </div>
                    </li>
                @endcanany
                {{-- notification end --}}

                {{-- @php
                    $count = 0;
                    if (auth()->user()->hasRole('admin')) {
                        $count = \App\Models\ContactMessage::where('state', 0)->count();
                    }
                @endphp --}}

                {{-- contact us start --}}
                @can('contact.index')
                    <li>
                        <a class="menu {{ request()->is('admin/contact*') ? 'active' : '' }}"
                           href="#">
                            <span class="position-relative">
                                <img class="menu-icon" src="{{ asset('assets/images/menu/message.svg') }}" alt="icon"
                                     loading="lazy"/>
                                <div class="countMessage">
                                    5
                                </div>
                                {{ __('Messages') }}
                            </span>
                        </a>
                    </li>
                @endcan
                {{-- contact us end --}}

                {{-- super admin start --}}
                @canany('admin.index')
                    <li>
                        <a class="menu {{ request()->is('admin/root*') ? 'active' : '' }}"
                           href="#">
                            <span>
                                <img class="menu-icon" src="{{ asset('assets/images/menu/user-settings.svg') }}"
                                     alt="icon"
                                     loading="lazy"/>
                                {{ __('Super Admin') }}
                            </span>
                        </a>
                    </li>
                @endcanany
                {{-- super admin end --}}


                {{-- profile start --}}
                @canany(['admin.profile'])
                    <li>
                        <a class="menu {{ request()->is('admin/profile*') || request()->is('admin/user/edit/*') ? 'active' : '' }}"
                           href="#">
                            <span>
                                <img class="menu-icon" src="{{ asset('assets/images/icon/user-square.svg') }}"
                                     alt="icon"
                                     loading="lazy"/>
                                {{ __('Profile') }}
                            </span>
                        </a>
                    </li>
                @endcanany
                {{-- profile End --}}

                {{-- Report start --}}
                {{-- @if (!auth()->user()->hasRole('admin') && !auth()->user()->is_admin && auth()->user()->hasRole('instructor'))
                    @canany(['report.index']) --}}
                        <li>
                            <a class="menu active"
                               href="#">
                                <span>
                                    <img class="menu-icon" src="{{ asset('assets/images/icon/chart-pie.svg') }}"
                                         alt="icon"
                                         loading="lazy"/>
                                    {{ __('Report') }}
                                </span>
                            </a>
                        </li>
                    {{-- @endcanany
                @endif --}}
                {{-- Report End --}}

                {{-- general setting start --}}
                <li class="menu-divider">
                    <span class="menu-title">{{ __('General Setting') }}</span>
                </li>

                <li>
                    <a class="menu {{ request()->is('admin/setting*') || request()->is('admin/certificate/*') ||request()->is('admin/online-exam-certificate/*')|| request()->is('admin/permission&role*') || request()->is('admin/language/*') ? 'active' : '' }}"
                       data-bs-toggle="collapse" href="#settingManagement">
                        <span>
                            <img style="text-primary" class="menu-icon"
                                 src="{{ asset('assets/images/menu/settings.svg') }}" alt="icon" loading="lazy"/>
                            {{ __('Settings Management') }}
                        </span>
                        <img src="{{ asset('assets/images/menu/angle-down-small.svg') }}" alt="icon" class="downIcon"/>
                    </a>
                    <div
                        class="collapse dropdownMenuCollapse {{ request()->is('admin/setting*') || request()->is('admin/certificate*') || request()->is('admin/online-exam-certificate*') || request()->is('admin/permission&role*') || request()->is('admin/language/*') ? 'show' : '' }}"
                        id="settingManagement">
                        <div class="listBar">
                            @can('setting.index')
                                <a href="#"
                                   class="subMenu hasCount {{ request()->is('admin/setting*') ? 'active' : '' }}">
                                    {{ __('General Settings') }}
                                </a>
                            @endcan
                            @can('certificate.index')
                                <a href="#"
                                   class="subMenu hasCount {{ request()->is('admin/certificate*') ? 'active' : '' }}">
                                    {{ __('Certificate Configaration') }}
                                </a>
                            @endcan
                            @can('certificate.index')
                                <a href="#"
                                   class="subMenu hasCount {{ request()->is('admin/online-exam-certificate/*') ? 'active' : '' }}">
                                    {{ __('Exam Certificate Configaration') }}
                                </a>
                            @endcan
                            @can('role.index')
                                <a href="#"
                                   class="subMenu hasCount {{ request()->is('admin/permission&role*') ? 'active' : '' }}">
                                    {{ __('Role & Permission') }}
                                </a>
                            @endcan
                        </div>
                    </div>
                </li>

                @can('generate_invoice.index')
                    <li>
                        <a class="menu {{ request()->is('admin/invoice*') ? 'active' : '' }}" data-bs-toggle="collapse"
                           href="#invoiceManagement">
                            <span>
                                <img style="text-primary" class="menu-icon"
                                     src="{{ asset('assets/images/menu/invoice.svg') }}" alt="icon" loading="lazy"/>
                                {{ __('Invoice Management') }}
                            </span>
                            <img src="{{ asset('assets/images/menu/angle-down-small.svg') }}" alt="icon"
                                 class="downIcon"/>
                        </a>
                        <div class="collapse dropdownMenuCollapse {{ request()->is('admin/invoice*') ? 'show' : '' }}"
                             id="invoiceManagement">
                            <div class="listBar">
                                @can('generate_invoice.index')
                                    <a href="#"
                                       class="subMenu hasCount {{ request()->is('admin/invoices/list') ? 'active' : '' }}">
                                        {{ __('Invoices') }}
                                    </a>
                                @endcan
                                @can('generate_invoice.create')
                                    <a href="#"
                                       class="subMenu hasCount {{ request()->is('admin/invoices/create*') ? 'active' : '' }}">
                                        {{ __('Generate New Invoice') }}
                                    </a>
                                @endcan
                                @can('generate_invoice.update')
                                    <a href="#"
                                       class="subMenu hasCount {{ request()->is('admin/invoices/list/restore*') ? 'active' : '' }}">
                                        {{ __('Restore Invoices') }}
                                    </a>
                                @endcan
                            </div>
                        </div>
                    </li>
                @endcan

                {{-- general setting end --}}

                {{-- legal page start --}}
                <li class="menu-divider">
                    <span class="menu-title">{{ __('Legal Pages') }}</span>
                </li>
                @canany(['page.index'])
                    <li>
                        <a class="menu {{ request()->is('admin/page*') ? 'active' : '' }}" data-bs-toggle="collapse"
                           href="#ordersLegal">
                            <span>
                                <img class="menu-icon" src="{{ asset('assets/images/menu/file-text-shield.svg') }}"
                                     alt="icon" loading="lazy"/>
                                {{ __('Page Management') }}
                            </span>
                            <img src="{{ asset('assets/images/menu/angle-down-small.svg') }}" alt="icon"
                                 class="downIcon"/>
                        </a>
                        <div class="collapse dropdownMenuCollapse {{ request()->is('admin/page*') ? 'show' : '' }}"
                             id="ordersLegal">
                            <div class="listBar">
                                <a href="#"
                                   class="subMenu hasCount {{ request()->is('admin/page/edit/4*') ? 'active' : '' }}">
                                    {{ __('About Us') }}
                                </a>
                                <a href="#"
                                   class="subMenu hasCount {{ request()->is('admin/page/edit/5*') ? 'active' : '' }}">
                                    {{ __('Contact Us') }}
                                </a>
                                <a href="#"
                                   class="subMenu hasCount {{ request()->is('admin/page/edit/6*') ? 'active' : '' }}">
                                    {{ __('FAQ') }}
                                </a>
                                <a href="#"
                                   class="subMenu hasCount {{ request()->is('admin/page/edit/1*') ? 'active' : '' }}">
                                    {{ __('Privacy Policy') }}
                                </a>
                                <a href="#"
                                   class="subMenu hasCount {{ request()->is('admin/page/edit/2*') ? 'active' : '' }}">
                                    {{ __('Terms & Conditions') }}
                                </a>
                                <a href="#"
                                   class="subMenu hasCount {{ request()->is('admin/page/edit/3') ? 'active' : '' }}">
                                    {{ __('Refund Policy') }}
                                </a>
                            </div>
                        </div>
                    </li>
                @endcanany

                {{-- legal page end --}}


                {{-- logout start --}}
                <li class="menu-divider">
                    <span class="menu-title">{{ __('Sign Out') }}</span>
                </li>
                <li>
                    <a class="menu" href="#">
                        <span class="text-danger">
                            <img class="menu-icon" src="{{ asset('assets/images/menu/log-out.svg') }}" alt="icon"
                                 loading="lazy"/>
                            {{ __('Logout Account') }}
                        </span>
                    </a>
                </li>
                {{-- logout end --}}


                {{-- @if (Auth::user()->hasRole('admin')) --}}
                    <div class="sideBarfooter">
                        <a href="#" class="fullbtn"><i class="fa-solid fa-gear"></i></a>
                        <button type="button" class="fullbtn hite-icon" onclick="toggleFullScreen(document.body)"><i
                                class="fa-solid fa-expand"></i></button>

                        <a href="#" class="fullbtn hite-icon" data-bs-toggle="tooltip"
                           data-bs-placement="top" data-bs-custom-class="custom-tooltip"
                           data-bs-title="{{ __('Website Cache Clear') }}"><i class="bi bi-radioactive"></i></a>

                        <a href="#" class="fullbtn hite-icon"><i
                                class="fa-solid fa-power-off"></i></a>
                    </div>
            {{-- @endif --}}

        </div>
    </div>
</div>
<!-- End-Sidebar-Menu-Section -->
