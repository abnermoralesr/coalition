<?php $__env->startSection('content'); ?>
<div class="mdk-drawer-layout js-mdk-drawer-layout" data-fullbleed data-push data-has-scrolling-region>
   <div class="mdk-drawer-layout__content mdk-header-layout__content--scrollable" style="overflow-y: auto;" data-simplebar data-simplebar-force-enabled="true">
      <div class="container h-vh d-flex justify-content-center align-items-center flex-column">
         <div class="d-flex justify-content-center align-items-center mb-3">
            <a href="index.html" class="drawer-brand-circle mr-2">H</a>
            <h2 class="ml-2 text-bg mb-0"><strong>Hero PRO</strong></h2>
         </div>
         <div class="row w-100 justify-content-center">
            <div class="card card-login mb-3">
               <div class="card-body">
                  <form action="<?php echo e(route('login')); ?>" method="POST">
                     <?php echo e(csrf_field()); ?>

                     <?php if($errors->has('email')): ?>
                     <div class="alert alert-danger">
                        <?php echo e($errors->first('email')); ?>

                     </div>
                     <?php endif; ?>														
                     <div class="form-group">
                        <label>Email</label>
                        <div class="input-group input-group--inline">
                           <div class="input-group-addon">
                              <i class="material-icons">account_circle</i>
                           </div>
                           <input type="text" class="form-control" name="email" value="developer@abnermoralesr.com" value="Brian" required autofocus>				
                        </div>
                     </div>
                     <div class="form-group">
                        <div class="d-flex">
                           <label>Password</label>
                           <span class="ml-auto"><a class="btn btn-link" href="<?php echo e(route('password.request')); ?>">Forgot password?</a></span>
                        </div>
                        <div class="input-group input-group--inline <?php echo e($errors->has('password') ? ' has-error' : ''); ?>">
                           <div class="input-group-addon">
                              <i class="material-icons">lock_outline</i>
                           </div>
                           <input type="password" class="form-control" name="password" value="jthm2018">
                           <?php if($errors->has('password')): ?>
                           <span class="help-block">
                           <strong><?php echo e($errors->first('password')); ?></strong>
                           </span>
                           <?php endif; ?>										
                        </div>
                     </div>
                     <div class="text-center">
                        <input type="submit" class="btn btn-primary" value="Login">
                     </div>
                  </form>
               </div>
            </div>
         </div>
         <div class="d-flex justify-content-center">
            <span class="mr-2">Don't have an account?</span>
            <a href="signup.html">Sign Up</a>
         </div>
      </div>
   </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>