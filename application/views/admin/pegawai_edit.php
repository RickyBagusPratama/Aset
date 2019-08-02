<div class="container">
    <div class="row-fluid">
        <!-- Forms: Box -->
        <div class="span12">
            <!-- Forms: Top Bar -->
            <div class="top-bar">
                <h3><i class="icon-cog"></i> Manajemen Pegawai</h3>
            </div>
            <div class="well">
                <blockquote style="padding:20px 10px 20px 10px; color:#333; margin:30px 30px 30px 30px;" >
                    <p>Edit Lokasi</b></p>
                </blockquote>
                <form name="myForm" action="<?php echo base_url();?>index.php/admin/edit_proses_pegawai/<?php echo $id; ?>"  method="post">  
                    <div class="control-group">
                        <label class="control-label">Nip :</label>
                        <div class="controls">
                            <input type="text" class="span2 m-wrap" name="idpegawai" id="idpegawai" value="<?echo $row->idpegawai;?>">
                            <span class="help-inline"> </span>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Nama Pegawai :</label>
                        <div class="controls">
                            <input type="text" class="span2 m-wrap" name="pegawai" id="pegawai" value="<?echo $row->pegawai;?>">
                            <span class="help-inline"></span>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Alamat :</label>
                        <div class="controls">
                            <input type="text" class="span4 m-wrap" name="alamat" id="alamat" value="<?echo $row->alamat;?>">
                            <span class="help-inline"> </span>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">No Hape :</label>
                        <div class="controls">
                            <input type="text" class="span2 m-wrap" name="nohape" id="nohape" value="<?echo $row->nohape;?>">
                            <span class="help-inline"></span>
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
            if(myForm.idpegawai.value===""){
                alert("Pilihan NIP harus diisi");
                myForm.idpegawai.focus();
                return false;
            }
            if(myForm.pegawai.value===""){
                alert("Pilihan nama pegawai harus diisi");
                myForm.pegawai.focus();
                return false;
            }
            if(myForm.alamat.value===""){
                alert("Pilihan alamat harus diisi");
                myForm.alamat.focus();
                return false;
            }
            if(myForm.nohape.value===""){
                alert("Pilihan no hape harus diisi");
                myForm.nohape.focus();
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