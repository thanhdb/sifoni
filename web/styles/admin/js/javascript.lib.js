//*********************************************************************************************************
var mustInputDM  = 'Hãy nhập "tên danh mục" !';
var mustNumber   = '"Thứ tự sấp xếp" phải là số !';
var varUid   = 'Tên đăng nhập';
var varPwd   = 'Mật khẩu';
var mustInput_Key       = 'Hãy nhập "từ khóa tìm kiếm" !';
var mustInput_Name      = 'Hãy nhập "họ tên" !';
var mustInput_Company   = 'Hãy nhập "tên công ty" !';
var mustInput_Address   = 'Hãy nhập "địa chỉ" !';
var mustInput_city      = 'Hãy nhập "tỉnh / thành phố" !';
var mustInput_Tel       = 'Hãy nhập "số điện thoại" !';
var mustInterger_Tel    = '"Số điện thoại" phải là số !';
var mustInput_Email     = 'Hãy nhập "Email" !';
var invalid_Email       = '"Email" không đúng định dạng !';
var identicalEmail   = 'Email phải giống nhau !';
var mustInput_Uid       = 'Hãy nhập "Tên đăng nhập" !';
var mustInput_PwdOld    = 'Hãy nhập "Mật khẩu cũ" !';
var mustInput_Pwd       = 'Hãy nhập "Mật khẩu" !';
var mustInput_Pwd2      = 'Hãy nhập "mật khẩu lần 2" !';
var identicalPassword   = 'Hai mật khẩu phải giống nhau !';
var mustSelect_Sex      = 'Hãy chọn "giới tính" !';
var mustSelect_Country  = 'Hãy chọn "quốc gia" !';
var mustSelect_Cate     = 'Hãy chọn "danh mục" !';
var mustLength4_Uid     = '"Tên đăng nhập" phải 4 ký tự trở lên !';
var mustLength4_Pwd     = '"Mật khẩu" phải 4 ký tự trở lên !';
var mustLength6_Uid     = '"Tên đăng nhập" phải 6 ký tự trở lên !';
var mustLength6_Pwd     = '"Mật khẩu" phải 6 ký tự trở lên !';
var mustInput_Robust    = 'Hãy nhập "Chuỗi xác nhận" !';
var mustInput_Detail    = 'Hãy nhập "nội dung" !';
var mustInput_Search    = 'Hãy nhập "Sản phẩm tìm kiếm" !';
//******************************************* Test input **************************************************

function test_empty(s){if(s == ""){return true;}return false;}
// kiem tra ky tu dac biet, neu khong co ky tu dac biet => return true
function test_char(s){
	var the_array = new Array('~','`','!','@','#','$','%','^','&','*','(',')','-','+','=','|','[',']','{','}',':','"',',',"'",';','/','?','.','<','>','\\');
	for (var i = 0; i < 31; i++){if(s.indexOf(the_array[i])>=0){alert("Kh&ocirc;ng d&ugrave;ng k&yacute; t&#7921; : " + the_array[i]);return false;}}
	return true;
}

function test_length4(s){if(s.length < 4){return false;}return true;}
function test_length6(s){if(s.length < 6){return false;}return true;}
function checkEmail(s){var e = /^(?:\w+\.?)*\w+@(?:\w+\.)+\w+$/;return e.test(s);}
// Chi duoc nhap cac chu so tu nhien => return true
function test_integer(s){if (s.length>0 &&(s != parseInt(s))){return true;}return false;}
function test_Reset(s){return true;}
// Kiem tra 2 mat khau giong nhau => return true
function test_confirm_pass(pass1, pass2){if(pass1 == pass2){return true;}return false;}
// kiem tra ky tu dau tien cua chuoi la so => return true
function firstIsNum(s){for(var i=0; i<=9; i++){if(parseInt(s.substr(0,1))==i){return true;}}return false;}
// kiem tra trong chuoi co ton tai khoang trang => return true
function existSpace(s){if(s.indexOf(' ') > -1){return true;}return false;}
//*********************************************************************************************************
//*********************************** Expand - Collapse Detail ********************************************
if (document.getElementById){
	document.write('<style type="text/css">\n')
	document.write('.submenu{display: none;}\n')
	document.write('</style>\n')
}
//*********************************************************************************************************