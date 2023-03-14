# phpmock
phpmock is a simulation data generator, mock data generator

## Install
```
composer require tomener/phpmock
```

## Usage
```
use Tomener\Phpmock\Mock;

require 'vendor\autoload.php';

//布尔值
$bool = Mock::bool();
$bool = Mock::bool(90); //90%的概率生成布尔值true

//整数
$integer = Mock::int(0, 10);
$integer = Mock::intLen(5, 9); //生成5~9位长度的整数（默认正整数），可传第三个参数is_positive为false，返回负整数

//字符串
$str = Mock::string(6, 8);

//生成一个英文姓名
$name = Mock::name(); //Paul Smith
var_dump($name);
$name = Mock::name(true); //Frank John Thompson
var_dump($name);

//生成一个中文姓名
$name = Mock::cname(); //随机生成2~3长度的姓名
var_dump($name);
$name = Mock::cname(3); //指定姓名长度，傅婉承
var_dump($name);

//生成一个随机字符
$char = Mock::char('alphanumber');
var_dump($char);

//生成一个单词
$word = Mock::word();
var_dump($word);
var_dump(Mock::cword());

//生成一个句子
$sentence = Mock::sentence();
var_dump($sentence);
var_dump(Mock::csentence());

//生成一段文本
var_dump(Mock::paragraph());
var_dump(Mock::cparagraph());

//生成一个标题
var_dump(Mock::title());
var_dump(Mock::ctitle());
```