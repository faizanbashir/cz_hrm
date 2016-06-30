<?php include_once( APPPATH.'views/includes/header.php' ); ?>

<link href="<?php echo base_url(); ?>assets/js/plugins/timepicker/jquery.datetimepicker.css" rel="stylesheet">

<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-md-9">
        <h2><i class="<?php echo $icon; ?>"></i> <?php echo $title; ?>
        </h2>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url('employees/hr'); ?>">Home</a></li>
            <li><a href="<?php echo base_url('employees/holiday'); ?>">Holidays</a></li>
            <li class="active"><strong><?php echo $title; ?></strong></li>
        </ol>
    </div>
</div>

<div class="wrapper wrapper-content">
    
    <div class="row">
        <div class="col-md-12 animated fadeInRight">    
            <div class="ibox float-e-margins">
               
                <div class="ibox-title">
                    <h5><?php echo $title; ?> <small> <?php if(isset($holiday['id'])) echo "Here you can edit holiday."; else echo "Here you can add holiday"; ?> </small></h5>
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
                    
                    <form action="<?php if(isset($holiday['id'])) echo base_url('employees/holiday/edit/'.$holiday['id']); else echo base_url('employees/holiday/add'); ?>" class="form-horizontal" role="form" method="post">
                       

                        <div class="form-group">
                            <label class="col-md-4 control-label">Holiday Title: </label>
                            <div class="col-md-6">
                                <input class="form-control " type="text" id="title" name= "title" value="<?php if(isset($holiday['id'])) echo $holiday['title']; ?>" required>
                            </div>
                        </div> 
                    
                        <div class="form-group">
                            <label class="col-md-4 control-label">Description(optional): </label> 
                            <div class="col-md-6">
                                <textarea class="form-control" type="text" name="description" id="description" rows="5"><?php if(isset($holiday['id'])) echo $holiday['description']; ?></textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">Date: </label>
                            <div class="input-daterange input-group col-md-6">
                                <input type="text" class="input-sm form-control" name="date" id="date" required/>
                                
                            </div>
                        </div> 

                        <div class="form-group">
                            <div class="col-md-10">
                                <input type="submit" class="btn btn-primary m-b pull-right dim" value="<?php if(isset($holiday['id'])) echo "SAVE CHANGES"; else echo "ADD"; ?>" id="submit">
                            </div>
                        </div>

                  </form>
            </div>
        </div>
    </div>
</div>

<script src="<?php echo base_url(); ?>assets/js/plugins/timepicker/jquery.datetimepicker.full.js"></script>

<script type="text/javascript">
    $('.timepicker').datetimepicker({
        datepicker:false,
        format:'H:i',
        step:5
    });
</script>

<?php include_once( APPPATH.'views/includes/footer.php' ); ?>