<div class="container">
    <div class="row-fluid">
        <!-- Forms: Box -->
        <div class="span12">
            <!-- Forms: Top Bar -->
            <div class="top-bar">
                <h3><i class="icon-cog"></i> Manajemen Lokasi</h3>
            </div>
            <div class="well">
                <blockquote style="padding:20px 10px 20px 10px; color:#333; margin:30px 30px 30px 30px;" >
                    <p>Edit Lokasi</b></p>
                </blockquote>
                <form name="myForm" action="<?php echo base_url();?>index.php/admin/edit_proses_lokasi/<?php echo $id; ?>"  method="post">  
                    <div class="control-group">
                        <label class="control-label">Kode lokasi :</label>
                        <div class="controls">
                            <input type="text" class="span2 m-wrap" name="idlokasi" id="idlokasi" value="<?echo $row->idlokasi;?>">
                            <span class="help-inline"> </span>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Lokasi :</label>
                        <div class="controls">
                            <input type="text" class="span2 m-wrap" name="lokasi" id="lokasi" value="<?echo $row->lokasi;?>">
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
            if(myForm.idlokasi.value===""){
                alert("Pilihan kode lokasi harus diisi");
                myForm.idlokasi.focus();
                return false;
            }
            if(myForm.lokasi.value===""){
                alert("Pilihan nama lokasi harus diisi");
                myForm.lokasi.focus();
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