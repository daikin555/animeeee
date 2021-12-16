<?php

namespace App\Http\Controllers;

use App\Services\MessageService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class LineApiController extends Controller
{
    protected $accessToken;
    protected $channelSecret;

    public function __construct(
        protected MessageService $messageService
    ) {
        $this->accessToken = config('line.channel.token');
        $this->channelSecret = config('line.channel.secret');
        $this->messageService = $messageService;
    }

    // Webhook受取処理
    public function postWebhook(Request $request) {
        $input = $request->all();
        // ユーザーがどういう操作を行った処理なのかを取得
        $type  = $input['events'][0]['type'];
        Log::info($type);
    
        switch ($type) {
            case 'message':
            // 返答に必要なトークンを取得
            $replyToken = $input['events'][0]['replyToken'];
            // Lineに送信する準備
            $httpClient = new \LINE\LINEBot\HTTPClient\CurlHTTPClient($this->accessToken);
            $bot = new \LINE\LINEBot($httpClient, ['channelSecret' => $this->channelSecret]);
            // LINEの投稿処理
            // 返すメッセージを設定する
            // $messageData = $input['events'][0]['message']['text'];
            $this->messageService->checkMessageType($input['events'][0]['message']['type']);
            $num = rand(1, 26);
            $messageData = "来週の日直は〜？？\n\n\n\n\n" . $num . "番の方です！\n宜しくお願いします!";
            $response = $bot->replyText($replyToken, $messageData);

            // Succeeded
            if ($response->isSucceeded()) {
                Log::info('返信成功');
                break;
            }
            // Failed
            Log::error($response->getRawBody());
            break;
    
            // 友だち追加 or ブロック解除
            case 'follow':
                Log::info("ユーザーが追加されました。");
                break;
    
            // ブロック
            case 'unfollow':
                Log::info("ユーザーにブロックされました。");
                break;
    
            default:
                Log::info("the type is" . $type);
                break;
        }
    
        return;
    }

    // メッセージ送信用
    public function sendMessage(Request $request) {
        // ここに処理を書いていく
    }
}
