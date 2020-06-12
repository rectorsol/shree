                                      <thead class="bg-dark text-white">
                                    <tr >
                                        <th><input type="checkbox" class="sub_chk" id="master"></th>
                                        <th>Date</th>
                                        <th>PBC</th>
                                        <th>Fabric</th> 
                                        <th>Color</th>
                                        <th>Quantity</th>
                                        <th>Current quantity</th>  
                                        <th>Unit</th>
                                        <th>TC</th>
                                        
                                        
                                    </tr>
                                </thead>
                                <tbody><?php
                                        $id=1;$t=0.0;$q=0.0;
                                        foreach ($frc_data as $value) { 
                                          $t+=$value['tc'];
                                          
                                          ?>
                                        <tr class="<?php if($value['parent']=='') {echo 'font-weight-bold text-primary'; $q+=$value['stock_quantity'];} ?>" id="tr_<?php echo $value['fsr_id']?>">

                                          <td><input type="checkbox" class="sub_chk" data-id="<?php echo $value['fsr_id'] ?>"></td>
                                          <td><?php $date=date_create($value['created_date']);echo date_format($date,"d-m-y "); ?></td>

                                          
                                          <td><?php echo $value['parent_barcode'];?></td>
                                          <td><?php echo $value['fabricName'];?></td>
                                           <td><span class="label label-danger"><?php echo $value['color_name'];?></span></td>
                                          
                                         
                                          <td><b><?php echo $value['stock_quantity']?></b></td>
                                          <td><b><span class="label label-danger"><?php echo $value['current_stock']?></span></b></td>
                                          <td><b><?php echo $value['stock_unit']?></b></td>
                                          <td><?php echo $value['tc']?></td>
                                          
                                          
                                        </tr>

                                          <?php 
                                         $id=$id+1;
                                        }
                                           ?> </tbody class="bg-dark text-white"><tfoot>
                                           <tr >
                                        <th>Total</th>
                                        <th></th>
                                        <th></th>
                                        <th></th> 
                                        <th></th>
                                        <th><?php 
                                        echo $q;
                                           ?></th>
                                        <th></th>  
                                        <th></th>
                                        <th><?php 
                                        echo $t;
                                           ?></th>
                                        
                                        
                                    </tr>
                                           </tfoot>