<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-md-8">
            <div class="panel panel-default">
                <div class="panel-heading"><h1>Manage Users</h1></div>

                <div class="panel-body">
                    <table class="table table-hover table-bordered">
                      <thead>
                        <tr>
                          <th width="5">No.</th>
                          <th>Name</th>
                          <th>Email</th>
						  <th>Role</th>
						  <th>Created By</th>
						  <th>Times Login</th>
						  <th>Last Login</th>
						  <th>Created at</th>
						  <th>Last update</th>						  
						  <th>Actions</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                          <tr>
                            <td><?php echo e($value->id); ?></td>
                            <td><?php echo e($value->name); ?></td>
                            <td><?php echo e($value->email); ?></td>
							<td><?php echo e($value->role()->first()->name); ?></td>
							<td><?php echo e($value->created_by()->first()->name); ?></td>
							<td><?php echo e($value->times_login); ?></td>
							<td><?php echo e($value->last_login); ?></td>
							<td><?php echo e($value->created_at); ?></td>
							<td><?php echo e($value->updated_at); ?></td>
							<td>
								<div class="action btn btn-warning getUser" data-action="<?php echo e(route('read-user')); ?>" data-id="<?php echo e($value->id); ?>">
								  <i class="material-icons">edit</i>
								</div>
								<div class="action btn btn-danger delete" data-action="<?php echo e(route('delete-user')); ?>" data-id="<?php echo e($value->id); ?>">
								  <i class="material-icons">delete_outline</i>
								</div>																
							</td>
                          </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                      </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Edit User <span id="ajaxName"></span></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
		<form action="<?php echo e(route('update-user')); ?>" method="POST" id="submit">
			<?php echo e(csrf_field()); ?>

			<?php if($errors->has('email')): ?>
			<div class="alert alert-danger">
				<?php echo e($errors->first('email')); ?>

			</div>
			<?php endif; ?>
			<?php if($errors->has('password')): ?>
				<div class="alert alert-danger">
					<?php echo e($errors->first('password')); ?>

				</div>
			<?php endif; ?>		
			<div id="ajaxErrors">
				
			</div>
			<input type="hidden" class="form-control id" name="id" value="<?php echo e(old('uid')); ?>" id="formId" required autofocus>				
			<div class="form-group">
				<label>Name</label>
				<div class="input-group input-group--inline">
					<div class="input-group-addon">
						<i class="material-icons">account_circle</i>
					</div>
					<input type="text" class="form-control name" name="name" value="<?php echo e(old('name')); ?>" id="formName" required autofocus>				
				</div>
			</div>						
			<div class="form-group">
				<label>Email</label>
				<div class="input-group input-group--inline">
					<div class="input-group-addon">
						<i class="material-icons">account_circle</i>
					</div>
					<input type="text" class="form-control email" name="email" value="<?php echo e(old('email')); ?>" id="formEmail" required autofocus>				
				</div>
			</div>
			<div class="form-group">
				<div class="d-flex">
				   <label>User Role</label>
				</div>
				<div class="input-group input-group--inline <?php echo e($errors->has('password') ? ' has-error' : ''); ?>">
				   <div class="input-group-addon">
					  <i class="material-icons">lock_outline</i>
				   </div>
				   <select class="form-control role" name="role" id="formRole" required autofocus>
						<?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<option value="<?php echo e($role->id); ?>"><?php echo e($role->name); ?></option>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					</select>
				</div>
			</div>						
			<div class="container-fluid">
				<input type="submit" class="col-md-5 btn btn-success text-center" value="Update">
				<div class="col-md-2"></div>
				<button type="button" class="col-md-5 col btn btn-warning text-center" data-dismiss="modal">Close</button>
			</div>
		</form>
      </div>
    </div>
  </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>