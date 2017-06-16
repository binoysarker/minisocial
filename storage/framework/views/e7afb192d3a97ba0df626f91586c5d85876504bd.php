<?php $__env->startSection('content'); ?>
	
	<div class="container">
		<div class="row">
			<div class="col-lg-6 col-lg-offset-3 table-bordered ">
				<form method="POST" action="/articles/<?php echo e($article->id); ?>">
					<?php echo e(csrf_field()); ?>

					<?php echo e(method_field('PUT')); ?>

					<input type="hidden" name="user_id" value="<?php echo e(Auth::user()->id); ?> " >
					<legend>Edit Article</legend>
					<fieldset class="form-group">
						<label for="content">Content</label>
						<textarea name="content" id="content" rows="5" class="form-control" ><?php echo e($article->content); ?></textarea>
					</fieldset>
					<fieldset class="form-group">
						<label for="live">Live </label>
						<input type="checkbox"  name="live" id="live" <?php echo e($article->live == 1 ? 'checked' : ''); ?> >
						
					</fieldset>
					<fieldset class="form-group">
						<label for="post_on">Post On</label>
						<input type="datetime-local" name="post_on" class="form-control" value="<?php echo e($article->post_on->format('Y-m-d\TH:i:s')); ?> " placeholder="">
						
						
					</fieldset>
					<fieldset class="form-group">
						<input type="submit" class="btn btn-primary pull-right" name="submit" value="Edit" >
					</fieldset>
				</form>
			</div>
		</div>
	</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>