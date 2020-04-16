<?php
  include('view/modal/mcustomer_details.php');
?>

<h1 class="h3 mb-2 text-gray-800">Dashboard</h1>

<hr>

<div class="row">

  <div class="col-xl-2 col-md-4 col-sm-6 mb-4">
    <div class="card border-left-primary shadow h-100 py-2">
      <div class="card-body">
        <div class="row no-gutters align-items-center">
          <div class="col mr-2">
            <div class="text-xs font-weight-bold text-uppercase text-primary mb-1">Users</div>
            <div class="h5 mb-0 font-weight-bold text-gray-800"><a href="index.php?page=user-management">46</a></div>
          </div>
          <div class="col-auto">
            <i class="fa fa-users fa-2x text-gray-300 d-md-none d-lg-block"></i>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="col-xl-2 col-md-4 col-sm-6 mb-4">
    <div class="card border-left-success shadow h-100 py-2">
      <div class="card-body">
        <div class="row no-gutters align-items-center">
          <div class="col mr-2">
            <div class="text-xs font-weight-bold text-uppercase text-primary mb-1">Agency</div>
            <div class="h5 mb-0 font-weight-bold text-gray-800"><a href="index.php?page=agency">8</a></div>
          </div>
          <div class="col-auto">
            <i class="fa fa-building fa-2x text-gray-300 d-md-none d-lg-block"></i>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="col-xl-2 col-md-4 col-sm-6 mb-4">
    <div class="card border-left-secondary shadow h-100 py-2">
      <div class="card-body">
        <div class="row no-gutters align-items-center">
          <div class="col mr-2">
            <div class="text-xs font-weight-bold text-uppercase text-primary mb-1">Packages</div>
            <div class="h5 mb-0 font-weight-bold text-gray-800"><a href="index.php?page=packages">15</a></div>
          </div>
          <div class="col-auto">
            <i class="fa fa-archive fa-2x text-gray-300 d-md-none d-lg-block"></i>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="col-xl-2 col-md-4 col-sm-6 mb-4">
    <div class="card border-left-info shadow h-100 py-2">
      <div class="card-body">
        <div class="row no-gutters align-items-center">
          <div class="col mr-2">
            <div class="text-xs font-weight-bold text-uppercase text-primary mb-1">Promotion</div>
            <div class="h5 mb-0 font-weight-bold text-gray-800"><a href="index.php?page=promo">24</a></div>
          </div>
          <div class="col-auto">
            <i class="fa fa-thumbs-up fa-2x text-gray-300 d-md-none d-lg-block"></i>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="col-xl-2 col-md-4 col-sm-6 mb-4">
    <div class="card border-left-warning shadow h-100 py-2">
      <div class="card-body">
        <div class="row no-gutters align-items-center">
          <div class="col mr-2">
            <div class="text-xs font-weight-bold text-uppercase text-primary mb-1">Advertisment</div>
            <div class="h5 mb-0 font-weight-bold text-gray-800"><a href="index.php?page=advertisment">8</a></div>
          </div>
          <div class="col-auto">
            <i class="fa fa-bullhorn fa-2x text-gray-300 d-md-none d-lg-block"></i>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="col-xl-2 col-md-4 col-sm-6 mb-4">
    <div class="card border-left-danger shadow h-100 py-2">
      <div class="card-body">
        <div class="row no-gutters align-items-center">
          <div class="col mr-2">
            <div class="text-xs font-weight-bold text-uppercase text-primary mb-1">Follow Up</div>
            <div class="h5 mb-0 font-weight-bold text-gray-800"><a href="index.php?page=follow-up">19</a></div>
          </div>
          <div class="col-auto">
            <i class="fa fa-exclamation fa-2x text-gray-300 d-md-none d-lg-block"></i>
          </div>
        </div>
      </div>
    </div>
  </div>

</div>

