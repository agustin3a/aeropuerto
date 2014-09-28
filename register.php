<?php 
	include 'include/_header.html';
	include 'layouts/navbar.html';
?>

<div class="container">

<ol class="breadcrumb">
  <li><a class="bluelink" href="/aeropuerto/">Home</a></li>
  <li class="active">Register</li>
</ol>

<h2 class="ch3"> Register </h2>

  <hr />

  <div class="panel panel-default">
    <div class="panel-body">
    <table class="table ">
    <thead>
    <tr>
    <th>Numero</th>
    <th>Fecha</th>
    <th>Origen</th>
    <th>Destino</th>
    <th>Hora</th>
    <th>Status</th>
    <th></th>
    </tr>
    </thead>
    <tbody>
      <tr>
    <td>Jill</td>
    <td>Smith</td> 
    <td>50</td>
    <td>Jill</td>
    <td>Smith</td> 
    <td>50</td>
    <td>
      <button class="btn btn-default" data-toggle="modal" data-target="#myModal">
        Launch demo modal
      </button>
    </td>
  </tr>
  <tr>
    <td>Eve</td>
    <td>Jackson</td> 
    <td>94</td>
    <td>Jill</td>
    <td>Smith</td> 
    <td>50</td>
    <td>
      <button class="btn btn-default" data-toggle="modal" data-target="#myModal">
        Launch demo modal
      </button>
    </td>
  </tr>
  </tbody>
  </table>
<!-- Button trigger modal -->
<button class="btn btn-default btn-lg" data-toggle="modal" data-target="rmodal">
  Launch demo modal
</button>

<!-- Modal -->
<div class="modal fade" id="rmodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel">Register</h4>
      </div>
      <div class="modal-body">
        <form role="form">
  <div class="form-group">
    <label for="exampleInputEmail1">Email address</label>
    <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
  </div>
  <div class="checkbox">
  </div>
 </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>

</div>
</div>
</div>

<?php include 'include/_footer.html' ?>