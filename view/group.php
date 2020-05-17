<?php
  include('view/modal/mgroup.php');
?>

<h1 class="h4 mb-2 text-gray-800">Group Management </h1> 

<hr>

<?php
  $menuList = $conn->query("SELECT menuPath FROM menu ORDER BY mid");
  $result_array = Array();
  while($menu = $menuList->fetch_assoc()) {
      $result_array[] = $menu['menuPath'];
  }
  $menus = json_encode($result_array);
?>

<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary text-md">List of Group <button style="float:right" class="btn btn-sm btn-primary text-xs <?= $create ?>" onclick="addGroup();">Add Group</button></h6> 
  </div>
  <div class="card-body">
    <div class="table-responsive text-md">
      <table class="table table-bordered" id="dt_ListGroup" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th style="width: 55px;">No.</th>
            <th></th>
            <th>Group Name</th>
            <th>Group Access</th>
            <th style="width: 65px;">Action</th>
          </tr>
        </thead>
      </table>
    </div>
  </div>
</div>

