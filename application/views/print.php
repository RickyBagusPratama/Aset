<script type="text/javascript">
    function print(){
        document.getElementById('print').style.display="invisible";
        window.print();
    }

</script>
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
								<td class="align-center"><?php echo $row->lokasibarang; ?> </td>
								<td class="align-center"><?php echo $row->keterangan; ?> </td>
                               
                            </tr>
                            <tr>
                            <button id="print" onclick="print">Print</button>
                            </tr>
                            <?php
                            $no++;
                        endforeach;
                        ?>
                    </tbody>