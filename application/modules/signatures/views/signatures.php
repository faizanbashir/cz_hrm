<?php include_once( APPPATH.'views/includes/header.php' ); ?>

    <div class="row wrapper border-bottom white-bg page-heading push-bottom">
        <div class="col-lg-9">
            <h2><i class="<?php echo $icon; ?>"></i> <?php echo $title; ?></h2>
            <ol class="breadcrumb">
                <li><a href="<?php echo base_url('dashboard'); ?>">Home</a></li>
                <li><a href="<?php echo base_url('signatures/signatures'); ?>">Signatures</a></li>
                <li class="active"><strong><?php echo $title; ?></strong></li>
            </ol>
        </div>
    </div>

    <div class="wrapper wrapper-content">
        <div class="row">
            <div class="col-lg-12 animated fadeInRight">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>View Employees Signatures<small> Here you can view employee signatures.</small></h5>
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

                            <table class="table table-striped table-bordered table-hover dataTables-example">
                                <thead>
                                    <tr>
                                        <th>NAME</th>
                                        <th>DESIGNATION</th>
                                        <th>EMAIL</th>
                                        <th>MOBILE NO</th>
                                        <th>ADDRESS</th>
                                        <th class="text-center" width="12%">VIEW SIGNATURE</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($employees as $employee): ?>
                                        <tr class="gradeA">
                                            <td>
                                                <?php echo $employee['first_name'].' '.$employee['last_name']; ?>
                                            </td>
                                            <td>
                                                <?php echo $employee['designation']; ?>
                                            </td>
                                            <td>
                                                <?php echo $employee['email']; ?>
                                            </td>
                                            <td class="center">
                                                <?php echo $employee['mobile_no']; ?>
                                            </td>
                                            <td class="center">
                                                <?php echo $employee['address'].', '.$employee['city'].', '.$employee['state'].', '.$employee['country']; ?>
                                            </td>
                                            <td class="text-center">   
                                                <a href="javascript:sign(<?php echo $employee['id']; ?>);" id="small"><i class="fa fa-eye fa-2x"></i></a>
                                            </td>
                                        </tr>
                                        <?php endforeach; ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>NAME</th>
                                        <th>DESIGNATION</th>
                                        <th>EMAIL</th>
                                        <th>MOBILE NO</th>
                                        <th>ADDRESS</th>
                                        <th class="text-center">VIEW SIGNATURE</th>
                                    </tr>
                                </tfoot>
                            </table>

                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="modal inmodal fade" id="signature-details" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content animated bounceInRight">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <h4 class="modal-title">Signature Details</h4>
                    <small class="font-bold">Here you can view all the details about the Signature.</small>
                </div>
                <div style="margin: 25px;">
                    <h3 style="text-align: center;">Your Signature Will look like this</h3><br/>
                    <p id="sig-html"></p>
                </div>
                <div style="margin: 25px">
                    <h3 style="text-align: center;">Copy the Signature HTML Code </h3><br/>
                    <pre id="sig-code" style="word-wrap: break-word;">
                    </pre>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        function sign(id){
            $.ajax({
                type: 'POST',
                url: '<?php echo base_url("signatures/signatures/sign"); ?>',
                data: { 'id': id },
                success: function(data) {
                    $('#sig-html').empty();
                    $('#sig-code').empty();
                    $('#sig-html').append(data);
                    //$('#sig-code').append(data);
                    document.getElementById('sig-code').innerText = data;
                    $('#signature-details').modal('show');
                },
                fail: function() {
                    alert('Failed');
                }
            });
        }
    </script>

    <?php include_once( APPPATH.'views/includes/footer.php' ); ?>
