<?php include_once( APPPATH.'views/includes/header.php' ); ?>

    <div class="row wrapper border-bottom white-bg page-heading push-bottom">
        <div class="col-lg-9">
            <h2><i class="<?php echo $icon; ?>"></i> <?php echo $title; ?>
            <a href="<?php echo base_url('signatures/signatures/create_custom_signature'); ?>" class="btn btn-success btn-xs pull-right"><i class="fa fa-plus"></i> Create Customized Signature</a></h2>
            </h2>
            <ol class="breadcrumb">
                <li><a href="<?php echo base_url('dashboard'); ?>">Home</a></li>
                <li class="active"><strong><?php echo $title; ?></strong></li>
            </ol>
        </div>
    </div>

    <div class="wrapper wrapper-content">
        <div class="row">
            <div class="col-md-12">  
                <a href="<?php echo base_url('signatures/signatures'); ?>" class="btn btn-white m-b dim">Company Signatures</a>
                <a href="<?php echo base_url('signatures/signatures/custom_signatures'); ?>" class="btn btn-danger m-b dim">Customized Signatures</a>
            </div>
    </div>
        <div class="row">
            <div class="col-lg-12 animated fadeInRight">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>View Customized Signatures<small> Here you can view customized signatures.</small></h5>
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
                                        <th>LANDLINE NO.</th>
                                        <th>MOBILE NO.</th>
                                        <th class="text-center" width="12%">ACTIONS</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($employees as $employee): ?>
                                        <tr class="gradeA">
                                            <td><?php echo $employee['name']; ?></td>
                                            <td><?php echo $employee['designation']; ?></td>
                                            <td><?php echo $employee['email']; ?></td>
                                            <td class="center"><?php echo $employee['contact']; ?></td>
                                            <td class="center"><?php echo $employee['mobile']; ?></td>
                                            <td class="text-center">
                                                 <a href="javascript:sign(<?php echo $employee['id']; ?>);" id="small"><i class="fa fa-eye fa-2x"></i></a>
                                                <a href="<?php echo base_url('signatures/signatures/edit_custom_signature/'.
                                                $employee['id']); ?>" title="Edit Signature"><i class="fa fa-edit fa-2x"></i></a>
                                                <a href="<?php echo base_url('signatures/signatures/download_signature/custom_signature/'.$employee['id']); ?>"><i class="fa fa-download fa-2x"></i></a>
                                                <a href="<?php echo base_url('signatures/signatures/delete/'.$employee['id']); ?>" title="Delete Signature" onclick="return confirm('ARE YOU SURE YOU WANT TO DELETE THE SIGNATURE?')"><i class="fa fa-trash fa-2x red"></i></a>
                                           </td>
                                        </tr>
                                        <?php endforeach; ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>NAME</th>
                                        <th>DESIGNATION</th>
                                        <th>EMAIL</th>
                                        <th>LANDLINE NO.</th>
                                        <th>MOBILE NO.</th>
                                        <th class="text-center" width="12%">ACTIONS</th>
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
                    <h3 style="text-align: center;">Your Signature will look like this</h3><br/>
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
                url: '<?php echo base_url("signatures/signatures/custom_sign"); ?>',
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
