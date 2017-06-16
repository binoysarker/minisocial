<?php $__env->startSection('content'); ?>
	
	<div class="container">
		<div class="row">
			<div class="col-lg-6 col-lg-offset-3 ">
				<?php $__empty_1 = true; $__currentLoopData = $articles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $article): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
					<div class="panel panel-default">
					    <dev class="panel-heading ">
					        <h4 class="panel-text clearfix"> Author <?php echo e(Auth::user()->name); ?> </h4>
					        <span class="pull-right">Posted on <?php echo e($article->created_at->diffForHumans()); ?> </span>
					    </dev>
					    <div class="panel-body">
					        <p><?php echo e($article->shortContent); ?> </p>
					        <a href="<?php echo e(url('articles')); ?>/<?php echo e($article->id); ?> " class="btn btn-primary" title="">Read More</a>
					        
					        <?php if($article->user_id == Auth::user()->id): ?>
					        	<form action="/articles/<?php echo e($article->id); ?> " method="POST" onsubmit="submitForm()">
									<?php echo e(csrf_field()); ?>

									<?php echo e(method_field('DELETE')); ?>

					        		
					        		<button type="submit" class="btn btn-danger pull-right">Delete</button>
					        	</form>
					        <?php endif; ?>
					    	<a href="" class="btn btn-info pull-right" title=""><i class="fa fa-heart"></i> Like</a>
					    </div> 
					    
					</div>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
				No Articles to show
				<?php endif; ?>	

				<div class="pagination">
					<li><?php echo e($articles->links()); ?> </li>
				</div>

			</div>
		</div>
	</div>

	<script> 
	$(document).ready(function() {
	    $('form input[type=submit]').click(function() {
	        return confirm('Are you sure to delete?');
	    });
	});
	</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>