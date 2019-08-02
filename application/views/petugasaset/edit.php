<div class="container">
    <div class="row-fluid">
        <!-- Forms: Box -->
        <div class="span12">
            <!-- Forms: Top Bar -->
            <div class="top-bar">
                <h3><i class="icon-cog"></i> Data aset</h3>
            </div>
            <div class="well">
                <blockquote style="padding:20px 10px 20px 10px; color:#333; margin:30px 30px 30px 30px;" >
                    <p>Ubah data aset</b></p>
                </blockquote>
                <form name="myForm" action="<?php echo base_url();?>index.php/petugasaset/proses_edit/<?php echo $id; ?>"  method="post">  
                    <div class="control-group">
                        <label class="control-label">Kode barang :</label>
                        <div class="controls">
                            <input type="text" class="span4 m-wrap" name="kodebarang" id="kodebarang" readonly value="<?php echo $row->kodebarang;?>">
                            <span class="help-inline"> </span>
                        </div>
                    </div>   
                    <div class="control-group">
                        <label class="control-label">Nama barang :</label>
                        <div class="controls">
                            <input type="text" class="span4 m-wrap" name="namabarang" id="namabarang" readonly value="<?php echo $row->namabarang;?>">
                            <span class="help-inline"> </span>
                        </div>
                    </div>
                     <div class="control-group">
                        <label class="control-label">Keadaan barang:</label>
                        <div class="controls">
                             <select id='keadaanbarang' name='keadaanbarang'>
                             <?php  
                                 $keadaan=array("Keadaan rusak","Keadaan baik"); 
                                 foreach($keadaan as $key=>$value){
                                    if($row->keadaanbarang==$key)  echo "<option selected value='".$key."'>".$value."</option>";
                                    else echo "<option value='".$key."'>".$value."</option>";
                                 }
                             ?>    
                             </select>
                             <span class="help-inline"> </span>                                 
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Lokasi barang:</label>
                        <div class="controls">
                             <select id='idlokasi' name='idlokasi'>
                             <?php  
                             if(empty($lokasi)) echo "<option value='1'>Kosong</option>";
                             else 
                             foreach($lokasi as $loks){
                                if($loks->idlokasi==$row->idlokasi)
                                    echo "<option selected value='".$loks->idlokasi."'>".$loks->lokasi."</option>";
                                else
                                    echo "<option value='".$loks->idlokasi."'>".$loks->lokasi."</option>";
                             }
                             ?>
                             </select>
                             <span class="help-inline"> </span>                                 
                        </div>
                    </div>
					<div class="control-group">
                        <label class="control-label">Keterangan :</label>
                        <div class="controls">
                             <input type="text" class="span8 m-wrap" name="keterangan" id="keterangan" value="<?php echo $row->keterangan; ?>"/>                                 
                        </div>
                        
                    </div>

                    <div class="form-actions" style="float:right;">
                        <button type="submit" class="btn btn-primary" onclick="return validasi();">Ubah data</button>   
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>
        function validasi()
        {
            if(myForm.namabarang.value===""){
                alert("Pilihan nama barang harus diisi");
                myForm.namabarang.focus();
                return false;
            }
            if(myForm.keadaanbaik.value===""){
                alert("Pilihan keadaan baik  harus diisi");
                myForm.keadaanbaik.focus();
                return false;
            }       
            if(myForm.keadaanburuk.value===""){
                alert("Pilihan keadaan buruk  harus diisi");
                myForm.keadaanburuk.focus();
                return false;
            }
            if(myForm.lokasibarang.value===""){
                alert("Pilihan lokasi barang  harus diisi");
                return false;
            }
             if(myForm.keterangan.value==="0"){
                alert("Pilihan keterangan  harus diisi");
                return false;
            }
                else{
                return true;
            }
        }
        
        function checkInput(obj) 
        {
            var pola = "^";
            pola += "[0-9]*";
            pola += "$";
            rx = new RegExp(pola);

            if (!obj.value.match(rx))
            {
                if (obj.lastMatched)
                {
                    obj.value = obj.lastMatched;
                }
                else
                {
                    obj.value = "";
                }
            }
            else
            {
                obj.lastMatched = obj.value;
            }
        }
    
        
        
        
        
    </script>