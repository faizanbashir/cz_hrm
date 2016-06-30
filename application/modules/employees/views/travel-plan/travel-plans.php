<?php include_once( APPPATH.'views/includes/header.php' ); ?>

<div class="row wrapper border-bottom white-bg page-heading push-bottom">
    <div class="col-md-12">
        <h2>
            <i class="<?php echo $icon; ?>"></i> <?php echo $title; ?>
            <a href="<?php echo base_url('employees/travel_plans/add'); ?>" class="btn btn-success btn-xs pull-right"><i class="fa fa-plus"></i> ADD TRAVEL PROJECT</a>
        </h2>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url('employees/hr'); ?>">Home</a></li>
            <li><a href="<?php echo base_url('employees/travel_plans'); ?>">Travel Plans</a></li>
            <li class="active"><strong><?php echo $title; ?></strong></li>
        </ol>
    </div>
</div>

<div class="wrapper wrapper-content">
    <div class="row">
        <div class="col-lg-12 animated fadeInRight">    
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>View Travel Projects <small> Here you can manage travel projects.</small></h5>
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
                    
                    <table class="table table-striped table-bordered table-hover dataTables-example" >
                        <thead>
                            <tr>
                                <th>EMPLOYEE NAME</th>
                                <th>PROJECT MANAGER</th>
                                <th>ALTERNATE SUPPORT</th>
                                <th>TRAVEL PURPOSE</th>
                                <th>TRAVEL SUMMARY</th>
                                <th>SUCCESS RATE</th>
                                <th class="text-center" width="10%">ACTIONS</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($travel_projects as $project): ?>
                                <tr class="gradeA">
                                    <td>
                                        <?php 
                                            $employees = explode(',', $project['employees']);
                                            foreach($employees as $employee)
                                                echo $this->Employee_Model->get_employee_name_designation($employee).'<br>'; 
                                        ?>
                                    </td>
                                    <td><?php echo $this->Employee_Model->get_employee_name_designation($project['project_manager']); ?></td>
                                    <td><?php echo $this->Employee_Model->get_employee_name_designation($project['alternate_support']); ?></td>                                 
                                    <td><?php echo $project['travel_purpose']; ?></td>
                                    <td><?php echo $project['travel_summary']; ?></td>
                                    <td>
                                        <div class="stars">
                                            <?php 
                                                if($project['success_rate'])
                                                {
                                                    $count = 0;
                                                    while($project['success_rate']--)
                                                    {
                                                        echo '<i class="fa fa-star" style="color: rgb(207, 174, 0);"></i>&nbsp'; 
                                                        $count++;
                                                    }
                                                    while($count < 10)
                                                    {
                                                        echo '<i class="fa fa-star-o"></i>&nbsp'; 
                                                        $count++;
                                                    }
                                                }
                                            ?>
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <!-- <a href="javascript:void(0);" title="Travel Plan Details" onclick="display_travel_details_modal();"><i class="fa fa-eye fa-2x"></i></a> -->
                                        <a href="<?php echo base_url('employees/travel_plans/edit/'.$project['id']); ?>"><i class="fa fa-edit fa-2x"></i></a>
                                        <a href="<?php echo base_url('employees/travel_plans/delete/'.$project['id']); ?>" title="Delete Travel Plan" onclick="return confirm('ARE YOU SURE YOU WANT TO DELETE THE TRAVEL PLAN?')"><i class="fa fa-trash fa-2x red"></i></a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>EMPLOYEE NAME</th>
                                <th>PROJECT MANAGER</th>
                                <th>ALTERNATE SUPPORT</th>
                                <th>TRAVEL PURPOSE</th>
                                <th>TRAVEL SUMMARY</th>
                                <th>SUCCESS RATE</th>
                                <th class="text-center" width="10%">ACTIONS</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal inmodal" id="travel-details" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content animated flipInY">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title">Travel Details</h4>
                <small class="font-bold">Here you can view travel details.</small>
            </div>
            <div class="modal-body"> 
                <div class="row">
                    <div class="col-lg-12">
                        <div class="m-b-md">
                            <h2>Purpose 1</h2>
                         </div>
                     </div>
                 </div>
                 <div class="row">
                    <div class="col-lg-5">
                        <dl class="dl-horizontal">
                            <dt>Travelled From:</dt> <dd>Srinagar</dd>
                            <dt>Travelled To:</dt> <dd> Dubai</dd>
                            <dt>Travelled Through:</dt> <dd> Flight</dd>
                            <dt>Duration:</dt> <dd> 3 months</dd>
                         </dl>
                     </div>
                     <div class="col-lg-7" id="cluster_info">
                         <dl class="dl-horizontal" >
                            <dt>Travel Allowance:</dt> <dd>$1000</dd>
                            <dt>Food Allowance</dt> <dd>$500</dd>
                            <dt>Living Allowance</dt> <dd>$2000</dd>
                          </dl>
                      </div>
                  </div>
                  <div class="row">
                      <div class="col-lg-12">
                            <dl class="dl-horizontal">
                                 <dt>Success Rate:</dt>
                                 <dd>
                                    <div class="stars">
                                       <i class="fa fa-star"></i> 
                                       <i class="fa fa-star"></i> 
                                       <i class="fa fa-star"></i> 
                                       <i class="fa fa-star"></i> 
                                       <i class="fa fa-star-o"></i>
                                     </div> 
                                  </dd>
                             </dl>
                        </div>
                   </div>  
              </div>    
         </div>
    </div>
</div>



<script type="text/javascript">
   function display_travel_details_modal()
    {
        $('#travel-details').modal('show');
        return true;
    }
  
</script>  
<?php include_once( APPPATH.'views/includes/footer.php' ); ?>