<div class="row">
  <div class="col-xl-6">
    <div class="card shadow mb-4">
      <a href="#d1" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="d1">
        <h6 class="m-0 font-weight-bold text-primary text-md">List of Agency with Follow Up Outstanding</h6>
      </a>
      <div class="collapse show" id="d1">
        <div class="card-body">
          <div class="table-responsive text-md">
            <table class="table table-bordered table-sm"  width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>Agency</th>
                  <th>Country</th>
                  <th>Quantity</th>
              </thead>
              <tbody>        
              <tr class="text-danger" data-toggle="modal" data-id="2" data-target="#customerModal" style="cursor: pointer;">
                  <td>EPL Travel & Tours Sdn Bhd</td>
                  <td>Malaysia</td>
                  <td class="text-center">4</td>
                </tr>          
                <tr data-toggle="modal" data-id="1" data-target="#customerModal" style="cursor: pointer;">
                  <td>EPL Travel & Tours Sdn Bhd</td>
                  <td>Singapore</td>
                  <td class="text-center">2</td>
                </tr>
                <tr data-toggle="modal" data-id="2" data-target="#customerModal" style="cursor: pointer;">
                  <td>Smart Umrah4all Dot Com Travel & Services Sdn Bhd</td>
                  <td>Malaysia</td>
                  <td class="text-center">1</td>
                </tr>                              
              </tbody>
            </table>
          </div>
          <span class="small">* Click row to view customer details</span>
        </div>
      </div>
    </div>

    <div class="card shadow mb-4">
      <a href="#d3" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="d3">
        <h6 class="m-0 font-weight-bold text-primary text-md">Active Promo</h6>
      </a>
      <div class="collapse show" id="d3">
        <div class="card-body">
          <div class="table-responsive text-md">
            <table class="table table-bordered table-sm"  width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>Promo Code</th>
                  <th>Promo Description</th>
                  <th>Promo End Date</th>
                  <th>Amount</th>
              </thead>
              <tbody>                
                <tr>
                  <td>UMRAH4ALL</td>
                  <td>Get 40% Discount</td>
                  <td>2020-03-01</td>
                  <td class="text-center">40%</td>
                </tr>
                <tr>
                  <td>SMART10</td>
                  <td>Get RM10 Discount</td>
                  <td>2020-03-01</td>
                  <td class="text-center">RM10</td>
                </tr>
                <tr>
                  <td>SMART15</td>
                  <td>Get 15% Discount</td>
                  <td>2020-03-01</td>
                  <td class="text-center">15%</td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
    
    <div class="card shadow mb-4">
      <a href="#d4" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="d4">
        <h6 class="m-0 font-weight-bold text-primary text-md">Active Advertisment</h6>
      </a>
      <div class="collapse show" id="d4">
        <div class="card-body">
          <div class="table-responsive text-md">
            <table class="table table-bordered table-sm"  width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>Company</th>
                  <th>Advertisment<br>Date To</th>
                  <th>Remarks</th>
                  <th>Price</th>
              </thead>
              <tbody>                
                <tr>
                  <td>EPL Travel & Tours Sdn Bhd</td>
                  <td>2020-03-01</td>
                  <td></td>
                  <td>5,000.00</td>
                </tr>
                <tr>
                  <td>EPL Travel & Tours Sdn Bhd</td>
                  <td>2020-03-01</td>
                  <td></td>
                  <td>5,000.00</td>
                </tr>
                <tr>
                  <td>EPL Travel & Tours Sdn Bhd</td>
                  <td>2020-03-01</td>
                  <td></td>
                  <td>5,000.00</td>
                </tr>
                <tr>
                  <td>Smart Umrah4all Dot Com Travel & Services Sdn Bhd</td>
                  <td>2020-03-01</td>
                  <td></td>
                  <td>5,000.00</td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
    
  </div>
  <div class="col-xl-6">
  <div class="card shadow mb-4">
      <a href="#d2" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="d2">
        <h6 class="m-0 font-weight-bold text-primary text-md">Below 10 Agency of The Month</h6>
      </a>
      <div class="collapse show" id="d2">
        <div class="card-body">
          <div class="table-responsive text-md">
            <table class="table table-bordered table-sm"  width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>Country</th>
                  <th>Agency</th>
                  <th>Customer<br>Qty</th>
                  <th>Rating</th>
              </thead>
              <tbody>
                <tr>
                  <td>Malaysia</td>
                  <td>EPL Travel & Tours Sdn Bhd</td>
                  <td class="text-center">1</td>
                  <td class="text-center">1</td>
                </tr>
                <tr>
                  <td>Malaysia</td>
                  <td>EPL Travel & Tours Sdn Bhd</td>
                  <td class="text-center">1</td>
                  <td class="text-center">1</td>
                </tr>
                <tr>
                  <td>Malaysia</td>
                  <td>EPL Travel & Tours Sdn Bhd</td>
                  <td class="text-center">1</td>
                  <td class="text-center">1</td>
                </tr>
                <tr>
                  <td>Malaysia</td>
                  <td>EPL Travel & Tours Sdn Bhd</td>
                  <td class="text-center">2</td>
                  <td class="text-center">2</td>
                </tr>
                <tr>
                  <td>Malaysia</td>
                  <td>EPL Travel & Tours Sdn Bhd</td>
                  <td class="text-center">2</td>
                  <td class="text-center">2</td>
                </tr>
                <tr>
                  <td>Malaysia</td>
                  <td>EPL Travel & Tours Sdn Bhd</td>
                  <td class="text-center">3</td>
                  <td class="text-center">3</td>
                </tr>
                <tr>
                  <td>Malaysia</td>
                  <td>Smart Umrah4all Dot Com Travel & Services Sdn Bhd</td>
                  <td class="text-center">4</td>
                  <td class="text-center">4</td>
                </tr>   
                <tr>
                  <td>Malaysia</td>
                  <td>Smart Umrah4all Dot Com Travel & Services Sdn Bhd</td>
                  <td class="text-center">4</td>
                  <td class="text-center">4</td>
                </tr> 
                <tr>
                  <td>Malaysia</td>
                  <td>Smart Umrah4all Dot Com Travel & Services Sdn Bhd</td>
                  <td class="text-center">4</td>
                  <td class="text-center">4</td>
                </tr> 
                <tr>
                  <td>Malaysia</td>
                  <td>Smart Umrah4all Dot Com Travel & Services Sdn Bhd</td>
                  <td class="text-center">4</td>
                  <td class="text-center">4</td>
                </tr>             
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
    <div class="card shadow mb-4">
      <a href="#d5" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="d5">
        <h6 class="m-0 font-weight-bold text-primary text-md">Payment Summary</h6>
      </a>
      <div class="collapse show" id="d5">
        <div class="card-body">
          <form class="">
            <div class="form-group row">
              <div class="col-md-6">
                <div class="input-group">
                  <select class="form-control form-control-sm" id="country">
                    <option value="">All</option>
                    <option value="">Malaysia</option>
                    <option value="">Indonesia</option>
                    <option value="">Singapore</option>
                    <option value="">Brunei</option>
                  </select>
                  <div class="input-group-append">
                    <button class="btn btn-outline-primary btn-sm" type="button">
                      <i class="fas fa-filter fa-sm"></i>
                    </button>
                  </div>
                </div>
              </div>
            </div>
          </form>
          <table class="table table-bordered table-sm"  width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>Month</th>
                  <th>Agency</th>
                  <th>Total Payment</th>
              </thead>
              <tbody>                
                <tr>
                  <td rowspan="3">January</td>
                  <td>EPL Travel & Tours Sdn Bhd</td>
                  <td class="text-right">3,000</td>
                </tr>
                <tr>
                  <td>Smart Umrah4all Dot Com Travel & Services Sdn Bhd</td>
                  <td class="text-right">4,000</td>
                </tr>
                <tr>
                  <td>EPL Travel & Tours Sdn Bhd</td>
                  <td class="text-right">5,000</td>
                </tr>
                <tr>
                  <td colspan="2"><strong>Total January</strong></td>
                  <td class="text-right"><strong>12,000</strong></td>
                </tr>
                <tr>
                  <td rowspan="3">February</td>
                  <td>EPL Travel & Tours Sdn Bhd</td>
                  <td class="text-right">3,000</td>
                </tr>
                <tr>
                  <td>Smart Umrah4all Dot Com Travel & Services Sdn Bhd</td>
                  <td class="text-right">4,000</td>
                </tr>
                <tr>
                  <td>EPL Travel & Tours Sdn Bhd</td>
                  <td class="text-right">5,000</td>
                </tr>
                <tr>
                  <td colspan="2"><strong>Total February</strong></td>
                  <td class="text-right"><strong>12,000</strong></td>
                </tr>
                <tr>
                  <td colspan="2"><strong>Grand Total</strong></td>
                  <td class="text-right"><strong>24,000</strong></td>
                </tr>
              </tbody>
            </table>
        </div>
      </div>
    </div>    
  </div>
</div>
