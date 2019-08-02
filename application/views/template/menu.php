<!-- Main Navigation: Box -->
<div class="navbar navbar-inverse" id="nav">

    <!-- Main Navigation: Inner -->
    <div class="navbar-inner">

        <!-- Main Navigation: Nav -->
        <ul class="nav">

            <?php if ($this->session->userdata("type") == 1) { ?>
                <li><a href="<?php echo base_url(); ?>index.php/kepalauptb"><i class="icon-check"></i> Daftar aset</a></li>
                <!-- / Main Navigation: UI Elements --> 
                <li><a href="<?php echo base_url(); ?>index.php/kepalauptb/memo"><i class="icon-edit"></i>Memo</a></li>
                <li class="dropdown">
                    <a href="" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-magic">
                        </i> Data pinjam aset <b class="caret"></b>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a href="<?php echo base_url(); ?>index.php/kepalauptb/pinjam_k_uptb"><i class="icon-check"></i>Daftar peminjam</a></li>
                        <li><a href="<?php echo base_url(); ?>index.php/kepalauptb/terpinjam"><i class="icon-check"></i>Daftar terpinjam</a></li>
                        <li><a href="<?php echo base_url(); ?>index.php/kepalauptb/tersedia"><i class="icon-check"></i>Daftar tersedia</a></li>
                    </ul>
                </li>
                <li><a href="<?php echo base_url(); ?>index.php/kepalauptb/pegawai_k_uptb"><i class="icon-check"></i>Data pegawai</a></li>
                <li><a href="<?php echo base_url(); ?>index.php/kepalauptb/riwayat_k_uptb"><i class="icon-check"></i> Daftar riwayat aset</a></li>


            <?php } else if ($this->session->userdata("type") == 4) { ?>
                <li><a href="<?php echo base_url(); ?>index.php/petugasaset"><i class="icon-edit"></i> Daftar aset</a></li>
                <!-- / Main Navigation: UI Elements --> 
                <li><a href="<?php echo base_url(); ?>index.php/petugasaset/memo_aset"><i class="icon-edit"></i>Memo</a></li>
                <li><a href="<?php echo base_url(); ?>index.php/petugasaset/pinjam"><i class="icon-edit"></i>Daftar peminjam</a></li>
                <li><a href="<?php echo base_url(); ?>index.php/petugasaset/riwayat"><i class="icon-edit"></i>Daftar riwayat aset</a></li>


            <?php } else if ($this->session->userdata("type") == 5) { ?>
                <!-- Main Navigation: Dashboard -->
                <li><a href="<?php echo base_url(); ?>index.php/admin"><i class="icon-edit"></i>manajemen barang</a></li>
                <li><a href="<?php echo base_url(); ?>index.php/admin/lokasi"><i class="icon-edit"></i>manajemen lokasi</a></li>
                <li><a href="<?php echo base_url(); ?>index.php/admin/pegawai"><i class="icon-edit"></i>manajemen pegawai</a></li>

            <?php } ?>

        </ul>
        <!-- / Main Navigation: Nav -->

        <!-- Main Navigation: Search -->
        <!--<form class="navbar-search pull-right">
            <input type="text" class="search-query typeahead" placeholder="Search">
        </form>-->
        <!-- / Main Navigation: Search -->

    </div>
    <!-- / Main Navigation: Inner -->

</div>
<!-- / Main Navigation: Box -->