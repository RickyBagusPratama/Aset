
<script type="text/javascript">
    function yukPrint() {
    /*$("#mauPrint").addClass("printable");
    window.print();*/
    var data = $('#mauPrint').html();
    var newWindow = window.open('', 'Data aset','');
    newWindow.document.write('<html><head><title>Data aset</title>');
    newWindow.document.write('<link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">');
    newWindow.document.write('</head><body>');
    newWindow.document.write(data);
    newWindow.document.write('</body></html>');
    newWindow.print();
    newWindow.close();
  }
</script>

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
        <form class="navbar-search pull-right" action="<?php echo base_url(); ?>index.php/petugasaset/cari_aset" method="post">
            <input type="text" class="search-query typeahead" placeholder="Search" name="aset">

            <input type="submit" name="submit" class="btn btn-default" style="margin-right:10px; margin-top:2px;">         
        </form>
        <!-- / Main Navigation: Search -->

    </div>
    <!-- / Main Navigation: Inner -->

</div> 
                    <div class="well padding">
                        <div class="pull-right" style="margin:30px 30px 30px 30px;">
                            <img src="<?php echo base_url(); ?>assets/img/nilai2.png" width="80" height="80"/>
                        </div>
                        <blockquote style="padding:20px 10px 20px 10px; color:#333; margin:30px 30px 30px 30px;" >
                            <p>Daftar aset UPTB</p>
                          </blockquote>
                        <div id="">
                        <table class="table table-bordered" style="color:black;"> 
                    <thead>
                        <tr>
                            <th style="font-weight: bold; font-size:14px; ">No</th>
                            <th style="font-weight: bold; font-size:14px; ">Kode Barang</th>
                            <th style="font-weight: bold; font-size:14px; ">Nama Barang</th>
                            <th style="font-weight: bold; font-size:14px; ">Keadaan Baik</th>
                            <th style="font-weight: bold; font-size:14px; ">Keadaan Rusak</th>
                            <th style="font-weight: bold; font-size:14px; ">Lokasi Barang</th>
                            <th style="font-weight: bold; font-size:14px; ">Keterangan</th>
                            <th style="font-weight: bold; font-size:14px; ">Aksi</th>                      
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
                                <?if($keadaan == 1){?>
                                <td class="align-center"><input type="checkbox" checked readonly>
                                <td class="align-center"><input type="checkbox" readonly>
                                <?}
                                else{?>
                                <td class="align-center"><input type="checkbox" readonly>
                                <td class="align-center"><input type="checkbox" checked readonly>
                                <?}?>
								
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
                                <td  class="align-center"> <a href="<?php echo base_url();?>index.php/petugasaset/edit/<?php echo $row->kodebarang; ?>" class="icon-edit-sign" title="Ubah data" onclick="return confirm('Apakah anda yakin untuk mengubah data aset ?');"></a> | <a href="<?php echo base_url();?>index.php/petugasaset/delete/<?php echo $row->kodebarang; ?>" class="icon-remove-sign" onclick="return confirm('Apakah anda yakin untuk menghapus data aset ?');" title="Hapus data"></a></td>        
                            </tr>
                            <?php
                            $no++;
                        endforeach;
                        ?>
                    </tbody>
                </table>
            </div>
                <div style="margin-top:30px; padding-right:20px; ">
                    <button class="btn btn-default" onclick="yukPrint()" type="button">Cetak</button>
                    <form style="float:right" >
                        <button type="submit" class="btn btn-success" onclick="return confirm('Apakah anda yakin untuk menambahkan data baru?');" formaction="<?php echo base_url(); ?>index.php/petugasaset/insert" formmethod="post">Tambah data</button>
                    </form>
                </div>	
                    </div>
                </div>
        </div>

         <div id="mauPrint" style="display:none">
                        <table class="table table-bordered" style="color:black;"> 
                    <thead>
                        <tr>
                            <th style="font-weight: bold; font-size:14px; ">No</th>
                            <th style="font-weight: bold; font-size:14px; ">Kode Barang</th>
                            <th style="font-weight: bold; font-size:14px; ">Nama Barang</th>
                            <th style="font-weight: bold; font-size:14px; ">Keadaan Barang</th>
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
                                <?if($keadaan == 1){?>
                                <td class="align-center">baik</td>
                                <?}
                                else{?>
                                <td class="align-center">rusak</td>                                
                                <?}?>
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
                <p align="right" style="margin-right:280px;">
                    Blitar, <br /><br /><br /><br /><br />
                </p>
                <p align="right" style="margin-right:100px;">
                    Drs. DIDIK HARIADI MA. MS.i
                </p>
                <p align="right" style="margin-right:120px;">
                    19610502 198710 1 002
                </p>
            </div>