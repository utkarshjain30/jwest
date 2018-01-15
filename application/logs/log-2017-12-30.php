<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 30-Dec-2017 14:41:55 --> Severity: Notice --> Undefined index: head_image /var/www/html/jwest/application/controllers/admin/Pages.php 45
ERROR - 30-Dec-2017 14:42:42 --> Severity: Notice --> Undefined index: head_image /var/www/html/jwest/application/controllers/admin/Pages.php 87
ERROR - 30-Dec-2017 14:42:46 --> 404 Page Not Found: Terms_and_conditions/index
ERROR - 30-Dec-2017 14:42:52 --> 404 Page Not Found: Policy/index
ERROR - 30-Dec-2017 15:14:24 --> 404 Page Not Found: admin/Categories/index
ERROR - 30-Dec-2017 15:39:12 --> 404 Page Not Found: admin/Categories/index
ERROR - 30-Dec-2017 16:49:38 --> Severity: Notice --> Undefined variable: speciality /var/www/html/jwest/application/views/admin/categories.php 50
ERROR - 30-Dec-2017 16:50:38 --> Severity: Notice --> Undefined variable: categories /var/www/html/jwest/application/views/admin/categories.php 50
ERROR - 30-Dec-2017 16:52:05 --> Severity: Warning --> Missing argument 2 for Helper_model::get_by_id(), called in /var/www/html/jwest/application/controllers/admin/Categories.php on line 20 and defined /var/www/html/jwest/application/models/Helper_model.php 305
ERROR - 30-Dec-2017 16:52:05 --> Severity: Warning --> Missing argument 3 for Helper_model::get_by_id(), called in /var/www/html/jwest/application/controllers/admin/Categories.php on line 20 and defined /var/www/html/jwest/application/models/Helper_model.php 305
ERROR - 30-Dec-2017 16:52:05 --> Severity: Notice --> Undefined variable: value /var/www/html/jwest/application/models/Helper_model.php 313
ERROR - 30-Dec-2017 16:52:05 --> Severity: Notice --> Undefined variable: col /var/www/html/jwest/application/models/Helper_model.php 313
ERROR - 30-Dec-2017 16:52:05 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'IS NULL' at line 3 - Invalid query: SELECT *
FROM `categories`
WHERE  IS NULL
ERROR - 30-Dec-2017 16:52:10 --> Query error: Unknown column 'status' in 'where clause' - Invalid query: SELECT *
FROM `categories`
WHERE `status` = 1
ERROR - 30-Dec-2017 17:22:34 --> 404 Page Not Found: admin/Specility/add
ERROR - 30-Dec-2017 17:23:50 --> Severity: Notice --> Undefined property: stdClass::$name /var/www/html/jwest/application/views/admin/categories.php 68
ERROR - 30-Dec-2017 17:23:50 --> Severity: Notice --> Undefined property: stdClass::$description /var/www/html/jwest/application/views/admin/categories.php 69
ERROR - 30-Dec-2017 17:44:25 --> 404 Page Not Found: admin/Specility/edit
ERROR - 30-Dec-2017 17:48:45 --> Severity: Notice --> Undefined variable: category /var/www/html/jwest/application/views/admin/ajax/edit_category.php 1
ERROR - 30-Dec-2017 17:48:45 --> Severity: Notice --> Trying to get property of non-object /var/www/html/jwest/application/views/admin/ajax/edit_category.php 1
ERROR - 30-Dec-2017 17:48:45 --> Severity: Notice --> Undefined property: stdClass::$name /var/www/html/jwest/application/views/admin/ajax/edit_category.php 5
ERROR - 30-Dec-2017 17:48:45 --> Severity: Notice --> Undefined variable: categories /var/www/html/jwest/application/views/admin/ajax/edit_category.php 6
ERROR - 30-Dec-2017 17:48:45 --> Severity: Notice --> Trying to get property of non-object /var/www/html/jwest/application/views/admin/ajax/edit_category.php 6
ERROR - 30-Dec-2017 17:48:45 --> Severity: Notice --> Undefined property: stdClass::$email /var/www/html/jwest/application/views/admin/ajax/edit_category.php 11
ERROR - 30-Dec-2017 17:49:36 --> Severity: Notice --> Undefined variable: category /var/www/html/jwest/application/views/admin/ajax/edit_category.php 1
ERROR - 30-Dec-2017 17:49:36 --> Severity: Notice --> Trying to get property of non-object /var/www/html/jwest/application/views/admin/ajax/edit_category.php 1
ERROR - 30-Dec-2017 17:49:36 --> Severity: Notice --> Undefined variable: admin /var/www/html/jwest/application/views/admin/ajax/edit_category.php 5
ERROR - 30-Dec-2017 17:49:36 --> Severity: Notice --> Trying to get property of non-object /var/www/html/jwest/application/views/admin/ajax/edit_category.php 5
ERROR - 30-Dec-2017 17:49:36 --> Severity: Notice --> Undefined variable: admin /var/www/html/jwest/application/views/admin/ajax/edit_category.php 11
ERROR - 30-Dec-2017 17:49:36 --> Severity: Notice --> Trying to get property of non-object /var/www/html/jwest/application/views/admin/ajax/edit_category.php 11
ERROR - 30-Dec-2017 17:50:29 --> Severity: Notice --> Undefined variable: admin /var/www/html/jwest/application/views/admin/ajax/edit_category.php 5
ERROR - 30-Dec-2017 17:50:29 --> Severity: Notice --> Trying to get property of non-object /var/www/html/jwest/application/views/admin/ajax/edit_category.php 5
ERROR - 30-Dec-2017 17:50:29 --> Severity: Notice --> Undefined variable: admin /var/www/html/jwest/application/views/admin/ajax/edit_category.php 11
ERROR - 30-Dec-2017 17:50:29 --> Severity: Notice --> Trying to get property of non-object /var/www/html/jwest/application/views/admin/ajax/edit_category.php 11
ERROR - 30-Dec-2017 18:03:33 --> Severity: Notice --> Undefined index: password /var/www/html/jwest/application/controllers/admin/Categories.php 82
ERROR - 30-Dec-2017 18:03:33 --> Severity: Notice --> Undefined index: password /var/www/html/jwest/application/controllers/admin/Categories.php 87
ERROR - 30-Dec-2017 18:03:33 --> Query error: Unknown column 'category_name' in 'field list' - Invalid query: UPDATE `admin` SET `category_name` = 'KURTAaa', `id` = '1', `category_description` = 'All types of kurtassss', `category_code` = 'KURTA-0011', `parent_category` = '0'
WHERE `id` = '1'
ERROR - 30-Dec-2017 18:47:42 --> Severity: 4096 --> Object of class CI_DB_mysqli_result could not be converted to string /var/www/html/jwest/application/models/Helper_model.php 315
ERROR - 30-Dec-2017 18:58:21 --> Severity: Warning --> Invalid argument supplied for foreach() /var/www/html/jwest/application/views/admin/categories.php 80
ERROR - 30-Dec-2017 18:59:39 --> Severity: Parsing Error --> syntax error, unexpected 'endif' (T_ENDIF) /var/www/html/jwest/application/views/admin/categories.php 92
ERROR - 30-Dec-2017 19:17:57 --> 404 Page Not Found: Static/admin
ERROR - 30-Dec-2017 19:17:57 --> 404 Page Not Found: Static/admin
ERROR - 30-Dec-2017 19:23:47 --> Query error: Unknown column 'status' in 'field list' - Invalid query: UPDATE `categories` SET `status` = 0
WHERE `id` = '3'
ERROR - 30-Dec-2017 19:26:01 --> Severity: Error --> Call to undefined method Helper_model::delete() /var/www/html/jwest/application/controllers/admin/Categories.php 48
ERROR - 30-Dec-2017 20:15:01 --> Severity: Warning --> Invalid argument supplied for foreach() /var/www/html/jwest/application/models/Helper_model.php 309
ERROR - 30-Dec-2017 20:15:17 --> 404 Page Not Found: Static/admin
ERROR - 30-Dec-2017 20:15:17 --> 404 Page Not Found: Static/admin
ERROR - 30-Dec-2017 20:16:55 --> 404 Page Not Found: Static/admin
ERROR - 30-Dec-2017 20:16:55 --> 404 Page Not Found: Static/admin
ERROR - 30-Dec-2017 20:18:33 --> 404 Page Not Found: Static/admin
ERROR - 30-Dec-2017 20:18:33 --> 404 Page Not Found: Static/admin
ERROR - 30-Dec-2017 20:19:44 --> Severity: Notice --> Use of undefined constant ASC - assumed 'ASC' /var/www/html/jwest/application/controllers/admin/Categories.php 18
ERROR - 30-Dec-2017 20:19:45 --> 404 Page Not Found: Static/admin
ERROR - 30-Dec-2017 20:19:45 --> 404 Page Not Found: Static/admin
ERROR - 30-Dec-2017 20:20:18 --> 404 Page Not Found: Static/admin
ERROR - 30-Dec-2017 20:20:18 --> 404 Page Not Found: Static/admin
ERROR - 30-Dec-2017 21:31:58 --> Severity: Notice --> Undefined variable: categories /var/www/html/jwest/application/views/admin/menu.php 36
ERROR - 30-Dec-2017 21:31:58 --> Severity: Warning --> Invalid argument supplied for foreach() /var/www/html/jwest/application/views/admin/menu.php 36
ERROR - 30-Dec-2017 21:32:05 --> 404 Page Not Found: Static/admin
ERROR - 30-Dec-2017 21:32:05 --> 404 Page Not Found: Static/admin
ERROR - 30-Dec-2017 21:32:17 --> Severity: Notice --> Undefined variable: categories /var/www/html/jwest/application/views/admin/menu.php 36
ERROR - 30-Dec-2017 21:32:17 --> Severity: Warning --> Invalid argument supplied for foreach() /var/www/html/jwest/application/views/admin/menu.php 36
ERROR - 30-Dec-2017 21:32:18 --> 404 Page Not Found: Static/admin
ERROR - 30-Dec-2017 21:32:18 --> 404 Page Not Found: Static/admin
ERROR - 30-Dec-2017 21:34:32 --> 404 Page Not Found: Static/admin
ERROR - 30-Dec-2017 21:34:32 --> 404 Page Not Found: Static/admin
ERROR - 30-Dec-2017 21:56:26 --> Query error: Table 'jwest.menu' doesn't exist - Invalid query: INSERT INTO `menu` (`menu_name`, `menu_order`, `parent_menu`) VALUES ('HOME', '1', '0')
ERROR - 30-Dec-2017 21:56:46 --> Query error: Table 'jwest.menu' doesn't exist - Invalid query: INSERT INTO `menu` (`menu_name`, `menu_order`, `parent_menu`) VALUES ('HOME', '1', '0')
ERROR - 30-Dec-2017 21:56:56 --> Query error: Table 'jwest.menu' doesn't exist - Invalid query: INSERT INTO `menu` (`menu_name`, `menu_order`, `parent_menu`) VALUES ('HOME', '1', '0')
ERROR - 30-Dec-2017 22:49:52 --> Severity: Notice --> Undefined property: stdClass::$name /var/www/html/jwest/application/views/admin/ajax/edit_menu.php 1
ERROR - 30-Dec-2017 22:49:52 --> Severity: Notice --> Undefined property: stdClass::$name /var/www/html/jwest/application/views/admin/ajax/edit_menu.php 5
ERROR - 30-Dec-2017 22:54:27 --> Severity: Notice --> Undefined property: stdClass::$name /var/www/html/jwest/application/views/admin/ajax/edit_menu.php 1
ERROR - 30-Dec-2017 22:57:43 --> Severity: Notice --> Undefined variable: menu /var/www/html/jwest/application/views/admin/ajax/edit_menu.php 18
ERROR - 30-Dec-2017 22:57:43 --> Severity: Notice --> Trying to get property of non-object /var/www/html/jwest/application/views/admin/ajax/edit_menu.php 18
ERROR - 30-Dec-2017 22:57:43 --> Severity: Notice --> Undefined variable: menu /var/www/html/jwest/application/views/admin/ajax/edit_menu.php 18
ERROR - 30-Dec-2017 22:57:43 --> Severity: Notice --> Trying to get property of non-object /var/www/html/jwest/application/views/admin/ajax/edit_menu.php 18
ERROR - 30-Dec-2017 22:57:43 --> Severity: Notice --> Undefined variable: menu /var/www/html/jwest/application/views/admin/ajax/edit_menu.php 18
ERROR - 30-Dec-2017 22:57:43 --> Severity: Notice --> Trying to get property of non-object /var/www/html/jwest/application/views/admin/ajax/edit_menu.php 18
ERROR - 30-Dec-2017 22:57:43 --> Severity: Notice --> Undefined variable: menu /var/www/html/jwest/application/views/admin/ajax/edit_menu.php 18
ERROR - 30-Dec-2017 22:57:43 --> Severity: Notice --> Trying to get property of non-object /var/www/html/jwest/application/views/admin/ajax/edit_menu.php 18
ERROR - 30-Dec-2017 22:57:43 --> Severity: Notice --> Undefined variable: menu /var/www/html/jwest/application/views/admin/ajax/edit_menu.php 18
ERROR - 30-Dec-2017 22:57:43 --> Severity: Notice --> Trying to get property of non-object /var/www/html/jwest/application/views/admin/ajax/edit_menu.php 18
ERROR - 30-Dec-2017 22:57:43 --> Severity: Notice --> Undefined variable: menu /var/www/html/jwest/application/views/admin/ajax/edit_menu.php 18
ERROR - 30-Dec-2017 22:57:43 --> Severity: Notice --> Trying to get property of non-object /var/www/html/jwest/application/views/admin/ajax/edit_menu.php 18
ERROR - 30-Dec-2017 22:57:43 --> Severity: Notice --> Undefined variable: menu /var/www/html/jwest/application/views/admin/ajax/edit_menu.php 18
ERROR - 30-Dec-2017 22:57:43 --> Severity: Notice --> Trying to get property of non-object /var/www/html/jwest/application/views/admin/ajax/edit_menu.php 18
ERROR - 30-Dec-2017 22:57:43 --> Severity: Notice --> Undefined variable: menu /var/www/html/jwest/application/views/admin/ajax/edit_menu.php 18
ERROR - 30-Dec-2017 22:57:43 --> Severity: Notice --> Trying to get property of non-object /var/www/html/jwest/application/views/admin/ajax/edit_menu.php 18
ERROR - 30-Dec-2017 22:57:43 --> Severity: Notice --> Undefined variable: menu /var/www/html/jwest/application/views/admin/ajax/edit_menu.php 18
ERROR - 30-Dec-2017 22:57:43 --> Severity: Notice --> Trying to get property of non-object /var/www/html/jwest/application/views/admin/ajax/edit_menu.php 18
ERROR - 30-Dec-2017 22:57:43 --> Severity: Notice --> Undefined variable: menu /var/www/html/jwest/application/views/admin/ajax/edit_menu.php 18
ERROR - 30-Dec-2017 22:57:43 --> Severity: Notice --> Trying to get property of non-object /var/www/html/jwest/application/views/admin/ajax/edit_menu.php 18
ERROR - 30-Dec-2017 22:57:48 --> 404 Page Not Found: Static/admin
ERROR - 30-Dec-2017 22:57:48 --> 404 Page Not Found: Static/admin
ERROR - 30-Dec-2017 22:58:19 --> 404 Page Not Found: Static/admin
ERROR - 30-Dec-2017 22:58:19 --> 404 Page Not Found: Static/admin
ERROR - 30-Dec-2017 22:59:03 --> 404 Page Not Found: Static/admin
ERROR - 30-Dec-2017 22:59:03 --> 404 Page Not Found: Static/admin
ERROR - 30-Dec-2017 22:59:29 --> 404 Page Not Found: Static/admin
ERROR - 30-Dec-2017 22:59:29 --> 404 Page Not Found: Static/admin
ERROR - 30-Dec-2017 23:05:08 --> Query error: Unknown column 'name' in 'field list' - Invalid query: UPDATE `categories` SET `name` = 'Contact us', `id` = '8', `menu_link` = 'contact-us', `menu_order` = '7', `parent_menu` = '0'
WHERE `id` = '8'
ERROR - 30-Dec-2017 23:06:44 --> Query error: Unknown column 'name' in 'field list' - Invalid query: UPDATE `menus` SET `name` = 'Contact us', `id` = '8', `menu_link` = 'contact-us', `menu_order` = '7', `parent_menu` = '0'
WHERE `id` = '8'
ERROR - 30-Dec-2017 23:25:30 --> Query error: Table 'jwest.testimonials' doesn't exist - Invalid query: SELECT *
FROM `testimonials`
