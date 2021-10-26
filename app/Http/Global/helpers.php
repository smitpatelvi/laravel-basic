
<?php

use Carbon\Carbon;
use App\Models\Setting;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Config;

/**
 * Write code for Session notification Msg
 *
 * @return response()
 */
function notificationMsg($type, $message){
    \Session::put($type, $message);
}

/**
* Write code for Global file path
*
* @return response()
*/
function getGlobalFilePath($path,$name)
{
    return Storage::url($path.$name);
}

/**
 * Write code on Method Date formate change Y-m-d H:i:s to m/d/Y
 *
 * @return response()
 */
function dateFormatMDYTimeStamp($date){
    return Carbon::createFromFormat('Y-m-d H:i:s', $date)
            ->format('m/d/Y');
}

/**
 * Write code for get Setting value
 *
 * @return response()
 */
function getSettingValue($key)
{
    return Setting::where('name', $key)->value('value');
}

/**
 * Write code on push Notification
 *
 * @return response()
 */
function sendPushNotification($fcm_token,$title,$message,$data){
    
    $url = 'https://fcm.googleapis.com/fcm/send';

    $serverKey = getSettingValue('fcm_server_key');

    $data = [
        "to" => $fcm_token,
        "notification" => [
            "title" => $title,
            "body" => $message,
            "sound"=> 'default',
        ],
        "priority"=> "high",
        "content_available"=>true,
        'data'=>$data
    ];

    $encodedData = json_encode($data);

    $headers = [
        'Authorization:key=' . $serverKey,
        'Content-Type: application/json',
    ];

    $ch = curl_init();
    
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
    // Disabling SSL Certificate support temporarly
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);        
    curl_setopt($ch, CURLOPT_POSTFIELDS, $encodedData);

    // Execute post
    $result = curl_exec($ch);

    if ($result === FALSE) {
        die('Curl failed: ' . curl_error($ch));
    }        

    // Close connection
    curl_close($ch);

    return $result;
}
?>