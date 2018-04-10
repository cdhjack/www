<?PHP
//Default
function_exists("date_default_timezone_set")?date_default_timezone_set("Asia/Shanghai"):""; //默认时区

//DIR
define("SYS_ROOT", dirname(dirname(__FILE__)).'/');//如：D:\www\framework\

// HTTP
define('SITE_URL', 'http://www.rainbow.com/');
define('SITE_NAME', '彩虹屋');
define('LOGIN_NUM', 10);//登陆错误次数
define('LOGIN_TIME', 20);//登陆错误次数超限后，多长时间后能重新登陆（分钟）
define('EXIT_TIME', 720);//登陆多长时间超时（分钟）
define('ADMIN_MAIL', 'admin@rainbow.com');//管理员邮箱;


//DB
define('DB_HOSTNAME', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_DATABASE', 'www_rainbow_com');

?>