<div class="container">
    <div class="row-fluid">
        <!-- Forms: Box -->
    <div class="span12">
            <!-- Forms: Top Bar --> 

    <div class="navbar navbar-inverse" >

    <!-- Main Navigation: Inner -->
    <div class="navbar-inner">

        <!-- Main Navigation: Nav -->
        <ul class="nav">

          
        </ul>
        <!-- / Main Navigation: Nav -->

        <!-- Main Navigation: Search -->
        <form class="navbar-form navbar-right pull-right" action="<?php echo base_url(); ?>index.php/petugasaset/cari_peminjam" method="post">
            <div class="input-prepend">
                <span class="adon">
                    <select id="cari" name="cari">
                        <option value="namapeminjam">Nama peminjam</option>
                        <option value="namabarang">Nama barang</option>
                    </select>
                </span>
                <input type="text" class="form-control typeahead" name="peminjam" placeholder="Cari" required/>
                <input type="submit" name="submit" class="btn btn-default" style="margin-right:  10px;">
            </div>
        </form>
        <!-- / Main Navigation: Search -->

    </div>
    <!-- / Main Navigation: Inner -->

</div>
<!-- / Main Navigation: Box -->

             
                    <div class="well padding">
                        <div class="pull-right" style="margin:30px 30px 30px 30px;">
                            <img src="<?php echo base_url(); ?>assets/img/nilai2.png" width="80" height="80"/>
                        </div>
                        <blockquote style="padding:20px 10px 20px 10px; color:#333; margin:30px 30px 30px 30px;" >
                            <p>Daftar peminjam aset pada UPTB pemadam kebakaran</p>
                          </blockquote>
                        <table class="table table-bordered" style="color:black;"> 
                    <thead>
                        <tr>
                            <th style="font-weight: bold; font-size:14px; ">No</th>
                            <th style="font-weight: bold; font-size:14px; ">Nama Peminjam</th>
                            <th style="font-weight: bold; font-size:14px; ">Nama Barang</th>
                            <th style="font-weight: bold; font-size:14px; ">Tanggal Pinjam</th>
                            <th style="font-weight: bold; font-size:14px; ">Tanggal Kembali</th>
                            <th style="font-weight: bold; font-size:14px; ">Waktu Pinjam</th>
                            <th style="font-weight: bold; font-size:14px; ">Waktu Kembali</th>
                            <th style="font-weight: bold; font-size:14px; ">Status</th>
                            <th style="font-weight: bold; font-size:14px; ">Aksi</th>                      
                         </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($tabel as $row):
                            ?>
                            <tr class="odd gradeX">
                                <td class="align-center"><?php echo $no; ?></td>
                                <td class="align-center"><?php echo $row->namapeminjam; ?> </td>
                                <td class="align-center"><?php echo $row->namabarang; ?></td>
                                <td class="align-center"><?php echo $row->tanggalpinjam; ?></td>
                                <td class="align-center"><?php if($row->tanggalkembali==null){ echo "Belum Kembali"; } else { echo$row->tanggalkembali; }?></td>
                                <td class="align-center"><?php echo $row->waktupinjam; ?></td>
                                <td class="align-center"><?php if($row->waktukembali==null){ echo "Belum Kembali"; } else { echo$row->waktukembali; }?></td>                       
                                <td> <?php if($row->tanggalkembali==null || $row->tanggalkembali=="0000-00-00") { ?> <a href="<?php echo base_url();?>index.php/petugasaset/edit_kembalian/<?php echo $row->id_peminjam; ?>" class="btn btn-default" title="Kembalikan" onclick="return confirm('Apakah anda yakin untuk mengembalikan data?');">Sedang dipinjam</a>   <?php } else { echo "Sudah Dikembalikan"; } ?> </td>
                                <td  class="align-center"> <a href="<?php echo base_url();?>index.php/petugasaset/edit_pinjaman/<?php echo $row->id_peminjam; ?>" class="icon-edit-sign" title="Ubah data" onclick="return confirm('Apakah anda yakin untuk mengubah data peminjam ?');"></a> | <a href="<?php echo base_url();?>index.php/petugasaset/delete_pinjam/<?php echo $row->id_peminjam; ?>" class="icon-remove-sign" onclick="return confirm('Apakah anda yakin untuk menghapus data peminjam ?');" title="Hapus data"></a></td>        
                            </tr>
                            <?php
                            $no++;
                        endforeach;
                        ?>
                    </tbody>
                </table>
                <div style="padding:20px;">
                    <form style="float:right" >
                        <button type="submit" class="btn btn-success" onclick="return confirm('Apakah anda yakin untuk menambah data baru?');" formaction="<?php echo base_url(); ?>index.php/petugasaset/insert_pinjam" formmethod="post">Tambah data</button>
                    </form>
                </div>  
                    </div>
                </div>
        </div>