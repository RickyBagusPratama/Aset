<div class="container">
    <div class="row-fluid">
        <!-- Forms: Box -->
        <div class="span12">
            <!-- Forms: Top Bar -->
            <div class="top-bar">
                <!--<h3><i class="icon-cog"></i>Manajemen Pegawai</h3>-->
            </div>   
                    <div class="well padding">
                        <div class="pull-right" style="margin:30px 30px 30px 30px;">
                            <img src="<?php echo base_url(); ?>assets/img/nilai2.png" width="80" height="80"/>
                        </div>
                        <blockquote style="padding:20px 10px 20px 10px; color:#333; margin:30px 30px 30px 30px;" >
                            <p>Daftar pegawai</p>
                          </blockquote>
                        <table class="table table-bordered" style="color:black;"> 
                    <thead>
                        <tr>
                            <th style="font-weight: bold; font-size:14px; ">No</th>
                            <th style="font-weight: bold; font-size:14px; ">NIP</th>
                            <th style="font-weight: bold; font-size:14px; ">Nama Pegawai</th>
                            <th style="font-weight: bold; font-size:14px; ">Alamat</th>
                            <th style="font-weight: bold; font-size:14px; ">No Hape</th>
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
                                <td class="align-center"><?php echo $row->idpegawai; ?> </td>
                                <td class="align-center" ><?php echo $row->pegawai; ?></td>
                                <td class="align-center"><?php echo $row->alamat; ?> </td>
                                <td class="align-center" ><?php echo $row->nohape; ?></td>
                                <td  class="align-center"><a href="<?php echo base_url();?>index.php/admin/pegawai_edit/<?php echo $row->idpegawai; ?>" class="icon-edit-sign" title="Ubah data" onclick="return confirm('Apakah anda yakin untuk mengubah data pegawai ?');"></a><a href="<?php echo base_url();?>index.php/admin/delete_pegawai/<?php echo $row->idpegawai; ?>" class="icon-remove-sign" onclick="return confirm('Apakah anda yakin untuk menghapus data pegawai?');" title="Hapus data"></a></td>           
                            </tr>
                            <?php
                            $no++;
                        endforeach;
                        ?>
                    </tbody>
                </table>
                 <div style="margin-top:30px; padding-right:20px; ">
                    <form style="float:right" >
                        <button type="submit" class="btn btn-success" onclick="return confirm('Apakah anda yakin untuk menambah pegawai?');" 
                        formaction="<?php echo base_url(); ?>index.php/admin/insert_pegawai" formmethod="post">Tambah data</button>
                    </form>
                </div>  	
                    </div>
                </div>
        </div>