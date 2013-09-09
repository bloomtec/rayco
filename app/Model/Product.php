<?php
App::uses('AppModel', 'Model');
/**
 * Product Model
 *
 * @property Brand $Brand
 * @property ProductImage $ProductImage
 * @property Subcategory $Subcategory
 */
class Product extends AppModel {
	
	/**
	 * Display field
	 *
	 * @var string
	 */
	public $displayField = 'referencia';
	
	/**
	 * Virtual Fields
	 * 
	 * @var array
	 */
	public $virtualFields = array(
		'marca' => 'SELECT `brands`.`nombre` FROM `brands` WHERE `brands`.`id` = Product.brand_id'
	);
	
	/**
	 * Validation rules
	 *
	 * @var array
	 */
	public $validate = array(
		'nombre' => array(
			/*'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Debe ingresar un nombre',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),*/
			'isUnique' => array(
				'rule' => array('isUnique'),
				'message' => 'Este nombre ya esta asignado a otro producto',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'referencia' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Debe ingresar una referencia',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
			'isUnique' => array(
				'rule' => array('isUnique'),
				'message' => 'Esta referencia ya esta asignada a otro producto',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed

	/**
	 * belongsTo associations
	 *
	 * @var array
	 */
	public $belongsTo = array(
		'Brand' => array(
			'className' => 'Brand',
			'foreignKey' => 'brand_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
	
	/**
	 * hasMany associations
	 *
	 * @var array
	 */
	public $hasMany = array(
		'Image' => array(
			'className' => 'Image',
			'foreignKey' => 'foreign_key',
			'dependent' => true,
			'conditions' => array('Image.model_class' => 'Product'),
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		)
	);


	/**
	 * hasAndBelongsToMany associations
	 *
	 * @var array
	 */
	public $hasAndBelongsToMany = array(
		'Subcategory' => array(
			'className' => 'Subcategory',
			'joinTable' => 'products_subcategories',
			'foreignKey' => 'product_id',
			'associationForeignKey' => 'subcategory_id',
			'unique' => 'keepExisting',
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'finderQuery' => '',
			'deleteQuery' => '',
			'insertQuery' => ''
		)
	);


	// TODO: delete this function
	public function afterFind($results, $primary = false) {
		/*
		foreach ($results as $key => $val) {
			if ( isset($val['Product']['image']) && isset($val['Product']['descripcion']) ) {
					$results[$key]['Product']['image'] = 'technics-q-c-750-750-8.jpg';
					$results[$key]['Product']['descripcion'] = "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed sit amet est massa. Pellentesque quis sollicitudin turpis, nec consequat quam. Maecenas ac egestas velit, non viverra justo. Mauris id varius nunc, sed aliquet sapien. Nullam mauris sem, dapibus eget magna quis, faucibus interdum tellus. Phasellus sit amet felis quis nibh tempus blandit. Vivamus quis mauris molestie, suscipit metus at, laoreet nisi. Cras eget leo tempor, cursus leo vel, elementum arcu. Duis at mauris at eros dignissim venenatis eu non dolor. Cras sed felis tristique, tempus neque ac, condimentum elit.

Donec augue justo, faucibus at fermentum sit amet, aliquam sed nulla. Quisque rhoncus congue erat nec mattis. Curabitur tortor tortor, tempor eget risus et, scelerisque tempor purus. Nam in orci risus. Nulla aliquet dui sit amet est laoreet ultrices. Phasellus elit lectus, posuere sit amet auctor quis, scelerisque nec ligula. Nulla sollicitudin nisi at augue iaculis, vitae interdum metus auctor. Interdum et malesuada fames ac ante ipsum primis in faucibus. Morbi sollicitudin convallis ante id consequat.";
					$results[$key]['Product']['precio'] = '100000';
			}
		}*/
		return $results;
	}


}
