<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class Replace extends Enum
{
    public const IIKAGEN = 0;
    public const MSTTEYO = 1;
    public const URUSAI = 2;
    public const HASHITTYADAME = 3;
    public const WARNING = 4;
    public const SHITAKU = 5;
    public const BATH = 6;
    public const DAKARA = 7;
    public const NANDO = 8;
    public const HIROTTE = 9;
    public const MOU = 10;
    public const ISTUYARUNO_1 = 11;
    public const ISTUYARUNO_2 = 12;
    public const GOING_HOME = 13;
    public const YAMENASAI = 14;
    public const ITAKUNAI = 15;
    public const SONNAKOTO = 16;
    public const SHIRANAI = 17;
    public const MEIWAKU = 18;
    public const TAROU = 19;
    public const BAKA = 20;

    public static function getDescription($value): string
    {
        return match ($value) {
            self::IIKAGEN => 'あと何分で終われそう？',
            self::MSTTEYO => 'あと◯分だけ待ってね（具体的な数字を伝える）',
            self::URUSAI => '声を「これくらい」にしてくれる？（実例をあげる）',
            self::HASHITTYADAME => '歩こうね（やっていいことを伝える）',
            self::WARNING => '止まってね（具体的に伝える）',
            self::SHITAKU => '5分で終われば、あと10分遊べるよ（メリット）',
            self::BATH => '夕飯は唐揚げだよ（興味のある情報）',
            self::DAKARA => 'どうすればよかったんだっけ？',
            self::NANDO => '夕飯は唐揚げだよ（興味のある情報）',
            self::HIROTTE => '夕飯は唐揚げだよ（興味のある情報）',
            self::MOU => '夕飯は唐揚げだよ（興味のある情報）',
            self::ISTUYARUNO_1 => '宿題何時からやる予定？',
            self::ISTUYARUNO_2 => '◯時までなら、お母さん手伝える時間があるよ。',
            self::GOING_HOME => 'あと10秒だけ待ってるね',
            self::YAMENASAI => 'やめれたね。ありがとう。',
            self::ITAKUNAI => '痛かったね（共感すると早く治まる）',
            self::SONNAKOTO => 'そうか〜嫌なんだね〜（感情を否定しない）',
            self::SHIRANAI => 'どうすればわかるかお母さんに教えて',
            self::MEIWAKU => '先生がモシモシしてる音が聞こえなくなっちゃうから病院ではゲームは音を消そうね（迷惑の具体的な理由）',
            self::TAROU => '（事前に）今、堪忍袋2つ目、次にやったらお母さんの堪忍袋は爆発するよ（コミカルに事前に警告を与える）',
            self::BAKA => '大物だね〜！一緒に片付けよっか',
            default => self::getKey($value),
        };
    }

    public static function searchMessage($value): int
    {
        switch ($value) {
            case 'いい加減にしなさいっ！':
                return self::IIKAGEN;
                break;
            case 'ちょっと待ってよ！':
                return self::MSTTEYO;
                break;
            case 'うるさいっ！':
                return self::URUSAI;
                break;
            case '走っちゃダメ！':
                return self::HASHITTYADAME;
                break;
            case '危ない！':
                return self::WARNING;
                break;
            case '早く支度しなさいっ！':
                return self::SHITAKU;
                break;
            case '早くお風呂から出なさい！':
                return self::BATH;
                break;
            case 'あー、もう、だから言ったでしょう？':
                return self::DAKARA;
                break;
            case '何度言ったらわかるのっ！':
                return self::NANDO;
                break;
            case '（こぼした時）拾って！':
                return self::HIROTTE;
                break;
            case '（失敗した時）あーあ、もう！':
                return self::MOU;
                break;
            case 'もう！いつになったら宿題やるの！！':
                return self::ISTUYARUNO_1;
                break;
            case 'もう！いつになったら宿題やるの！！':
                return self::ISTUYARUNO_2;
                break;
            case 'もう！早く帰るよっ！':
                return self::GOING_HOME;
                break;
            case '（兄弟をたたくなど）やめなさいっ！':
                return self::YAMENASAI;
                break;
            case '（転んで）痛くない、痛くない':
                return self::ITAKUNAI;
                break;
            case 'そんなこと言っちゃダメ！':
                return self::SONNAKOTO;
                break;
            case 'もう知らないっ！':
                return self::SHIRANAI;
                break;
            case '人の迷惑になるからやめなさいっ！':
                return self::MEIWAKU;
                break;
            case '◯太郎！！':
                return self::TAROU;
                break;
            case '何やってるの！バカ！':
                return self::BAKA;
                break;
            default:
                return self::getKey($value);
        }
    }
}
