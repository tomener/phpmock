<?php
/**
 * Created by gumao.com
 * User: tommy
 */

namespace Tomener\Phpmock\Random;


trait Basic
{
    /**
     * 返回bool值
     *
     * @param int $probability 取值范围0~100之间，值越大，返回true的概览越大，值越小，返回false的概率越大
     * @return bool
     */
    public static function bool($probability = 50)
    {
        return mt_rand(0, 100) < $probability;
    }

    public static function int($min, $max)
    {
        if ($min > $max) {
            return 0;
        }
        return mt_rand($min, $max);
    }

    /**
     * 返回指定长度的整数
     *
     * @param $min_length
     * @param $max_length
     * @param bool $is_positive
     * @return int
     */
    public static function intLen($min_length, $max_length, $is_positive = true)
    {
        if ($min_length > $max_length) {
            return 0;
        }

        $length = mt_rand($min_length, $max_length);

        return mt_rand(str_pad(1, $length, 0), str_pad(9, $length, 9));
    }

    /**
     * 返回一个随机浮点数
     *
     * @param $min
     * @param $max
     * @param int $decimal 小数点位数
     * @return float|int
     */
    public static function float($min, $max, $decimal = 2)
    {
        if ($min > $max) {
            return 0;
        }
        $f = '';
        for ($i = 0; $i < $decimal; $i++) {
            $f .= mt_rand(1, 9);
        }
        return floatval(mt_rand($min, $max - 1) . '.' . $f);
    }

    /**
     * 返回一个随机字符
     *
     * @param $pool
     * @return false|string
     */
    public static function char($pool = 'default')
    {
        $pools = [
            'lower' => 'abcdefghijklmnopqrstuvwxyz',
            'upper' => 'ABCDEFGHIJKLMNOPQRSTUVWXYZ',
            'number' => '0123456789',
            'symbol' => '!@#$%^&*()[]',
        ];
        $pools['alpha'] = $pools['lower'] . $pools['upper'];
        $pools['alphanumber'] = $pools['lower'] . $pools['upper'] . $pools['number'];
        $pools['default'] = $pools['lower'] . $pools['upper'] . $pools['number'] . $pools['symbol'];
        if (isset($pools[$pool])) {
            $pool = $pools[$pool];
        }
        $pool = str_shuffle($pool);
        return substr($pool, mt_rand(0, strlen($pool) - 1), 1);
    }

    /**
     * 返回一个随机字符串
     *
     * @param $min
     * @param $max
     * @return string
     */
    public static function string($min, $max)
    {
        $length = mt_rand($min, $max);
        $seed = md5(print_r($_SERVER, 1) . microtime(true));
        $seed = base_convert($seed, 16, 35) . 'zZz' . strtoupper($seed);

        $hash = '';
        $max = strlen($seed) - 1;
        for ($i = 0; $i < $length; $i++) {
            $hash .= $seed[mt_rand(0, $max)];
        }

        return $hash;
    }

    public function date($format = 'Y-m-d')
    {
        return date($format);
    }

    public static function datetime($format = 'Y-m-d H:i:s')
    {
        return date($format);
    }

    public static function email()
    {
        $data = ['@qq.com','@163.com','@126.com','@sina.com.cn','@139.com','@hotmail.com','@gmail.com','@yahoo.com'];

        $domain = $data[mt_rand(0, count($data) - 1)];

        if($domain == '@qq.com'){
            return static::intLen(6, 10) . $domain;
        }

        return static::string(6, 10). $domain;
    }
}
