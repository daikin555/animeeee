<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class LineApiController extends Controller
{

    public function __construct(
        protected $accessToken,
        protected $channelSecret
    ) {
        $this->accessToken = config('line.channel.token');
        $this->channelSecret = config('line.channel.secret');
    }

    // Webhook受取処理
    public function postWebhook(Request $request) {
        $input = $request->all();
        // ユーザーがどういう操作を行った処理なのかを取得
        $type  = $input['events'][0]['type'];
    
        // タイプごとに分岐
        switch ($type) {
            // メッセージ受信
            case 'message':
                // 返答に必要なトークンを取得
            $replyToken = $input['events'][0]['replyToken'];
            // テスト投稿の場合
            if ($replyToken == '00000000000000000000000000000000') {
                Log::info('Succeeded');
                return;
            }
            // Lineに送信する準備
            $httpClient = new \LINE\LINEBot\HTTPClient\CurlHTTPClient($this->accessToken);
            $bot         = new \LINE\LINEBot($httpClient, ['channelSecret' => $this->channelSecret]);
            // LINEの投稿処理
            $messageData = "メッセージありがとうございます。ただいま準備中です";
            $response     = $bot->replyText($replyToken, $messageData);

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
    
            // グループ・トークルーム参加
            case 'join':
                Log::info("グループ・トークルームに追加されました。");
                break;
    
            // グループ・トークルーム退出
            case 'leave':
                Log::info("グループ・トークルームから退出させられました。");
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