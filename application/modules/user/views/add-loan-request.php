<?php include_once( APPPATH.'views/includes/header.php' ); ?>

<div class="row wrapper border-bottom white-bg page-heading push-bottom">
    <div class="col-lg-9">
        <h2><i class="<?php echo $icon; ?>"></i> <?php echo $title; ?></h2>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url('dashboard'); ?>">Home</a></li>
            <li><a href="<?php echo base_url('employees/hr'); ?>">HR Management</a></li>
            <li><a href="javascript:void(0);">Employees Salary</a></li>
            <li class="active"><strong><?php echo $title; ?></strong></li>
        </ol>
    </div>
</div>

<div class="wrapper wrapper-content">

    <div class="row">
        <div class="col-lg-12 animated fadeInRight">  
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5><?php if(isset($request['id'])) echo 'Edit '; ?>Loan Request<small> Here you can request loan.</small></h5>
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
                    <?php echo $this->session->flashdata('notification');?> 
                    <form action="<?php echo (isset($request['id']) ? base_url('employees/loan_requests/edit/'.$request['id']) : base_url('user/personal/request_loan'));?>" class="form-horizontal" role="form" method="post">
                        <div class="form-group">
                            <label class="col-lg-3 control-label">Request Description </label>
                            <div class="col-lg-8">
                                <textarea class="form-control" name= "loan_description" rows="5" required><?php if(isset($request['id'])) echo $request['loan_description']; ?></textarea>
                            </div>
                        </div>
                       <div class="form-group">
                            <label class="col-lg-3 control-label">Amount Request</label>
                            <div class="col-lg-8">
                                <input class="form-control" type="text" name= "loan_amount" required value="<?php if(isset($request['id'])) echo $request['loan_amount']; ?>">
                            </div>
                        </div>  
                        
                        <div class="form-group">
                            <label class="col-md-3 control-label"></label>
                            <div class="col-md-8">
                                <input type="submit" class="btn btn-primary m-b pull-right dim" value="<?php echo (isset($request['id']) ? 'UPDATE' : 'ADD');?> REQUEST" id="submit">
                                <span></span>
                            </div>
                        </div>   
                       
                    </form>
                </div>    
    
            </div> 
        </div> 
    </div>
</div>
<?php include_once( APPPATH.'views/includes/footer.php' ); ?>    