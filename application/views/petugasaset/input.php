
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
                    <p>Masukan data aset yang baru</b></p>
                </blockquote>
                
                <form name="myForm" action="<?php echo base_url(); ?>index.php/petugasaset/proses_insert"  method="post">     
                    <div class="control-group">
                        <label class="control-label">Kode barang :</label>
                        <div class="controls">
                            <select name="kodebarang" id="kodebarang">
                             <?php    
                             foreach($barang as $brg){
                                echo "<option value='".$brg->kodebarang."'>".$brg->kodebarang."</option>"; 
                             }
                            ?>
                             </select>
                            <span class="help-inline"> </span>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Nama barang :</label>
                        <div class="controls">
                            <input type="text" class="span4 m-wrap" name="namabarang" id="namabarang">
                            <span class="help-inline"> </span>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Keadaan barang:</label>
                        <div class="controls">
                             <select id='keadaanbarang' name='keadaanbarang'>
                             <option value='1'>Barang Baik</option>
                             <option value='0'>Barang Rusak</option>    
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
                             <input type="text" class="span8 m-wrap" name="keterangan" id="keterangan" />                                 
                        </div>
                        
                    </div>

                    <div class="form-actions" style="float:right;">
                        <button type="submit" class="btn btn-primary" onclick="return validasi();">Tambah data</button>   
                    </div>
                </form>
            </div>
        </div>
    </div>
    
    
<script type="text/javascript"> 
        var dBarang = new Array();  
</script>
<?php  
    foreach($barang as $brg){
        echo '<script type="text/javascript">dBarang["'.$brg->kodebarang.'"] = "'.$brg->namabarang.'"; </script>';
    }
?>
<script type="text/javascript"> 
        
        function validasi()
        {
            if(myForm.kodebarang.value===""){
                alert("Pilihan kode barang harus diisi");
                myForm.kodebarang.focus();
                return false;
            }
            if(myForm.namabarang.value===""){
                alert("Pilihan nama barang harus diisi");
                myForm.namabarang.focus();
                return false;
            }   
            if(myForm.keadaanbarang.value===""){
                alert("Pilihan keadaan barang  harus diisi");
                myForm.keadaanbarang.focus();
                return false;
            }
            if(myForm.lokasibarang.value===""){
                alert("Pilihan lokasi barang  harus diisi");
                myForm.lokasibarang.focus();
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
        
        $('#kodebarang').change( function(){ 
        
            var data = $("#kodebarang").val();
            document.getElementById("namabarang").value = dBarang[data] ; 
        });
        
        
    </script>