<?php include("header.php");?>
<!-- Begin page -->
<div id="wrapper">
  <?php include("top.php");?>
  <script>
  var ajaxsource = '<?php echo $ajaxsource;?>';
  </script>
  <div class="content-page">
    <div class="content">

      <!-- Start Content-->
      <div class="container-fluid">

        <div class="row">
          <div class="col-12">
            <a href="/<?php echo $this->uri->segment(1)."/".$this->uri->segment(2);?>/create" class="btn btn-success">+ CREAR</a>
          </div>
        </div>
        <div class="row">
          <div class="col-12">
            <div class="card-box">
              <div class="table-responsive">
              <table id="datatable" class="table table-bordered dt-responsive nowrap">
                <thead>
                  <tr>
                    <?php foreach($heads as $head){?>
                      <th><?php echo $head;?></th>
                  <?php }?>
                  </tr>
                </thead>
              </table>
            </div>
            </div>
          </div>
        </div> <!-- end row -->


      </div> <!-- container-fluid -->

    </div> <!-- content -->
  </div>
</div>
<?php include("footer.php");?>
