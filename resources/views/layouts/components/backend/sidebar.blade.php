    <div class="sidebar" data-color="default" data-active-color="danger">
      <!--
        Tip 1: You can change the color of the sidebar using: data-color=" default | primary | info | success | warning | danger |"
      -->
      <div class="logo">
        <a href="../../../www.creative-tim.com/index.html" class="simple-text logo-mini">
          <div class="logo-image-small">
            <!-- <img src="{{ asset('backend/img/logo-small.png')}}"> -->
          </div>
          <!-- <p>CT</p> -->
        </a>
        <a href="../../../www.creative-tim.com/index.html" class="simple-text logo-normal">
          Creative Tim
          <!-- <div class="logo-image-big">
            <img src="../assets/img/logo-big.png">
          </div> -->
        </a>
      </div>
      <div class="sidebar-wrapper">
        <ul class="nav">
          <li>
            <a href="dashboard">
              <i class="nc-icon nc-bank"></i>
              <p>Dashboard</p>
            </a>
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
                    <span class="sidebar-mini-icon">D</span>
                    <span class="sidebar-normal"> Daftar Film </span>
                  </a>
                </li>
                <li>
                  <a href="{{ route('movie.add') }}">
                    <span class="sidebar-mini-icon">T</span>
                    <span class="sidebar-normal"> Tambah Film </span>
                  </a>
                </li>
              </ul>
            </div>
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
                    <span class="sidebar-mini-icon">D</span>
                    <span class="sidebar-normal"> Daftar Kategori </span>
                  </a>
                </li>
                <li>
                  <a href="{{ route('category.add') }}">
                    <span class="sidebar-mini-icon">T</span>
                    <span class="sidebar-normal"> Tambah Kategori </span>
                  </a>
                </li>
              </ul>
            </div>
          </li>
          <li>
            <a data-toggle="collapse" href="#komponenjamtayang">
              <i class="nc-icon nc-layout-11"></i>
              <p>
                Jam Tayang <b class="caret"></b>
              </p>
            </a>
            <div class="collapse " id="komponenjamtayang">
              <ul class="nav">
                <li>
                  <a href="{{ route('category.index') }}">
                    <span class="sidebar-mini-icon">D</span>
                    <span class="sidebar-normal"> Daftar Jam Tayang </span>
                  </a>
                </li>
                <li>
                  <a href="{{ route('category.add') }}">
                    <span class="sidebar-mini-icon">T</span>
                    <span class="sidebar-normal"> Tambah Jam Tayang </span>
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
                  <a href="{{ route('movie.index') }}">
                    <span class="sidebar-mini-icon">D</span>
                    <span class="sidebar-normal"> Daftar Ruang </span>
                  </a>
                </li>
                <li>
                  <a href="{{ route('movie.add') }}">
                    <span class="sidebar-mini-icon">T</span>
                    <span class="sidebar-normal"> Tambah Ruang </span>
                  </a>
                </li>
              </ul>
            </div>
          </li>
        </ul>
      </div>
    </div>