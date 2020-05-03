<div class="row">
    <div class="col-md-12">
                            <!--breadcrumbs start -->
        <ul class="breadcrumb">
            <li><a href="#"><i class="fa fa-home"></i> Home</a></li>
            <li class="active">Fax Keluar</li>
        </ul>
                            <!--breadcrumbs end -->
    </div>
</div>
<div class="panel">
    <header class="panel-heading">Data Fax Keluar</header>                                  
    <div class="input-group" style="margin-right:15px;margin-top:10px;">
        <a href="<?php echo site_url('admin/page/f_fk');?>" class="btn btn-primary btn-addon btn-sm" data-toggle="modal" style="margin-left:15px;">
            <i class="fa fa-plus"></i>
                Tambah Data
        </a>
    </div>
    <div class="panel-body">
        <table class="table table-bordered data">
            <thead>   
                <tr>
                    <th>No</th>
                    <th>Tgl Surat</th>
                    <th>No Surat</th>
                    <th>Tujuan Surat</th>
                    <th>Perihal</th>
                    <th>Disposisi GM</th>
                    <th>Keterangan</th>
                    <th>Upload</th>
                    <th>Action</th>
                </tr>
            </thead>    
             <tbody>
             <?php
                $no=1;
                foreach($tamp_fk as $data){ 
            ?>  
              <tr>
                    <td><?php echo $no;?></td>
                    <td><?php echo $data->Tgl_Surat;?></td>
                    <td><?php echo $data->No_Surat;?></td>
                    <td><?php echo $data->Tujuan_Surat;?></td>
                    <td><?php echo $data->Perihal;?></td>
                    <td><?php echo $data->Disposisi_GM;?></td>
                    <td><?php echo $data->Keterangan;?></td>
                    <td><img src="<?php echo base_url();?>/assets/gambar/<?php echo $data->Upload;?>" width="80" height="80"></td>
                    <td>
                        <a href="<?php echo site_url('admin/page/f_fk');?>/<?php echo $data->ID_FK;?>" class="btn btn-primary btn-sm">Edit</a>
                        <a href="<?php echo site_url('admin/hapus_fk');?>/<?php echo $data->ID_FK;?>" class="btn btn-danger btn-sm">Hapus</a>
                    </td>
                </tr>
            <?php
                $no++;}
            ?> 
        </tbody>                              
        </table>
    </div><!-- /.panel-body -->
</div><!-- /.panel -->  