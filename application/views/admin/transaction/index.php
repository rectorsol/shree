<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">

                    <div class="col-lg-12">
                        <div class="row">
                            <div class="col-md-6 col-lg-3 col-xlg-3">
                                <div class="card card-hover">
                                    <div class="box bg-success text-center">
                                        <h1 class="font-light text-white">
                                            <i class="mdi mdi-cart-plus"></i>
                                        </h1>
                                        <a href="<?php echo base_url('admin/Transaction/showChallan'); ?>">
                                            <h4 class="font-light text-white"> <i class="mdi mdi-cart"></i></h4>
                                            <h5 class="text-white">CHALLAN TRANSACTION</h5>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-3 col-xlg-3">
                                <div class="card card-hover">
                                    <div class="box bg-info text-center">
                                        <h1 class="font-light text-white">
                                            <i class="mdi mdi-cart-plus"></i>
                                        </h1>
                                        <a href="<?php echo base_url('admin/transaction/showRecieve'); ?>">
                                            <h4 class="font-light text-white"><i class="mdi mdi-cart"></i></h4>
                                            <h5 class="text-white">BILL TRANSACTION</h5>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-3 col-xlg-3">
                                <div class="card card-hover">
                                    <div class="box bg-warning text-center">
                                        <h1 class="font-light text-white">
                                            <i class="mdi mdi-download"></i>
                                        </h1>

                                        <a href="#list_in" data-toggle="modal">
                                            <h4 class=" font-light text-white"><i class="mdi mdi-cart"></i></h4>
                                            <h5 class="text-white">MATERIAL IN</h5>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-3 col-xlg-3">
                                <div class="card card-hover">
                                    <div class="box bg-secondary text-center">
                                        <h1 class="font-light text-white">
                                            <i class="mdi mdi-upload"></i>
                                        </h1>
                                        <a href="#list_out" data-toggle="modal">
                                            <h4 class=" font-light text-white"><i class="mdi mdi-cart"></i></h4>
                                            <h5 class="text-white">MATERIAL OUT</h5>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-3 col-xlg-3">
                                <div class="card card-hover">
                                    <div class="box bg-dark text-center">
                                        <h1 class="font-light text-white">
                                            <i class="mdi mdi-folder-star"></i>
                                        </h1>
                                        <a href="#stock" data-toggle="modal">
                                            <h4 class=" font-light text-white"><i class="mdi mdi-store"></i></h4>
                                            <h5 class="text-white">STOCK OF GODOWN</h5>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-3 col-xlg-3">
                                <div class="card card-hover">
                                    <div class="box bg-warning text-center">
                                        <h1 class="font-light text-white">
                                            <i class="mdi mdi-alert"></i>
                                        </h1>
                                        <h4 class="font-light text-white"></h4>
                                        <h5 class="text-white">CANCEL ORDERS</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-3 col-xlg-3">
                                <div class="card card-hover">
                                    <div class="box bg-primary text-center">
                                        <h1 class="font-light text-white">
                                            <i class="mdi mdi-border-outside"></i>
                                        </h1>
                                        <h4 class="font-light text-white"></h4>
                                        <h5 class="text-white">INPROCESS ORDERS</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-3 col-xlg-3">
                                <div class="card card-hover">
                                    <div class="box bg-success text-center">
                                        <h1 class="font-light text-white">
                                            <i class="mdi mdi-check"></i>
                                        </h1>
                                        <h4 class="font-light text-white"></h4>
                                        <h5 class="text-white">DONE ORDERS</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>
    <div id="list_in" class="modal hide">
        <div class="modal-dialog" role="document ">
            <div class="modal-content">
                <form action="<?php echo base_url('admin/Transaction/showRecieveList/'); ?>" method="POST">
                    <div class="modal-header">
                        <h5 class="modal-title">Select GODOWN</h5>
                        <button data-dismiss="modal" class="close" type="button">×</button>

                    </div>
                    <div class="modal-body">
                        <div class="widget-content nopadding">
                            <div class="form-group row">
                                <label class="control-label col-sm-3">GODOWN</label>
                                <div class="col-sm-9">
                                    <select name="godown" id="" class="form-control">
                                        <option value="">Select GODOWN</option>
                                        <?php foreach ($sub_dept_data as $row) { ?>
                                            <option value="<?php echo $row->subDeptName ?>"><?php echo $row->subDeptName ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="hidden" id="get_csrf_hash" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                        <input type="submit" value="Submit" class="btn btn-primary">
                        <a data-dismiss="modal" class="btn btn-danger" href="#">Close</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div id="list_out" class="modal hide">
        <div class="modal-dialog" role="document ">
            <div class="modal-content">
                <form action="<?php echo base_url('admin/Transaction/showReturnList/'); ?>" method="POST">
                    <div class="modal-header">
                        <h5 class="modal-title">Select GODOWN</h5>
                        <button data-dismiss="modal" class="close" type="button">×</button>

                    </div>
                    <div class="modal-body">
                        <div class="widget-content nopadding">
                            <div class="form-group row">
                                <label class="control-label col-sm-3">GODOWN</label>
                                <div class="col-sm-9">
                                    <select name="godown" id="" class="form-control">
                                        <option value="">Select GODOWN</option>
                                        <?php foreach ($sub_dept_data as $row) { ?>
                                            <option value="<?php echo $row->subDeptName ?>"><?php echo $row->subDeptName ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="hidden" id="get_csrf_hash" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                        <input type="submit" value="Submit" class="btn btn-primary">
                        <a data-dismiss="modal" class="btn btn-danger" href="#">Close</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div id="stock" class="modal hide">
        <div class="modal-dialog" role="document ">
            <div class="modal-content">
                <form action="<?php echo base_url('admin/Transaction/showStock/'); ?>" method="POST">
                    <div class="modal-header">
                        <h5 class="modal-title">Select GODOWN</h5>
                        <button data-dismiss="modal" class="close btn btn" type="button">×</button>

                    </div>
                    <div class="modal-body">
                        <div class="widget-content nopadding">
                            <div class="form-group row">
                                <label class="control-label col-sm-3">GODOWN</label>
                                <div class="col-sm-9">
                                    <select name="godown" id="" class="form-control">
                                        <option value="">Select GODOWN</option>
                                        <?php foreach ($sub_dept_data as $row) { ?>
                                            <option value="<?php echo $row->subDeptName ?>"><?php echo $row->subDeptName ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="hidden" id="get_csrf_hash" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                        <input type="submit" value="Submit" class="btn btn-primary">
                        <a data-dismiss="modal" class="btn btn-danger" href="#">Close</a>
                    </div>
                </form>
            </div>
        </div>
    </div>