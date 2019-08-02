<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Cetak data</title> 
</head>
<body onload="window.print()" >
<div id="b_body">
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
                                
                                <td class="align-center"><?php echo $row->keterangan; ?></a></td>           
                            </tr>
                            <?php
                            $no++;
                        endforeach;
                        ?>
                    </tbody>
                </table>
</div>


</body>
</html>
