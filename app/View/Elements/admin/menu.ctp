<?php 
	function check_menu_active($current_location,$options){
		$condition = false;
		if((in_array($current_location['controller'],$options['controllers'],true)  && in_array($current_location['plugin'],$options['plugins'],'true'))== true){
			$condition = true;
		}
		if($condition == true){
			echo 'in';
		}
	}
	
	if($this->request['plugin'] == ''){
		$plugin = 'default';
	}else{
		$plugin = $this->request['plugin'];
	}
	
	$current_location = array('plugin'=>$plugin,'controller'=>$this->request['controller']);
	
	
	//check_menu_active(array('plugin'=>'default','controller'=>'menus'),array('plugins'=>array('default'),'controllers'=>array('menus')));
	
?>

<div class="col-md-2 left-bar">
	<div class="bar bar-primary bar-top">
		<?php echo $this->Html->link('<i class="fa fa-dashboard"></i> Dashboard',['controller'=>'dashboards','action'=>'index','admin'=>true,'plugin'=>false],['escape'=>false,'class'=>'dashboard-link'])?>
	</div>
	<div class="panel-group" id="accordion-menu">

		<!-- Web Manager -->
		<div class="panel panel-default">
			<div class="panel-heading">
				<h4 class="panel-title">
					<?php echo $this->Html->link('<i class="fa fa-files-o"></i> Page Manager <i class="fa fa-chevron-down pull-right"></i>','#webPageManager',['escape'=>false,'data-toggle'=>"collapse" ,'data-parent'=>"#accordion-menu"]);?>
				</h4>
			</div>
			<div id="webPageManager" class="panel-collapse collapse <?php check_menu_active($current_location,array('plugins'=>array('default'),'controllers'=>array('web_pages')));?>">
				<div class="panel-body panel-body-custom">
					<ul class="left-bar-menu-ul">
						<li>
							<?php echo $this->Html->link('<i class="fa fa-th-list"></i> List All',['controller'=>'web_pages','action'=>'index','admin'=>true,'plugin'=>false],['escape'=>false]);?>
						</li>
						<li>
							<?php echo $this->Html->link('<i class="fa fa-file"></i> New page',['controller'=>'web_pages','action'=>'add','admin'=>true,'plugin'=>false],['escape'=>false]);?>
						</li>
					</ul>
				</div>
			</div>
		</div>

		<!-- Menu manager -->
		<div class="panel panel-default">
			<div class="panel-heading">
				<h4 class="panel-title">
					<?php echo $this->Html->link('<i class="fa fa-anchor"></i> Menu Manager <i class="fa fa-chevron-down pull-right"></i>','#menuManager',['escape'=>false,'data-toggle'=>"collapse" ,'data-parent'=>"#accordion-menu"]);?>
				</h4>
			</div>
			<div id="menuManager" class="panel-collapse collapse <?php check_menu_active($current_location,array('plugins'=>array('default'),'controllers'=>array('menus'))); ?>">
				<div class="panel-body panel-body-custom">
					<ul class="left-bar-menu-ul">
						<li>
							<?php echo $this->Html->link('<i class="fa fa-th-list"></i> List All Menu',['controller'=>'menus','action'=>'index','admin'=>true,'plugin'=>false],['escape'=>false]);?>
						</li>
						<li>
							<?php echo $this->Html->link('<i class="fa fa-link"></i> New Menu',['controller'=>'menus','action'=>'add','admin'=>true,'plugin'=>false],['escape'=>false]);?>
						</li>
					</ul>
				</div>
			</div>
		</div>

		<!-- user manager -->
		<div class="panel panel-default">
			<div class="panel-heading">
				<h4 class="panel-title">
					<?php echo $this->Html->link('<i class="fa fa-users"></i> User Manager <i class="fa fa-chevron-down pull-right"></i>','#userManager',['escape'=>false,'data-toggle'=>"collapse" ,'data-parent'=>"#accordion-menu"]);?>
				</h4>
			</div>
			<div id="userManager" class="panel-collapse collapse <?php check_menu_active($current_location,array('plugins'=>array('default'),'controllers'=>array('users')));//check_menu_active($this->params['controller'],array('users'));?>">
				<div class="panel-body panel-body-custom">
					<ul class="left-bar-menu-ul">
						<li>
							<?php echo $this->Html->link('<i class="fa fa-th-list"></i> List All Users',['controller'=>'users','action'=>'index','admin'=>true,'plugin'=>false],['escape'=>false]);?>
						</li>
						<li>
							<?php echo $this->Html->link('<i class="fa fa-user"></i> New User',['controller'=>'users','action'=>'add','admin'=>true,'plugin'=>false],['escape'=>false]);?>
						</li>
						
						<li>
							<?php echo $this->Html->link('<i class="fa fa-flag"></i> Roles',['controller'=>'roles','action'=>'index','admin'=>true,'plugin'=>false],['escape'=>false]);?>
						</li>
					</ul>
				</div>
			</div>
		</div>
		
		
		<!-- Shop manager -->
		<div class="panel panel-default">
			<div class="panel-heading">
				<h4 class="panel-title">
					<?php echo $this->Html->link('<i class="fa fa-shopping-cart"></i> Shop Manager <i class="fa fa-chevron-down pull-right"></i>','#shopManager',['escape'=>false,'data-toggle'=>"collapse" ,'data-parent'=>"#accordion-menu"]);?>
				</h4>
			</div>
			<div id="shopManager" class="panel-collapse collapse <?php check_menu_active($current_location,array('plugins'=>array('ecommerce'),'controllers'=>array('brands','categories','products','types','attributes','attribute_values','attribute_labels')));?>">
				<div class="panel-body panel-body-custom">
					<ul class="left-bar-menu-ul">
						<li>
							<?php echo $this->Html->link('<i class="fa fa-glass"></i> Products',['controller'=>'products','action'=>'index','admin'=>true,'plugin'=>'ecommerce'],['escape'=>false]);?>
						</li>
					
						<li>
							<?php echo $this->Html->link('<i class="fa fa-tree"></i> Brands',['controller'=>'brands','action'=>'index','admin'=>true,'plugin'=>'ecommerce'],['escape'=>false]);?>
						</li>
						
						<li>
							<?php echo $this->Html->link('<i class="fa fa-filter"></i> Categories',['controller'=>'categories','action'=>'index','admin'=>true,'plugin'=>'ecommerce'],['escape'=>false]);?>
						</li>
						
						<li>
							<div class="panel-group" id="accordion-menu-shop">
								<h4 class="panel-title">
									<?php echo $this->Html->link('<i class="fa fa-cogs"></i> Configurations <i class="fa fa-chevron-down pull-right"></i>','#webShopConfiguration',['escape'=>false,'data-toggle'=>"collapse" ,'data-parent'=>"#accordion-menu-shop"]);?>
								</h4>
								<div id="webShopConfiguration" class="panel-collapse collapse <?php check_menu_active($current_location,array('plugins'=>array('ecommerce'),'controllers'=>array('types','attribute_labels')));?>">
									<ul class="left-bar-menu-ul">
										<li>
											<?php echo $this->Html->link('<i class="fa fa-tags"></i> Type configuration',['controller'=>'types','action'=>'index','admin'=>true,'plugin'=>'ecommerce'],['escape'=>false]);?>
										</li>
										<li>
											<?php echo $this->Html->link('<i class="fa fa-tag"></i> Attribute Labels',['controller'=>'attribute_labels','action'=>'index','admin'=>true,'plugin'=>'ecommerce'],['escape'=>false]);?>
										</li>
									</ul>
								</div>
							</div>
						</li>
					</ul>
				</div>
			</div>
		</div>
		
		<!-- orders manager -->
		<div class="panel panel-default">
			<div class="panel-heading">
				<h4 class="panel-title">
					<?php echo $this->Html->link('<i class="fa fa-share-alt"></i> Orders Manager <i class="fa fa-chevron-down pull-right"></i>','#OrderManager',['escape'=>false,'data-toggle'=>"collapse" ,'data-parent'=>"#accordion-menu"]);?>
				</h4>
			</div>
			<div id="OrderManager" class="panel-collapse collapse <?php check_menu_active($current_location,array('plugins'=>array('ecommerce'),'controllers'=>array('product_orders')));?>">
				<div class="panel-body panel-body-custom">
					<ul class="left-bar-menu-ul">
						<li>
							<?php echo $this->Html->link('<i class="fa fa-th-list"></i> Orders',['controller'=>'product_orders','action'=>'index','admin'=>true,'plugin'=>'ecommerce'],['escape'=>false]);?>
						</li>
						
					</ul>
				</div>
			</div>
		</div>
		
		
		
		<!-- Blog manager -->
		<div class="panel panel-default">
			<div class="panel-heading">
				<h4 class="panel-title">
					<?php echo $this->Html->link('<i class="fa fa-share-alt"></i> Blog Manager <i class="fa fa-chevron-down pull-right"></i>','#blogManager',['escape'=>false,'data-toggle'=>"collapse" ,'data-parent'=>"#accordion-menu"]);?>
				</h4>
			</div>
			<div id="blogManager" class="panel-collapse collapse <?php check_menu_active($current_location,array('plugins'=>array('blog'),'controllers'=>array('categories','posts')));?>">
				<div class="panel-body panel-body-custom">
					<ul class="left-bar-menu-ul">
						<li>
							<?php echo $this->Html->link('<i class="fa fa-th-list"></i> Categories',['controller'=>'categories','action'=>'index','admin'=>true,'plugin'=>'blog'],['escape'=>false]);?>
						</li>
						<li>
							<?php echo $this->Html->link('<i class="fa fa-share"></i> Posts',['controller'=>'posts','action'=>'index','admin'=>true,'plugin'=>'blog'],['escape'=>false]);?>
						</li>
					</ul>
				</div>
			</div>
		</div>
		
		
		

		<!-- config manager -->
		<div class="panel panel-default">
			<div class="panel-heading">
				<h4 class="panel-title">
					<?php echo $this->Html->link('<i class="fa fa-wrench"></i> Core Manager <i class="fa fa-chevron-down pull-right"></i>','#systemManager',['escape'=>false,'data-toggle'=>"collapse" ,'data-parent'=>"#accordion-menu"]);?>
				</h4>
			</div>
			<div id="systemManager" class="panel-collapse collapse <?php check_menu_active($current_location,array('plugins'=>array('default'),'controllers'=>array('system_settings','site_settings')));?>">
				<div class="panel-body panel-body-custom">
					<ul class="left-bar-menu-ul">
						<li>
							<?php echo $this->Html->link('<i class="fa fa-asterisk"></i> System Settings',['controller'=>'system_settings','action'=>'index','admin'=>true,'plugin'=> false],['escape'=>false]);?>
						</li>
						<li>
							<?php echo $this->Html->link('<i class="fa fa-cog"></i> Site Settings',['controller'=>'site_settings','action'=>'index','admin'=>true,'plugin'=> false],['escape'=>false]);?>
						</li>
						
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>
