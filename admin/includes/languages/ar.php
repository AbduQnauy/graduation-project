
<?php
function lang($phrase)
{
   static  $lang = array
    (
     'lang'          => 'اللغة',	
     'Mess'           => 'WELOCME IN ARABIC FILE ',
	 'ADMIN'          => 'ARABIC ADMINISTRATOR',
     'BOSS'           =>"عبود",      /* dashboard words    1  */
	 'lang1'           =>"عربى",
	 'lang2'           =>"EN",
	 'edit'           =>"تعديل",
	 'sign_out'       =>"خروج",
	 'sign_in'        =>"تسجيل الدخول",
	 'ab'             =>"الرئيسية",
	 'query'          => "إستعلامات",
	  'manage'        => 'إدارة',  
	 'modify'         =>"تعديل",        /*dash board words 2*/
	  'add'           =>'إضافة',
	  'remove'        =>'حذف'
 	);  	
	
   return $lang[$phrase];
}
?>