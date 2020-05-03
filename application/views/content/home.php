<div class="row" style="margin-bottom:5px;">
<?php
  $jmlsm=$this->db->query("SELECT * FROM surat_masuk WHERE Tgl_Surat=DATE(NOW())")->num_rows();
  $jmlsk=$this->db->query("SELECT * FROM surat_keluar WHERE Tgl_Surat=DATE(NOW())")->num_rows();
    $jmlfm=$this->db->query("SELECT * FROM fax_masuk WHERE Tgl_Surat=DATE(NOW())")->num_rows();
      $jmlfk=$this->db->query("SELECT * FROM fax_keluar WHERE Tgl_Surat=DATE(NOW())")->num_rows();

?>

                        <div class="col-md-3">
                            <div class="sm-st clearfix">
                                <span class="sm-st-icon st-red"><i class="fa fa-book"></i></span>
                                <div class="sm-st-info">
                                    <span><?php echo $jmlsm;?></span>
                                    Surat Masuk
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="sm-st clearfix">
                                <span class="sm-st-icon st-violet"><i class="fa fa-book"></i></span>
                                <div class="sm-st-info">
                                    <span><?php echo $jmlsk;?></span>
                                    Surat Keluar
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="sm-st clearfix">
                                <span class="sm-st-icon st-blue"><i class="fa fa-book"></i></span>
                                <div class="sm-st-info">
                                    <span><?php echo $jmlfm;?></span>
                                    Fax Masuk
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="sm-st clearfix">
                                <span class="sm-st-icon st-green"><i class="fa fa-book"></i></span>
                                <div class="sm-st-info">
                                    <span><?php echo $jmlfk;?></span>
                                    Fax Keluar
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Main row -->
                    