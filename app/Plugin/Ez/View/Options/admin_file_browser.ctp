<div id="fileBrowser">
	<div class="folders">
	 <?php // debug($path[0]);?>
	</div>
	<ul class="container">
	 	<?php foreach($folder[1] as $fileName):
			$fileParts=(pathinfo($fileName));
			if(isset($fileParts["extension"])){
			switch($fileParts["extension"]){
				case "gif":
				case "jpg":
				case "png":
				case "ico":
				case "GIF":
				case "JPG":
				case "PMG":
				case "ICO":
				case "JPEG":
				case "jpeg":
				?>
				<li> 
	 				<?php echo $this -> Html->image($folderPath."/".$fileName,array("class"=>"preview"));?>
	 				<div class="info">
						<h2> <?php echo $fileName ?></h2>
						<div class="actions">
							<div class="delete"  rel="<?php echo $folderPath."/".$fileName?>">borrar</div>
							<div class="seleccionar"  rel="<?php echo $folderPath."/".$fileName?>">seleccionar</div>
						</div>
					</div>
				</li>
				<?php	
				//--------------				
				break;
				case "docx":
				case "doc":
				?>
				<li rel=<?php echo "/".$folderPath."/".$fileName?>> 
	 				<?php echo $this -> Html->image("word.png",array("class"=>"preview"));?>
	 				<div class="info">
						<h2> <?php echo $fileName ?></h2>
					</div>
				</li>
				<?php					
				break;
				//-------------
				case "xls":
				case "xlsx":
				?>
				<li rel=<?php echo $folderPath."/".$fileName?>> 
	 				<?php echo $this -> Html->image("excel.png",array("class"=>"preview"));?>
	 			</li>
				<?php
				break;
				//-----------
				case "ppt":
				case "pptx":
				?>
				<li rel=<?php echo $folderPath."/".$fileName?>> 
	 				<?php echo $this -> Html->image("power-point.png",array("class"=>"preview"));?>
	 			</li>
				<?php
				break;
				//-------------
				case "swf":
				?>
				<li rel=<?php echo $folderPath."/".$fileName?>> 
	 				<?php echo $this -> Html->image($folderPath."/".$fileName,array("class"=>"preview"));?>
	 				<div class="info">
						<h2> <?php echo $fileName ?></h2>
						<div class="actions">
							<div class="delete"  rel="<?php echo $folderPath."/".$fileName?>">borrar</div>
							<div class="seleccionar"  rel="<?php echo $folderPath."/".$fileName?>">seleccionar</div>
						</div>
					</div>
	 			</li>
				<?php
				break;
				//-------------
			}
			}
	 	 endforeach;?>
	</ul>
<div style="clear:both;"></div>
</div>