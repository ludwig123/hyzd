<?php


namespace app\home\domain;


class TranslatorForDadui
{
    public static function codeToDadui($code)
    {
        switch ($code) {
            case '435401000010':
                return '新塘';

            case '435402000010':
                return '耒阳';

            case '435403000010':
                return '蒸湘';

            case '435404000010':
                return '衡南';

            case '435405000010':
                return '衡阳西';

            case '435406000010':
                return '南岳';

            case '435407000010':
                return '石鼓';

            case '435408000010':
                return '西渡';

            case '435409000010':
                return '祁东';

            default :
                return '未识别大队代码';
        }

    }

}