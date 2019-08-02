<div class="container">
    <div class="row-fluid">
        <!-- Forms: Box -->
        <div class="span12">
            <!-- Forms: Top Bar -->
            <div class="top-bar">
                <!--<h3><i class="icon-cog">Memo</i></h3>-->
            </div>   
                    <div class="well padding">
                        <div class="pull-right" style="margin:30px 30px 30px 30px;">
                            <img src="<?php echo base_url(); ?>assets/img/nilai2.png" width="80" height="80"/>
                        </div>
                        <blockquote style="padding:20px 10px 20px 10px; color:#333; margin:30px 30px 30px 30px;" >
                            <p>Memo Kepala Uptb</p>
                          </blockquote>
                        <table class="table table-bordered" style="color:black;"> 
                    <thead>
                        <tr>
                            <th style="font-weight: bold; font-size:14px; ">No</th>
                            <th style="font-weight: bold; font-size:14px; ">Tanggal</th>
                            <th style="font-weight: bold; font-size:14px; ">Isi memo</th>
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
                                <td class="align-center"><?php echo $row->tanggal; ?> </td>
                                <td class="align-center" style="width:600px; height:300px;"><textarea style="width:600px; height:300px;" readonly><?php echo $row->memo; ?></textarea></td>
                                <td  class="align-center"><a href="<?php echo base_url();?>index.php/kepalauptb/memo_edit/<?php echo $row->id_memo; ?>" class="icon-edit-sign" title="Ubah data" onclick="return confirm('Apakah anda yakin untuk mengubah data memo ?');"></a><a href="<?php echo base_url();?>index.php/kepalauptb/delete/<?php echo $row->id_memo; ?>" class="icon-remove-sign" onclick="return confirm('Apakah anda yakin untuk menghapus data memo?');" title="Hapus data"></a></td>           
                            </tr>
                            <?php
                            $no++;
                        endforeach;
                        ?>
                    </tbody>
                </table>
                 <div style="margin-top:30px; padding-right:20px; ">
                    <form style="float:right" >
                        <button type="submit" class="btn btn-success" onclick="return confirm('Apakah anda yakin untuk menambah memo baru?');" formaction="<?php echo base_url(); ?>index.php/kepalauptb/insert_memo" formmethod="post">Tambah data</button>
                    </form>
                </div>  	
                    </div>
                </div>
        </div>