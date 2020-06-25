<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>
<?= $this->include('layouts/navbar') ?>
    <div class="container mt-5">
		<div class="row">
			<div class="col-2"></div>
			<div class="col-8">
				<div class="text-right">
					<a href="" class="btn btn-warning btn-sm text-white font-weight-bolder" data-toggle="modal" data-target="#createPizza">
						<i class="material-icons float-left" data-toggle="tooltip" title="Add Pizza!" data-placement="left">add</i>&nbsp;Add
					</a>
				</div>
				<hr>
				<table class="table table-borderless table-hover">
					<tr>
						<th>Name</th>
						<th>Ingredients</th>
						<th>Price</th>
						<th></th>
					</tr>
					<tr>
						<td class="pizzaName">Jack Pizza</td>
						<td>Tomatoes, ham, cheese, peperoni</td>
						<td class="text-success font-weight-bolder">15$</td>
						<td>
							<a href="" data-toggle="modal" data-target="#updatePizza"><i class="material-icons text-info" data-toggle="tooltip" title="Edit Pizza!" data-placement="left">edit</i></a>
							<a href="" data-toggle="tooltip" title="Delete Pizza!" data-placement="right"><i class="material-icons text-danger">delete</i></a>
						</td>
					</tr>
					<tr>
						<td class="pizzaName">Seiha Pizza</td>
						<td>Tomatoes, ham, cheese, peperoni</td>
						<td  class="text-success font-weight-bolder">1.5$</td>
						<td>
							<a href="" data-toggle="modal" data-target="#updatePizza"><i class="material-icons text-info" data-toggle="tooltip" title="Edit Pizza!" data-placement="left">edit</i></a>
							<a href="" data-toggle="tooltip" title="Delete Pizza!" data-placement="right"><i class="material-icons text-danger">delete</i></a>
						</td>
					</tr>
					<tr>
						<td class="pizzaName">Rady Pizza</td>
						<td>Tomatoes, ham, cheese, peperoni</td>
						<td  class="text-success font-weight-bolder">1500$</td>
						<td>
							<a href="" data-toggle="modal" data-target="#updatePizza"><i class="material-icons text-info" data-toggle="tooltip" title="Edit Pizza!" data-placement="left">edit</i></a>
							<a href="" data-toggle="tooltip" title="Delete Pizza!" data-placement="right"><i class="material-icons text-danger">delete</i></a>
						</td>
					</tr>
					<tr>
						<td class="pizzaName">Ronan Pizza</td>
						<td>Tomatoes, ham, cheese, peperoni</td>
						<td  class="text-success font-weight-bolder">1$</td>
						<td>
							<a href="" data-toggle="modal" data-target="#updatePizza"><i class="material-icons text-info" data-toggle="tooltip" title="Edit Pizza!" data-placement="left">edit</i></a>
							<a href="" data-toggle="tooltip" title="Delete Pizza!" data-placement="right"><i class="material-icons text-danger">delete</i></a>
						</td>
					</tr>
				</table>
			</div>
			<div class="col-2"></div>
		</div>
	</div>


<!-- ========================================START Model CREATE================================================ -->
	<!-- The Modal -->
	<div class="modal fade" id="createPizza">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Create Pizza</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body text-right">
			<form  action="/" method="post">
				<div class="form-group">
					<input type="text" class="form-control" placeholder="Pizza name">
				</div>
				<div class="form-group">
					<input type="number" class="form-control" placeholder="Prize in dollars">
				</div>
				<div class="form-group">
					<textarea name="" placeholder="Ingredients" class="form-control"></textarea>
				</div>
			<a data-dismiss="modal" class="closeModal">DISCARD</a>
		 	 &nbsp;
		  <input type="submit" value="CREATE" class="createBtn text-warning">
        </div>
        </form>
      </div>
    </div>
  </div>
  <!-- =================================END MODEL CREATE==================================================== -->

  <!-- ========================================START Model UPDATE================================================ -->
	<!-- The Modal -->
	<div class="modal fade" id="updatePizza">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Edit Pizza</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body text-right">
			<form  action="/" method="post">
				<div class="form-group">
					<input type="text" class="form-control" value="Rady Pizza">
				</div>
				<div class="form-group">
					<input type="number" class="form-control" value="100">
				</div>
				<div class="form-group">
					<textarea name=""  class="form-control">Cheese, Tomatoes, Chicken, Salad</textarea>
				</div>
			<a data-dismiss="modal" class="closeModal">DISCARD</a>
		 	 &nbsp;
		  <input type="submit" value="UPDATE" class="createBtn text-warning">
        </div>
        </form>
      </div>
    </div>
  </div>
  <!-- =================================END MODEL UPDATE==================================================== -->
<?= $this->endSection() ?>
