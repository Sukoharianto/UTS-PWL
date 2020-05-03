<?php
  if($status == 'edit'){
    $val=$hsl->row_array();
  }else{
    $val['ID_SK']="";
    $val['Tgl_Surat']="";
    $val['No_Surat']="";
    $val['Tujuan_Surat']="";
    $val['Perihal']="";
    $val['Disposisi_GM']="";
    $val['Keterangan']="";
    $val['Upload']="";
  }
?>
<?php echo form_open_multipart($open);?>
<div class="row">
    <div class="col-md-12">                   <!--breadcrumbs start -->
        <ul class="breadcrumb">
            <li><a href="#"><i class="fa fa-home"></i> Home</a></li>
            <li class="active"><?php echo $judul;?></li>
        </ul>
                            <!--breadcrumbs end -->
    </div>
</div>
<div class="row">
  <div class="col-lg-12">
    <section class="panel">
        <header class="panel-heading">
            <?php echo $judul;?>
        </header>
        <div class="panel-body">
          <form role="form">
              <div class="form-group">
                <label for="exampleInputPassword1">Tgl Surat</label>
                <input type="text" name="Tgl_Surat" name="Tgl_Surat" id="Tgl_Surat" placeholder="Masukkan Tgl Surat" class="form-control" value="<?php echo $val['Tgl_Surat'];?>">
                <input type="hidden" name="id" class="form-control" value="<?php echo $val['ID_SK'];?>">
              </div> 
              <div class="form-group">
                <label for="exampleInputPassword1">No Surat</label>
                <input type="text" name="No_Surat" class="form-control" value="<?php echo $val['No_Surat'];?>" id="exampleInputPassword1" placeholder="Masukkan No Surat">
              </div> 
              <div class="form-group">
                <label for="exampleInputPassword1">Tujuan Surat</label>
                <input type="text" name="Tujuan_Surat" class="form-control" value="<?php echo $val['Tujuan_Surat'];?>" id="exampleInputPassword1" placeholder="Masukkan Tujuan Surat">
              </div> 
              <div class="form-group">
                <label for="exampleInputPassword1">Perihal</label>
                <input type="text" name="Perihal" class="form-control" value="<?php echo $val['Perihal'];?>" id="exampleInputPassword1" placeholder="Masukkan Perihal">
              </div>  
              <div class="form-group">
                <label for="exampleInputPassword1">Disposisi GM</label>
                <input type="text" name="Disposisi_GM" class="form-control" value="<?php echo $val['Disposisi_GM'];?>" id="exampleInputPassword1" placeholder="Masukkan Disposisi GM">
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1">Keterangan</label>
                <input type="text" name="Keterangan" class="form-control" value="<?php echo $val['Keterangan'];?>" id="exampleInputPassword1" placeholder="Masukkan Keterangan">
              </div>
               <div class="form-group">
                  <label for="exampleInputFile">Upload</label>
                  <input type="file" id="exampleInputFile" name="foto">
                  <p class="help-block"></p>
                  <img src="<?php echo base_url();?>/assets/gambar/<?php echo $val['Upload'];?>" <?php echo $hid;?> width="200" height="200">
              </div>
              <button type="submit" name="<?php echo $value;?>" class="btn btn-info"><?php echo $value;?></button>
          </form>
        </div>
    </section>
  </div>
</div>