
<?php $__env->startSection('content'); ?>

     <div class="row">
      <div class="col-lg-12">
         <style type="text/css">
            .datepicker {
            z-index: 1151 !important;
            }
            .mt-sm {
            font-size: 14px;
            }
            .close-btn {
            font-weight: 100;
            position: absolute;
            right: 10px;
            top: -10px;
            display: none;
            }
            .close-btn i {
            font-weight: 100;
            color: #89a59e;
            }
            .report:hover .close-btn {
            display: block;
            }
            .mt-lg:hover .close-btn {
            display: block;
            }
         </style>
         <div class="dashboard">
            <!--        ******** transactions ************** -->
            <div id="report_menu" class="row">
               <div class="col-sm-4 report" id="1">
                  <strong data-toggle="tooltip" data-placement="top" style="cursor:pointer" class="close-btn" title="Inactive" data-fade-out-on-success="#1" data-act="ajax-request" data-action-url="/admin/settings/save_dashboard/1/0"><i class='fa fa-times-circle'></i></strong>
                  <div class="panel report_menu">
                     <div class="row row-table row-flush">
                        <div class="col-xs-6 bb br">
                           <div class="row row-table row-flush">
                              <div class="col-xs-2 text-center text-info">
                                 <em class="fa fa-plus fa-2x"></em>
                              </div>
                              <div class="col-xs-10">
                                 <div class="text-center">
                                    <h4 class="mt-sm mb0">INR 0,00                                                    </h4>
                                    <p class="mb0 text-muted">Income Today</p>
                                    <small><a href="/admin/transactions/deposit"
                                       class="mt0 mb0">More info <i
                                       class="fa fa-arrow-circle-right"></i></a></small>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="col-xs-6 bb">
                           <div class="row row-table row-flush">
                              <div class="col-xs-2 text-center text-danger">
                                 <em class="fa fa-minus fa-2x"></em>
                              </div>
                              <div class="col-xs-10">
                                 <div class="text-center">
                                    <h4 class="mt-sm mb0"> INR 0,00</h4>
                                    <p class="mb0 text-muted">Expense Today</p>
                                    <small><a href="/admin/transactions/expense"
                                       class=" small-box-footer">More info                                                            <i
                                       class="fa fa-arrow-circle-right"></i></a></small>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="row row-table row-flush">
                        <div class="col-xs-6 br">
                           <div class="row row-table row-flush">
                              <div class="col-xs-2 text-center text-info">
                                 <em class="fa fa-plus fa-2x"></em>
                              </div>
                              <div class="col-xs-10">
                                 <div class="text-center">
                                    <h4 class="mt-sm mb0">INR 3.281,00</h4>
                                    <p class="mb0 text-muted">Total Income</p>
                                    <small><a href="/admin/transactions/deposit"
                                       class="mt0 mb0">More info <i
                                       class="fa fa-arrow-circle-right"></i></a></small>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="col-xs-6">
                           <div class="row row-table row-flush">
                              <div class="col-xs-2 text-center text-danger">
                                 <em class="fa fa-minus fa-2x"></em>
                              </div>
                              <div class="col-xs-10">
                                 <div class="text-center">
                                    <h4 class="mt-sm mb0"> INR 1.319.878,76</h4>
                                    <p class="mb0 text-muted">Total Expense</p>
                                    <small><a href="/admin/transactions/expense"
                                       class="small-box-footer">More info                                                            <i
                                       class="fa fa-arrow-circle-right"></i></a></small>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <!--        ******** Sales ************** -->
               <div class="col-sm-4 report" id="2">
                  <strong data-toggle="tooltip" data-placement="top" style="cursor:pointer" class="close-btn" title="Inactive" data-fade-out-on-success="#2" data-act="ajax-request" data-action-url="/admin/settings/save_dashboard/2/0"><i class='fa fa-times-circle'></i></strong>
                  <div class="panel report_menu">
                     <div class="row row-table row-flush">
                        <div class="col-xs-6 bb br">
                           <div class="row row-table row-flush">
                              <div class="col-xs-2 text-center ">
                                 <em class="fa fa-shopping-cart fa-2x"></em>
                              </div>
                              <div class="col-xs-10">
                                 <div class="text-center">
                                    <h4 class="mt-sm mb0">INR 0,00</h4>
                                    <p class="mb0 text-muted">Invoice Today</p>
                                    <small><a href="/admin/invoice/manage_invoice"
                                       class="mt0 mb0">More info <i
                                       class="fa fa-arrow-circle-right"></i></a></small>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="col-xs-6 bb">
                           <div class="row row-table row-flush">
                              <div class="col-xs-2 text-center text-purple">
                                 <em class="fa fa-money fa-2x"></em>
                              </div>
                              <div class="col-xs-10">
                                 <div class="text-center">
                                    <h4 class="mt-sm mb0"> INR 0,00</h4>
                                    <p class="mb0 text-muted">Payment Today</p>
                                    <small><a href="/admin/invoice/all_payments"
                                       class=" small-box-footer">More info                                                            <i
                                       class="fa fa-arrow-circle-right"></i></a></small>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="row row-table row-flush">
                        <div class="col-xs-6 br">
                           <div class="row row-table row-flush">
                              <div class="col-xs-2 text-center text-purple">
                                 <em class="fa fa-money fa-2x"></em>
                              </div>
                              <div class="col-xs-10">
                                 <div class="text-center">
                                    <h4 class="mt-sm mb0">INR 3.226,00</h4>
                                    <p class="mb0 text-muted">Paid Amount</p>
                                    <small><a href="/admin/invoice/all_payments"
                                       class="mt0 mb0">More info <i
                                       class="fa fa-arrow-circle-right"></i></a></small>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="col-xs-6">
                           <div class="row row-table row-flush">
                              <div class="col-xs-2 text-center text-danger">
                                 <em class="fa fa-usd fa-2x"></em>
                              </div>
                              <div class="col-xs-10">
                                 <div class="text-center">
                                    <h4 class="mt-sm mb0"> INR 4.028,62</h4>
                                    <p class="mb0 text-muted">Due Amount</p>
                                    <small><a href="/admin/invoice/manage_invoice"
                                       class="small-box-footer">More info                                                            <i
                                       class="fa fa-arrow-circle-right"></i></a></small>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <!--        ******** Ticket ************** -->
               <div class="col-sm-4 report" id="3">
                  <strong data-toggle="tooltip" data-placement="top" style="cursor:pointer" class="close-btn" title="Inactive" data-fade-out-on-success="#3" data-act="ajax-request" data-action-url="/admin/settings/save_dashboard/3/0"><i class='fa fa-times-circle'></i></strong>
                  <div class="panel report_menu">
                     <div class="row row-table row-flush">
                        <div class="col-xs-6 bb br">
                           <div class="row row-table row-flush">
                              <div class="col-xs-2 text-center text-danger">
                                 <em class="fa fa-tasks fa-2x"></em>
                              </div>
                              <div class="col-xs-10">
                                 <div class="text-center">
                                    <h4 class="mt-sm mb0">3</h4>
                                    <p class="mb0 text-muted">In Progress Task</p>
                                    <small><a href="/admin/tasks/all_task"
                                       class="mt0 mb0">More info <i
                                       class="fa fa-arrow-circle-right"></i></a></small>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="col-xs-6 bb">
                           <div class="row row-table row-flush">
                              <div class="col-xs-2 text-center text-danger">
                                 <em class="fa fa-ticket fa-2x"></em>
                              </div>
                              <div class="col-xs-10">
                                 <div class="text-center">
                                    <h4 class="mt-sm mb0"> 2</h4>
                                    <p class="mb0 text-muted">Open Tickets</p>
                                    <small><a href="/admin/tickets"
                                       class=" small-box-footer">More info                                                            <i
                                       class="fa fa-arrow-circle-right"></i></a></small>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="row row-table row-flush">
                        <div class="col-xs-6 br">
                           <div class="row row-table row-flush">
                              <div class="col-xs-2 text-center text-danger">
                                 <em class="fa fa-bug fa-2x"></em>
                              </div>
                              <div class="col-xs-10">
                                 <div class="text-center">
                                    <h4 class="mt-sm mb0">0</h4>
                                    <p class="mb0 text-muted">In Progress Bugs</p>
                                    <small><a href="/admin/bugs"
                                       class="mt0 mb0">More info <i
                                       class="fa fa-arrow-circle-right"></i></a></small>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="col-xs-6">
                           <div class="row row-table row-flush">
                              <div class="col-xs-2 text-center text-danger">
                                 <em class="fa fa-folder-open-o fa-2x"></em>
                              </div>
                              <div class="col-xs-10">
                                 <div class="text-center">
                                    <h4 class="mt-sm mb0">0</h4>
                                    <p class="mb0 text-muted">In Progress Projects</p>
                                    <small><a href="/admin/projects"
                                       class="small-box-footer">More info                                                            <i
                                       class="fa fa-arrow-circle-right"></i></a></small>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="clearfix visible-sm-block "></div>
            <div id="menu" class="row">
               <script src="/admin/js/jquery-u.min.js"></script>
               <script type="text/javascript">
                  $(document).ready(function () {
                  calculate_total();
                  });
                  $('body').on('change', '.getItemsInfo', function () {
                  var _id = $(this).val();
                  var name = $(this).attr("name");
                  $('body').find('.from_return_stock').remove();
                  $.get('/admin/return_stock/get_merge_data/' + name + '/' + _id, function (response) {
                      $.each(response, function (i, obj) {
                          add_item_to_table(obj, 'undefined', _id, 'from_return_stock');
                      });
                  }, 'json');
                  });
                  // Invoices to merge
                  $('body').on('change', 'input[name="invoices_to_merge[]"]', function () {
                  var checked = $(this).prop('checked');
                  var _id = $(this).val();
                  if ($('.row').hasClass('credit_note-template')) {
                      var mtype = 'credit_note';
                  } else if ($('.row').hasClass('estimate-template')) {
                      var mtype = 'estimate';
                  } else {
                      var mtype = null;
                  }
                  if (mtype == 'credit_note') {
                      var post = 'credit_note/';
                  } else if (mtype == 'estimate') {
                      var post = 'estimates/';
                  } else {
                      var post = 'invoice/';
                  }
                  if (checked == true) {
                      $.get('/admin/' + post + 'get_merge_data/' + _id, function (response) {
                          $.each(response, function (i, obj) {
                              add_item_to_table(obj, 'undefined', _id);
                          });
                      }, 'json');
                  } else {
                      // Remove the appended invoice to merge
                      $('body').find('[data-merge-invoice="' + _id + '"]').remove();
                  }
                  });

                  $('body').on('change', '.f_client_id select[name="client_id"]', function () {
                  var val = $(this).val();
                  if (val == '' || val == '-') {
                      $('#merge').empty();
                      return false;
                  }
                  var current_invoice = $('body').find('input[name="merge_current_invoice"]').val();
                  if ($('.row').hasClass('credit_note-template')) {
                      var mtype = 'credit_note';
                  } else if ($('.row').hasClass('estimate-template')) {
                      var mtype = 'estimate';
                  } else {
                      var mtype = null;
                  }
                  if (mtype == 'credit_note') {
                      var post = 'credit_note/';
                  } else if (mtype == 'estimate') {
                      var post = 'estimates/';
                  } else {
                      var post = 'invoice/';
                  }
                  $.get('/admin/' + post + 'client_change_data/' + val + '/' + current_invoice, function (response) {
                      $('#merge').html(response.merge_info);
                      if (response.merge_info != '') {
                          $('#invoice_top_info').removeClass('hide');
                      } else {
                          $('#invoice_top_info').addClass('hide');
                      }
                  }, 'json');
                  });

                  // Fix for reordering the items the tables to show the full width
                  function fixHelperTableHelperSortable(e, ui) {
                  ui.children().each(function () {
                      $(this).width($(this).width());
                  });
                  return ui;
                  }

                  function init_items_sortable(preview_table) {
                  var _items_sortable = $("body").find('.items tbody');
                  if (_items_sortable.length == 0) {
                      return;
                  }
                  _items_sortable.sortable({
                      helper: fixHelperTableHelperSortable,
                      handle: '.dragger',
                      placeholder: 'ui-placeholder',
                      itemPath: '> tbody',
                      itemSelector: 'tr.sortable',
                      items: "tr.sortable",
                      update: function () {
                          if (typeof (preview_table) == 'undefined') {
                              reorder_items();
                          } else {
                              // If passed from the admin preview there is other function for re-ordering
                              save_ei_items_order();
                          }
                      },
                      sort: function (event, ui) {
                          // Firefox fixer when dragging
                          var $target = $(event.target);
                          if (!/html|body/i.test($target.offsetParent()[0].tagName)) {
                              var top = event.pageY - $target.offsetParent().offset().top - (ui.helper.outerHeight(true) / 2);
                              ui.helper.css({
                                  'top': top + 'px'
                              });
                          }
                      }
                  });
                  }

                  // Save the items from order from the admin preview
                  function save_ei_items_order() {
                  var rows = $('.table.invoice-items-preview.items tbody tr,.table.estimate-items-preview.items tbody tr,.table.credit_note-items-preview.items tbody tr,.table.proposal-items-preview.items tbody tr,.table.todo-preview.items tbody tr');
                  var i = 1;
                  var order = [];
                  var _order_id, type;
                  var item_id;
                  if ($('.table.items').hasClass('invoice-items-preview')) {
                      type = 'invoice';
                  } else if ($('.table.items').hasClass('credit_note-items-preview')) {
                      type = 'credit_note';
                  }  else if ($('.table.items').hasClass('estimate-items-preview')) {
                      type = 'estimate';
                  } else if ($('.table.items').hasClass('proposal-items-preview')) {
                      type = 'proposal';
                  } else if ($('.table.items').hasClass('todo-preview')) {
                      type = 'todo';
                  } else {
                      return false;
                  }
                  $.each(rows, function () {
                      order.push([$(this).data('item-id'), i]);
                      // update item number when reordering
                      $(this).find('td.item_no').html(i);
                      i++;
                  });
                  setTimeout(function () {
                      $.post('/admin/global_controller/update_ei_items_order/' + type, {
                          items_id: order
                      });
                  }, 200);
                  }

                  // Reoder the items in table edit for estimate and invoices
                  function reorder_items() {
                  var rows = $('.table.invoice-items-table tbody tr.item,.table.table-main-estimate-edit tbody tr.item');
                  var i = 1;
                  $.each(rows, function () {
                      $(this).find('input.order').val(i);
                      i++;
                  });
                  }

                  // Show quantity as change we need to change on the table QTY heading for better user experience
                  $('body').on('change', 'input[name="show_quantity_as"]', function () {
                  $('body').find('th.qty').html($(this).attr('id'));
                  });

                  // Add item to preview
                  function add_item_to_preview(itemid) {
                  // alert(itemid);
                  $.get('/admin/global_controller/get_item_by_id/' + itemid, function (response) {
                      // console.log(response);
                      $('.main textarea[name="item_name"]').val(response.item_name);
                      $('.main textarea[name="item_desc"]').val(response.item_desc);
                                  $('.main input[name="saved_items_id"]').val(response.saved_items_id);
                      $('.main input[name="new_itmes_id"]').val(itemid);
                      $('.main input[name="total_qty"]').val(Math.round(response.quantity));
                      $('.main input[name="quantity"]').val(1);
                      var taxname = $.parseJSON(response.taxname);
                      var taxrate = $.parseJSON(response.taxrate);
                      if (taxname != null) {
                          var tax = [];
                          for (var i = 0; i < taxname.length; i++) {
                              tax.push(taxname[i] + '|' + taxrate[i]);
                          }
                      }
                      $('.main select.tax').selectpicker('val', tax);
                      $('.main input[name="unit"]').val(response.unit_type);
                      $('.main input[name="unit_cost"]').val(response.unit_cost);
                  }, 'json');
                  }

                  // Add item to preview from the dropdown for invoices estimates
                  $('body').on('change', 'select[name="item_select"]', function () {
                  var itemid = $(this).selectpicker('val');
                  if (itemid != '' && itemid !== 'newitem') {
                      add_item_to_preview(itemid);
                  } else if (itemid == 'newitem') {
                      // New item
                      $('#item_modal').modal('show');
                  }
                  });
                  // Recaulciate total on these changes
                  $('body').on('change', 'input[name="adjustment"],select.tax', function () {
                  calculate_total();
                  });
                  // Discount type for estimate/invoice
                  $('body').on('change', 'select[name="discount_type"]', function () {
                  // if discount_type == ''
                  if ($(this).val() == '') {
                      $('input[name="discount_percent"]').val(0);
                  }
                  // Recalculate the total
                  calculate_total();
                  });
                  // In case user enter discount percent but there is no discount type set
                  $('body').on('change', 'input[name="discount_percent"]', function () {
                  if ($('select[name="discount_type"]').val() == '' && $(this).val() != 0) {
                      alert('You need to select discount type');
                      $('html,body').animate({
                              scrollTop: 50
                          },
                          'slow');
                      $('label[for="discount_type"]').addClass('text-danger');
                      setTimeout(function () {
                          $('label[for="discount_type"]').removeClass('text-danger');
                      }, 3000);
                      return false;
                  }
                  if ($(this).valid() == true) {
                      calculate_total();
                  }
                  });

                  // Init bootstrap select picker
                  function init_selectpicker() {
                  $('body').find('select.selectpicker').not('.ajax-search').selectpicker({
                      showSubtext: true,
                  });
                  }

                  // Function to slug string
                  function slugify(string) {
                  return string
                      .toString()
                      .trim()
                      .toLowerCase()
                      .replace(/\s+/g, "-")
                      .replace(/[^\w\-]+/g, "")
                      .replace(/\-\-+/g, "-")
                      .replace(/^-+/, "")
                      .replace(/-+$/, "");
                  }

                  // Generate hidden input field
                  function hidden_input(name, val) {
                  return '<input type="hidden" name="' + name + '" value="' + val + '">';
                  }

                  // Calculate invoice total - NOT RECOMENDING EDIT THIS FUNCTION BECUASE IS VERY SENSITIVE
                  function calculate_total() {

                  var calculated_tax,
                      taxrate,
                      item_taxes,
                      row,
                      _amount,
                      _tax_name,
                      taxes = {},
                      taxes_rows = [],
                      subtotal = 0,
                      total = 0,
                      quantity = 1;
                  total_discount_calculated = 0,
                      rows = $('.table.invoice-items-table tbody tr.item,.table.table-main-estimate-edit tbody tr.item'),
                      adjustment = $('input[name="adjustment"]').val(),
                      discount_area = $('tr#discount_percent'),
                      discount_percent = $('input[name="discount_percent"]').val();
                  discount_type = $('select[name="discount_type"]').val();

                  $('.tax-area').remove();

                  $.each(rows, function () {
                      quantity = $(this).find('[data-quantity]').val();
                      var total_qty = Math.round($(this).find('[data-total-qty]').val());
                      var saved_items_id = Math.round($(this).find('[data-saved-items-id]').val());
                      var qty_alert = 'Yes';
                      if (quantity == '') {
                          quantity = 1;
                      }
                      if (decimal_separator == '') {
                          decimal_separator = 2;
                      }
                      if (saved_items_id != '' && qty_alert == 'Yes' && quantity > total_qty) {
                          alert('Sorry you have Exceed Your Total Stock ! Your Total Stock is' + ' ' + total_qty);
                          quantity = total_qty;
                      }
                      $(this).find('[data-quantity]').val(quantity);
                      _amount = parseFloat($(this).find('td.rate input').val()) * quantity;

                      $(this).find('td.amount').html(_amount);
                      subtotal += _amount;
                      row = $(this);
                      item_taxes = $(this).find('select.tax').selectpicker('val');
                      if (item_taxes) {
                          $.each(item_taxes, function (i, taxname) {
                              taxrate = row.find('select.tax [value="' + taxname + '"]').data('taxrate');
                              calculated_tax = (_amount / 100 * taxrate);

                              if (!taxes.hasOwnProperty(taxname)) {
                                  if (taxrate != 0) {
                                      _tax_name = taxname.split('|');
                                      tax_row = '<tr class="tax-area"><td>' + _tax_name[0] + '(' + taxrate + '%)</td><td id="tax_id_' + slugify(taxname) + '"></td></tr>';
                                      $(discount_area).after(tax_row);
                                      taxes[taxname] = calculated_tax;
                                  }
                              } else {
                                  // Increment total from this tax
                                  taxes[taxname] = taxes[taxname] += calculated_tax;
                              }
                          });
                      }

                  });

                  if (discount_percent != '' && discount_type == 'before_tax') {
                      // Calculate the discount total
                      total_discount_calculated = (subtotal * discount_percent) / 100;
                  }
                  var decimal_separator = '2';
                  $.each(taxes, function (taxname, total_tax) {
                      if (discount_percent != '' && discount_type == 'before_tax') {
                          total_tax_calculated = (total_tax * discount_percent) / 100;
                          total_tax = (total_tax - total_tax_calculated);
                      }
                      total += total_tax;
                      $('#tax_id_' + slugify(taxname)).html(total_tax + hidden_input('total_tax_name[]', taxname) + hidden_input('total_tax[]', total_tax.toFixed(decimal_separator)));

                  });

                  total = (total + subtotal);

                  if (discount_percent != '' && discount_type == 'after_tax') {
                      // Calculate the discount total
                      total_discount_calculated = (total * discount_percent) / 100;
                  }

                  total = total - total_discount_calculated;
                  adjustment = parseFloat(adjustment);

                  // Check if adjustment not empty
                  if (!isNaN(adjustment)) {
                      total = total + adjustment;
                  }

                  // Append, format to html and display
                  $('.discount_percent').html('-' + total_discount_calculated.toFixed(decimal_separator) + hidden_input('discount_percent', discount_percent) + hidden_input('discount_total', total_discount_calculated.toFixed(decimal_separator)));
                  $('.adjustment').html(adjustment.toFixed(decimal_separator) + hidden_input('adjustment', adjustment.toFixed(decimal_separator)))
                  $('.subtotal').html(subtotal = subtotal.toFixed(decimal_separator) + hidden_input('subtotal', subtotal.toFixed(decimal_separator)));
                  $('.total').html(total.toFixed(decimal_separator) + hidden_input('total', total.toFixed(decimal_separator)));
                  }

                  // Deletes invoice items
                  function delete_item(row, itemid) {
                  setTimeout(function () {
                      $(row).parents('tr').remove();
                      calculate_total();
                  }, 50)
                  // If is edit we need to add to input removed_items to track activity
                  if ($('input[name="isedit"]').length > 0) {
                      $('#removed-items').append(hidden_input('removed_items[]', itemid));
                  }
                  }

                  // Clear the items added to preview
                  function clear_main_values(default_taxes) {
                  // Get the last taxes applied to be available for the next item
                  var last_taxes_applied = $('table.items tbody').find('tr:last-child').find('select').selectpicker('val');

                  $('.main textarea[name="item_name"]').val('');
                  $('.main textarea[name="item_desc"]').val('');
                          $('.main input[name="quantity"]').val(1);
                  $('.main select.tax').selectpicker('val', last_taxes_applied);
                  $('.main input[name="unit_cost"]').val('');
                  $('.main input[name="unit"]').val('');
                  $('.main input[name="new_itmes_id"]').val('');
                  $('.main input[name="saved_items_id"]').val('');
                  $('.main input[name="total_qty"]').val('');
                  }

                  // Reoder the items in table edit for estimate and invoices
                  function reorder_items() {
                  var rows = $('.table.invoice-items-table tbody tr.item,.table.table-main-estimate-edit tbody tr.item');
                  var i = 1;
                  $.each(rows, function () {
                      $(this).find('input.order').val(i);
                      i++;
                  });
                  }

                  // Append the added items to the preview to the table as items
                  function add_item_to_table(data, itemid, merge_invoice, from_return_stock = '') {
                  // If not custom data passed get from the preview
                  if (typeof (data) == 'undefined' || data == 'undefined') {
                      data = get_main_values();
                      console.log(data);
                  }
                  var qty_alert = 'Yes';
                  if (data.new_itmes_id != '' && qty_alert == 'Yes' && data.qty > data.total_qty) {
                      alert('Sorry you have Exceed Your Total Stock ! Your Total Stock is' + ' ' + data.total_qty);
                  } else {
                      var table_row = '';
                      var unit_placeholder = '';
                      var item_key = $('body').find('tbody .item').length + 1;
                      table_row += '<tr class="sortable item ' + from_return_stock + '" data-merge-invoice="' + merge_invoice + '">';
                      table_row += '<td class="dragger">';
                      // Check if quantity is number
                      if (isNaN(data.qty)) {
                          data.qty = 1;
                      }
                      // Check if rate is number
                      if (data.rate == '' || isNaN(data.rate)) {
                          data.rate = 0;
                      }

                      var amount = data.rate * data.qty;
                      amount = amount;
                      var tax_name = 'items[' + item_key + '][taxname][]';
                      $('body').append('<div class="dt-loader"></div>');
                      var regex = /<br[^>]*>/gi;

                      get_taxes_dropdown_template(tax_name, data.taxname).done(function (tax_dropdown) {
                          // order input
                          table_row += '<input type="hidden" class="order" name="items[' + item_key + '][order]"><input data-saved-items-id  type="hidden" name="items[' + item_key + '][saved_items_id]" value="' + data.saved_items_id + '"><input type="hidden"  name="items[' + item_key + '][invoice_items_id]" value="' + data.new_itmes_id + '"><input type="hidden" data-total-qty name="items[' + item_key + '][total_qty]" value="' + data.total_qty + '"><input type="hidden" name="new_itmes_id[]" value="' + data.new_itmes_id + '">';
                          table_row += '</td>';
                          table_row += '<td class="bold item_name"><textarea  name="items[' + item_key + '][item_name]" class="form-control">' + data.item_name + '</textarea></td>';
                          table_row += '<td><textarea  name="items[' + item_key + '][item_desc]" class="form-control item_item_desc" >' + data.item_desc.replace(regex, "\n") + '</textarea></td>';
                                          table_row += '<td><input type="text" data-parsley-type="number" min="0" onblur="calculate_total();" onchange="calculate_total();" data-quantity name="items[' + item_key + '][quantity]" value="' + data.qty + '" class="form-control">';

                          unit_placeholder = '';
                          if (!data.unit || typeof (data.unit) == 'undefined') {
                              data.unit = '';
                          }

                          table_row += '<input type="text" placeholder="' + unit_placeholder + '" name="items[' + item_key + '][unit]" class="form-control input-transparent" value="' + data.unit + '">';

                          table_row += '</td>';
                          table_row += '<td class="rate"><input type="text" data-parsley-type="number"  onblur="calculate_total();" onchange="calculate_total();" name="items[' + item_key + '][unit_cost]" value="' + data.rate + '" class="form-control"></td>';
                          table_row += '<td class="taxrate">' + tax_dropdown + '</td>';
                          table_row += '<td class="amount">' + amount + '</td>';
                          table_row += '<td><a href="#" class="btn-xs btn btn-danger pull-left" onclick="delete_item(this,' + itemid + '); return false;"><i class="fa fa-trash"></i></a></td>';
                          table_row += '</tr>';

                          $('table.items tbody').append(table_row);

                          setTimeout(function () {
                              calculate_total();
                          }, 10);

                          init_selectpicker();
                          clear_main_values();
                          reorder_items();

                          $('body').find('.dt-loader').remove();
                          $('#item_select').selectpicker('val', '');
                          return true;
                      });
                  }
                  return false;
                  }

                  // Get taxes dropdown selectpicker template / Causing problems with ajax becuase is fetching from server
                  function get_taxes_dropdown_template(name, taxname) {

                  jQuery.ajaxSetup({
                      async: false
                  });
                  var d = $.post('/admin/global_controller/get_taxes_dropdown', {
                      name: name,
                      taxname: taxname
                  });

                  jQuery.ajaxSetup({
                      async: true
                  });

                  return d;
                  }

                  // Get the preview main values
                  function get_main_values() {
                  var response = {};
                  response.item_name = $('.main textarea[name="item_name"]').val();
                  response.item_desc = $('.main textarea[name="item_desc"]').val();
                          response.qty = $('.main input[name="quantity"]').val();
                  response.taxname = $('.main select.tax').selectpicker('val');
                  response.rate = $('.main input[name="unit_cost"]').val();
                  response.unit = $('.main input[name="unit"]').val();
                  response.new_itmes_id = $('.main input[name="new_itmes_id"]').val();
                  response.saved_items_id = $('.main input[name="saved_items_id"]').val();
                  response.total_qty = Math.round($('.main input[name="total_qty"]').val());
                  return response;
                  }

               </script>                <script type="text/javascript">
                  $(document).ready(function () {
                      init_items_sortable(true);
                  });
               </script>
               <script language="javascript" type="text/javascript">
                  function getXMLHTTP() { //fuction to return the xml http object
                  var xmlhttp = false;
                  try {
                      xmlhttp = new XMLHttpRequest();
                  } catch (e) {
                      try {
                          xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                      } catch (e) {
                          try {
                              xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
                          } catch (e1) {
                              xmlhttp = false;
                          }
                      }
                  }

                  return xmlhttp;
                  }

                  function check_duplicate_emp_id(val) {
                  var base_url = '/';
                  var strURL = base_url + "admin/global_controller/check_duplicate_emp_id/" + val;
                  var req = getXMLHTTP();
                  if (req) {
                      req.onreadystatechange = function () {
                          if (req.readyState == 4) {
                              // only if "OK"
                              if (req.status == 200) {
                                  var result = req.responseText;
                                  if (result) {
                                      $("#id_exist_msg").append(result);
                                      document.getElementById('sbtn').disabled = true;
                                  } else {
                                      document.getElementById('sbtn').disabled = false;
                                  }

                              } else {
                                  alert("There was a problem while using XMLHTTP:\n" + req.statusText);
                              }
                          }
                      }
                      req.open("POST", strURL, true);
                      req.send(null);
                  }
                  }

                  $(document).on("change", function () {
                  var change_email_password = $('#change_email_password').val();
                  var old_password = $('#old_password').val();
                  var change_username = $('#change_username').val();
                  var check_username = $('#check_username').val();
                  var employment_id = $('#check_employment_id').val();
                  var check_email_addrees = $('#check_email_addrees').val();
                  var user_id = $('#user_id').val();
                  var id, btn, value, url, userid;

                  if (change_email_password) {
                      id = 'email_password';
                      btn = 'new_uses_btn';
                      value = change_email_password;
                      url = 'check_current_password';
                  }
                  if (old_password) {
                      id = 'old_password_error';
                      btn = 'old_password_button';
                      value = old_password;
                      url = 'check_current_password';
                  }
                  if (change_username) {
                      id = 'username_error';
                      btn = 'change_username_btn';
                      value = change_username;
                      userid = user_id;
                      url = 'check_current_password';
                  }
                  if (check_username) {
                      id = 'check_username_error';
                      btn = 'new_uses_btn';
                      url = 'check_existing_user_name'
                      value = check_username;
                  }
                  if (employment_id) {
                      id = 'employment_id_error';
                      btn = 'new_uses_btn';
                      url = 'check_duplicate_emp_id'
                      value = employment_id;
                      userid = user_id;
                  }
                  if (check_email_addrees) {
                      id = 'email_addrees_error';
                      btn = 'new_uses_btn';
                      url = 'check_email_addrees'
                      value = check_email_addrees;
                      userid = user_id;
                  }
                  if (userid) {
                      user_id = userid;
                  } else {
                      user_id = "";
                  }
                  if (url) {
                      $.ajax({
                          url: base_url + "admin/global_controller/" + url + '/' + user_id,
                          type: "POST",
                          data: {
                              name: value,
                          },
                          dataType: 'json',
                          success: function (res) {
                              if (res.error) {
                                  handle_error("#" + id, res.error);
                                  disable_button("#" + btn);
                                  return;
                              } else {
                                  remove_error("#" + id);
                                  disable_remove("#" + btn);
                                  return;
                              }
                          }
                      });
                  }
                  });


                  function check_current_password(val) {
                  var base_url = '/';
                  var strURL = base_url + "admin/global_controller/check_current_password/" + val;
                  var req = getXMLHTTP();
                  if (req) {
                      req.onreadystatechange = function () {
                          if (req.readyState == 4) {
                              // only if "OK"
                              if (req.status == 200) {
                                  var result = req.responseText;
                                  if (result) {
                                      $("#id_error_msg").css("display", "block");
                                      document.getElementById('sbtn').disabled = true;
                                  } else {
                                      $("#id_error_msg").css("display", "none");
                                      document.getElementById('sbtn').disabled = false;
                                  }

                              } else {
                                  alert("There was a problem while using XMLHTTP:\n" + req.statusText);
                              }
                          }
                      }
                      req.open("POST", strURL, true);
                      req.send(null);
                  }

                  }

                  function get_milestone_by_id(project_id) {
                  var base_url = '/';
                  var strURL = base_url + "admin/global_controller/get_milestone_by_project_id/" + project_id;
                  var req = getXMLHTTP();
                  if (req) {
                      req.onreadystatechange = function () {
                          if (req.readyState == 4) {
                              // only if "OK"
                              if (req.status == 200) {
                                  var result = req.responseText;
                                  $("#milestone_show").find('option').remove();
                                  $("#milestone").append(result);
                                  $("#milestone_show").show();
                                  $("#milestone").show();

                                  document.getElementById('milestone').disabled = false;
                              } else {
                                  alert("There was a problem while using XMLHTTP:\n" + req.statusText);
                              }
                          }
                      }
                      req.open("POST", strURL, true);
                      req.send(null);
                  }

                  }

                  function get_related_moduleName(val, proposal) {
                  var base_url = '/';
                  if (proposal) {
                      var strURL = base_url + "admin/global_controller/get_related_moduleName_by_value/" + val + '/' + proposal;
                  } else {
                      var strURL = base_url + "admin/global_controller/get_related_moduleName_by_value/" + val;
                  }
                  var req = getXMLHTTP();
                  if (req) {
                      req.onreadystatechange = function () {
                          if (req.readyState == 4) {
                              // only if "OK"
                              if (req.status == 200) {
                                  var result = req.responseText;
                                  $('#related_result').empty();
                                  if (result) {
                                      $("#related_to").html('<label for="field-1" class="col-sm-3 control-label">Select ' + capitalise(val) + '</label>');
                                      $("#related_to").append(result);
                                  } else {
                                      $("#related_to").empty();
                                  }
                                  if (val == 'project') {
                                      init_selectpicker();
                                      $("#milestone_show").show();
                                      $("#milestone").show();
                                      document.getElementById('milestone').disabled = false;
                                      $('.goal_tracking').hide();
                                      $('.goal_tracking').prop("disabled", true);
                                      $('.bugs_module').hide();
                                      $('.bugs_module').prop("disabled", true);
                                      $('.leads_module').hide();
                                      $('.leads_module').prop("disabled", true);
                                      $('.opportunities_module').hide();
                                      $('.opportunities_module').prop("disabled", true);

                                      $('.milestone_module').show();
                                      $('.milestone_module').prop("disabled", false);
                                      $('.project_module').show();
                                      $('.project_module').prop("disabled", false);
                                      $('.sub_task').hide();
                                      $('.sub_task').prop("disabled", true);
                                      $('.expenses').hide();
                                      $('.expenses').prop("disabled", true);

                                  }
                                  if (val == 'opportunities') {
                                      init_selectpicker();
                                      $('.goal_tracking').hide();
                                      $('.goal_tracking').prop("disabled", true);
                                      $('.bugs_module').hide();
                                      $('.bugs_module').prop("disabled", true);
                                      $('.leads_module').hide();
                                      $('.leads_module').prop("disabled", true);

                                      $('.opportunities_module').show();
                                      $('.opportunities_module').prop("disabled", false);

                                      $('.milestone_module').hide();
                                      $('.milestone_module').prop("disabled", true);
                                      $('.project_module').hide();
                                      $('.project_module').prop("disabled", true);
                                      $('.sub_task').hide();
                                      $('.sub_task').prop("disabled", true);
                                      $('.expenses').hide();
                                      $('.expenses').prop("disabled", true);

                                  }
                                  if (val == 'leads') {
                                      init_selectpicker();
                                      $('.goal_tracking').hide();
                                      $('.goal_tracking').prop("disabled", true);
                                      $('.bugs_module').hide();
                                      $('.bugs_module').prop("disabled", true);

                                      $('.leads_module').show();
                                      $('.leads_module').prop("disabled", false);

                                      $('.opportunities_module').hide();
                                      $('.opportunities_module').prop("disabled", true);

                                      $('.milestone_module').hide();
                                      $('.milestone_module').prop("disabled", true);

                                      $('.project_module').hide();
                                      $('.project_module').prop("disabled", true);

                                      $('.client_module').hide();
                                      $('.client_module').prop("disabled", true);
                                      $('.sub_task').hide();
                                      $('.sub_task').prop("disabled", true);
                                      $('.expenses').hide();
                                      $('.expenses').prop("disabled", true);

                                  }
                                  if (val == 'client') {
                                      init_selectpicker();
                                      $('.client_module').show();
                                      $('.client_module').prop("disabled", false);

                                      $('.leads_module').hide();
                                      $('.leads_module').prop("disabled", true);
                                  }
                                  if (val == 'supplier') {
                                      init_selectpicker();
                                      $('.leads_module').show();
                                      $('.leads_module').prop("disabled", false);
                                      $('.client_module').hide();
                                      $('.client_module').prop("disabled", true);
                                  }
                                  if (val == 'bug') {
                                      init_selectpicker();
                                      $('.goal_tracking').hide();
                                      $('.goal_tracking').prop("disabled", true);

                                      $('.bugs_module').show();
                                      $('.bugs_module').prop("disabled", false);

                                      $('.leads_module').hide();
                                      $('.leads_module').prop("disabled", true);
                                      $('.opportunities_module').hide();
                                      $('.opportunities_module').prop("disabled", true);
                                      $('.milestone_module').hide();
                                      $('.milestone_module').prop("disabled", true);
                                      $('.project_module').hide();
                                      $('.project_module').prop("disabled", true);
                                      $('.sub_task').hide();
                                      $('.sub_task').prop("disabled", true);
                                      $('.expenses').hide();
                                      $('.expenses').prop("disabled", true);

                                  }
                                  if (val == 'goal') {
                                      init_selectpicker();
                                      $('.goal_tracking').show();
                                      $('.goal_tracking').prop("disabled", false);

                                      $('.bugs_module').hide();
                                      $('.bugs_module').prop("disabled", false);

                                      $('.leads_module').hide();
                                      $('.leads_module').prop("disabled", true);
                                      $('.opportunities_module').hide();
                                      $('.opportunities_module').prop("disabled", true);
                                      $('.milestone_module').hide();
                                      $('.milestone_module').prop("disabled", true);
                                      $('.project_module').hide();
                                      $('.project_module').prop("disabled", true);
                                      $('.sub_task').hide();
                                      $('.sub_task').prop("disabled", true);
                                      $('.expenses').hide();
                                      $('.expenses').prop("disabled", true);
                                  }
                                  if (val == 'sub_task') {
                                      init_selectpicker();
                                      $('.sub_task').show();
                                      $('.sub_task').prop("disabled", false);

                                      $('.bugs_module').hide();
                                      $('.bugs_module').prop("disabled", false);

                                      $('.leads_module').hide();
                                      $('.leads_module').prop("disabled", true);
                                      $('.opportunities_module').hide();
                                      $('.opportunities_module').prop("disabled", true);
                                      $('.milestone_module').hide();
                                      $('.milestone_module').prop("disabled", true);
                                      $('.project_module').hide();
                                      $('.project_module').prop("disabled", true);
                                      $('.goal_tracking').hide();
                                      $('.goal_tracking').prop("disabled", true);
                                      $('.expenses').hide();
                                      $('.expenses').prop("disabled", true);
                                  }
                                  if (val == 'expenses') {
                                      init_selectpicker();
                                      $('.expenses').show();
                                      $('.expenses').prop("disabled", false);

                                      $('.bugs_module').hide();
                                      $('.bugs_module').prop("disabled", false);

                                      $('.leads_module').hide();
                                      $('.leads_module').prop("disabled", true);
                                      $('.opportunities_module').hide();
                                      $('.opportunities_module').prop("disabled", true);
                                      $('.milestone_module').hide();
                                      $('.milestone_module').prop("disabled", true);
                                      $('.project_module').hide();
                                      $('.project_module').prop("disabled", true);
                                      $('.goal_tracking').hide();
                                      $('.goal_tracking').prop("disabled", true);
                                      $('.sub_task').hide();
                                      $('.sub_task').prop("disabled", true);
                                  }
                              } else {
                                  alert("There was a problem while using XMLHTTP:\n" + req.statusText);
                              }
                          }
                      }
                      req.open("POST", strURL, true);
                      req.send(null);
                  }
                  }

                  // Init bootstrap select picker
                  function init_selectpicker() {
                  $('body').find('select.selectpicker').not('.ajax-search').selectpicker({
                      showSubtext: true,
                  });
                  }

                  function capitalise(string) {
                  return string.charAt(0).toUpperCase() + string.slice(1).toLowerCase();
                  }

                  function check_user_name(str) {

                  var user_name = $.trim(str);
                  var user_id = $.trim($("#user_id").val());
                  var base_url = '/';
                  var strURL = base_url + "admin/global_controller/check_existing_user_name/" + user_name + "/" + user_id;
                  var req = getXMLHTTP();
                  if (req) {
                      req.onreadystatechange = function () {
                          if (req.readyState == 4) {
                              // only if "OK"
                              if (req.status == 200) {
                                  var result = req.responseText;
                                  document.getElementById('username_result').innerHTML = result;
                                  var msg = result.trim();
                                  if (msg) {
                                      document.getElementById('sbtn').disabled = true;
                                  } else {
                                      document.getElementById('sbtn').disabled = false;
                                  }

                              } else {
                                  alert("There was a problem while using XMLHTTP:\n" + req.statusText);
                              }
                          }
                      }
                      req.open("POST", strURL, true);
                      req.send(null);


                  }
                  }

                  function get_project_by_id(id) {

                  var base_url = '/';
                  var strURL = base_url + "admin/global_controller/get_project_by_client_id/" + id;
                  var req = getXMLHTTP();
                  if (req) {
                      req.onreadystatechange = function () {
                          if (req.readyState == 4) {
                              // only if "OK"
                              if (req.status == 200) {
                                  var result = req.responseText;
                                  $('#client_project').empty();
                                  $("#client_project").append(result);
                              } else {
                                  alert("There was a problem while using XMLHTTP:\n" + req.statusText);
                              }
                          }
                      }
                      req.open("POST", strURL, true);
                      req.send(null);


                  }
                  }


               </script>
               <style type="text/css">
                  .dragger {
                  background: url(../admin/img/dragger.png) 0px 11px no-repeat;
                  cursor: pointer;
                  }
                  .table > tbody > tr > td {
                  vertical-align: initial;
                  }
               </style>
               <script type="text/javascript">
                  $(document).ready(function () {
                      init_items_sortable(true);
                  });
               </script>
               <div class="col-md-6 mt-lg" id="19">
                  <strong data-toggle="tooltip" data-placement="top" style="cursor:pointer" class="close-btn" title="Inactive" data-fade-out-on-success="#19" data-act="ajax-request" data-action-url="/admin/settings/save_dashboard/19/0"><i class='fa fa-times-circle'></i></strong>
                  <section class="panel panel-custom menu" style="height: 437px;overflow-y: scroll;">
                     <header class="panel-heading">
                        <h3 class="panel-title">Recently Paid Invoices</h3>
                     </header>
                     <div class="panel-body inv-slim-scroll">
                       Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                       Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                     </div>
                  </section>
               </div>
               <style type="text/css">
                  .dragger {
                  background: url(../admin/img/dragger.png) 0px 11px no-repeat;
                  cursor: pointer;
                  }
                  .table > tbody > tr > td {
                  vertical-align: initial;
                  }
               </style>
               <script type="text/javascript">
                  $(document).ready(function () {
                      init_items_sortable(true);
                  });
               </script>
               <div class="col-md-6 mt-lg" id="18">
                  <strong data-toggle="tooltip" data-placement="top" style="cursor:pointer" class="close-btn" title="Inactive" data-fade-out-on-success="#18" data-act="ajax-request" data-action-url="/admin/settings/save_dashboard/18/0"><i class='fa fa-times-circle'></i></strong>
                  <div class="panel panel-custom menu" style="height: 437px;">
                     <header class="panel-heading">
                        <h3 class="panel-title">Expense Report</h3>
                     </header>
                     <div class="panel-body">
                        <p class="text-center">
                        <form role="form" id="form" action="/admin/dashboard" method="post"
                           class="form-horizontal form-groups-bordered hidden-xs">
                           <div class="form-group">
                              <label class="col-sm-3 control-label">Select Year                                        <span
                                 class="required">*</span></label>
                              <div class="col-sm-5">
                                 <div class="input-group">
                                    <input type="text" name="year" value="2020" class="form-control years"><span class="input-group-addon"><a
                                       href="#"><i
                                       class="fa fa-calendar"></i></a></span>
                                 </div>
                              </div>
                              <button type="submit" data-toggle="tooltip" data-placement="top" title="Search"
                                 class="btn btn-custom"><i class="fa fa-search"></i></button>
                           </div>
                        </form>
                        </p>
                        <!--End select input year -->
                        <div class="chart-responsive">
                           <!--Sales Chart Canvas -->
                           <canvas id="buyers" style="height:40vh; width: 100%;" class="chart-responsive"></canvas>
                        </div>
                        <!-- /.chart-responsive -->
                     </div>
                     <!-- ./box-body -->
                  </div>
               </div>

               <style type="text/css">
                  .dragger {
                  background: url(../admin/img/dragger.png) 0px 11px no-repeat;
                  cursor: pointer;
                  }
                  .table > tbody > tr > td {
                  vertical-align: initial;
                  }
               </style>
               <script type="text/javascript">
                  $(document).ready(function () {
                      init_items_sortable(true);
                  });
               </script>
        </div>
        </div>
         <!-- Morris.js charts -->
         <script src="/admin/js/raphael.min.js"></script>
         <script src="/admin/js/morris.min.js"></script>
         <!-- / Chart.js Script -->
         <script src="/admin/js/chart.min.js" type="text/javascript"></script>

         <script src="/assets/plugins/jquery-ui/jquery-u.min.js"></script>
         <script type="text/javascript">
            $(function () {
            $("#report_menu").sortable({
                connectWith: ".report_menu",
                placeholder: 'ui-state-highlight',
                forcePlaceholderSize: true,
                stop: function (event, ui) {
                    var id = JSON.stringify(
                        $("#report_menu").sortable(
                            'toArray',
                            {
                                attribute: 'id'
                            }
                        )
                    );
                    var formData = {
                        'report_menu': id
                    };
                    $.ajax({
                        type: 'POST',
                        url: '/admin/settings/save_dashboard/',
                        data: formData,
                        dataType: 'json',
                        encode: true,
                        success: function (res) {
                            if (res) {
                            } else {
                                alert('There was a problem with AJAX');
                            }
                        }
                    })

                }
            });
            $(".report_menu").disableSelection();

            $("#menu").sortable({
                connectWith: ".menu",
                placeholder: 'ui-state-highlight',
                forcePlaceholderSize: true,
                stop: function (event, ui) {
                    var mid = JSON.stringify(
                        $("#menu").sortable(
                            'toArray',
                            {
                                attribute: 'id'
                            }
                        )
                    );
                    var formData = {
                        'menu': mid
                    };
                    $.ajax({
                        type: 'POST',
                        url: '/admin/settings/save_dashboard/',
                        data: formData,
                        dataType: 'json',
                        encode: true,
                        success: function (res) {
                            if (res) {
                            } else {
                                alert('There was a problem with AJAX');
                            }
                        }
                    })
                }
            });
            $(".menu").disableSelection();
            });
         </script>
      </div>
   </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/jojayohub/public_html/resources/views/admin/pages/index.blade.php ENDPATH**/ ?>