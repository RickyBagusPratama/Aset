<div class="container">
    <div class="row-fluid">
        <!-- Forms: Box -->
        <div class="span12">
            <!-- Forms: Top Bar -->
            <div class="top-bar">
                <!--<h3><i class="icon-cog"></i>Manajemen Lokasi Barang</h3>-->
            </div>   
                    <div class="well padding">
                        <div class="pull-right" style="margin:30px 30px 30px 30px;">
                            <img src="<?php echo base_url(); ?>assets/img/nilai2.png" width="80" height="80"/>
                        </div>
                        <blockquote style="padding:20px 10px 20px 10px; color:#333; margin:30px 30px 30px 30px;" >
                            <p>Daftar lokasi</p>
                          </blockquote>
                        <table class="table table-bordered" style="color:black;"> 
                    <thead>
                        <tr>
                            <th style="font-weight: bold; font-size:14px; ">No</th>
                            <th style="font-weight: bold; font-size:14px; ">Kode Lokasi</th>
                            <th style="font-weight: bold; font-size:14px; ">Lokasi</th>
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
                                <td class="align-center"><?php echo $row->idlokasi; ?> </td>
                                <td class="align-center" ><?php echo $row->lokasi; ?></textarea></td>
                                <td  class="align-center"><a href="<?php echo base_url();?>index.php/admin/lokasi_edit/<?php echo $row->idlokasi; ?>" class="icon-edit-sign" title="Ubah data" onclick="return confirm('Apakah anda yakin untuk mengubah data lokasi ?');"></a><a href="<?php echo base_url();?>index.php/admin/delete_lokasi/<?php echo $row->idlokasi; ?>" class="icon-remove-sign" onclick="return confirm('Apakah anda yakin untuk menghapus data lokasi?');" title="Hapus data"></a></td>           
                            </tr>
                            <?php
                            $no++;
                        endforeach;
                        ?>
                    </tbody>
                </table>
                 <div style="margin-top:30px; padding-right:20px; ">
                    <form style="float:right" >
                        <button type="submit" class="btn btn-success" onclick="return confirm('Apakah anda yakin untuk menambah lokasi?');" 
                        formaction="<?php echo base_url(); ?>index.php/admin/insert_lokasi" formmethod="post">Tambah data</button>
                    </form>
                </div>  	
                    </div>
                </div>
        </div>