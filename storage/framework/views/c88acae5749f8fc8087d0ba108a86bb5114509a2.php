<?php $__env->startSection('content'); ?>
	
	<div class="container">
		<div class="row">
			<div class="col-lg-6 col-lg-offset-3 ">
				<div class="panel panel-default">
				    <dev class="panel-heading ">
				        <h4 class="panel-text clearfix"> Author <?php echo e(Auth::user()->username); ?> </h4>
				        <span class="pull-right">Posted on <?php echo e($article->created_at->diffForHumans()); ?> </span>
				    </dev>
				    <div class="panel-body">
				        <p><?php echo e($article->content); ?> </p>
				        <a href="<?php echo e(url('articles')); ?>/<?php echo e($article->id); ?>/edit " class="btn btn-primary" title="">Edit Post</a>
				    	<a href="" class="btn btn-info pull-right" title=""><i class="fa fa-heart"></i> Like</a>
				    </div> 
				</div>
			</div>
		</div>
	</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>