<section class="invoice">
      <!-- title row -->
      <div class="row">
        <div class="col-xs-12">
          <h2 class="page-header">
            <i class="fa fa-globe"></i> Opportunity Report
            <?php
              $date = date('d F Y')
            ?>
            <small class="pull-right"><?php echo $date; ?></small>
          </h2>
        </div>
        <!-- /.col -->
      </div>
      <!-- info row -->
      <div class="row invoice-info">
        <div class="col-sm-4 invoice-col">
        <?php
          foreach ($datacust->result() as $row) {
              $row->sName_company;
              $row->sIndustry;
              $row->sAdress_company;
              $row->sPhone_number;
              $row->sJne_cust_id;
              $row->sStatus;
          }
        ?>  Client<br>
            <strong><?php echo $row->sName_company; ?> - <?php echo $row->sIndustry; ?> </strong><br>
            <i class="fa fa-building-o"></i> <?php echo $row->sAdress_company; ?><br>
            <i class="fa fa-phone"></i> <?php echo $row->sPhone_number; ?><br>  
            <i class="fa  fa-sticky-note-o"></i> <?php echo $row->sJne_cust_id; ?><br>
            <i class="fa  fa-heart-o"></i> <?php echo $row->sStatus; ?><br>

                 </div>
        <!-- /.col -->
        <div class="col-sm-4 invoice-col">
        <?php
        foreach ($datasal->result() as $row) {
          $row->sName_user;
          $row->sGender;
          $row->sNIK;
          $row->sPhone_number;
        }
        ?>
          Sales<br>
            <strong><?php echo $row->sName_user; ?> - <?php echo $row->sNIK;?></strong><br>
            <i class="fa fa-child"></i><?php echo $row->sGender;?><br>
            <i class="fa fa-phone"></i> <?php echo $row->sPhone_number;?><br>
        </div>
        <!-- /.col -->
        <div class="col-sm-4 invoice-col">
        <?php
        foreach ($datacon->result() as $row) {
          $row->sName_contact;
          $row->sPhone_number;
          $row->sPhone_number2;
          $row->sPhone_number3;
          $row->sEmail;
          $row->sName_position;
          $row->sGender;
        }
        $phone2 = $row->sPhone_number2;
        $phone3 = $row->sPhone_number3; 
        ?>
         PIC Project<br>
            <strong><?php echo $row->sName_contact; ?> - <?php echo $row->sName_position; ?></strong><br>
            <i class="fa fa-child"></i><?php echo $row->sGender;?><br>
            <i class="fa fa-phone"></i> <?php echo    $row->sPhone_number;?>
            <?php 
              if($phone2)
              {
                echo "/ $phone2";
              }
              else
              {
                "";
              }
            ?><br>
            <i class="fa fa-envelope"></i> <?php echo $row->sEmail;?>

        <!-- /.col -->
      </div>
      <!-- /.row -->

      <!-- Table row -->
      <div class="row">      
        <div class="col-xs-12 table-responsive">
        <?php
          foreach ($dataopp->result() as $row) {
            $row->sOpportunity_name;
            $row->dForecast_running;
            $row->sInformation;
            $amount = $row->dForecast_amount;
            $row->sCompetitor;
            $row->dUpdated;
            $row->sStatus_opp;
            $row->sProduct;
            $row->sService;
          }
          $dr   = $row->dForecast_running;
          $drun = date('d M Y', strtotime($dr));
          $du   = $row->dUpdated;
          $dupd = date('d M Y', strtotime($du))   ;
        ?>
        <br><br><br>
          <table class="table table-striped">
            <thead>
            <tr>
              <th>Opportunity Name</th>
              <th>Product Type</th>
              <th>Service Type</th>
              <th>Forecast Amount</th>
              <th>Forecast Running</th>
              <th>Competitor</th>
            </tr>
            </thead>
            <tbody>
            <tr>
              <td><?php echo $row->sOpportunity_name; ?></td>
              <td><?php echo $row->sProduct; ?></td>
              <td><?php echo $row->sService;?></td>
              <td><?php echo uang($amount); ?></td>
              <td><?php echo $drun; ?></td>
              <td><?php echo $row->sCompetitor; ?></td>
            </tr>
            </tbody>
          </table>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

      <div class="row">
      <br><br><br>
        <!-- accepted payments column -->
        <div class="col-xs-6">
          <p class="lead">Information</p>
          <?php
            foreach ($dataopdet->result() as $row) {
              $dud   = $row->dUpdated;
              $dudet = date('d F Y, H:i:A', strtotime($du));
          ?>
            <p>
            Sales Cycle : <?php echo $row->sStatus_opp; ?><br>
            Coment:<?php echo $row->sInfo; ?><br>
            Last Update : <?php echo $dudet;?>
            </p>
          <?php
          }
          ?>
        </div>
        <!-- /.col -->
        <div class="col-xs-6">
          <p class="lead">Meeting Report</p>

          <div class="table-responsive">
            <table class="table">
              <tr>
                <th>Meeting Subject</th>
                <th>Meeting Date</th>
              </tr>
              <tr>
              <?php
                if($datame->num_rows()>0)
                {
                  foreach ($datame->result() as $row) {
                ?>
                    <td><?php echo $row->sSubject; ?></td>
                    <?php 
                          $dm = $row->dMeeting;
                          $dme = date('d M Y',strtotime($dm)) 
                    ?>
                    <td><?php echo $dme ?></td>
              </tr>
            <?php } ?>
            <?php }
            else
            {
               echo "";
            }
            ?>
            </table>
          </div>
        </div>
        <!-- /.col -->
      </div><br>  
      <!-- /.row -->

      <!-- this row will not appear when printing -->
      <div class="row no-print">
        <div class="col-xs-12">
       
          <button type="button" class="btn pull-right" style="margin-right: 5px;"><a href="<?php echo base_url('sales/report_pdf').'/'.$idopp;?>">
            <i class="fa fa-download"></i>Generate PDF
          </button>
        </div>
      </div>
    </section>