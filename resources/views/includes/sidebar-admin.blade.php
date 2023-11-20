    <div class="sidebar sidebar-dark sidebar-fixed" id="sidebar">
      <div class="sidebar-brand d-none d-md-flex justify-content-center">
        <svg class="sidebar-brand-full" width="118" height="46" alt="CoreUI Logo">
          <img src="{{url('/web')}}/img/logo.svg" alt="">
        </svg>
        <svg class="sidebar-brand-full" width="118" height="46" alt="CoreUI Logo">

        </svg>
      </div>
      <ul class="sidebar-nav" data-coreui="navigation" data-simplebar="">
        <li class="nav-item"><a class="nav-link" href="{{url('admin/dashboard')}}">
          <svg class="nav-icon">
            <use xlink:href="{{url('/')}}/vendors/@coreui/icons/svg/free.svg#cil-speedometer"></use>
          </svg> Dashboard</a></li>
          <li class="nav-title">Halaman</li>
          <li class="nav-item">
            <a class="nav-link" href="{{route('admin.beranda')}}">
              <svg class="nav-icon">
                <use xlink:href="{{url('/')}}/vendors/@coreui/icons/svg/free.svg#cil-puzzle"></use>
              </svg> Beranda</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{route('admin.perusahaan')}}">
                <svg class="nav-icon">
                  <use xlink:href="{{url('/')}}/vendors/@coreui/icons/svg/free.svg#cil-puzzle"></use>
                </svg> Perusahaan</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{route('admin.telecommunication_contractor')}}">
                  <svg class="nav-icon">
                    <use xlink:href="{{url('/')}}/vendors/@coreui/icons/svg/free.svg#cil-puzzle"></use>
                  </svg> Kontraktor Komunikasi</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="{{route('admin.catudaya')}}">
                    <svg class="nav-icon">
                      <use xlink:href="{{url('/')}}/vendors/@coreui/icons/svg/free.svg#cil-puzzle"></use>
                    </svg> Catu Daya</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="{{route('admin.contact')}}">
                      <svg class="nav-icon">
                        <use xlink:href="{{url('/')}}/vendors/@coreui/icons/svg/free.svg#cil-puzzle"></use>
                      </svg> Kontak</a>
                    </li>
                    <li class="nav-title">Menu</li>
                    <li class="nav-item">
                      <a class="nav-link" href="{{route('admin.setting')}}">
                        <svg class="nav-icon">
                          <use xlink:href="{{url('/')}}/vendors/@coreui/icons/svg/free.svg#cil-list-rich"></use>
                        </svg> Pengaturan Menu</a>
                      </li>
                      <li class="nav-title">Pengaturan</li>
                      @if(auth()->user()->hak_akses=='superadmin')
                      <li class="nav-item">
                        <a class="nav-link" href="{{route('user.index')}}">
                          <svg class="nav-icon">
                            <use xlink:href="{{url('/')}}/vendors/@coreui/icons/svg/free.svg#cil-user"></use>
                          </svg>User</a>
                        </li>
                        @endif
                        <li class="nav-item">
                          <a class="nav-link" href="{{route('customer.index')}}">
                            <svg class="nav-icon">
                              <use xlink:href="{{url('/')}}/vendors/@coreui/icons/svg/free.svg#cil-user-plus"></use>
                            </svg>Pelanggan</a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link" href="{{route('admin.seo')}}">
                              <svg class="nav-icon">
                                <use xlink:href="{{url('/')}}/vendors/@coreui/icons/svg/free.svg#cil-signal-cellular-4"></use>
                              </svg>SEO</a>
                            </li>
                          </li>
                        </ul>
                        <button class="sidebar-toggler" type="button" data-coreui-toggle="unfoldable"></button>
                      </div>