<div class="app-sidebar sidebar-shadow">
    <div class="app-header__logo">
        <div class="logo-src"></div>
        <div class="header__pane ml-auto">
            <div>
                <button type="button" class="hamburger close-sidebar-btn hamburger--elastic" data-class="closed-sidebar">
                    <span class="hamburger-box">
                        <span class="hamburger-inner"></span>
                    </span>
                </button>
            </div>
        </div>
    </div>
    <div class="app-header__mobile-menu">
        <div>
            <button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
                <span class="hamburger-box">
                    <span class="hamburger-inner"></span>
                </span>
            </button>
        </div>
    </div>
    <div class="app-header__menu">
        <span>
            <button type="button" class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
                <span class="btn-icon-wrapper">
                    <i class="fa fa-ellipsis-v fa-w-6"></i>
                </span>
            </button>
        </span>
    </div>

    <div class="scrollbar-sidebar">
        <div class="app-sidebar__inner">
            <ul class="vertical-nav-menu">

                <li class="app-sidebar__heading"> </li>

                <li>
                    <a href="/" class="{{ request()->is('/') ? ' mm-active' : '' }}">
                        <i class="metismenu-icon pe-7s-home"></i>
                        Dashboard
                    </a>
                </li>

                <li>
                   @if (auth()->user()->role == "admin")
                    <a href="#" aria-expanded="">
                        <i class="metismenu-icon pe-7s-note2"></i>
                        Loket
                        <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                    </a>
                    @endif

                    @if (auth()->user()->role == "pasien")
                    <a href="#" aria-expanded="">
                        <i class="metismenu-icon pe-7s-note2"></i>
                        Loket
                        <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                    </a>
                    @endif

                    <ul>

                        <li>
                            @if (auth()->user()->role == "pasien")
                            <a href="{{ route('antrian') }}" class="{{ request()->is('antrian') ? ' mm-active' : '' }}">
                                <i class="metismenu-icon pe-7s-add-user"></i>
                                Antrian
                            </a>
                            @endif
                        </li>

                        <li>
                            @if (auth()->user()->role == "pasien")
                            <a href="{{ route('pasien') }}" class="{{ request()->is('pasien') ? ' mm-active' : '' }}">
                                <i class="metismenu-icon pe-7s-user"></i>
                                Pasien
                            </a>
                            @endif
                        </li>

                    </ul>

                    <ul>

                        <li>
                            @if (auth()->user()->role == "admin")
                            <a href="{{ route('antrian') }}" class="{{ request()->is('antrian') ? ' mm-active' : '' }}">
                                <i class="metismenu-icon pe-7s-add-user"></i>
                                Antrian
                            </a>
                            @endif
                        </li>

                        <li>
                            @if (auth()->user()->role == "admin")
                            <a href="{{ route('pasien') }}" class="{{ request()->is('pasien') ? ' mm-active' : '' }}">
                                <i class="metismenu-icon pe-7s-user"></i>
                                Pasien
                            </a>
                            @endif
                        </li>

                    </ul>
                 </li>  

                 <li>
                    @if (auth()->user()->role == "admin")
                    <a href="#" aria-expanded="">
                        <i class="metismenu-icon pe-7s-science"></i>
                        Ruang Berobat
                        <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                    </a>
                    @endif

                    @if (auth()->user()->role == "apoteker")
                    <a href="#" aria-expanded="">
                        <i class="metismenu-icon pe-7s-science"></i>
                        Ruang Berobat
                        <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                    </a>
                    @endif

                    <ul>
                        @if (auth()->user()->role == "apoteker")
                        <li>
                            <a href="{{ route('obat') }}" class="{{ request()->is('obat') ? ' mm-active' : '' }}">
                                <i class="metismenu-icon pe-7s-server"></i>
                                Obat
                            </a>
                        </li>
                        @endif

                        @if (auth()->user()->role == "admin")
                        <li>
                            <a href="{{ route('periksa') }}" class="{{ request()->is('periksa') ? ' mm-active' : '' }}">
                                <i class="metismenu-icon pe-7s-server"></i>
                                Periksa
                            </a>
                        </li>
                        @endif
                        
                        @if (auth()->user()->role == "admin")
                        <li>
                            <a href="{{ route('obat') }}" class="{{ request()->is('obat') ? ' mm-active' : '' }}">
                                <i class="metismenu-icon pe-7s-server"></i>
                                Obat
                            </a>
                        </li>
                        @endif

                        @if (auth()->user()->role == "admin")
                        <li>
                            <a href="{{ route('poli') }}" class="{{ request()->is('poli') ? ' mm-active' : '' }}">
                                <i class="metismenu-icon pe-7s-note2"></i>
                                Poli
                            </a>
                        </li>
                        @endif

                        @if (auth()->user()->role == "admin")
                        <li>
                            <a href="{{ route('dokter') }}" class="{{ request()->is('dokter') ? ' mm-active' : '' }}">
                                <i class="metismenu-icon pe-7s-id"></i>
                                Dokter
                            </a>
                        </li>
                        @endif

                        @if (auth()->user()->role == "admin")
                        <li>
                            <a href="{{ route('diagnosa') }}" class="{{ request()->is('diagnosa') ? ' mm-active' : '' }}">
                                <i class="metismenu-icon pe-7s-display1"></i>
                                Diagnosa
                            </a>
                        </li>
                        @endif

                        @if (auth()->user()->role == "admin")
                        <li>
                            <a href="{{ route('kunjungan') }}"
                                class="{{ request()->is('kunjungan') ? ' mm-active' : '' }}">
                                <i class="metismenu-icon pe-7s-display2"></i>
                                Kunjungan
                            </a>
                        </li>
                        @endif

                    </ul>
                </li>        

                <li>
                    
                    @if (auth()->user()->role == "kepala_klinik")
                    <a href="#" aria-expanded="">
                        <i class="metismenu-icon pe-7s-news-paper"></i>
                        Laporan
                        <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                    </a>
                    @endif

                    @if (auth()->user()->role == "admin")
                    <a href="#" aria-expanded="">
                        <i class="metismenu-icon pe-7s-news-paper"></i>
                        Laporan
                        <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                    </a>
                    @endif

                    @if (auth()->user()->role == "pasien")
                    <a href="#" aria-expanded="">
                        <i class="metismenu-icon pe-7s-news-paper"></i>
                        Laporan
                        <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                    </a>
                    @endif

                    @if (auth()->user()->role == "apoteker")
                    <a href="#" aria-expanded="">
                        <i class="metismenu-icon pe-7s-news-paper"></i>
                        Laporan
                        <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                    </a>
                    @endif

                    <ul>

                        <li>
                            @if (auth()->user()->role == "kepala_klinik")
                            <a href="laporanmedis"
                                <?= @$_GET['page'] == 'laporanmedis' ? 'class="mm-active"' : '' ?>>
                                <i class="metismenu-icon"></i>Laporan Data Medis 
                            </a>
                            @endif

                            @if (auth()->user()->role == "admin")
                            <a href="laporanmedis"
                                <?= @$_GET['page'] == 'laporanmedis' ? 'class="mm-active"' : '' ?>>
                                <i class="metismenu-icon"></i>Laporan Data Medis 
                            </a>
                            @endif

                            @if (auth()->user()->role == "pasien")
                            <a href="laporanmedis"
                                <?= @$_GET['page'] == 'laporanmedis' ? 'class="mm-active"' : '' ?>>
                                <i class="metismenu-icon"></i>Laporan Data Medis 
                            </a>
                            @endif

                            @if (auth()->user()->role == "apoteker")
                            <a href="laporanmedis"
                                <?= @$_GET['page'] == 'laporanmedis' ? 'class="mm-active"' : '' ?>>
                                <i class="metismenu-icon"></i>Laporan Data Medis 
                            </a>
                            @endif


                        </li>

                        <li>
                            @if (auth()->user()->role == "admin")
                            <a href="{{ route('laporan') }}" class="{{ request()->is('laporan') ? ' mm-active' : '' }}">
                                <i class="metismenu-icon"></i>Laporan Data Pasien
                            </a>
                            @endif

                            @if (auth()->user()->role == "kepala_klinik")
                            <a href="{{ route('laporan') }}" class="{{ request()->is('laporan') ? ' mm-active' : '' }}">
                                <i class="metismenu-icon"></i>Laporan Data Pasien
                            </a>
                            @endif

                        </li>

                        <li>
                            @if (auth()->user()->role == "admin")
                            <a href="{{ route('laporan') }}" class="{{ request()->is('laporan') ? ' mm-active' : '' }}">
                                <i class="metismenu-icon"></i>Laporan Data Dokter
                            </a>
                            @endif

                            @if (auth()->user()->role == "kepala_klinik")
                            <a href="{{ route('laporan') }}" class="{{ request()->is('laporan') ? ' mm-active' : '' }}">
                                <i class="metismenu-icon"></i>Laporan Data Dokter
                            </a>
                            @endif

                        </li>

                        <li>
                            @if (auth()->user()->role == "admin")
                            <a href="{{ route('laporan') }}" class="{{ request()->is('laporan') ? ' mm-active' : '' }}">
                                <i class="metismenu-icon"></i>Laporan Data Obat
                            </a>
                            @endif

                            @if (auth()->user()->role == "kepala_klinik")
                            <a href="{{ route('laporan') }}" class="{{ request()->is('laporan') ? ' mm-active' : '' }}">
                                <i class="metismenu-icon"></i>Laporan Data Obat
                            </a>
                            @endif

                            @if (auth()->user()->role == "apoteker")
                            <a href="{{ route('laporan') }}" class="{{ request()->is('laporan') ? ' mm-active' : '' }}">
                                <i class="metismenu-icon"></i>Laporan Data Obat
                            </a>
                            @endif

                        </li>

                    </ul>
                </li>

                <li>
                    @if (auth()->user()->role == "admin")
                    <a href="{{ route('user') }}" class="{{ request()->is('user') ? ' mm-active' : '' }}">
                        <i class="metismenu-icon pe-7s-users"></i> Users
                    </a>
                    @endif
                </li>

            </ul>
        </div>
    </div>
</div>
