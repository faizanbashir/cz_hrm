<?php include_once( APPPATH.'views/includes/header.php' ); ?>

<link href="<?php echo base_url(); ?>assets/js/plugins/timepicker/jquery.datetimepicker.css" rel="stylesheet">

<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-md-9">
        <h2><i class="<?php echo $icon; ?>"></i> <?php echo $title; ?></h2>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url('dashboard'); ?>">Home</a></li>
            <li>Personal</li>
            <li><a href="<?php echo base_url('user/personal/missing_time'); ?>">Missing Time-In/Time-Out</a></li>
            <li class="active"><strong><?php echo $title; ?></strong></li>
        </ol>
    </div>
</div>

<div class="wrapper wrapper-content">
   
     <div class="row">
        <div class="col-md-12 animated fadeInRight">    
            <div class="ibox float-e-margins">
               
                <div class="ibox-title">
                    <h5><?php if(isset($time['id'])) echo "Edit Missing Time-In/Time-Out "; else echo "Request Missing Time-In/Time-Out ";?><small><?php if(isset($time['id'])) echo " Here you can edit Missing Time-In/Time-Out."; else echo " Here you can request Missing Time-In/Time-Out.";?></small></h5>
                    <div class="ibox-tools">
                        <a class="collapse-link">
                            <i class="fa fa-chevron-up"></i>
                        </a>
                        <a class="close-link">
                            <i class="fa fa-times"></i>
                        </a>
                    </div>
                </div>
               
                <div class="ibox-content">                    
                    <form action="<?php if(isset($time['id'])) echo base_url('employees/attendance/edit_missing_time/'.$time['id']);  else echo base_url('user/personal/request_missing_time') ;?>" class="form-horizontal" role="           form" method="post">
                        <div class="row">
                            <div class="col-md-6-offset-4">                           
                                <div class="form-group">
                                    <label class="col-md-4 control-label">Date</label>
                                    <div class="input-group col-md-5">
                                        <input type="text" class="date-picker-disable-future-dates form-control" name="date" value="<?php if(isset($time['id'])) echo date('m/d/Y',strtotime($time['date'])); ?>" required/>
                                    </div>
                                </div>                           
                               <div class="form-group">
                                   <label class="col-md-4 control-label">TIME-IN/TIME-OUT </label>
                                     <div class="col-md-5">
                                        <select required class="form-control" name="time" id="time">
                                            <option value="">Select Type</option>
                                            <option value="time-in" <?php if(isset($time['id'])) if($time['missed'] == 'time-in') echo 'selected'; ?>>Time-In</option>
                                            <option value="time-out" <?php if(isset($time['id'])) if($time['missed'] == 'time-out') echo 'selected'; ?>>Time-Out</option>
                                            <option value="both" <?php if(isset($time['id'])) if($time['missed'] == 'both') echo 'selected'; ?>>Both</option>    
                                        </select>
                                    </div>
                                </div>  
                               <div class="form-group">
                                    <label class="col-md-4 control-label"></label>
                                    <div class="col-md-5">
                                        <input type="submit" class="btn btn-primary m-b pull-right dim" value="<?php if(isset($time['id'])) echo "SAVE CHANGES"; else echo "REQUEST"; ?>" id="submit">
                                    </div>
                               </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
    
<?php include_once( APPPATH.'views/includes/footer.php' ); ?>