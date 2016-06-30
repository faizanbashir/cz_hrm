<?php include_once( APPPATH.'views/includes/header.php' ); ?>

<link href="<?php echo base_url(); ?>assets/js/plugins/timepicker/jquery.datetimepicker.css" rel="stylesheet">

<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-md-9">
        <h2><i class="<?php echo $icon; ?>"></i> <?php echo $title; ?></h2>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url('employees/hr'); ?>">Home</a></li>
            <li><a href="<?php echo base_url('employees/letter'); ?>">Letters</a></li>
            <li class="active"><strong><?php echo $title; ?></strong></li>
        </ol>
    </div>
</div>

<div class="wrapper wrapper-content">
    <div class="row">
        <div class="col-md-12 animated fadeInRight">    
            <div class="ibox float-e-margins">
               
                <div class="ibox-title">
                    <h5>Add Letter <small><?php if(isset($letter['id'])) echo "Here you can edit a letter."; else echo "Here you can add a letter.";?></small></h5>
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
                    
                    <form action="<?php if(isset($letter['id'])) echo base_url('employees/letter/edit/'.$letter['id']); else echo base_url('employees/letter/add');?>" class="form-horizontal" role="form" method="post">
                         <div class="row">
                                <div class="col-md-6-offset-4">                           
                                    
                                    <div class="form-group">
                                        <label class="col-md-4 control-label">Enter Letter Title </label>
                                        <div class="col-md-5">
                                            <input class="form-control required " type="text" id="category_title" name= "category_title" value="<?php if(isset($letter['id'])) echo $letter['category_title'];?>">
                                        </div>
                                    </div>   
                                    <div class="form-group">
                                       <label class="col-md-4 control-label">Enter Letter Description </label>
                                         <div class="col-md-5">
                                             <textarea class="form-control required" type="text" id="category_description" name= "category_description" rows="5"><?php if(isset($letter['id'])) echo $letter['category_description'];?></textarea>
                                         </div>
                                    </div>                           
                                    
      
                                    <div class="form-group">
                                        <label class="col-md-4 control-label"></label>
                                        <div class="col-md-5">
                                            <input type="submit" class="btn btn-primary m-b pull-right dim" value="<?php if(isset($letter['id'])) echo "UPDATE LETTER"; else echo "ADD LETTER" ?>" id="submit">
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