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

    public static function searchMessage($value): string
    {
        return match ($value) {
            'いい加減にしなさいっ！' => self::IIKAGEN,
            'ちょっと待ってよ！' => self::MSTTEYO,
            'うるさいっ！' => self::URUSAI,
            '走っちゃダメ！' => self::HASHITTYADAME,
            '危ない！' => self::WARNING,
            '早く支度しなさいっ！' => self::SHITAKU,
            '早くお風呂から出なさい！' => self::BATH,
            'あー、もう、だから言ったでしょう？' => self::DAKARA,
            '何度言ったらわかるのっ！' => self::NANDO,
            '（こぼした時）拾って！' => self::HIROTTE,
            '（失敗した時）あーあ、もう！' => self::MOU,
            'もう！いつになったら宿題やるの！！' => self::ISTUYARUNO_1,
            'もう！いつになったら宿題やるの！！' => self::ISTUYARUNO_2,
            'もう！早く帰るよっ！' => self::GOING_HOME,
            '（兄弟をたたくなど）やめなさいっ！' => self::YAMENASAI,
            '（転んで）痛くない、痛くない' => self::ITAKUNAI,
            'そんなこと言っちゃダメ！' => self::SONNAKOTO,
            'もう知らないっ！' => self::SHIRANAI,
            '人の迷惑になるからやめなさいっ！' => self::MEIWAKU,
            '◯太郎！！' => self::TAROU,
            '何やってるの！バカ！' => self::BAKA,
            default => self::getKey($value),
        };
    }
}
