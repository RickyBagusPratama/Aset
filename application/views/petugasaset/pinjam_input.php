<div class="container">
    <div class="row-fluid">
        <!-- Forms: Box -->
        <div class="span12">
            <!-- Forms: Top Bar -->
            <div class="top-bar">
                <h3><i class="icon-cog"></i> Data peminjam</h3>
            </div>
            <div class="well">
                <blockquote style="padding:20px 10px 20px 10px; color:#333; margin:30px 30px 30px 30px;" >
                    <p>Masukan data peminjam aset yang baru</b></p>
                </blockquote>
                <form name="myForm" action="<?php echo base_url(); ?>index.php/petugasaset/proses_insert_pinjam"  method="post">     
                    <div class="control-group">
                        <label class="control-label">Nama peminjam :</label>
                        <div class="controls">
                            <select name="namapeminjam" id="namapeminjam">
                             <?php    
                             foreach($nama as $name){
                            
                                echo "<option value='".$name->pegawai."'>".$name->pegawai."</option>"; 
                             }
                            ?>
                             </select>
                            
                            <span class="help-inline"> </span>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Nama barang :</label>
                        <div class="controls">
                           
                            <select name="namabarang" id="namabarang">
                             <?php    
                             foreach($barang as $brg){
                                echo "<option value='".$brg->kodebarang."'>".$brg->namabarang."</option>"; 
                             }
                            ?>
                             </select>
                            <span class="help-inline"></span>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Tanggal pinjam :</label>
                        <div class="controls">
                           <?php $date = date('Y/m/d H:i:s'); echo $date; ?>
                        <span class="help-inline"> </span>                                 
                        </div>

                    </div>
                    <div class="control-group">
                        <label class="control-label">Tanggal kembali :</label>
                        <div class="controls">
                                -
                              <span class="help-inline"> </span>                                 
                        </div>
                        
                    </div>
                    <div class="control-group">
                        <label class="control-label">Status :</label>
                        <div class="controls">
                                KELUAR
                              <span class="help-inline"> </span>                                 
                        </div>
                        
                    </div>
                    
                    <div class="form-actions" style="float:right;">
                        <button type="submit" class="btn btn-primary" onclick="return validasi();">Tambah data</button>   
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>
        function validasi()
        {
            if(myForm.namapeminjam.value==="0"){
                alert("Pilihan nama peminjam harus diisi");
                myForm.namapeminjam.focus();
                return false;
            }
            if(myForm.namabarang.value===""){
                alert("Pilihan nama barang  harus diisi");
                myForm.namabarang.focus();
                return false;
            }       
            if(myForm.tanggalpinjam.value===""){
                alert("Pilihan tanggal pinjam  harus diisi");
                myForm.tanggalpinjam.focus();
                return false;
            }
            if(myForm.tanggalkembali.value===""){
                alert("Pilihan tanggal kembali  harus diisi");
                myForm.tanggalkembali.focus();
                return false;
            }
            if(myForm.waktupinjam.value===""){
                alert("Pilihan waktu pinjam  harus diisi");
                myForm.waktupinjam.focus();
                return false;
            }
            if(myForm.waktukembali.value===""){
                alert("Pilihan waktu kembali  harus diisi");
                myForm.waktukembali.focus();
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