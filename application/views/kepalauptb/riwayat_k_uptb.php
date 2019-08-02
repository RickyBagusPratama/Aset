<div class="container">
    <div class="row-fluid">
        <!-- Forms: Box -->
        <div class="span12">
            <!-- Forms: Top Bar -->
            <div class="top-bar">
                <!--<h3><i class="icon-cog"></i>Memo</h3>-->
            </div>   
                    <div class="well padding">
                        <div class="pull-right" style="margin:30px 30px 30px 30px;">
                            <img src="<?php echo base_url(); ?>assets/img/nilai2.png" width="80" height="80"/>
                        </div>
                        <blockquote style="padding:20px 10px 20px 10px; color:#333; margin:30px 30px 30px 30px;" >
                            <p>Daftar riwayat aset</p>
                          </blockquote>
                        <table class="table table-bordered" style="color:black;"> 
                    <thead>
                        <tr>
                            <th style="font-weight: bold; font-size:14px; ">No</th>
                            <th style="font-weight: bold; font-size:14px; ">Kode Barang</th>
                            <th style="font-weight: bold; font-size:14px; ">Nama Barang</th>
                            <th style="font-weight: bold; font-size:14px; ">Lokasi Barang</th>
                            <th style="font-weight: bold; font-size:14px; ">Keterangan</th>
                         </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($tabel as $row):
                            $keadaan = $row->keadaanbarang;
                            $lokasi = $row->idlokasi;
                            ?>
                            <tr class="odd gradeX">
                                <td class="align-center"><?php echo $no; ?></td>
                                <td class="align-center"><?php echo $row->kodebarang; ?> </td>
                                <td class="align-center"><?php echo $row->namabarang; ?> </td>
                                
                                <?if($lokasi == 1){?>
                                <td class="align-center"><?php echo "Kendaraan PMK" ?>
                                <?}
                                else if($lokasi == 2){?>
                                <td class="align-center"><?php
                                    echo "Kantor Bakesbang Pol Linmas"?>
                                <?}
                                else if($lokasi == 3){?>
                                <td class="align-center"><?php
                                    echo "Posko PMK"?>
                                <?}
                                else if($lokasi == 4){?>
                                <td class="align-center"><?php
                                    echo "Gudang PMK"?>
                                <?}
                                else if($lokasi == 5){?>
                                <td class="align-center"><?php
                                    echo "Anggota PMK"?>
                                <?}

                                else{?>
                                 <td class="align-center"><?php echo "Ka UPTB PMK" ?>
                                <?}?>
                                
                                <td class="align-center"><?php echo $row->keterangan; ?> </td>  
                            </tr>
                            <?php
                            $no++;
                        endforeach;
                        ?>
                    </tbody>
                </table>  	
                    </div>
                </div>
        </div>