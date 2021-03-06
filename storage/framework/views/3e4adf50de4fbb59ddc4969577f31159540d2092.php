<?php
/*******************************************************************************
     Copyright (c) Company Nam All rights reserved.

     FILE NAME: materialreceiving.blade.php
     MODULE NAME:  3006 : WBS - Material Receiving
     CREATED BY: AK.DELAROSA
     DATE CREATED: 2016.07.01
     REVISION HISTORY :

     VERSION     ROUND    DATE           PIC          DESCRIPTION
     100-00-01   1     2016.07.01    AK.DELAROSA      Initial Draft
     100-00-02   1     2016.07.05    MESPINOSA        Material Receving Implementation.
     200-00-01   1     2016.07.01    AK.DELAROSA      2ND VERSION
*******************************************************************************/
?>



<?php $__env->startSection('title'); ?>
     WBS | Pricon Microelectronics, Inc.
<?php $__env->stopSection(); ?>

<?php $__env->startPush('css'); ?>
     <style type="text/css">
          table.table-fixedheader {
              width: 100%;
          }
           table.table-fixedheader, table.table-fixedheader>thead, table.table-fixedheader>tbody, table.table-fixedheader>thead>tr, table.table-fixedheader>tbody>tr, table.table-fixedheader>thead>tr>td, table.table-fixedheader>tbody>td {
              display: block;
          }
          table.table-fixedheader>thead>tr:after, table.table-fixedheader>tbody>tr:after {
              content:' ';
              display: block;
              visibility: hidden;
              clear: both;
          }
           table.table-fixedheader>tbody {
              overflow-y: scroll;
              height: 200px;

          }
           table.table-fixedheader>thead {
              overflow-y: scroll;
          }
           table.table-fixedheader>thead::-webkit-scrollbar {
              background-color: inherit;
          }


          table.table-fixedheader>thead>tr>td:after, table.table-fixedheader>tbody>tr>td:after {
              content:' ';
              display: table-cell;
              visibility: hidden;
              clear: both;
          }

           table.table-fixedheader>thead tr td, table.table-fixedheader>tbody tr td {
              float: left;
              word-wrap:break-word;
              height: 40px;
          }
     </style>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>

     <?php echo $__env->make('includes.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
     <?php $state = ""; $readonly = ""; ?>
     <?php foreach($userProgramAccess as $access): ?>
          <?php if($access->program_code == Config::get('constants.MODULE_CODE_WBS')): ?>  <!-- Please update "2001" depending on the corresponding program_code -->
               <?php if($access->read_write == "2"): ?>
               <?php $state = "disabled"; $readonly = "readonly"; ?>
               <?php endif; ?>
          <?php endif; ?>
     <?php endforeach; ?>



     
     <div class="page-content">

          <?php echo $__env->make('includes.message-block', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
          <div class="portlet box blue" >
               <div class="portlet-title">
                    <div class="caption">
                         <i class="fa fa-navicon"></i>  WBS Material Receiving
                    </div>
               </div>
               <div class="portlet-body">
                    <div class="row">
                         <div class="col-md-5">
                              <div class="form-group row">
                                   <label class="control-label col-md-3">Receiving No.</label>
                                   <div class="col-md-9">
                                        <div class="input-group">
                                             <input type="text" class="form-control clear clearinv input-sm" id="receivingno" name="receivingno" />

                                             <span class="input-group-btn">
                                                  <a href="javascript:navigate('first');" id="btn_min" class="btn blue input-sm"><i class="fa fa-fast-backward"></i></a>
                                                  <a href="javascript:navigate('prev');" id="btn_prv" class="btn blue input-sm"><i class="fa fa-backward"></i></a>
                                                  <a href="javascript:navigate('next');" id="btn_nxt" class="btn blue input-sm"><i class="fa fa-forward"></i></a>
                                                  <a href="javascript:navigate('last');" id="btn_max" class="btn blue input-sm"><i class="fa fa-fast-forward"></i></a>
                                             </span>
                                        </div>

                                        
                                   </div>
                              </div>
                              <div class="form-group row">
                                   <label class="control-label col-md-3">Receiving Date.</label>
                                   <div class="col-md-4">
                                        <input class="form-control clear clearinv input-sm date-picker" size="16" type="text" name="receivingdate" id="receivingdate"/>
                                   </div>
                                   <div class="col-md-5">
                                        <!-- <button type="button" class="btn btn-default">Previous</button> -->
                                   </div>
                              </div>
                              <div class="form-group row">
                                   <label class="control-label col-md-3">Invoice No.</label>
                                   <div class="col-md-8">
                                        <div class="input-group">
                                             <input type="text" class="form-control clear input-sm" id="invoiceno" name="invoiceno" readonly/>
                                             <input type="hidden" class="form-control clear clearinv input-sm" id="hdninvoiceno" name="hdninvoiceno"/>
                                             <span class="input-group-btn">
                                                  <button type="submit" class="btn green input-sm" id="btn_checkinv"><i class="fa fa-arrow-circle-down"></i></button>
                                             </span>
                                        </div>
                                        
                                   </div>
                              </div>
                              <div class="form-group row">
                                   <label class="control-label col-md-3">Invoice Date</label>
                                   <div class="col-md-4">
                                        <input class="form-control clear clearinv input-sm date-picker" size="16" type="text" name="invoicedate" id="invoicedate" disabled="disable"/>
                                   </div>
                              </div>
                         </div>

                         <div class="col-md-3">
                              <div class="form-group row">
                                   <label class="control-label col-md-5">Pallet No.</label>
                                   <div class="col-md-7">
                                        <input type="text" class="form-control clear clearinv input-sm" id="palletno" name="palletno" readonly/>
                                   </div>
                              </div>
                              <div class="form-group row">
                                   <label class="control-label col-md-5">Total Qty.</label>
                                   <div class="col-md-7">
                                        <input type="text" class="form-control clear clearinv input-sm" id="totalqty" name="totalqty" disabled="disable"/>
                                   </div>
                              </div>
                              <div class="form-group row">
                                   <label class="control-label col-md-5">Total Variance</label>
                                   <div class="col-md-7">
                                        <input type="text" class="form-control clear clearinv input-sm" id="totalvar" name="totalvar" disabled="disable"/>
                                        <input type="hidden" id="totalamt" name="totalamt"/>
                                   </div>
                              </div>
                              <div class="form-group row">
                                   <label class="control-label col-md-5">Status</label>
                                   <div class="col-md-7">
                                        <input type="text" class="form-control clear clearinv input-sm" id="status" name="status" disabled="disable"/>
                                   </div>
                              </div>
                         </div>

                         <div class="col-md-4">
                              <div class="form-group row">
                                   <label class="control-label col-md-4">Created By</label>
                                   <div class="col-md-8">
                                        <input type="text" class="form-control clear clearinv input-sm" id="createdby" name="createdby" disabled="disable"/>
                                   </div>
                              </div>
                              <div class="form-group row">
                                   <label class="control-label col-md-4">Created Date</label>
                                   <div class="col-md-8">
                                        <input class="form-control clear clearinv input-sm date-picker" size="50" type="text" name="createddate" id="createddate" disabled="disable"/>
                                   </div>
                              </div>
                              <div class="form-group row">
                                   <label class="control-label col-md-4">Updated By</label>
                                   <div class="col-md-8">
                                        <input type="text" class="form-control clear clearinv input-sm" id="updatedby" name="updatedby" disabled="disable"/>
                                   </div>
                              </div>
                              <div class="form-group row">
                                   <label class="control-label col-md-4">Updated Date</label>
                                   <div class="col-md-8">
                                        <input class="form-control clear clearinv input-sm date-picker" size="50" type="text" name="updateddate" id="updateddate" disabled="disable"/>
                                   </div>
                              </div>
                         </div>
                    </div>

                    <div class="row">
                         <div class="col-md-offset-2 col-md-8">
                              <div class="row">
                                   <div class="col-sm-offset-2 col-sm-8">
                                        <form class="form-horizontal" method="POST" enctype="multipart/form-data" id="uploadbatchfiles" action="<?php echo e(url('/wbsuploadbatchitems')); ?>">
                                             <div class="form-group">
                                                  <label class="control-label col-sm-4">Upload Batch Items</label>
                                                  <div class="col-sm-6">
                                                       <?php echo e(csrf_field()); ?>

                                                       <input type="file" class="filestyle" data-buttonName="btn-primary" name="batchfiles" id="batchfiles" <?php echo e($readonly); ?>>
                                                       <?php /* batchfiles */ ?>
                                                  </div>
                                                  <div class="col-sm-2">
                                                       <button type="submit" id="btn_upload" class="btn btn-success" <?php echo($state); ?>>
                                                            <i class="fa fa-upload"></i> Upload
                                                       </button>
                                                  </div>
                                             </div>
                                        </form>

                                   </div>
                              </div>

                         </div>
                    </div>

                    <div class="row">
                         <div class="col-md-12">
                              <div class="tabbable-custom">
                                   <ul class="nav nav-tabs nav-tabs-lg" id="tabslist" role="tablist">
                                        <li class="active">
                                             <a href="#details" data-toggle="tab" data-toggle="tab" aria-expanded="true">Details</a>
                                        </li>
                                        <li>
                                             <a href="#summary" data-toggle="tab" data-toggle="tab" aria-expanded="true">Summary</a>
                                        </li>
                                        <li>
                                             <a href="#batch" data-toggle="tab" data-toggle="tab" aria-expanded="true">Batch Details</a>
                                        </li>
                                   </ul>

                                   <!-- Details Tab -->
                                   <div class="tab-content" id="tab-subcontents">
                                        <div class="tab-pane fade in active" id="details">
                                             <div class="row">
                                                  <div class="col-md-12">
                                                       <div class="table-responsive table-area" id="div_tbl_details" >

                                                       </div>
                                                  </div>

                                             </div>
                                        </div>
                                        <!-- Summary Tab -->
                                        <div class="tab-pane fade" id="summary">
                                             <div class="row">
                                                  <div class="col-md-12">
                                                       <div class="table-responsive" id="div_tbl_summary">

                                                       </div>
                                                       <!-- <p>Count: <span id="summarycount"></span></p> -->
                                                  </div>
                                             </div>
                                        </div>
                                        <!-- Batch Details Tab -->
                                        <div class="tab-pane fade" id="batch">
                                             <div class="row">
                                                  <div class="col-md-12">
                                                       <div class="table-responsive" id="div_tbl_batch">

                                                       </div>

                                                  </div>
                                             </div>
                                             <div class="row">
                                                  <div class="col-md-12 text-center">
                                                       <button type="button"  class="btn green input-sm" id="btn_add_batch" <?php echo($state); ?> >
                                                            <i class="fa fa-plus"></i> Add Batch Item
                                                       </button>
                                                       <button type="button"  class="btn red input-sm" id="btn_delete_batch">
                                                            <i class="fa fa-trash"></i> Delete
                                                       </button>
                                                       <?php /* <button type="button"  class="btn blue input-sm" id="btn_all_batch">
                                                            <i class="glyphicon glyphicon-asterisk"></i> Receive All
                                                       </button> */ ?>
                                                       <input type="hidden" class="form-control input-sm" id="item_count" placeholder="Lower Limit" name="item_count"/>
                                                  </div>
                                             </div>
                                        </div>
                                   </div>

                              </div>
                         </div>
                    </div>

                    <!-- Action Buttons -->
                    <div class="row">
                         <div class="col-md-12 text-center">
                              <button type="button" class="btn btn-success input-sm" id="btn_addnew" <?php echo($state); ?>>
                                   <i class="fa fa-plus"></i> Add New
                              </button>
                              <button type="button" class="btn blue-madison input-sm" id="btn_save" <?php echo($state); ?> >
                                   <i class="fa fa-pencil"></i> Save
                              </button>
                              <button type="button" class="btn blue-madison input-sm" id="btn_edit" >
                                   <i class="fa fa-pencil"></i> Edit
                              </button>
                              <button type="button" class="btn red input-sm" id="btn_cancel" <?php echo($state); ?> >
                                   <i class="fa fa-trash"></i> Cancel
                              </button>

                              <button type="button" class="btn red-intense input-sm" id="btn_discard" <?php echo($state); ?> >
                                   <i class="fa fa-pencil"></i> Discard Changes
                              </button>

                              <button type="button" class="btn blue-steel input-sm" id="btn_search">
                                   <i class="fa fa-search"></i> Search
                              </button>

                              <button type="button" class="btn red input-sm" id="btn_cancel_mr" <?php echo($state); ?> >
                                   <i class="fa fa-trash"></i> Cancel Invoice
                              </button>

                              <button type="submit" class="btn purple-plum input-sm" id="btn_print">
                                   <i class="fa fa-print"></i> Print
                              </button>

                              <button type="submit" class="btn blue input-sm" id="btn_print_iqc">
                                   <i class="fa fa-print"></i> Apply to IQC
                              </button>

                              <button type="button" class="btn grey-gallery input-sm" id="btn_refresh">
                                   <i class="fa fa-refresh"></i> Refresh Invoice
                              </button>
                              <input type="hidden" name="savestate" id="savestate">
                         </div>
                    </div>
               </div>
          </div>
     </div>




     <!-- Add Batch Modal -->
     <div id="batchItemModal" class="modal fade" role="dialog" data-backdrop="static">
          <div class="modal-dialog modal-md">
               <!-- Modal content-->
               <div class="modal-content blue">
                    <div class="modal-header">
                         <button type="button" class="close" data-dismiss="modal">&times;</button>
                         <h4 class="modal-title">Add Batch</h4>
                    </div>
                    <div class="modal-body">
                         <div class="row">
                              <div class="col-md-6">
                                   All the fields are required.
                              </div>
                              <div class="col-md-12">
                                   <form class="form-horizontal">
                                        <div class="form-group">
                                             <label for="inputcode" class="col-md-3 control-label">*Batch ID</label>
                                             <div class="col-md-9">
                                                  <input type="text" id="add_invoice_no" name="id" hidden="true" />
                                                  <input type="text" class="form-control input-sm clearbatch" id="add_inputBatchId" placeholder="Batch ID" name="batchid" readonly />
                                             </div>
                                        </div>
                                        <div class="form-group">
                                             <label for="inputname" class="col-md-3 control-label">*Item No</label>
                                             <div class="col-md-9">
                                                  <input type="text" id="add_inputItemNo" class="form-control input-sm clearbatch" name="itemno" <?php echo($state);?>>
                                                  <input type="hidden" id="add_inputItemNoHidden" class="clearbatch">
                                                  <input type="hidden" id="add_inputItemDesc" class="clearbatch">
                                                  <input type="hidden" id="add_notForIqc" class="clearbatch">
                                             </div>
                                        </div>
                                        <div class="form-group">
                                             <label for="inputname" class="col-md-3 control-label">*Quantity</label>
                                             <div class="col-md-9">
                                                  <input type="text" class="form-control input-sm clearbatch" id="add_inputQty" placeholder="Quantity" name="qty" <?php echo($readonly); ?> />
                                             </div>
                                        </div>
                                        <div class="form-group">
                                             <div class="col-md-3" style="text-align: right;">
                                                  <label for="inputname" class="control-label">*Package Category</label>
                                             </div>
                                             <div class="col-md-3">
                                                  <input type="text" id="add_inputBox" class="form-control input-sm clearbatch" name="itemno" <?php echo($state);?>>
                                             </div>
                                             <div class="col-md-3" style="text-align: right;">
                                                  <label for="inputname" class="control-label">*Package Qty</label>
                                             </div>
                                             <div class="col-md-3">
                                                  <input type="text" class="form-control input-sm clearbatch" id="add_inputBoxQty" placeholder="Box Qty" name="boxqty" <?php echo($readonly); ?> />
                                             </div>
                                        </div>
                                        <div class="form-group">
                                             <div class="col-md-3" style="text-align: right;">
                                                  <label for="inputname" class="control-label" >*Lot No</label>
                                             </div>
                                             <div class="col-md-9">
                                                  <input type="text" class="form-control input-sm clearbatch" id="add_inputLotNo" placeholder="Lot No" name="lotno" <?php echo($readonly); ?> />
                                             </div>
                                        </div>
                                        <div class="form-group">
                                             <div class="col-md-3" style="text-align: right;">
                                                  <label for="inputname" class="control-label">Location</label>
                                             </div>
                                             <div class="col-md-9">
                                                  <input type="text" class="form-control input-sm clearbatch" id="add_inputLocation" placeholder="Location" name="location" disabled="disabled" <?php echo($readonly); ?> value=""/>
                                             </div>
                                        </div>
                                        <div class="form-group">
                                             <div class="col-md-3" style="text-align: right;">
                                                  <label for="inputname" class="control-label">Supplier</label>
                                             </div>
                                             <div class="col-md-9">
                                                  <input type="text" class="form-control input-sm clearbatch" id="add_inputSupplier" placeholder="Supplier" name="supplier" <?php echo($readonly); ?> />
                                             </div>
                                        </div>
                                        <div class="form-group">
                                             <div class="col-md-3" style="text-align: right;">
                                                  <label for="inputname" class="control-label">Expiration Date</label>
                                             </div>
                                             <div class="col-md-9">
                                                  <input class="form-control clear clearinv input-sm date-picker" size="16" type="text" name="add_inputExp_date" id="add_inputExp_date" <?php echo($readonly); ?>/>
                                             </div>
                                        </div>
                                   </form>
                              </div>
                         </div>
                    </div>
                    <div class="modal-footer">
                         <button type="button" id="btn_add_batch_modal" class="btn btn-success" <?php echo($state); ?>><i class="fa fa-plus"></i> Add</button>
                         <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
                    </div>
               </div>
          </div>
     </div>

     <!-- Edit Batch Modal -->
     <div id="EditbatchItemModal" class="modal fade" role="dialog" data-backdrop="static">
          <div class="modal-dialog modal-md">
               <!-- Modal content-->
               <div class="modal-content blue">
                    <div class="modal-header">
                         <button type="button" class="close" data-dismiss="modal">&times;</button>
                         <h4 class="modal-title">Edit Batch</h4>
                    </div>
                    <div class="modal-body">
                         <div class="row">
                              <div class="col-md-6">
                                   All the fields are required.
                              </div>
                              <div class="col-md-12">
                                   <form class="form-horizontal">
                                        <div class="form-group">
                                             <label for="inputcode" class="col-md-3 control-label">*Batch ID</label>
                                             <div class="col-md-9">
                                                  <input type="hidden" id="edit_invoice_no" name="id"/>
                                                  <input type="text" class="form-control input-sm clearbatch" id="edit_inputBatchId" placeholder="Batch ID" name="batchid" readonly />
                                             </div>
                                        </div>
                                        <div class="form-group">
                                             <label for="inputname" class="col-md-3 control-label">*Item No</label>
                                             <div class="col-md-9">
                                                  <input type="text" id="edit_inputItemNo" class="form-control input-sm clearbatch" name="itemno" <?php echo($state);?>>
                                                  <input type="hidden" id="edit_inputItemNoHidden" class="clearbatch">
                                                  <input type="hidden" id="edit_inputItemDesc" class="clearbatch">
                                                  <input type="hidden" id="edit_notForIqc" class="clearbatch">
                                             </div>
                                        </div>
                                        <div class="form-group">
                                             <label for="inputname" class="col-md-3 control-label">*Quantity</label>
                                             <div class="col-md-9">
                                                  <input type="text" class="form-control input-sm clearbatch" id="edit_inputQty" placeholder="Quantity" name="qty"  />
                                                  <input type="hidden" name="edit_inputQtyHidden" id="edit_inputQtyHidden">
                                             </div>
                                        </div>
                                        <div class="form-group">
                                             <div class="col-md-3" style="text-align: right;">
                                                  <label for="inputname" class="control-label">*Package Category</label>
                                             </div>
                                             <div class="col-md-3">
                                                  <input type="text" id="edit_inputBox" class="form-control input-sm clearbatch" name="itemno" <?php echo($state);?>>
                                             </div>
                                             <div class="col-md-3" style="text-align: right;">
                                                  <label for="inputname" class="control-label">*Package Qty</label>
                                             </div>
                                             <div class="col-md-3">
                                                  <input type="text" class="form-control input-sm clearbatch" id="edit_inputBoxQty" placeholder="Box Qty" name="boxqty" <?php echo($readonly); ?> />
                                             </div>
                                        </div>
                                        <div class="form-group">
                                             <div class="col-md-3" style="text-align: right;">
                                                  <label for="inputname" class="control-label" >*Lot No</label>
                                             </div>
                                             <div class="col-md-9">
                                                  <input type="text" class="form-control input-sm clearbatch" id="edit_inputLotNo" placeholder="Lot No" name="lotno" <?php echo($readonly); ?> />
                                             </div>
                                        </div>
                                        <div class="form-group">
                                             <div class="col-md-3" style="text-align: right;">
                                                  <label for="inputname" class="control-label">Location</label>
                                             </div>
                                             <div class="col-md-9">
                                                  <input type="text" class="form-control input-sm clearbatch" id="edit_inputLocation" placeholder="Location" name="location" disabled="disabled" <?php echo($readonly); ?> value=""/>
                                             </div>
                                        </div>
                                        <div class="form-group">
                                             <div class="col-md-3" style="text-align: right;">
                                                  <label for="inputname" class="control-label">Supplier</label>
                                             </div>
                                             <div class="col-md-9">
                                                  <input type="text" class="form-control input-sm clearbatch" id="edit_inputSupplier" placeholder="Supplier" name="supplier" <?php echo($readonly); ?> />
                                             </div>
                                        </div>
                                        <div class="form-group">
                                             <div class="col-md-3" style="text-align: right;">
                                                  <label for="inputname" class="control-label">Expiration Date</label>
                                             </div>
                                             <div class="col-md-9">
                                                  <input class="form-control clear clearinv input-sm date-picker" size="16" type="text" name="edit_inputExp_date" id="edit_inputExp_date" <?php echo($readonly); ?>/>
                                             </div>
                                        </div>
                                   </form>
                              </div>
                         </div>
                    </div>
                    <div class="modal-footer">
                         <button type="button" id="btn_edit_batch_modal" class="btn btn-success" <?php echo($state); ?>><i class="fa fa-check"></i> Update</button>
                         <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
                    </div>
               </div>
          </div>
     </div>

     <!-- Search Modal -->
     <div id="searchModal" class="modal fade" role="dialog" data-backdrop="static">
          <div class="modal-dialog modal-xl">
               <!-- Modal content-->
               <div class="modal-content blue">
                    <div class="modal-header">
                         <button type="button" class="close" data-dismiss="modal">&times;</button>
                         <h4 class="modal-title">Search</h4>
                    </div>
                    <div class="modal-body">
                         <div class="row">
                              <div class="col-md-5">
                                   <form class="form-horizontal">
                                        <div class="form-group">
                                             <label for="inputcode" class="col-md-3 control-label">Receive Date</label>
                                             <div class="col-md-7">
                                                  <div class="input-group input-large date-picker input-daterange" data-date="<?php echo date("m/d/Y"); ?>" data-date-format="mm/dd/yyyy">
                                                       <input type="text" class="form-control input-sm reset" name="srch_from" id="srch_from"/>
                                                       <span class="input-group-addon">to </span>
                                                       <input type="text" class="form-control input-sm reset" name="srch_to" id="srch_to"/>
                                                  </div>
                                             </div>
                                        </div>
                                        <div class="form-group">
                                             <label for="inputname" class="col-md-3 control-label">Invoice No</label>
                                             <div class="col-md-7">
                                                  <input type="text" class="form-control input-sm reset" id="srch_invoiceno" placeholder="Invoice No" name="srch_invoiceno" autofocus <?php echo($readonly); ?> />
                                             </div>
                                        </div>
                                        <div class="form-group">
                                             <label for="inputname" class="col-md-3 control-label">Invoice Date</label>
                                             <div class="col-md-7">
                                                  <div class="input-group input-large date-picker input-daterange" data-date="<?php echo date("m/d/Y"); ?>" data-date-format="mm/dd/yyyy">
                                                       <input type="text" class="form-control input-sm reset" name="srch_invfrom" id="srch_invfrom"/>
                                                       <span class="input-group-addon"> to </span>
                                                       <input type="text" class="form-control input-sm reset" name="srch_invto" id="srch_invto"/>
                                                  </div>
                                             </div>
                                        </div>
                                        <div class="form-group">
                                             <label for="inputname" class="col-md-3 control-label">Pallet No</label>
                                             <div class="col-md-7">
                                                  <input type="text" class="form-control input-sm reset" id="srch_palletno" placeholder="Pallet No" name="srch_palletno" <?php echo($readonly); ?> />
                                             </div>
                                        </div>
                                        <div class="form-group">
                                             <label for="inputname" class="col-md-3 control-label">Status</label>
                                             <div class="col-md-7">
                                                  <label><input type="checkbox" class="checkboxes" value="Open" id="srch_open" name="Open" checked="checked"/>Open</label>
                                                  <label><input type="checkbox" class="checkboxes" value="Close" id="srch_close" name="Close"/>Close</label>
                                                  <label><input type="checkbox" class="checkboxes" value="Cancelled" id="srch_cancelled" name="Cancelled"/>Cancelled</label>
                                             </div>
                                        </div>
                                   </form>
                              </div>
                              <div class="col-md-7" style="height:200px; overflow: auto;">
                                   <table class="table table-striped table-bordered table-hover table-responsive sortable">
                                        <thead>
                                             <tr>
                                                  <td></td>
                                                  <td>Transaction No.</td>
                                                  <td>Receive Date</td>
                                                  <td>Invoice No.</td>
                                                  <td>Invoice Date</td>
                                                  <td>Pallet No.</td>
                                                  <td>Status</td>
                                                  <td>Created By</td>
                                                  <td>Created Date</td>
                                                  <td>Updated By</td>
                                                  <td>Updated Date</td>
                                             </tr>
                                        </thead>
                                        <tbody id="tbl_search_body">
                                        </tbody>
                                   </table>
                              </div>
                         </div>
                    </div>
                    <div class="modal-footer">
                         <a href="javascript:;" class="btn blue-madison input-sm" id="btn_filter"><i class="glyphicon glyphicon-filter"></i> Filter</a>
                         <a href="javascript:;" class="btn green input-sm" id="btn_reset"><i class="glyphicon glyphicon-repeat"></i> Reset</a>
                         <a href="javascript:;" class="btn btn-danger input-sm" data-dismiss="modal"><i class="fa fa-times"></i> Close</a>
                    </div>
               </div>
          </div>
     </div>

     <!-- AJAX LOADER -->
     <div id="loading" class="modal fade" role="dialog" data-backdrop="static">
          <div class="modal-dialog modal-sm gray-gallery">
               <div class="modal-content ">
                    <div class="modal-body">
                         <div class="row">
                              <div class="col-sm-2"></div>
                              <div class="col-sm-8">
                                   <img src="<?php echo e(asset(Config::get('constants.PUBLIC_PATH').'assets/images/ajax-loader.gif')); ?>" class="img-responsive">
                              </div>
                              <div class="col-sm-2"></div>
                         </div>
                    </div>
               </div>
          </div>
     </div>

     <!-- MSG -->
     <div id="msg" class="modal fade" role="dialog" data-backdrop="static">
          <div class="modal-dialog modal-sm gray-gallery">
               <div class="modal-content ">
                    <div class="modal-header">
                         <h4 id="title" class="modal-title"></h4>
                    </div>
                    <div class="modal-body">
                         <p id="err_msg"></p>
                    </div>
                    <div class="modal-footer">
                         <button type="button" data-dismiss="modal" class="btn btn-danger">Close</button>
                    </div>
               </div>
          </div>
     </div>

     <!-- Confirm -->
     <div id="confirm" class="modal fade" role="dialog" data-backdrop="static">
          <div class="modal-dialog modal-sm gray-gallery">
               <div class="modal-content ">
                    <div class="modal-header">
                         <h4 class="modal-title">WBS Material Receiving</h4>
                    </div>
                    <div class="modal-body">
                         <p>Are you sure?</p>
                         <input type="hidden" name="confirm_status" id="confirm_status">
                    </div>
                    <div class="modal-footer">
                         <button type="button" data-dismiss="modal" id="confirmyes" class="btn btn-success">Yes</button>
                         <button type="button" data-dismiss="modal" id="confirmno" class="btn btn-danger">No</button>
                    </div>
               </div>
          </div>
     </div>

<?php $__env->stopSection(); ?>


<?php $__env->startPush('script'); ?>
<?php /* var token = "<?php echo e(Session::token()); ?>";
          var refreshInvoice = "<?php echo e(url('/wbsmr-refresh')); ?>";
          var cancelInvoiceURL = '<?php echo e(url("/wbsmrcanvelinvoice")); ?>';
          var deleteBatchItemURL = '<?php echo e(url("/wbsmrdeletebatch")); ?>';
          var getMRdataURL = '<?php echo e(url("/wbsmrnumber")); ?>';
          var wbsSaveURL = '<?php echo e(url("/wbsmrsave")); ?>';
          var checkIfNotForIQCURL = "<?php echo e(url('/wbsmrcheckifnotforiqc')); ?>"; */ ?>
     <script type="text/javascript">

          var access_state = "<?php echo e($pgaccess); ?>";
          var pcode = "<?php echo e($pgcode); ?>";

          $(function() {
               tblDetails();
               tblSummary();
               tblBatch();
               getLatestRecord();
               ViewState();

               $('#btn_addnew').on('click', function() {
                    clear();
                    $('#invoiceno').prop('readonly',false);
                    $('#invoiceno').prop('readonly',false);
                    $('#invoiceno').prop('readonly',false);
                    $('#btn_addnew').hide();
                    $('#btn_edit').hide();
                    $('#btn_cancel').show();
                    $('#btn_search').hide();
                    $('#btn_cancel_mr').hide();
                    $('#btn_print').hide();
                    $('#btn_print_iqc').hide();
                    $('#tbl_details_body').html('');
                    $('#tbl_summary_body').html('');
                    $('#tbl_batch_body').html('');
               });

               $('#btn_checkinv').on('click', function(e) {
                    $('.clearinv').val('');
                    $('#loading').modal('show');
                    $('.details_remove').remove();
                    $('.summary_remove').remove();
                    $('.batch_remove').remove();
                    var tbl_summary = '';
                    var tbl_details = '';
                    var url = '<?php echo e(url("/wbsmrpostinvoicenum")); ?>';
                    var token = "<?php echo e(Session::token()); ?>";
                    var data = {
                         _token: token,
                         invoiceno: $('#invoiceno').val()
                    };

                    if ($('#invoiceno').val() != '') {
                         $.ajax({
                              url: url,
                              type: "POST",
                              data: data,
                         }).done( function(data, textStatus, jqXHR) {
                              $('#loading').modal('hide');
                              var checked = '';
                              if (data.request_status == 'success') {
                                   var invdata = data.invoicedata;

                                   $('#receivingno').val(invdata.receiving_no);
                                   $('#receivingdate').val(invdata.receiving_date);
                                   $('#invoiceno').val(invdata.invoiceno);
                                   $('#hdninvoiceno').val(invdata.invoiceno);
                                   $('#invoicedate').val(invdata.invoice_date);
                                   $('#totalqty').val(invdata.total_qty);
                                   $('#totalvar').val(invdata.total_var);
                                   $('#totalamt').val(invdata.total_amt);
                                   $('#status').val(invdata.status);
                                   $('#createdby').val(invdata.created_by);
                                   $('#createddate').val(invdata.created_date);
                                   $('#updatedby').val(invdata.updated_by);
                                   $('#updateddate').val(invdata.updated_date);
                                   $('#palletno').prop('readonly', false);

                                   $.each(data.detailsdata, function(index, x) {
                                        tbl_details = '<tr class="details_remove">'+
                                                            '<td class="col-xs-2">'+x.item+
                                                                 '<input type="hidden" name="item_details[]" value="'+x.item+'"/>'+
                                                            '</td>'+
                                                            '<td class="col-xs-3">'+x.description+
                                                                 '<input type="hidden" name="desc_details[]" value="'+x.description+'"/>'+
                                                            '</td>'+
                                                            '<td class="col-xs-1">'+x.qty+
                                                                 '<input type="hidden" name="qty_details[]" value="'+x.qty+'"/>'+
                                                            '</td>'+
                                                            '<td class="col-xs-2">'+x.pr+
                                                                 '<input type="hidden" name="pr_details[]" value="'+x.pr+'"/>'+
                                                            '</td>'+
                                                            '<td class="col-xs-2">'+x.price+
                                                                 '<input type="hidden" name="price_details[]" value="'+x.price+'"/>'+
                                                            '</td>'+
                                                            '<td class="col-xs-2">'+x.amount+
                                                                 '<input type="hidden" name="amount_details[]" value="'+x.amount+'"/>'+
                                                            '</td>'+
                                                       '</tr>';
                                        $('#tbl_details_body').append(tbl_details);
                                   });

                                   $.each(data.summarydata, function(index, x) {
                                        if (x.vendor == 'PPD' || x.vendor == 'PPS' || x.vendor == 'PPC') {
                                             checked = 'checked="checked"';
                                        }
                                        tbl_summary = '<tr class="summary_remove">'+
                                                            '<td class="col-xs-1"></td>'+
                                                            '<td class="col-xs-2">'+x.item+
                                                                 '<input type="hidden" name="item_summary[]" value="'+x.item+'" />'+
                                                            '</td>'+
                                                            '<td class="col-xs-2">'+x.description+
                                                                 '<input type="hidden" name="desc_summary[]" value="'+x.description+'" />'+
                                                            '</td>'+
                                                            '<td class="col-xs-2">'+x.qty+
                                                                 '<input type="hidden" name="qty_summary[]" value="'+x.qty+'" />'+
                                                            '</td>'+
                                                            '<td class="col-xs-2">'+x.r_qty+
                                                                 '<input type="hidden" name="r_qty_summary[]" value="'+x.r_qty+'" />'+
                                                            '</td>'+
                                                            '<td class="col-xs-2">'+x.variance+
                                                                 '<input type="hidden" name="variance_summary[]" value="'+x.variance+'" />'+
                                                            '</td>'+
                                                            '<td class="col-xs-1">'+
                                                                 '<input type="checkbox" name="iqc_summary[]" class="iqc_chk" '+checked+' value="'+x.item+'"/>'+
                                                            '</td>'+
                                                       '</tr>';
                                        $('#tbl_summary_body').append(tbl_summary);
                                   });

                                   AddState();
                                   
                              } else {
                                   failedMsg(data.msg);
                                   ViewState();
                                   getLatestRecord();
                              }
                         }).fail( function(data, textStatus, jqXHR) {
                              $('#loading').modal('hide');
                              failedMsg("There's some error while processing.");
                         });
                    } else {
                         $('#loading').modal('hide');
                         failedMsg("Please fill out the Invoice Number input field.");
                         ViewState();
                    }
               });

               $("#confirmyes").click(function(){
                    if ($('#confirm_status').val() == 'deletebatch') {
                         deleteBatchItem();
                    } else {
                         cancelInvoice();
                    }
               });

               $('#btn_edit').on('click', function(e) {
                    EditState();
               });

               $('#btn_cancel').on('click', function() {
                    window.location.href="<?php echo e(url('/materialreceiving')); ?>";
               });

               $('#btn_discard').on('click', function() {
                    location.reload(true);
               });

               $('#receivingno').on('change', function() {
                    getMRdata($(this).val());
               });

               $('#btn_search').on('click', function(e) {
                    $('.reset').val('');
                    $('.search_row').remove();
                    $('#searchModal').modal('show');
               });

               $('#btn_add_batch').on('click', function() {
                    $('#add_inputItemNo').prop('disabled',false);
                    $('.clearbatch').val('');
                    $('#add_inputBox').select2('data',{
                         id:'',
                         text:''
                    });
                    $('#add_inputItemNo').select2('data',{
                         id:'',
                         text:''
                    });
                    $('#batchItemModal').modal('show');
               });

               $('#tbl_batch_body').on('click', '.edit_item_batch', function(e) {
                    var id = $(this).attr('data-id');
                    var bid = $(this).attr('data-bid');
                    getSingleBatchItem(id,bid);
                    $('#EditbatchItemModal').modal('show');
               });

               $('#btn_edit_batch_modal').on('click', function() {
                    $('#EditbatchItemModal').modal('hide');
                    var bid = $('#edit_inputBatchId').val();
                    var item = $('#edit_inputItemNoHidden').val();
                    var hiddenQty = $('#edit_inputQtyHidden').val();
                    var qty = $('#edit_inputQty').val();
                    var box = $('#edit_inputBox').val();
                    var boxqty = $('#edit_inputBoxQty').val();
                    var lot = $('#edit_inputLotNo').val();
                    var supplier = $('#edit_inputSupplier').val();
                    var exp_date = $('#edit_inputExp_date').val();

                    $('#td_batch_qty'+bid).html(qty+'<input type="hidden" name="qty_batch[]" id="in_batch_qty'+bid+'" value="'+qty+'">');
                    $('#td_batch_box'+bid).html(box+'<input type="hidden" name="box_batch[]" id="in_batch_box'+bid+'" value="'+box+'">');
                    $('#td_batch_boxqty'+bid).html(boxqty+'<input type="hidden" name="box_qty_batch[]" id="in_batch_boxqty'+bid+'" value="'+boxqty+'">');
                    $('#td_batch_lot'+bid).html(lot+'<input type="hidden" name="lot_no_batch[]" id="in_batch_lot'+bid+'" value="'+lot+'">');
                    $('#td_batch_supplier'+bid).html(supplier+'<input type="hidden" name="supplier_batch[]" id="in_batch_supplier'+bid+'" value="'+supplier+'">');
                    $('#td_batch_exp_date'+bid).html(exp_date+'<input type="hidden" name="exp_date_batch[]" id="in_batch_edit_date'+bid+'" value="'+exp_date+'">');

                    $('#in_batch_qty'+bid).val(qty);
                    $('#in_batch_box'+bid).val(box);
                    $('#in_batch_boxqty'+bid).val(boxqty);
                    $('#in_batch_lot'+bid).val(lot);
                    $('#in_batch_supplier'+bid).val(supplier);
                    $('#in_batch_edit_date'+bid).val(exp_date);
               });

               $('#btn_filter').on('click', function() {
                    $('#tbl_search_body').html('');
                    var tbl_search = '';
                    var url = '<?php echo e(url("/wbsmrsearch")); ?>';
                    var token = "<?php echo e(Session::token()); ?>";
                    var data = {
                         _token: token,
                         from: $('#srch_from').val(),
                         to: $('#srch_to').val(),
                         invoiceno: $('#srch_invoiceno').val(),
                         invfrom: $('#srch_invfrom').val(),
                         invto: $('#srch_invto').val(),
                         palletno: $('#srch_palletno').val(),
                         open: $('#srch_open').val(),
                         close: $('#srch_close').val(),
                         cancelled: $('#srch_cancelled').val(),
                    };

                    $.ajax({
                         url: url,
                         type: "GET",
                         data: data,
                    }).done( function(data, textStatus, jqXHR) {
                         var status = '';
                         $.each(data, function(index, x) {
                              if (x.status == 'O') {
                                   status = 'Open';
                              }
                              if (x.status == 'X') {
                                   status = 'Closed';
                              }

                              if (x.status == 'C') {
                                   status = 'Cancelled';
                              }
                              tbl_search = '<tr class="search_row">'+
                                                  '<td>'+
                                                       '<a href="javascript:;" class="btn blue input-sm look_search" data-id="'+x.id+'">'+
                                                            '<i class="fa fa-edit"></i>'+
                                                       '</a>'+
                                                  '</td>'+
                                                  '<td>'+x.receive_no+'</td>'+
                                                  '<td>'+x.receive_date+'</td>'+
                                                  '<td>'+x.invoice_no+'</td>'+
                                                  '<td>'+x.invoice_date+'</td>'+
                                                  '<td>'+x.pallet_no+'</td>'+
                                                  '<td>'+status+'</td>'+
                                                  '<td>'+x.create_user+'</td>'+
                                                  '<td>'+x.created_at+'</td>'+
                                                  '<td>'+x.update_user+'</td>'+
                                                  '<td>'+x.updated_at+'</td>'+
                                           '</tr>';
                              $('#tbl_search_body').append(tbl_search);
                         });
                    }).fail( function(data, textStatus, jqXHR) {
                         $('#loading').modal('hide');
                         failedMsg("There's some error while processing.");
                    });
               });

               $('#tbl_search_body').on('click', '.look_search', function(e) {
                    var id = $(this).attr('data-id');
                    var url = '<?php echo e(url("/wbsmrlookitem")); ?>';
                    var token = "<?php echo e(Session::token()); ?>";
                    var data = {
                         _token: token,
                         id: id
                    };

                    $.ajax({
                         url: url,
                         type: "GET",
                         data: data,
                    }).done( function(data, textStatus, jqXHR) {
                         $('#searchModal').modal('hide');
                         $('#loading').modal('hide');
                         var checked = '';
                         if (data.request_status == 'success') {
                              var invdata = data.invoicedata;
                              var status = '';
                              if (invdata.status == 'O') {
                                   status = 'Open';
                              } else {
                                   status = 'Closed';
                              }
                              $('#loading').modal('hide');
                              MrData(invdata,status);
                              DetailsData(data.detailsdata,tbl_details);
                              SummaryData(data.summarydata,tbl_summary);
                              BatchData(data.batchdata,tbl_batch);
                              ViewState();
                         } else {
                              failedMsg(data.msg);
                              ViewState();
                         }
                    }).fail( function(data, textStatus, jqXHR) {
                         $('#loading').modal('hide');
                         failedMsg("There's some error while processing.");
                    });
               });

               $('#btn_reset').on('click', function() {
                    $('.reset').val('');
                    $('.search_row').remove();
               });

               $('#btn_barcode').on('click', function() {
                    $('#lodaing').modal('show');
                    var url = '<?php echo e(url("/wbsmrprintbarcode")); ?>';
                    var token = "<?php echo e(Session::token()); ?>";
                    var data = {
                         _token: token,
                         receivingno: $('#receivingno').val(),
                         state: 'bulk'
                    };

                    if ($('#invoiceno').val() == '' || $('#receivingno').val() == '') {
                         failedMsg("Please provide some values for Invoice Number or Material Receiving Number");
                    } else {
                         $.ajax({
                              url: url,
                              type: "POST",
                              data: data,
                         }).done( function(data, textStatus, jqXHR) {
                              $('#lodaing').modal('hide');
                              if (data.request_status == 'success') {
                                   successMsg(data.msg);
                                   updateIsPrinted($('#receivingno').val());
                              } else {
                                   failedMsg(data.msg);
                              }

                         }).fail( function(data, textStatus, jqXHR) {
                              $('#loading').modal('hide');
                              failedMsg("There's some error while processing.");
                         });
                    }
               });

               $('#tbl_batch_body').on('click', '.barcode_item_batch', function(e) {
                    $('#lodaing').modal('show');
                    var id = $(this).attr('data-id');
                    var txnno = $(this).attr('data-txnno');
                    var txndate = $(this).attr('data-txndate');
                    var itemno = $(this).attr('data-itemno');
                    var itemdesc = $(this).attr('data-itemdesc');
                    var qty = $(this).attr('data-qty');
                    var bcodeqty = $(this).attr('data-bcodeqty');
                    var lotno = $(this).attr('data-lotno');
                    var location = $(this).attr('data-location');
                    var barcode = $(this).attr('data-barcode');
                    var url = '<?php echo e(url("/wbsmrprintbarcode")); ?>';
                    var token = "<?php echo e(Session::token()); ?>";
                    var data = {
                         _token: token,
                         receivingno: $('#receivingno').val(),
                         receivingdate: $('#receivingdate').val(),
                         id: id,
                         txnno : txnno,
                         txndate : txndate,
                         itemno : itemno,
                         itemdesc : itemdesc,
                         qty: qty,
                         bcodeqty : bcodeqty,
                         lotno : lotno,
                         location : location,
                         barcode : barcode,
                         state: 'single'
                    };

                    if ($('#invoiceno').val() == '' || $('#receivingno').val() == '') {
                         failedMsg("Please provide some values for Invoice Number or Material Receiving Number.");
                         $('#err_msg').html("");
                    } else {
                         $.ajax({
                              url: url,
                              type: "POST",
                              data: data,
                         }).done( function(data, textStatus, jqXHR) {
                              $('#lodaing').modal('hide');
                              if (data.request_status == 'success') {
                                   successMsg(data.msg);
                                   $('#print_br_'+itemno).val(itemno);
                                   $('#print_br_'+itemno).prop('checked', 'true');
                              } else {
                                   failedMsg(data.msg);
                              }
                         }).fail( function(data, textStatus, jqXHR) {
                              $('#loading').modal('hide');
                              failedMsg("There's some error while processing.");
                         });
                    }
               });

               $('#tbl_batch_body').on('click', '.x_remove_batch', function(e) {
                    var thisclass = $(this).attr('data-id');
                    var qty = $(this).attr('data-qty');
                    var item = $(this).attr('data-item');
                    $('.'+thisclass).remove();

                    var r_qty = parseInt($('#in_r_qty_'+item).val()) - parseInt(qty);
                    var variance = $('#in_var_'+item).val();
                    var new_var_qty = parseInt(variance) + parseInt(qty);

                    $('#td_r_qty_'+item).html(r_qty+'<input type="hidden" name="received_qty[]" id="in_r_qty_'+item+'"/>');
                    $('#in_r_qty_'+item).val(r_qty);
                    $('#td_var_'+item).html(new_var_qty+'<input type="hidden" name="variance[]" id="in_var_'+item+'"/>');
                    $('#in_var_'+item).val(new_var_qty);
               });

               $('#checkbox_iqc').on('change', function(e) {
                    $('input:checkbox.iqc_chk').not(this).prop('checked', this.checked);
               });

               $('#btn_print').on('click', function() {
                    if ($('#invoiceno').val() == '' || $('#receivingno').val() == '') {
                        failedMsg("Please provide some values for Invoice Number or Material Receiving Number.");
                    } else {
                         var token = "<?php echo e(Session::token()); ?>";
                         var url = '<?php echo e(url("/wbsmrprintmr")); ?>'+'?receivingno='+$('#receivingno').val()+'&&_token='+token;

                         window.location.href= url;
                    }

               });

               $('#btn_print_iqc').on('click', function() {
                    if ($('#invoiceno').val() == '' || $('#receivingno').val() == '') {
                         failedMsg("Please provide some values for Invoice Number or Material Receiving Number.");
                    } else {
                         var token = "<?php echo e(Session::token()); ?>";
                         var url = '<?php echo e(url("/wbsmrprintiqc")); ?>'+'?receivingno='+$('#receivingno').val()+'&&_token='+token;

                         window.location.href= url;
                    }
               });

               $('#btn_delete_batch').on('click', function() {
                    $('#confirm_status').val('deletebatch');
                    if (isCheck($('.chk_del_batch'))) {
                         $('#confirm').modal('show');
                    } else {
                         failedMsg("Please select at least 1 batched item.");
                    }
               });

               $('#btn_cancel_mr').on('click', function() {
                    $('#confirm_status').val('cancelmr');
                    $('#confirm').modal('show');
               });

               $('#add_inputItemNo').on('change', function() {
                    getItemData();
                    checkIfNotForIQC($(this).val());
               });

               $('#btn_add_batch_modal').on('click', function() {
                   batching();
               });

               $('#btn_save').on('click', function() {
                    var status = getMRStatus($('#status').val());
                    var notForIQC = [];
                    var notForIQCbatch = [];
                    var IsPrinted = [];
                    $(".iqc_chk:checked").each(function() {
                         notForIQC.push($(this).val());
                    });
                    $(".notforiqc_batch:checked").each(function() {
                         notForIQCbatch.push($(this).val());
                    });
                    $(".print_barcode:checked").each(function() {
                         IsPrinted.push($(this).val());
                    });
                    var mrdata = {
                         receive_no: $('input[name=receivingno]').val(),
                         receive_date: $('input[name=receivingdate]').val(),
                         invoice_no: $('input[name=invoiceno]').val(),
                         invoice_date: $('input[name=invoicedate]').val(),
                         pallet_no: $('input[name=palletno]').val(),
                         total_qty: $('input[name=totalqty]').val(),
                         total_var: $('input[name=totalvar]').val(),
                         total_amt: $('input[name=totalamt]').val(),
                         status: status,
                    }
                    var summarydata = {
                         item: $('input[name="item_summary[]"]').map(function(){return $(this).val();}).get(),
                         description: $('input[name="desc_summary[]"]').map(function(){return $(this).val();}).get(),
                         qty: $('input[name="qty_summary[]"]').map(function(){return $(this).val();}).get(),
                         r_qty: $('input[name="r_qty_summary[]"]').map(function(){return $(this).val();}).get(),
                         variance: $('input[name="variance_summary[]"]').map(function(){return $(this).val();}).get(),
                    };
                    var mrdataedit = {
                         receive_no: $('#receivingno').val(),
                         receive_date: $('#receivingdate').val(),
                         invoice_no: $('#invoiceno').val(),
                         pallet_no: $('input[name=palletno]').val(),
                         total_qty: $('input[name=totalqty]').val(),
                         total_var: $('input[name=totalvar]').val(),
                    }
                    var summarydataedit = {
                         item: $('input[name="item_summary[]"]').map(function(){return $(this).val();}).get(),
                         itemall: $('input[name="itemall[]"]').map(function(){return $(this).val();}).get(),
                         id: $('input[name="id[]"]').map(function(){return $(this).val();}).get(),
                        //  qty: $('input[name="received_qty[]"]').map(function(){return $(this).val();}).get(),
                        //  r_qty: $('input[name="received_qty[]"]').map(function(){return $(this).val();}).get(),
                        //  variance: $('input[name="variance[]"]').map(function(){return $(this).val();}).get(),
                    };
                    var batchdata = {
                         id: $('input[name="id_batch[]"]').map(function(){return $(this).val();}).get(),
                         item: $('input[name="item_batch[]"]').map(function(){return $(this).val();}).get(),
                         item_desc: $('input[name="item_desc_batch[]"]').map(function(){return $(this).val();}).get(),
                         qty: $('input[name="qty_batch[]"]').map(function(){return $(this).val();}).get(),
                         box: $('input[name="box_batch[]"]').map(function(){return $(this).val();}).get(),
                         box_qty: $('input[name="box_qty_batch[]"]').map(function(){return $(this).val();}).get(),
                         lot_no: $('input[name="lot_no_batch[]"]').map(function(){return $(this).val();}).get(),
                         location: $('input[name="location_batch[]"]').map(function(){return $(this).val();}).get(),
                         supplier: $('input[name="supplier_batch[]"]').map(function(){return $(this).val();}).get(),
                         exp_date: $('input[name="exp_date_batch[]"]').map(function(){return $(this).val();}).get(),
                    };
                    var savestate = $('#savestate').val();

                    if (savestate == 'ADD') {
                         saveMR(mrdata,summarydata,notForIQC,savestate);
                    } else {
                         saveMrWithBatch(mrdataedit,summarydataedit,batchdata,notForIQC,notForIQCbatch,IsPrinted,savestate)
                    }
               });

               $('#tbl_summary_body').on('click', '.addBatchsummary', function() {
                    $('#add_inputItemNo').prop('disabled',false);
                    $('.clearbatch').val('');
                    $('#add_inputBox').select2('data',{
                         id:'',
                         text:''
                    });
                    $('#add_inputItemNo').select2('data',{
                         id:$(this).attr('data-item'),
                         text:$(this).attr('data-item')+' | '+$(this).attr('data-item_desc')
                    });
                    getItemData();
                    // $('#add_inputItemNoHidden').val($(this).attr('data-item'));
                    // $('#add_inputItemDesc').val($(this).attr('data-item_desc'));

                    var checked = [];

                    $(".iqc_chk:checked").each(function() {
                         checked.push($(this).attr('data-item'));
                    });

                    var notiqc = '';
                    $.each(checked, function(i, x) {
                         if (x == $(this).attr('data-item')) {
                              $('#add_notForIqc').val('1');
                         } else {
                              $('#add_notForIqc').val($(this).attr('data-check'));
                         }
                    });
                    $('#add_notForIqc').val($(this).attr('data-check'));
                    $('#add_inputQty').val($(this).attr('data-var'));
                    $('#batchItemModal').modal('show');
               });

               $('#btn_all_batch').on('click', function() {
                    var token = "<?php echo e(Session::token()); ?>";
                    var url = "<?php echo e(url('/wbsmrreceiveall')); ?>";
                    var data = {
                         _token: token,
                         invoiceno: $('#invoiceno').val(),
                         receivingno: $('#receivingno').val(),
                         received_date: $('#receivingdate').val()
                    }

                    $.ajax({
                         url: url,
                         type: 'POST',
                         dataType: 'JSON',
                         data: data
                    }).done( function(data, textStatus,jqXHR) {
                         console.log(data);
                    }).fail( function(data, textStatus,jqXHR) {

                    });
               });

               $('#uploadbatchfiles').on('submit', function(e){
                    $('#progress-close').prop('disabled', true);
                    $('#progressbar').addClass('progress-striped active');
                    $('#progressbar-color').addClass('progress-bar-success');
                    $('#progressbar-color').removeClass('progress-bar-danger');
                    $('#progress').modal('show');

                    var formObj = $('#uploadbatchfiles');
                    var formURL = formObj.attr("action");
                    var formData = new FormData(this);
                    var fileName = $("#batchfiles").val();
                    var ext = fileName.split('.').pop();
                    var tbl_batch = '';
                    e.preventDefault(); //Prevent Default action.
                    
                    if ($("#batchfiles").val() == '') {
                         $('#progress-close').prop('disabled', false);
                         $('#progress-msg').html("Upload field is empty");
                    } else {
                        if (fileName != ''){
                           if (ext == 'xls' || ext == 'xlsx' || ext == 'XLS' || ext == 'XLSX') {
                              $('.myprogress').css('width', '0%');
                              $('#progress-msg').html('Uploading in progress...');
                              var percent = 0;

                              $.ajax({
                                   url: formURL,
                                   type: 'POST',
                                   data:  formData,
                                   mimeType:"multipart/form-data",
                                   contentType: false,
                                   cache: false,
                                   processData:false,
                                   xhr: function() {
                                        var xhr = new window.XMLHttpRequest();
                                        if (xhr.upload) {
                                             xhr.upload.addEventListener("progress", function (evt) {
                                                  
                                                  var loaded = evt.loaded;
                                                  var total = evt.total;

                                                  if (evt.lengthComputable) {
                                                       percent = Math.ceil(loaded / total * 100);
                                                       // var percentComplete = evt.loaded / evt.total;
                                                       // percentComplete = parseInt(percentComplete * 100);

                                                       //if (percentComplete < 100) {
                                                            // $('.myprogress').text(percent + '%');
                                                            $('.myprogress').css('width', percent + '%');
                                                       //}
                                                       if (percent == 100) {
                                                            $('.myprogress').css('width', percent + '%');
                                                            $('#progress-msg').html('Finalizing upload...');
                                                       }
                                                  }
                                             }, false);
                                        }
                                        return xhr;
                                   }
                              }).done(function(data) {
                                   $('#progressbar').removeClass('progress-striped active');
                                   var datas = JSON.parse(data);
                                   console.log(datas);
                                   if (datas.return_status == 'success') {
                                        getMRdata(datas.receivingno);
                                        $('#progress-close').prop('disabled', false);
                                        $('#progress-msg').html("Items were successfully uploaded.");
                                   } else {
                                        $('#progress-close').prop('disabled', false);
                                        $('#progressbar-color').removeClass('progress-bar-success');
                                        $('#progressbar-color').addClass('progress-bar-danger');
                                        if (datas.receivingno != '') {
                                            $('#progress-msg').html("Please check this error.["+datas.receivingno+"]");
                                        }
                                        if (datas.item != '') {
                                            $('#progress-msg').html("Please check this error.["+datas.item+"]");
                                        }
                                        if (datas.invoice != '') {
                                            $('#progress-msg').html("Please check this error.["+datas.invoice+"]");
                                        }
                                        if (datas.msg != '') {
                                             $('#progress-msg').html(datas.msg);
                                        }
                                   }
                              }).fail(function(data) {
                                   $('#progress-close').prop('disabled', false);
                                   $('#progressbar').removeClass('progress-striped active');
                                   $('#progressbar-color').removeClass('progress-bar-success');
                                   $('#progressbar-color').addClass('progress-bar-danger');
                                   $('#progress-msg').html("There's some error while processing.");
                              });
                           } else {
                              $('#progress-close').prop('disabled', false);
                              $('#progress-msg').html("Please upload a valid excel file.");
                           }
                      }
                    }
                      
               });

               $('#btn_refresh').on('click', function() {
               	refreshInvoice();
               });
          });

          function AddState() {
               $('.chk_del_batch').prop('disabled', false);
               $('.edit_item_batch').removeAttr('disabled');
               $('#btn_add_batch').prop('disabled', true);
               $('#btn_upload').prop('disabled', true);
               $('#btn_all_batch').prop('disabled', true);
               $('#btn_delete_batch').prop('disabled', true);
               $('#palletno').prop('readonly', false);
               $('#invoiceno').prop('readonly',false);

               $('#btn_edit').hide();
               $('#btn_discard').hide();
               $('#btn_search').hide();
               $('#btn_barcode').hide();
               $('#btn_print').hide();
               $('#btn_print_iqc').hide();
               $('#btn_cancel_mr').hide();
               $('#btn_save').show();
               $('#btn_cancel').show();
               $('#btn_addnew').hide();

               $('#add_inputItemNo').prop('disabled',false);
               $('#receivingno').prop('readonly', true);
               $('#receivingdate').prop('readonly', false);

               $('#checkbox_iqc').prop('disabled',false);
               $('#checkbox_iqc').removeAttr('readonly');
               $('.iqc_chk').prop('disabled',false);

               //$('.barcode_item_batch').prop('disabled',false);
               $('.addBatchsummary').hide();

               $('#savestate').val('ADD');

               getPackage();
               getItems();
          }

          function ViewState() {
                if (parseInt(access_state) !== 2) {
            $('#receivingno').prop('disabled', false);
            $('#palletno').prop('readonly', true);
            $('#receivingdate').prop('readonly', true);
            $('#invoiceno').prop('readonly', true);
            $('#btn_checkinv').prop('disabled',false);

            // $('.chk_del_batch').prop('disabled', true);
            // $('.edit_item_batch').prop('disabled', true);
            $('#btn_add_batch').prop('disabled', true);
            $('#btn_upload').prop('disabled', true);
            $('#btn_all_batch').prop('disabled', true);
            $('#btn_delete_batch').prop('disabled', true);

            $('#btn_save').hide();
            $('#btn_cancel').hide();
            $('#btn_discard').hide();
            $('#btn_addnew').show();

            if ($('#status').val() == 'Cancelled') {
                $('#btn_edit').hide();
            } else {
                $('#btn_edit').show();
            }

            $('#btn_search').show();
            $('#btn_barcode').show();
            $('#btn_print').show();
            $('#btn_print_iqc').show();
            $('#btn_cancel_mr').show();
            $('#btn_refresh').show();

            $('#checkbox_iqc').prop('disabled', true);
            //$('.barcode_item_batch').prop('disabled',true);
            $('.addBatchsummary').hide();
        } else {
            $('#receivingno').prop('disabled', false);
            $('#palletno').prop('readonly', true);
            $('#receivingdate').prop('readonly', true);
            $('#invoiceno').prop('readonly', true);
            $('#btn_checkinv').prop('disabled',true);

            // $('.chk_del_batch').prop('disabled', true);
            // $('.edit_item_batch').prop('disabled', true);
            $('#btn_add_batch').prop('disabled', true);
            $('#btn_upload').prop('disabled', true);
            $('#btn_all_batch').prop('disabled', true);
            $('#btn_delete_batch').prop('disabled', true);

            $('#btn_save').hide();
            $('#btn_cancel').hide();
            $('#btn_discard').hide();
            $('#btn_addnew').hide();

            if ($('#status').val() == 'Cancelled') {
                $('#btn_edit').hide();
            } else {
                $('#btn_edit').hide();
            }

            $('#btn_search').show();
            $('#btn_barcode').hide();
            $('#btn_print').hide();
            $('#btn_print_iqc').hide();
            $('#btn_cancel_mr').hide();
            $('#btn_refresh').hide();

            $('#checkbox_iqc').prop('disabled', true);
            //$('.barcode_item_batch').prop('disabled',true);
            $('.addBatchsummary').hide();
            $('#uploadbatchfiles > div > div.col-sm-6 > div > span').css({'pointer-events': 'none', 'opacity': '0.4'});
        }
     }

          function EditState() {
               $('#btn_edit').hide();
               $('#btn_cancel').hide();
               $('#btn_search').hide();
               $('#btn_barcode').hide();
               $('#btn_print').hide();
               $('#btn_print_iqc').hide();
               $('#btn_cancel_mr').hide();
               $('#btn_addnew').hide();
               $('#btn_save').show();
               $('#btn_discard').show();

               $('.chk_del_batch').prop('disabled', false);
               $('.edit_item_batch').removeAttr('disabled');
               $('#btn_add_batch').prop('disabled', false);
               $('#btn_upload').prop('disabled', false);
               $('#btn_all_batch').prop('disabled', false);
               $('#btn_delete_batch').prop('disabled', false);
               $('#add_inputItemNo').prop('disabled',false);
               $('#receivingno').prop('disabled', true);
               $('#palletno').prop('readonly', false);
               $('.barcode_item_batch').prop('disabled',false);
               $('#invoiceno').prop('disabled',true);
               $('#receivingdate').prop('disabled', false);

               $('#checkbox_iqc').prop('disabled',false);
               $('#checkbox_iqc').removeAttr('readonly');
               $('.iqc_chk').prop('disabled',false);
               $('.addBatchsummary').show();

               $('#savestate').val('EDIT');

               getPackage();
               getItems();
          }

          function clear() {
               $('.clear').val('');
          }

          function getLatestRecord() {
               $('.details_remove').remove();
               $('.summary_remove').remove();
               $('.batch_remove').remove();

               var tbl_details = '';
               var tbl_summary = '';
               var tbl_batch = '';

               var url = '<?php echo e(url("/wbsgetlatestmr")); ?>';
               var token = "<?php echo e(Session::token()); ?>";
               var data = {
                    _token: token,
                    invoiceno: $('#invoiceno').text()
               };

               $.ajax({
                    url: url,
                    type: "GET",
                    data: data,
               }).done( function(data, textStatus, jqXHR) {
                    if (data.request_status == 'success') {
                         var invdata = data.invoicedata;
                         var status = '';
                         if (invdata.status == 'O') {
                              status = 'Open';
                         }
                         if (invdata.status == 'X') {
                              status = 'Closed';
                         }

                         if (invdata.status == 'C') {
                              status = 'Cancelled';
                         }
                         

                         MrData(invdata,status);
                         DetailsData(data.detailsdata,tbl_details);
                         SummaryData(data.summarydata,tbl_summary);
                         BatchData(data.batchdata,tbl_batch);
                         ViewState();

                    } else {
                         failedMsg(data.msg);
                    }
               }).fail( function(data, textStatus, jqXHR) {
                    $('#loading').modal('hide');
                    failedMsg("There's some error while processing.");
               });
          }

          function navigate(to) {
               if ($('#receivingno').val() == '') {
                    getLatestRecord();
               } else {
                    $('.details_remove').remove();
                    $('.summary_remove').remove();
                    $('.batch_remove').remove();

                    var tbl_details = '';
                    var tbl_summary = '';
                    var tbl_batch = '';

                    //$('#loading').modal('show');
                    var url = '<?php echo e(url("/wbsnavigate")); ?>';
                    var token = "<?php echo e(Session::token()); ?>";
                    var data = {
                         _token: token,
                         receivingno: $('#receivingno').val(),
                         to: to
                    };

                    $.ajax({
                         url: url,
                         type: "GET",
                         data: data,
                    }).done( function(data, textStatus, jqXHR) {
                         var checked = '';
                         if (data.request_status == 'success') {
                              var invdata = data.invoicedata;
                              var status = '';
                              if (invdata.status == 'O') {
                                   status = 'Open';
                              }
                              if (invdata.status == 'X') {
                                   status = 'Closed';
                              }

                              if (invdata.status == 'C') {
                                   status = 'Cancelled';
                              }
                              //$('#loading').modal('hide');
                              MrData(invdata,status);
                              DetailsData(data.detailsdata,tbl_details);
                              SummaryData(data.summarydata,tbl_summary);
                              BatchData(data.batchdata,tbl_batch);
                              ViewState();
                         }
                         if (data.request_status == 'failed') {
                              failedMsg(data.msg);
                              ViewState();
                             // $('#loading').modal('hide');
                         }
                    }).fail( function(data, textStatus, jqXHR) {
                         //$('#loading').modal('hide');
                         failedMsg("There's some error while processing.");
                    });
               }

          }

          function isCheck(element) {
               if(element.is(':checked')) {
                    return true;
               } else {
                    return false;
               }
          }

          function getMRStatus(status) {
               if (status == 'Open') {
                    return 'O'
               }

               if (status == 'Cancelled') {
                    return 'C'
               }

               if (status == 'Closed') {
                    return 'X'
               }
          }

          function getItems() {
               var url = "<?php echo e(url('/wbsmrgetitems')); ?>";
               var token = "<?php echo e(Session::token()); ?>";
               var data = {
                    _token: token,
                    invoice_no: $('#invoiceno').val()
               };

               $.ajax({
                    url: url,
                    type: "GET",
                    data: data,
               }).done( function(data, textStatus, jqXHR) {
                    $('#add_inputItemNo').select2({
                         data: data
                    });
               }).fail( function(data, textStatus, jqXHR) {
                    $('#loading').modal('hide');
                    failedMsg("There's some error while processing.");
               });
          }

          function getItemData() {
               //add_inputLocation
               var url = "<?php echo e(url('/wbsmrgetitemdata')); ?>";
               var token = "<?php echo e(Session::token()); ?>";
               var data = {
                    _token: token,
                    itemcode: $('#add_inputItemNo').val(),
                    invoice_no: $('#invoiceno').val()
               };
               $.ajax({
                    url: url,
                    type: "GET",
                    data: data,
               }).done( function(data, textStatus, jqXHR) {
                    var item = '';
                    var itemname = '';
                    var rackno = '';
                    $.each(data, function(i,x) {
                         item = x.code;
                         itemname = x.name;
                         rackno = x.rackno;
                    });

                    $('#add_inputItemNoHidden').val(item);
                    $('#add_inputItemDesc').val(itemname);
                    $('#add_inputLocation').val(rackno);
               }).fail( function(data, textStatus, jqXHR) {
                    $('#loading').modal('hide');
                    failedMsg("There's some error while processing.");
               });
          }

          function getPackage() {
               var url = "<?php echo e(url('/wbsmrgetpackage')); ?>";
               var token = "<?php echo e(Session::token()); ?>";
               var data = {
                    _token: token
               };

               $.ajax({
                    url: url,
                    type: "GET",
                    data: data,
               }).done( function(data, textStatus, jqXHR) {
                    $('#add_inputBox').select2({
                         data: data
                    });
                    $('#edit_inputBox').select2({
                         data: data
                    });
               }).fail( function(data, textStatus, jqXHR) {
                    $('#loading').modal('hide');
                    failedMsg("There's some error while processing.");
               });
          }

          function successMsg(msg) {
               $('#title').html('<strong><i class="fa fa-check"></i></strong> Success!')
               $('#err_msg').html(msg);
               $('#msg').modal('show');
          }

          function failedMsg(msg) {
               $('#title').html('<strong><i class="fa fa-exclamation-triangle"></i></strong> Failed!')
               $('#err_msg').html(msg);
               $('#msg').modal('show');
          }

          function getSingleBatchItem(id,bid) {
               var url = "<?php echo e(url('/wbsmrsinglebatchitem')); ?>";
               var token = "<?php echo e(Session::token()); ?>";
               var data = {
                    _token: token,
                    id : id
               };
               $.ajax({
                    url: url,
                    type: "GET",
                    data: data,
               }).done( function(data, textStatus, jqXHR) {
                    var item = '',item_desc = '',qty = '',box = '',box_qty = '',lot_no = '',location = '',supplier = '';
                    $.each(data, function(index, x) {
                         item = x.item;
                         item_desc = x.item_desc;
                         qty = x.qty;
                         box = x.box;
                         box_qty = x.box_qty;
                         lot_no = x.lot_no;
                         location = x.location;
                         supplier = x.supplier;
                    });

                    $('#edit_inputItemNo').prop('disabled',true);

                    $('#edit_inputBatchId').val(bid);
                    $('#edit_inputItemNo').val(item+' | '+item_desc);
                    $('#edit_inputItemNoHidden').val(item);
                    $('#edit_inputItemDesc').val(item_desc);
                    $('#edit_inputQty').val(qty);
                    $('#edit_inputQtyHidden').val(qty);
                    $('#edit_inputBox').select2('data',{
                         id:box,
                         text:box
                    });
                    $('#edit_inputBoxQty').val(box_qty);
                    $('#edit_inputLotNo').val(lot_no);
                    $('#edit_inputLocation').val(location);
                    $('#edit_inputSupplier').val(supplier);

               }).fail( function(data, textStatus, jqXHR) {
                    $('#loading').modal('hide');
                    failedMsg("There's some error while processing.");
               });
          }

          function checkIfNotForIQC(item) {
               var url = "<?php echo e(url('/wbsmrcheckifnotforiqc')); ?>";
               var token = "<?php echo e(Session::token()); ?>";
               var data = {
                    _token: token,
                    item : item,
                    receivingno : $('#receivingno').val(),
               };
               $.ajax({
                    url: url,
                    type: "GET",
                    data: data,
               }).done( function(data, textStatus, jqXHR) {
                    if (data.check == 1) {
                         $('#add_notForIqc').val('1');
                    }

               }).fail( function(data, textStatus, jqXHR) {
                    $('#loading').modal('hide');
                    failedMsg("There's some error while processing.");
               });
          }

          function saveMR(mrdata,summarydata,notForIQC,savestate) {
              $('#loading').modal('show');
               var url = '<?php echo e(url("/wbsmrsave")); ?>';
               var token = "<?php echo e(Session::token()); ?>";
               var data = {
                    _token: token,
                    savestate: savestate,
                    mrdata: JSON.stringify(mrdata),
                    summarydata: JSON.stringify(summarydata),
                    notForIQC: JSON.stringify(notForIQC),
               };

               $.ajax({
                    url: url,
                    type: "POST",
                    dataType: 'json',
                    data: data,
               }).done( function(data, textStatus, jqXHR) {
                    if (data.request_status == 'success') {
                         successMsg(data.msg);
                         ViewState();
                         getMRdata(mrdata.receive_no);
                    } else {
                         failedMsg(data.msg);
                         ViewState();
                         getMRdata(mrdata.receive_no);
                    }
                    $('#loading').modal('hide');
               }).fail( function(data, textStatus, jqXHR) {
                    $('#loading').modal('hide');
                    failedMsg(data.msg);
                    ViewState();
               });
               $('#loading').modal('hide');
          }

          function saveMrWithBatch(mrdataedit,summarydata,batchdata,notForIQC,notForIQCbatch,IsPrinted,savestate) {
               $('#loading').modal('show');
               var url = '<?php echo e(url("/wbsmrsave")); ?>';
               var token = "<?php echo e(Session::token()); ?>";
               var data = {
                    _token: token,
                    savestate: savestate,
                    mrdata: JSON.stringify(mrdataedit),
                    summarydata: JSON.stringify(summarydata),
                    batchdata: JSON.stringify(batchdata),
                    notForIQC: JSON.stringify(notForIQC),
                    notForIQCbatch: JSON.stringify(notForIQCbatch),
                    IsPrinted: JSON.stringify(IsPrinted)
               };

               $.ajax({
                    url: url,
                    type: "POST",
                    dataType: 'json',
                    data: data,
               }).done( function(data, textStatus, jqXHR) {
                    $('#loading').modal('hide');
                    if (data.request_status == 'success') {
                         successMsg(data.msg);
                         ViewState();
                         getMRdata(mrdataedit.receive_no);
                    } else {
                         failedMsg(data.msg);
                         ViewState();
                         getMRdata(mrdataedit.receive_no);
                    }
               }).fail( function(data, textStatus, jqXHR) {
                    $('#loading').modal('hide');
                    failedMsg(data.msg);
                    ViewState();
               });
          }

          function MrData(data,status) {
               $('#receivingno').val(data.receive_no);
               $('#receivingdate').val(data.receive_date);
               $('#invoiceno').val(data.invoice_no);
               $('#hdninvoiceno').val(data.invoice_no);
               $('#invoicedate').val(data.invoice_date);
               $('#palletno').val(data.pallet_no);
               $('#totalqty').val(data.total_qty);
               $('#totalvar').val(data.total_var);
               $('#status').val(status);
               $('#createdby').val(data.create_user);
               $('#createddate').val(data.created_at);
               $('#updatedby').val(data.update_user);
               $('#updateddate').val(data.updated_at);
          }

          function DetailsData(detailsdata,table) {
            $('#tbl_details_body').html('');
               $.each(detailsdata, function(index, x) {
                    table = '<tr class="details_remove">'+
                                        '<td class="col-xs-2">'+x.item+'</td>'+
                                        '<td class="col-xs-3">'+x.item_desc+'</td>'+
                                        '<td class="col-xs-1">'+x.qty+'</td>'+
                                        '<td class="col-xs-2">'+x.pr_no+'</td>'+
                                        '<td class="col-xs-2">'+x.unit_price+'</td>'+
                                        '<td class="col-xs-2">'+x.amount+'</td>'+
                                   '</tr>';
                    $('#tbl_details_body').append(table);
               });
          }

          function SummaryData(summarydata,table) {
               var cnt = 0;
               var checkedval
               $('#summarycount').html('');
               $.each(summarydata, function(index, x) {
                    if (x.vendor == 'PPD' || x.vendor == 'PPS' || x.vendor == 'PPC' || x.not_for_iqc == 1) {
                         var checked = 'checked="checked"';
                         checkedval = 1;
                    } else {
                         checkedval = 0;
                    }
                    table = '<tr class="summary_remove">'+
                                   '<td class="col-xs-1 text-center">'+
                                        '<a href="javascript:;" class="btn btn-sm green addBatchsummary" data-item="'+x.item+'" data-item_desc="'+x.item_desc+'" data-qty="'+x.qty+'" data-var="'+x.variance+'" data-check="'+checkedval+'">'+
                                             '<i class="fa fa-plus-circle"></i>'+
                                        '</a>'+
                                   '</td>'+
                                   '<td class="col-xs-2" id="td_item_'+x.item+'">'+x.item+
                                        '<input type="hidden" name="item[]" class="remove_qty" id="in_item_'+x.item+'" value="'+x.item+'" />'+
                                        '<input type="hidden" name="id[]" class="remove_qty" id="in_id_'+x.item+'" value="'+x.id+'" />'+
                                        '<input type="hidden" name="itemall[]" value="'+x.item+'" />'+
                                   '</td>'+
                                   '<td class="col-xs-2">'+x.item_desc+'</td>'+
                                   '<td class="col-xs-2">'+x.qty+'</td>'+
                                   '<td class="col-xs-2" id="td_r_qty_'+x.item+'">'+x.received_qty+
                                        '<input type="hidden" id="in_r_qty_'+x.item+'" class="remove_qty" value="'+x.received_qty+'" />'+
                                   '</td>'+
                                   '<td class="col-xs-2" id="td_var_'+x.item+'">'+x.variance+
                                        '<input type="hidden" id="in_var_'+x.item+'" class="remove_qty" value="'+x.variance+'" />'+
                                   '</td>'+
                                   '<td class="col-xs-1 text-center" id="td_iqc_chk_'+x.item+'">'+
                                        '<input type="checkbox" name="iqc[]" class="iqc_chk" id="in_iqc_chk_'+x.item+'" '+checked+' value="'+x.item+'" readonly>'+
                                   '</td>'+
                              '</tr>';
                    $('#tbl_summary_body').append(table);
                    cnt++;
               });
               $('#summarycount').html(cnt);
          }

          function BatchData(batchdata,table) {
               var cnt = 0;
               var checked_kit = '';
               var checked_print = '';
               $('#tbl_batch_body').html('');
               $.each(batchdata, function(index, x) {
                    var checked_kit = '';
                    var checked_print = '';
                    if (x.not_for_iqc == 1) {
                         checked_kit = 'checked="checked"';
                    }
                    if (x.is_printed == 1) {
                         checked_print = 'checked="checked"';
                    }
                    cnt++;
                    table = '<tr class="batch_remove">'+
                                   '<td width="2.66%">'+
                                        '<input type="checkbox" name="del_batch" disabled="disabled" class="chk_del_batch" data-qty="'+x.qty+'" data-item="'+x.item+'" value="'+x.id+'">'+
                                   '</td>'+
                                   '<td width="4.66%">'+
                                        '<a href="javascript:;" class="btn input-sm blue edit_item_batch" data-bid="'+cnt+'" disabled="disabled" data-id="'+x.id+'">'+
                                             '<i class="fa fa-edit"></i>'+
                                        '<a>'+
                                   '</td>'+
                                   '<td width="3.66%">'+cnt+'</td>'+
                                   '<td width="8.66%">'+x.item+
                                        '<input type="hidden" name="item_batch[]" value="'+x.item+'">'+
                                        '<input type="hidden" name="id_batch[]" value="'+x.id+'">'+
                                   '</td>'+
                                   '<td width="17.66%">'+x.item_desc+
                                        '<input type="hidden" name="item_desc_batch[]" value="'+x.item_desc+'">'+
                                   '</td>'+
                                   '<td width="3.66%" id="td_batch_qty'+cnt+'">'+x.qty+
                                        '<input type="hidden" name="qty_batch[]" id="in_batch_qty'+cnt+'" value="'+x.qty+'">'+
                                   '</td>'+
                                   '<td width="6.66%" id="td_batch_box'+cnt+'">'+x.box+
                                        '<input type="hidden" name="box_batch[]" id="in_batch_box'+cnt+'" value="'+x.box+'">'+
                                   '</td>'+
                                   '<td width="4.66%" id="td_batch_boxqty'+cnt+'">'+x.box_qty+
                                        '<input type="hidden" name="box_qty_batch[]" id="in_batch_boxqty'+cnt+'" value="'+x.box_qty+'">'+
                                   '</td>'+
                                   '<td width="10.66%" id="td_batch_lot'+cnt+'">'+x.lot_no+
                                        '<input type="hidden" name="lot_no_batch[]" id="in_batch_lot'+cnt+'" value="'+x.lot_no+'">'+
                                   '</td>'+
                                   '<td width="8.66%">'+x.location+
                                        '<input type="hidden" name="location_batch[]" value="'+x.location+'">'+
                                   '</td>'+
                                   '<td width="8.66%" id="td_batch_supplier'+cnt+'">'+x.supplier+
                                        '<input type="hidden" name="supplier_batch[]" id="in_batch_supplier'+cnt+'" value="'+x.supplier+'">'+
                                   '</td>'+
                                   '<td width="6.66%" id="td_batch_exp_date'+cnt+'">'+x.exp_date+
                                        '<input type="hidden" name="exp_date_batch[]" id="in_batch_exp_date'+cnt+'" value="'+x.exp_date+'">'+
                                   '</td>'+
                                   '<td width="4.66%" class="text-center">'+
                                        '<input type="checkbox" class="notforiqc_batch" name="notforiqc_batch[]" value="'+x.item+'" '+checked_kit+' disabled="disabled">'+
                                   '</td>'+
                                   '<td width="3.66%" class="text-center">'+
                                        '<input type="checkbox" name="print_barcode[]" class="print_barcode" value="'+x.item+'" '+checked_print+' id="print_br_'+x.item+'" disabled="disabled">'+
                                   '</td>'+
                                   '<td width="4.66%">'+
                                        '<a href="javascript:;" class="btn input-sm grey-gallery barcode_item_batch" data-id="'+x.id+'" data-txnno="'+$('#invoiceno').val()+'" data-txndate="'+$('#invoicedate').val()+'" data-itemno="'+x.item+'" data-itemdesc="'+x.item_desc+'" data-qty="'+x.qty+'" data-bcodeqty="'+x.box_qty+'" data-lotno="'+x.lot_no+'" data-location="'+x.location+'">'+
                                             '<i class="fa fa-barcode"></i>'+
                                        '<a>'+
                                   '</td>'+
                              '</tr>';
                    $('#tbl_batch_body').append(table);

               });
          }

          function getMRdata(receivingno) {
               if (receivingno == '') {
                    getLatestRecord();
               } else {
                    $('.details_remove').remove();
                    $('.summary_remove').remove();
                    $('.batch_remove').remove();

                    var tbl_details = '';
                    var tbl_summary = '';
                    var tbl_batch = '';

                    var url = '<?php echo e(url("/wbsmrnumber")); ?>';
                    var token = "<?php echo e(Session::token()); ?>";
                    var data = {
                         _token: token,
                         receivingno: receivingno,
                    };

                    $.ajax({
                         url: url,
                         type: "GET",
                         data: data,
                    }).done( function(data, textStatus, jqXHR) {
                         var checked = '';
                         if (data.request_status == 'success') {
                              var invdata = data.invoicedata;
                              var status = '';
                              if (invdata.total_var < 1) {
                                   status = 'Closed'
                              } else {
                                   if (invdata.status == 'O') {
                                        status = 'Open';
                                   } else if (invdata.status == 'X') {
                                        status = 'Closed';
                                   } else {
                                        status = 'Cancelled';
                                   }
                              }


                              MrData(invdata,status);
                              DetailsData(data.detailsdata,tbl_details);
                              SummaryData(data.summarydata,tbl_summary);
                              BatchData(data.batchdata,tbl_batch);

                              ViewState();
                         } else {
                              failedMsg(data.msg);

                              ViewState();
                         }
                    }).fail( function(data, textStatus, jqXHR) {
                         $('#loading').modal('hide');
                         failedMsg("There's some error while processing.");
                    });
               }
          }

          function deleteBatchItem() {
               $('#loading').modal('show');
               /* declare an checkbox array */
               var id = [];
               var qty = [];
               var item = [];

               /* look for all checkboes that have a class 'chk' attached to it and check if it was checked */
               $(".chk_del_batch:checked").each(function() {
                    id.push($(this).val());
                    qty.push($(this).attr('data-qty'));
                    item.push($(this).attr('data-item'));
               });


               // $.each(chkArray, function(i,val) {

               // });

               $('.details_remove').remove();
               $('.summary_remove').remove();
               $('.batch_remove').remove();

               var tbl_details = '';
               var tbl_summary = '';
               var tbl_batch = '';
               var url = '<?php echo e(url("/wbsmrdeletebatch")); ?>';
               var token = "<?php echo e(Session::token()); ?>";
               var data = {
                    _token: token,
                    receivingno: $('#receivingno').val(),
                    ids: id,
                    qtys: qty,
                    items: item
               };

               $.ajax({
                    url: url,
                    type: "POST",
                    data: data,
               }).done( function(data, textStatus, jqXHR) {
                    if (data.request_status == 'success') {
                         var invdata = data.invoicedata;
                         getMRdata(invdata.receive_no);
                    } else {
                         failedMsg(data.msg);

                         ViewState();
                         $('#loading').modal('hide');
                    }
               }).fail( function(data, textStatus, jqXHR) {
                    $('#loading').modal('hide');
                    failedMsg("There's some error while processing.");
               });
          }

          function cancelInvoice() {
               var url = '<?php echo e(url("/wbsmrcanvelinvoice")); ?>';
               var token = "<?php echo e(Session::token()); ?>";
               var data = {
                    _token: token,
                    receivingno: $('#receivingno').val(),
               };

               $.ajax({
                    url: url,
                    type: "POST",
                    data: data,
               }).done( function(data, textStatus, jqXHR) {
                    if (data.request_status == 'success') {
                         var invdata = data.invoicedata;
                         getMRdata(invdata.receive_no);
                         successMsg("Material Receiving Number / Invoice Number was cancelled.");
                    } else {
                         failedMsg(data.msg);

                         ViewState();
                         $('#loading').modal('hide');
                    }
               }).fail( function(data, textStatus, jqXHR) {
                    $('#loading').modal('hide');
                    failedMsg("There's some error while processing.");
               });
          }

          function tblDetails() {
               var table = '<table class="table table-bordered sortable table-fixedheader table-striped" id="tbl_details">'+
                              '<thead>'+
                                   '<tr>'+
                                        '<td class="col-xs-2">Item/Part No.</td>'+
                                        '<td class="col-xs-3">Item Description</td>'+
                                        '<td class="col-xs-1">Quantity</td>'+
                                        '<td class="col-xs-2">PO/PR No.</td>'+
                                        '<td class="col-xs-2">Unit Price</td>'+
                                        '<td class="col-xs-2">Amount</td>'+
                                   '</tr>'+
                              '</thead>'+
                              '<tbody id="tbl_details_body" style="font-size:10px;">'+
                              '</tbody>'+
                         '</table>';
               $('#div_tbl_details').append(table);
          }

          function tblSummary() {
               var table = '<table class="table table-bordered sortable table-fixedheader table-striped" id="tbl_summary">'+
                              '<thead>'+
                                   '<tr>'+
                                        '<td class="col-xs-1"></td>'+
                                        '<td class="col-xs-2">Item/Part No.</td>'+
                                        '<td class="col-xs-2">Item Description</td>'+
                                        '<td class="col-xs-2">Quantity</td>'+
                                        '<td class="col-xs-2">Received Qty.</td>'+
                                        '<td class="col-xs-2">Variance</td>'+
                                        '<td class="col-xs-1">'+
                                             '<input type="checkbox" id="checkbox_iqc" name="checkbox_iqc" disabled="disabled" class="input-sm checkboxes" style="margin:0px"/> Not Reqd'+
                                        '</td>'+
                                   '</tr>'+
                              '</thead>'+
                              '<tbody id="tbl_summary_body" style="font-size:10px;">'+
                              '</tbody>'+
                         '</table>';
               $('#div_tbl_summary').append(table);
          }

          function tblBatch() {
               var table = '<table class="table table-bordered table-fixedheader table-striped" id="tbl_batch">'+
                              '<thead id="th_batch">'+
                                   '<tr>'+
                                        '<td class="table-checkbox" style="font-size: 10px;" width="2.66%">'+
                                             // <input type="checkbox" class="group-checkable" data-set="#tbl_batch .checkboxes"/>
                                        '</td>'+
                                        '<td width="4.66%"></td>'+
                                        '<td width="3.66%">Batch ID</td>'+
                                        '<td width="8.66%">Part No.</td>'+
                                        '<td width="17.66%">Description</td>'+
                                        '<td width="3.66%">Qty.</td>'+
                                        '<td width="6.66%">Pkg. Category</td>'+
                                        '<td width="4.66%">Pkg. Qty.</td>'+
                                        '<td width="10.66%">Lot No.</td>'+
                                        '<td width="8.66%">Location</td>'+
                                        '<td width="8.66%">Supplier</td>'+
                                        '<td width="6.66%">Exp Date.</td>'+
                                        '<td width="4.66%">Not Reqd</td>'+
                                        '<td width="3.66%">Printed</td>'+
                                        '<td width="4.66%"></td>'+
                                   '</tr>'+
                              '</thead>'+
                              '<tbody id="tbl_batch_body" style="font-size:10px;">'+

                              '</tbody>'+
                         '</table>';
               $('#div_tbl_batch').append(table);
          }

          function batching() {
              $('#batchItemModal').modal('hide');
              var tbl_batch = '';
              var item = $('#add_inputItemNoHidden').val();
              var item_desc = $('#add_inputItemDesc').val();
              var qty = parseInt($('#add_inputQty').val());
              var box = $('#add_inputBox').val();
              var box_qty = $('#add_inputBoxQty').val();
              var lot_no = $('#add_inputLotNo').val();
              var location = $('#add_inputLocation').val();
              var supplier = $('#add_inputSupplier').val();
              var exp_date = $('#add_inputExp_date').val();

              //   var r_qty = 0;
              //   var variance = 0;
              //   var new_var_qty = 0;
              var item_code = $('#in_item_'+item).val();
              var item_id = $('#in_id_'+item).val();

              if (item == '' || qty == '' || box == '' || box_qty == '' || lot_no == '' || supplier == '') {
                   failedMsg('Please fill out all the inputs.');
              } else {
                   if ($('#add_notForIqc').val() == 1) {
                        var not_for_iqc = 'checked="checked"';
                   }

                   $('#td_item_'+item).html(item+'<input type="hidden" name="item_summary[]" id="in_item_'+item+'"/>'+
                                            '<input type="hidden" name="id[]" id="in_id_'+item+'"/>');
                   $('#in_item_'+item).val(item_code);
                   $('#in_id_'+item).val(item_id);
                   $('#td_iqc_chk_'+item).html('<input type="checkbox" class="iqc_chk" name="iqc[]" '+not_for_iqc+' value="'+item+'" disabled="disabled">');

                   var cnt = $('#tbl_batch_body tr').length + 1;
                   $('.remove_qty').remove();
                   $('#in_iqc_chk_'+item).remove();

                   tbl_batch = '<tr class="batch_remove thisremove_'+cnt+'">'+
                                       '<td width="2.66%">'+
                                            '<a href="javascript:;" class="x_remove_batch close" data-id="thisremove_'+cnt+'" data-qty="'+qty+'" data-item="'+item+'"><i class="fa fa-times"></i></a>'+
                                       '</td>'+
                                       '<td width="4.66%">'+
                                            '<a href="javascript:;" class="btn input-sm blue edit_item_batch" data-bid="'+cnt+'" disabled="disabled">'+
                                                 '<i class="fa fa-edit"></i>'+
                                            '<a>'+
                                       '</td>'+
                                       '<td width="3.66%">'+cnt+'</td>'+
                                       '<td width="8.66%">'+item+
                                            '<input type="hidden" name="item_batch[]" value="'+item+'">'+
                                            '<input type="hidden" name="id_batch[]" value="">'+
                                       '</td>'+
                                       '<td width="17.66%">'+item_desc+
                                            '<input type="hidden" name="item_desc_batch[]" value="'+item_desc+'">'+
                                       '</td>'+
                                       '<td width="3.66%">'+qty+
                                            '<input type="hidden" name="qty_batch[]" value="'+qty+'">'+
                                       '</td>'+
                                       '<td width="6.66%"">'+box+
                                            '<input type="hidden" name="box_batch[]" value="'+box+'">'+
                                       '</td>'+
                                       '<td width="4.66%">'+box_qty+
                                            '<input type="hidden" name="box_qty_batch[]" value="'+box_qty+'">'+
                                       '</td>'+
                                       '<td width="10.66%">'+lot_no+
                                            '<input type="hidden" name="lot_no_batch[]" value="'+lot_no+'">'+
                                       '</td>'+
                                       '<td width="8.66%">'+location+
                                            '<input type="hidden" name="location_batch[]" value="'+location+'">'+
                                       '</td>'+
                                       '<td width="8.66%">'+supplier+
                                            '<input type="hidden" name="supplier_batch[]" value="'+supplier+'">'+
                                       '</td>'+
                                       '<td width="6.66%">'+exp_date+
                                            '<input type="hidden" name="exp_date_batch[]" value="'+exp_date+'">'+
                                       '</td>'+
                                       '<td width="4.66%">'+
                                            '<input type="checkbox" class="notforiqc_batch" name="notforiqc_batch[]" value="'+item+'" disabled="disabled" '+not_for_iqc+'>'+
                                       '</td>'+
                                       '<td width="3.66%">'+
                                            '<input type="checkbox" name="print_barcode[]" class="print_barcode" disabled="disabled" id="print_br_'+item+'" value="'+item+'">'+
                                       '</td>'+
                                       '<td width="4.66%">'+
                                            '<a href="javascript:;" class="btn input-sm grey-gallery barcode_item_batch" data-txnno="'+$('#invoiceno').val()+'" data-txndate="'+$('#invoicedate').val()+'" data-itemno="'+item+'" data-itemdesc="'+item_desc+'" data-qty="'+qty+'" data-bcodeqty="'+box_qty+'" data-lotno="'+lot_no+'" data-location="'+location+'">'+
                                                 '<i class="fa fa-barcode"></i>'+
                                            '<a>'+
                                       '</td>'+
                                  '</tr>';
                   $('#tbl_batch_body').append(tbl_batch);
              }
          }

          function refreshInvoice() {
          	$('#loading').modal('show');
          	var url = "<?php echo e(url('/wbsmr-refresh')); ?>";
          	var token = "<?php echo e(Session::token()); ?>";
          	var data = {
          		_token: token,
          		invoiceno: $('#invoiceno').val()
          	};

          	$.ajax({
          		url: url,
          		type: 'GET',
          		dataType: 'JSON',
          		data: data,
          	}).done(function( data, textStatus,jqXHR) {
          		if (data.return_status == 'success') {
          			$('#loading').modal('hide');
          			successMsg(data.msg)
          			getMRdata(data.receivingno);
          		} else {
          			$('#loading').modal('hide');
          			failedMsg(data.msg);
          		}
          	}).fail(function( data, textStatus,jqXHR) {
              $('#loading').modal('hide');
          		failedMsg("There's some error while processing.");
          	});
          }

     </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>