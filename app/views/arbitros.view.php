<?php require __DIR__.'/partials/cabecera.view.part.php' ?>
     <div class="main">
      <div class="shop_top">
		<div class="container">
			<div class="row ex_box">
				<h3 class="m_2">Arbitros de la Competición</h3>
                <?php foreach ($arbitros as $arbitro):?>
                <div class="col-md-4 team1" style="margin-top: 20px;">
                    <div class="img_section magnifier2">
                        <a class="fancybox" href="../../images/e1.jpg" data-fancybox-group="gallery" title="<?= $arbitro->getNombreCompleto()?>"><img src="../../images/e1.jpg" class="img-responsive" alt=""><span> </span>
                            <div class="img_section_txt">
                                <?= $arbitro->getNombreCompleto()?>
                            </div>
                        </a></div>
                </div>

				<?php endforeach; ?>
		    </div>

		 </div>
	   </div>
	  </div>
<?php require __DIR__.'/partials/footer.view.part.php' ?>