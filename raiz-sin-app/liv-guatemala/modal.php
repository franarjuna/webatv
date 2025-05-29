<?php foreach ($modals as $key => $modal): ?>
<div id="modal-<?php echo $modal; ?>" class="modal-view">
	<div class="">
		<div class="close-view" data-modal="modal-<?php echo $modal; ?>"><img src="assets/img/close.png" alt=""></div>
		<div class="content-modal">
		</div> 
	</div>	
</div>
<?php endforeach; ?>