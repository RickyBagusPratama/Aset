<div class="container">
    <div class="row-fluid">
        <!-- Forms: Box -->
        <div class="span12">
            <!-- Forms: Top Bar -->
            <div class="top-bar">
                <h3><i class="icon-cog"></i> Memo Kepala Uptb</h3>
            </div>
            <div class="well">
                <blockquote style="padding:20px 10px 20px 10px; color:#333; margin:30px 30px 30px 30px;" >
                    <p>Edit Memo</b></p>
                </blockquote>
                <form name="myForm" action="<?php echo base_url();?>index.php/kepalauptb/edit_proses_memo/<?php echo $id; ?>"  method="post">  
                    <div class="control-group">
                        <label class="control-label">Tanggal :</label>
                        <div class="controls">
                            <input type="date" class="span2 m-wrap" name="tanggal" id="tanggal" value="<?echo $row->tanggal;?>">
                            <span class="help-inline"> </span>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Isi Memo :</label>
                        <div class="controls">
                            <textarea name="memo" id="memo"><?echo $row->memo;?></textarea>
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
            if(myForm.tanggal.value===""){
                alert("Pilihan tanggal harus diisi");
                myForm.tanggal.focus();
                return false;
            }
            if(myForm.memo.value===""){
                alert("Pilihan memo  harus diisi");
                myForm.memo.focus();
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