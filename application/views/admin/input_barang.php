<script type="text/javascript">
function test(data){
    var jum = data.length;
    if(jum != 14){
        alert("Panjang kode tidak sesuai");   
        document.getElementById('namabarang').disabled = true;
         document.getElementById('submit').disabled = true;
        }
    else{
        document.getElementById('namabarang').disabled = false;
        document.getElementById('submit').disabled = false;
    }
}
</script>
<div class="container">
    <div class="row-fluid">
        <!-- Forms: Box -->
        <div class="span12">
            <!-- Forms: Top Bar -->
            <div class="top-bar">
                <h3><i class="icon-cog"></i> Data Barang</h3>
            </div>
            <div class="well">
                <blockquote style="padding:20px 10px 20px 10px; color:#333; margin:30px 30px 30px 30px;" >
                    <p>Masukan Barang</b></p>
                </blockquote>
                <form name="myForm" action="<?php echo base_url(); ?>index.php/admin/proses_insert_barang"  method="post">     
                    <div class="control-group">
                        <label class="control-label">Kode Barang :</label>
                        <div class="controls">
                            <input type="text" class="span2 m-wrap" name="kodebarang" id="kodebarang" onchange="test(this.value)">
                            <span class="help-inline"> </span>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Nama Barang :</label>
                        <div class="controls">
                            <input type="text" class="span2 m-wrap" name="namabarang" id="namabarang">
                            <span class="help-inline"></span>
                        </div>
                    </div>

                    <div class="form-actions" style="float:right;">
                        <button type="submit" class="btn btn-primary" id="submit" onclick="return validasi();">Tambah data</button>   
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>
     function validasi()
        {
            if(myForm.kodebarang.value===""){
                alert("Pilihan kode barang harus diisi");
                myForm.kodebarang.focus();
                return false;
            }
            if(myForm.namabarang.value===""){
                alert("Pilihan nama barang  harus diisi");
                myForm.namabarang.focus();
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