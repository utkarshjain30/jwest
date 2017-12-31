<?php
/*
 * Copyright (c) 2003-2011, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see LICENSE.html or http://ckeditor.com/license
 */

/*! \mainpage CKEditor - PHP server side intergation
 * \section intro_sec CKEditor
 * Visit <a href="http://ckeditor.com">CKEditor web site</a> to find more information about the editor.
 * \section install_sec Installation
 * \subsection step1 Include ckeditor.php in your PHP web site.
 * @code
 * <?php
 * include("ckeditor/ckeditor.php");
 * ?>
 * @endcode
 * \subsection step2 Create CKEditor class instance and use one of available methods to insert CKEditor.
 * @code
 * <?php
 * $CKEditor = new CKEditor();
 * echo $CKEditor->textarea("field1", "<p>Initial value.</p>");
 * ?>
 * @endcode
 */
if ( !function_exists('version_compare') || version_compare( phpversion(), '5', '<' ) )
	include_once( 'ckeditor_php4.php' ) ;
else
	include_once( 'ckeditor_php5.php' ) ;

CKEDITOR.replace( 'editor1',
{
	filebrowserBrowseUrl 	  : '/ckfinder/ckfinder.html',
	filebrowserImageBrowseUrl : '/ckfinder/ckfinder.html?type=Images',
	filebrowserFlashBrowseUrl : '/ckfinder/ckfinder.html?type=Flash',
	filebrowserUploadUrl 	  : '/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files&currentFolder=/archive/',
	filebrowserImageUploadUrl : '/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images&currentFolder=/cars/',
	filebrowserFlashUploadUrl : '/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'
} 
 );
 
 $ckeditor = new CKEditor();
 $ckeditor->basePath = '/ckeditor/';
 $ckeditor->config['filebrowserBrowseUrl'] = '/ckfinder/ckfinder.html';
 $ckeditor->config['filebrowserImageBrowseUrl'] = '/ckfinder/ckfinder.html?type=Images';
 $ckeditor->config['filebrowserFlashBrowseUrl'] = '/ckfinder/ckfinder.html?type=Flash';
 $ckeditor->config['filebrowserUploadUrl'] = '/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files';
 $ckeditor->config['filebrowserImageUploadUrl'] = '/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images';
 $ckeditor->config['filebrowserFlashUploadUrl'] = '/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash';
 $ckeditor->editor('CKEditor1');