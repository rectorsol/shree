<div class="container-fluid">
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-body">
          <ul class="nav nav-tabs" role="tablist">
            <li class="nav-item"><a class="nav-link active show" data-toggle="tab" href="#home" aria-selected="true">HOME</a></li>
            <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#get_pending" aria-selected="false">PENDING <span class="badge badge-pill badge-info"><?php echo $order_count->pending ?></span></a></li>
            <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#get_cancel" aria-selected="false">CANCEL <span class="badge badge-pill badge-secondary"><?php echo $order_count->cancel ?></span></a></li>
            <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#get_complete" aria-selected="false">COMPLETED <span class="badge badge-pill badge-success"><?php echo $order_count->done ?></span></a></li>
          </ul>
          <div class="tab-content tabcontent-border">
            <div id="home" class="tab-pane active show" role="tabpanel">
              <p>
                <div class="col-lg-12">
                  <div class="row">
                    <div class="col-md-6 col-lg-3 col-xlg-3">
                      <div class="card card-hover">
                        <div class="box bg-info text-center">
                          <h1 class="font-light text-white">
                            <i class="mdi mdi-information"></i>
                          </h1>
                          <h4 class="font-light text-white"><?php echo $order_count->total; ?></h4>
                          <h5 class="text-white">TOTAL ORDERS</h5>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6 col-lg-3 col-xlg-3">
                      <div class="card card-hover">
                        <div class="box bg-danger text-center">
                          <h1 class="font-light text-white">
                            <i class="mdi mdi-lan-pending"></i>
                          </h1>
                          <h4 class="font-light text-white"><?php echo $order_count->pending; ?></h4>
                          <h5 class="text-white">PENDING ORDERS</h5>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6 col-lg-3 col-xlg-3">
                      <div class="card card-hover">
                        <div class="box bg-warning text-center">
                          <h1 class="font-light text-white">
                            <i class="mdi mdi-alert"></i>
                          </h1>
                          <h4 class="font-light text-white"><?php echo $order_count->cancel; ?></h4>
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
                          <h4 class="font-light text-white"><?php echo $order_count->inprocess; ?></h4>
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
                          <h4 class="font-light text-white"><?php echo $order_count->done ?></h4>
                          <h5 class="text-white">DONE ORDERS</h5>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </p>
            </div>
            <div id="get_pending" class="tab-pane fade p-20" role="tabpanel">
              <h3>ORDER PENDING</h3>
              <p>
                <table class="table table-bordered data-table text-center table-responsive">
                  <thead class="">
                    <tr class="odd" role="row">
                      <th>#</th>
                      <th>Series Number</th>
                      <th>Order Number</th>
                      <th>Fabric Name</th>
                      <th>Hsn</th>
                      <th>Design Name</th>
                      <th>Design Code</th>
                      <th>Stitch</th>
                      <th>Dye</th>
                      <th>Matching</th>
                      <th>Remark</th>
                      <th>Quntity</th>
                      <th>Unit</th>
                      <th>Priority</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($get_pending as $value): ?>
                    <tr class="gradeU" id="tr_<?php echo $value['product_order_id']?>">
                        <td>
                          <div class="btn-group">
                              <a href="<?php echo base_url('admin/Orders/update_status/')."INPROCESS/".$value['product_order_id']; ?>"><button type="button" class="btn btn-primary">INPROCESS</button></a>
                              <button type="button" class="btn btn-primary dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                  <span class="sr-only">Toggle Dropdown</span>
                              </button>
                              <div class="dropdown-menu" x-placement="bottom-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(74px, 35px, 0px);">
                                  <a class="dropdown-item" href="<?php echo base_url('admin/Orders/update_status/')."CANCEL/".$value['product_order_id']; ?>">CANCEL</a>
                                  <a class="dropdown-item" href="<?php echo base_url('admin/Orders/update_status/')."DONE/".$value['product_order_id']; ?>">DONE</a>
                              </div>
                          </div>
                      </td>
                      <td><?php echo $value['series_number']?></td>
                      <td><?php echo $value['product_order_id'];?></td>
                      <td><?php echo $value['fabric_name'];?></td>
                      <td><?php echo $value['hsn'];?></td>
                      <td><?php echo $value['design_name']?></td>
                      <td><?php echo $value['design_code']?></td>
                      <td><?php echo $value['stitch']?></td>
                      <td><?php echo $value['dye']?></td>
                      <td><?php echo $value['matching']?></td>
                      <td><?php echo $value['remark']?></td>
                      <td><?php echo $value['quantity']?></td>
                      <td><?php echo $value['unit']?></td>
                      <td><?php echo $value['priority']?></td>
                    </tr>
                  <?php endforeach; ?>
                  </tbody>
                </table>
              </p>
            </div>
            <div id="get_cancel" class="tab-pane fade p-20" role="tabpanel">
              <h3>CANCEL ORDER</h3>
              <p>
                <table class="table table-bordered data-table text-center table-responsive">
                  <thead class="">
                    <tr class="odd" role="row">
                      <th>#</th>
                      <th>Series Number</th>
                      <th>Order Number</th>
                      <th>Fabric Name</th>
                      <th>Hsn</th>
                      <th>Design Name</th>
                      <th>Design Code</th>
                      <th>Stitch</th>
                      <th>Dye</th>
                      <th>Matching</th>
                      <th>Remark</th>
                      <th>Quntity</th>
                      <th>Unit</th>
                      <th>Priority</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($get_cancel as $value): ?>
                      <tr class="gradeU" id="tr_<?php echo $value['product_order_id']?>">
                        <td>
                          <div class="btn-group">
                              <a href="<?php echo base_url('admin/Orders/update_status/')."INPROCESS/".$value['product_order_id']; ?>"><button type="button" class="btn btn-primary">INPROCESS</button></a>
                              <button type="button" class="btn btn-primary dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                  <span class="sr-only">Toggle Dropdown</span>
                              </button>
                              <div class="dropdown-menu" x-placement="bottom-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(74px, 35px, 0px);">
                                  <a class="dropdown-item" href="<?php echo base_url('admin/Orders/update_status/')."CANCEL/".$value['product_order_id']; ?>">CANCEL</a>
                                  <a class="dropdown-item" href="<?php echo base_url('admin/Orders/update_status/')."DONE/".$value['product_order_id']; ?>">DONE</a>
                              </div>
                          </div>
                        </td>
                        <td><?php echo $value['series_number']?></td>
                        <td><?php echo $value['product_order_id'];?></td>
                        <td><?php echo $value['fabric_name'];?></td>
                        <td><?php echo $value['hsn'];?></td>
                        <td><?php echo $value['design_name']?></td>
                        <td><?php echo $value['design_code']?></td>
                        <td><?php echo $value['stitch']?></td>
                        <td><?php echo $value['dye']?></td>
                        <td><?php echo $value['matching']?></td>
                        <td><?php echo $value['remark']?></td>
                        <td><?php echo $value['quantity']?></td>
                        <td><?php echo $value['unit']?></td>
                        <td><?php echo $value['priority']?></td>
                      </tr>
                    <?php endforeach; ?>
                  </tbody>
                </table>
              </p>
            </div>
            <div id="get_complete" class="tab-pane fade p-20" role="tabpanel">
              <h3>ORDER COMPLETED</h3>
              <p>
                <table class="table table-bordered data-table text-center table-responsive">
                  <thead class="">
                    <tr class="odd" role="row">
                      <th>#</th>
                      <th>Series Number</th>
                      <th>Order Number</th>
                      <th>Fabric Name</th>
                      <th>Hsn</th>
                      <th>Design Name</th>
                      <th>Design Code</th>
                      <th>Stitch</th>
                      <th>Dye</th>
                      <th>Matching</th>
                      <th>Remark</th>
                      <th>Quntity</th>
                      <th>Unit</th>
                      <th>Priority</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($get_complete as $value): ?>
                    <tr class="gradeU" id="tr_<?php echo $value['product_order_id']?>">
                      <td></td>
                      <td><?php echo $value['series_number'];?></td>
                      <td><?php echo $value['product_order_id'];?></td>
                      <td><?php echo $value['fabric_name'];?></td>
                      <td><?php echo $value['hsn'];?></td>
                      <td><?php echo $value['design_name'];?></td>
                      <td><?php echo $value['design_code'];?></td>
                      <td><?php echo $value['stitch'];?></td>
                      <td><?php echo $value['dye'];?></td>
                      <td><?php echo $value['matching'];?></td>
                      <td><?php echo $value['remark'];?></td>
                      <td><?php echo $value['quantity'];?></td>
                      <td><?php echo $value['unit'];?></td>
                      <td><?php echo $value['priority'];?></td>
                    </tr>
                  <?php endforeach; ?>
                  </tbody>
                </table>
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
