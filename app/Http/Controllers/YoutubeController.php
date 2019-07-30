<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use \GuzzleHttp;
use Log;
use App\Video;

class YoutubeController extends Controller
{
    public function get(Request $request)
    {
        $url = $request->get('link');

        if (empty($url)) return "Enter link or id";
        $result = $this->get_items($url);

        return $result;
    }

    public function add(Request $request)
    {
        $this->add_video($request->get('link'));
        return redirect('/home');
    }

    protected function get_youtube_id($url)
    {
        if (strpos($url, '//') !== false) {
            preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $url, $match);
            $youtube_id = $match[1];
        } else {
            $youtube_id = $url;
        }
        return $youtube_id;
    }

    protected function get_link($url)
    {
        $youtube_id = $this->get_youtube_id($url);
        $key = env("APP_API_KEY");

        return "https://www.googleapis.com/youtube/v3/videos?id={$youtube_id}&key={$key}&part=snippet,statistics";
    }

    protected function get_items($url)
    {
        $image = '';
        $client = new GuzzleHttp\Client();
        https://www.youtube.com/watch?v=jyVE5IIRA84
        $res = $client->get($this->get_link($url));

        $status = $res->getStatusCode(); // 200

        if (200 == $status) {
            Log::info("Body " . $res->getBody());

            $result = json_decode($res->getBody(), true);
            if (isset($result['items']) && !empty($result['items'])) {
                foreach ($result['items'] AS $item) {
                    $src = isset($item['snippet']['thumbnails']['default']['url']) ? $item['snippet']['thumbnails']['default']['url'] : json_encode($item);
                    $image .= '<div><img src="' . $src . '"><div class="small">' . $item['snippet']['title'] . '<div></div>';
                }
                return $image;
            } else {
                return "Video not found";
            }
        } else {
//            Log::info("Status " . json_encode($status));
            return json_encode($status);
        }
        return json_encode($result);
    }

    protected function add_video($url)
    {
        $client = new GuzzleHttp\Client();
        $res = $client->get($this->get_link($url));
        $status = $res->getStatusCode(); // 200

        if (200 == $status) {
            $result = json_decode($res->getBody(), true);
            $user_id = Auth::id();
            if (isset($result['items']) && !empty($result['items'])) {
                foreach ($result['items'] AS $item) {
                    $video = [
                        'user_id' => $user_id,
                        'published_at' => $date = date_create_from_format("Y-m-d\TH:i:s.uZ", $item['snippet']['publishedAt']),
                        'channel_id' => isset($item['snippet']['channelId']) ? $item['snippet']['channelId'] : '',
                        'title' => isset($item['snippet']['title']) ? $item['snippet']['title'] : '',
                        'description' => isset($item['snippet']['description']) ? $item['snippet']['description'] : '',
                        'thumbnail' => isset($item['snippet']['thumbnails']['default']['url']) ? $item['snippet']['thumbnails']['default']['url'] : '',
                        'channel_title' => isset($item['snippet']['channelTitle']) ? $item['snippet']['channelTitle'] : '',
                        'video_id' => isset($item['id']) ? $item['id'] : '',
                        'views' => isset($item['statistics']['viewCount']) ? (int)$item['statistics']['viewCount'] : 0,
                        'likes' => isset($item['statistics']['likeCount']) ? (int)$item['statistics']['likeCount'] : 0,
                        'dislikes' => isset($item['statistics']['dislikeCount']) ? (int)$item['statistics']['dislikeCount'] : 0,
                        'favorite' => isset($item['statistics']['favoriteCount']) ? (int)$item['statistics']['favoriteCount'] : 0,
                        'comment' => isset($item['statistics']['commentCount']) ? (int)$item['statistics']['commentCount'] : 0,
                        'lang' => isset($item['snippet']['defaultAudioLanguage']) ? $item['snippet']['defaultAudioLanguage'] : '',
                        'category' => isset($item['snippet']['categoryId']) ? $item['snippet']['categoryId'] : '',
                        'tags' => isset($item['snippet']['tags']) ? json_encode($item['snippet']['tags']) : '',
                        'created_at' => date('Y-m-d H:i:s'),
                        'updated_at' => date('Y-m-d H:i:s')
                    ];
                    Video::insert($video);
                    \Session::flash('flash_message', __('messages.success'));
                    return 'true';
                }
            }
        } else {
            \Session::flash('flash_message', __('messages.error'));
            return 'false';
        }
    }
}
