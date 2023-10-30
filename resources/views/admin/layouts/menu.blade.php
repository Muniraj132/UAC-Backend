
<style>
  ul li a{
    color: white !important;
  }
</style>

<aside class="main-sidebar sidebar-dark-primary elevation-4" style="background-color: #47a3a5;">
    <!-- Brand Logo -->
 
    <a href="{{route('admin.home')}}" class="brand-link" style="text-align:justify; color:white;">
    <img src="{{asset('admin')}}/img/leftlogo.png" alt="HasPanel Logo" class="brand-image img-circle elevation-3" style="opacity: .8;">
     <strong class="brand-text font-weight-light" style=""> <span style="color: black;font-weight: 700;">UAC</span>&nbsp;<b>Family India</b></strong>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      {{-- <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{asset('admin')}}/img/mypic.png" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{$auth->name." ".$auth->surname }}</a>
        </div>
      </div> --}}

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="{{ route('admin.home') }}" class="nav-link @if(Request::segment(2)=="home") active @endif">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>{{ __('main.Dashboard') }}</p>
            </a>
          </li>

          {{-- <li class="nav-item has-treeview @if(Request::segment(2)=="tutor") menu-open @endif">
            <a href="{{ route('admin.tutor.course.index') }}" class="nav-link @if(Request::segment(3)=="course") active @endif">
                <i class="nav-icon fas fa-graduation-cap"></i>
              <p>
                {{ __('main.Tutor') }}
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview" style="@if(Request::segment(2)=="tutor") display:block; @endif">
                <li class="nav-item">
                  <a href="{{ route('admin.tutor.course.index') }}" class="nav-link @if(Request::segment(2)=="tutor" && Request::segment(3)=="course") active @endif">
                    <ion-icon name="return-down-forward-outline"></ion-icon>
                    <p>{{ __('main.Courses') }}</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{ route('admin.tutor.category.index') }}" class="nav-link @if(Request::segment(2)=="tutor" && Request::segment(3)=="category") active @endif">
                    <ion-icon name="return-down-forward-outline"></ion-icon>
                    <p>{{ __('main.Categories') }}</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{ route('admin.tutor.announcement.index') }}" class="nav-link @if(Request::segment(2)=="tutor" && Request::segment(3)=="announcement") active @endif">
                    <ion-icon name="return-down-forward-outline"></ion-icon>
                    <p>{{ __('main.Announcements') }}</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{ route('admin.tutor.student.index') }}" class="nav-link @if(Request::segment(2)=="tutor" && Request::segment(3)=="student") active @endif">
                    <ion-icon name="return-down-forward-outline"></ion-icon>
                    <p>{{ __('main.Students') }}</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{ route('admin.tutor.zoom.index') }}" class="nav-link @if(Request::segment(2)=="tutor" && Request::segment(3)=="zoom") active @endif">
                    <ion-icon name="return-down-forward-outline"></ion-icon>
                    <p>{{ __('main.ZOOM') }}</p>
                  </a>
                </li>
            </ul>
          </li> --}}

          <li class="nav-item has-treeview @if(Request::segment(2)=="media") menu-open @endif">
            <a href="{{ route('admin.media.index') }}" class="nav-link @if(Request::segment(2)=="media") active @endif">
              <i class="nav-icon fas fa-photo-video"></i>
              <p>
                {{ __('main.Media') }}
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview" style="@if(Request::segment(2)=="media") display:block; @endif">
              <li class="nav-item">
                <a href="{{ route('admin.media.index') }}" class="nav-link @if(Request::segment(2)=="media" && Request::segment(3)!="create") active @endif">
                    <ion-icon name="return-down-forward-outline"></ion-icon>
                    <p>{{ __('main.All Media') }}</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('admin.media.create') }}" class="nav-link @if(Request::segment(2)=="media" && Request::segment(3)=="create") active @endif">
                    <ion-icon name="return-down-forward-outline"></ion-icon>
                    <p>{{ __('main.Upload') }}</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item has-treeview @if(Request::segment(2)=="page") menu-open @endif">
            <a href="{{ route('admin.page.index') }}" class="nav-link @if(Request::segment(2)=="page") active @endif">
                <i class="nav-icon fas fa-copy"></i>
              <p>
                {{ __('main.Pages') }}
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview" style="@if(Request::segment(2)=="page") display:block; @endif">
                <li class="nav-item">
                  <a href="{{ route('admin.page.index') }}" class="nav-link @if(Request::segment(2)=="page"&& Request::segment(3)!="create") active @endif">
                    <ion-icon name="return-down-forward-outline"></ion-icon>
                    <p>{{ __('main.All Pages') }}</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{ route('admin.page.create') }}" class="nav-link @if(Request::segment(2)=="page" && Request::segment(3)=="create") active @endif">
                    <ion-icon name="return-down-forward-outline"></ion-icon>
                    <p>{{ __('main.Add New') }}</p>
                  </a>
                </li>
            </ul>
          </li>
          <li class="nav-item has-treeview @if(Request::segment(2)=="article") menu-open @endif">
            <a href="{{ route('admin.media.index') }}" class="nav-link @if(Request::segment(2)=="article") active @endif">
                <i class=" nav-icon fas fa-thumbtack"></i>
                <p>
                    {{ __('main.Posts') }}
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview" style="@if(Request::segment(2)=="article") display:block; @endif">
                <li class="nav-item">
                  <a href="{{ route('admin.article.index') }}" class="nav-link @if(Request::segment(2)=="article" && Request::segment(3)!="create") active @endif">
                    <ion-icon name="return-down-forward-outline"></ion-icon>
                    <p>{{ __('main.All Posts') }}</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{ route('admin.article.create') }}" class="nav-link @if(Request::segment(2)=="article" && Request::segment(3)=="create") active @endif">
                    <ion-icon name="return-down-forward-outline"></ion-icon>
                    <p>{{ __('main.Add New') }}</p>
                  </a>
                </li>
            </ul>
          </li>
          
          <li class="nav-item">
            <a href="{{ route('admin.category.index') }}" class="nav-link @if(Request::segment(2)=="category") active @endif">
                <i class="fas fa-arrow-right nav-icon"></i>
              <p>{{ __('main.Category') }}</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('admin.newletter.index') }}" class="nav-link @if(Request::segment(2)=="newletter") active @endif">
                <i class="fas fa-newspaper nav-icon"></i>
             <p>{{ __('main.newletter') }}</p>
            </a>
          </li>
          <li class="nav-item has-treeview @if(Request::segment(2)=="gallery") menu-open @endif">
            <a href="{{ route('admin.gallery.index') }}" class="nav-link @if(Request::segment(2)=="gallery") active @endif">
              <i class="nav-icon fas fa-image"></i>
              <p>
                {{ __('main.Gallery') }}
                
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview" style="@if(Request::segment(2)=="gallery") display:block; @endif">
              <li class="nav-item">
                <a href="{{ route('admin.gallery.index') }}" class="nav-link @if(Request::segment(2)=="gallery" && Request::segment(3)!="create") active @endif">
                    <ion-icon name="return-down-forward-outline"></ion-icon>
                    <p>{{ __('main.All Images') }}</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('admin.gallery.create') }}" class="nav-link @if(Request::segment(2)=="gallery" && Request::segment(3)=="create") active @endif">
                    <ion-icon name="return-down-forward-outline"></ion-icon>
                    <p>{{ __('main.Upload') }}</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="{{ route('admin.slide.index') }}" class="nav-link @if(Request::segment(2)=="slide") active @endif">
                <i class="fas fa-expand nav-icon"></i>
              <p>{{ __('main.Slides') }}</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('admin.ourteam.index') }}" class="nav-link @if(Request::segment(2)=="ourteam") active @endif">
                <i class="fas fa-users nav-icon"></i>
              <p>{{ __('main.ourteam') }}</p>
            </a>
          </li>
          {{-- <li class="nav-item">
            <a href="{{ route('admin.comment.index') }}" class="nav-link @if(Request::segment(2)=="comment") active @endif">
                <i class="fas fa-comments nav-icon"></i>
              <p>{{ __('main.Comments') }}</p>
            </a>
          </li> --}}
          <li class="nav-item">
            <a href="{{ route('admin.contact.index') }}" class="nav-link @if(Request::segment(2)=="contact") active @endif">
                <i class="fas fa-phone-alt nav-icon"></i>
              <p>{{ __('main.Contact Request') }}</p>
            </a>
          </li>
          {{-- <li class="nav-item has-treeview @if(Request::segment(2)=="user" ) menu-open @endif">
            <a href="{{ route('admin.user.index') }}" class="nav-link @if(Request::segment(2)=="user") active @endif">
                <i class=" nav-icon fas fa-user"></i>
                <p>
                    {{ __('main.Users') }}
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview" style="@if(Request::segment(2)=="user") display:block; @endif">
                <li class="nav-item">
                  <a href="{{ route('admin.user.index') }}" class="nav-link @if(Request::segment(2)=="user" && Request::segment(3)!="create") active @endif">
                    <ion-icon name="return-down-forward-outline"></ion-icon>
                    <p>{{ __('main.All Users') }}</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{ route('admin.user.create') }}" class="nav-link @if(Request::segment(2)=="user" && Request::segment(3)=="create") active @endif">
                    <ion-icon name="return-down-forward-outline"></ion-icon>
                    <p>{{ __('main.Add New') }}</p>
                  </a>
                </li>
            </ul>
          </li> --}}
        <li class="nav-item has-treeview @if(Request::segment(2)=="option" ) menu-open @endif">
            <a href="{{ route('admin.option.index') }}" class="nav-link @if(Request::segment(2)=="option") active @endif">
                <i class=" nav-icon fas fa-cog"></i>
                <p>
                    {{ __('main.Options') }}
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview" style="@if(Request::segment(2)=="option") display:block; @endif">
                <li class="nav-item">
                  <a href="{{ route('admin.option.index') }}" class="nav-link @if(Request::segment(2)=="option" && Request::segment(3)=="index") active @endif">
                    <ion-icon name="return-down-forward-outline"></ion-icon>
                    <p>{{ __('main.General Options') }}</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{ route('admin.option.menu.index')}}" class="nav-link @if(Request::segment(2)=="option" && Request::segment(3)=="menu") active @endif">
                    <ion-icon name="return-down-forward-outline"></ion-icon>
                    <p>{{ __('main.Menus') }}</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{ route('admin.option.widget')}}" class="nav-link @if(Request::segment(2)=="option" && Request::segment(3)=="widget") active @endif">
                    <ion-icon name="return-down-forward-outline"></ion-icon>
                    <p>{{ __('main.Widgets') }}</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{ route('admin.option.contact') }}" class="nav-link @if(Request::segment(2)=="option" && Request::segment(3)=="contact") active @endif">
                    <ion-icon name="return-down-forward-outline"></ion-icon>
                    <p>{{ __('main.Contact Information') }}</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{ route('admin.option.social') }}" class="nav-link @if(Request::segment(2)=="option" && Request::segment(3)=="social") active @endif">
                    <ion-icon name="return-down-forward-outline"></ion-icon>
                    <p>{{ __('main.Social Media') }}</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{ route('admin.option.redirect.index') }}" class="nav-link @if(Request::segment(2)=="option" && Request::segment(3)=="redirect") active @endif">
                    <ion-icon name="return-down-forward-outline"></ion-icon>
                    <p>{{ __('main.Redirects') }}</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{ route('admin.option.link.index') }}" class="nav-link @if(Request::segment(2)=="option" && Request::segment(3)=="link") active @endif">
                    <ion-icon name="return-down-forward-outline"></ion-icon>
                    <p>{{ __('main.Auto Linkers') }}</p>
                  </a>
                </li>
            </ul>
          </li>
         

          <li class="nav-item">
            <form action="{{route('logout')}}" method="POST">
              @csrf
              <a href="{{route('logout')}}" class="nav-link" onclick="event.preventDefault(); this.closest('form').submit();">
                <i class="nav-icon fas fa-power-off"></i>
                {{ __('main.Logout') }}
              </a>
            </form>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
