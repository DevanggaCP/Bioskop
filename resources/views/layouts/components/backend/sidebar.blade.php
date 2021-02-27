    <div class="sidebar" data-color="default" data-active-color="danger">
      <!--
        Tip 1: You can change the color of the sidebar using: data-color=" default | primary | info | success | warning | danger |"
      -->
      <div class="logo">
        <a href="{{ route('dashboard') }}" class="simple-text logo-mini">
          <div class="logo-image-small">
            <!-- <img src="{{ asset('backend/img/logo-small.png')}}"> -->
          </div>
          <!-- <p>CT</p> -->
        </a>
        <a href="{{ route('dashboard') }}" class="simple-text logo-normal">
          Creative Tim
          <!-- <div class="logo-image-big">
            <img src="../assets/img/logo-big.png">
          </div> -->
        </a>
      </div>
      <div class="sidebar-wrapper">
        <ul class="nav">
          <li>
            <a href="{{ route('dashboard') }}">
              <i class="nc-icon nc-bank"></i>
              <p>Dashboard</p>
            </a>
          </li>
          <li>
            <a data-toggle="collapse" href="#komponenkategori">
              <i class="nc-icon nc-layout-11"></i>
              <p>
                Kategori <b class="caret"></b>
              </p>
            </a>
            <div class="collapse " id="komponenkategori">
              <ul class="nav">
                <li>
                  <a href="{{ route('category.index') }}">
                    <span class="sidebar-normal"> Daftar Kategori </span>
                  </a>
                </li>
                <li>
                  <a href="{{ route('category.add') }}">
                    <span class="sidebar-normal"> Tambah Kategori </span>
                  </a>
                </li>
              </ul>
            </div>
          </li>
          <li>
            <a data-toggle="collapse" href="#komponendaftarfilm">
              <i class="nc-icon nc-book-bookmark"></i>
              <p>
                Film <b class="caret"></b>
              </p>
            </a>
            <div class="collapse " id="komponendaftarfilm">
              <ul class="nav">
                <li>
                  <a href="{{ route('movie.index') }}">
                    <span class="sidebar-normal"> Daftar Film </span>
                  </a>
                </li>
                <li>
                  <a href="{{ route('movie.add') }}">
                    <span class="sidebar-normal"> Tambah Film </span>
                  </a>
                </li>
              </ul>
            </div>
          </li>
        
          <li>
            <a data-toggle="collapse" href="#komponenruang">
              <i class="nc-icon nc-book-bookmark"></i>
              <p>
                Ruang <b class="caret"></b>
              </p>
            </a>
            <div class="collapse " id="komponenruang">
              <ul class="nav">
                <li>
                  <a href="{{ route('room.index') }}">
                    <span class="sidebar-normal"> Daftar Ruang </span>
                  </a>
                </li>
                <li>
                  <a href="{{ route('room.add') }}">
                    <span class="sidebar-normal"> Tambah Ruang </span>
                  </a>
                </li>
              </ul>
            </div>
          </li>

          <li>
            <a data-toggle="collapse" href="#komponenJadwal">
              <i class="nc-icon nc-layout-11"></i>
              <p>
                Jadwal <b class="caret"></b>
              </p>
            </a>
            <div class="collapse " id="komponenJadwal">
              <ul class="nav">
                <li>
                  <a href="{{ route('schedule.index') }}">
                    <span class="sidebar-normal"> Daftar Jadwal </span>
                  </a>
                </li>
                <li>
                  <a href="{{ route('schedule.add') }}">
                    <span class="sidebar-normal"> Tambah Jadwal </span>
                  </a>
                </li>
              </ul>
            </div>
          </li>

          <li>
            <a data-toggle="collapse" href="#komponenTransaksi">
              <i class="nc-icon nc-layout-11"></i>
              <p>
                Transaksi <b class="caret"></b>
              </p>
            </a>
            <div class="collapse " id="komponenTransaksi">
              <ul class="nav">
                <li>
                  <a href="{{ route('transaction.index') }}">
                    <span class="sidebar-normal"> Daftar Transaksi </span>
                  </a>
                </li>
                <li>
                  <a href="{{ route('transaction.add') }}">
                    <span class="sidebar-normal"> Tambah Transaksi </span>
                  </a>
                </li>
              </ul>
            </div>
          </li>

          
        </ul>
      </div>
    </div>