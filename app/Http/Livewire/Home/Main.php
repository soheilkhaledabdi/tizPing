<?php

namespace App\Http\Livewire\Home;

use App\Models\Servers;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Http;
use Livewire\Component;

class Main extends Component
{

    public $server, $search_id;


    public $result;

    public $notFound;


    public function render()
    {
        return view('livewire.home.main')->layout('layouts.main');
    }

    protected $rules = [
        'search_id' => ['required', 'string'],
    ];

    public function messages()
    {
        return [
            'search_id.regex' => 'فرمت شناسه معتبر نیست.',
        ];
    }



    public function search()
    {
        $this->validate();

        $url_parse = parse_url($this->search_id);
        $this->server = $url_parse['host'];
        $this->search_id = $url_parse['user'];
        $s = Servers::query()->where('host', $this->server)->first();

        if ($s) {
            $client = new Client();

            $response = $client->post('http://' . $s->host . ':' . $s->port . '/login', [
                'form_params' => [
                    'username' => $s->panel_username,
                    'password' => $s->panel_password,
                ],
            ]);

            $cookies = $response->getHeader('Set-Cookie');

            $cookieString = $cookies[1];

            $cookies = explode(';', $cookieString);

            $sessionCookie = '';
            foreach ($cookies as $cookie) {
                if (strpos($cookie, 'session=') !== false) {
                    $sessionCookie = trim($cookie);
                    break;
                }
            }


            if ($s) {
                $response = Http::withHeaders([
                    'Content-Type' => 'application/x-www-form-urlencoded',
                    'Cookie' => $sessionCookie,
                ])->get('http://' . $s->host . ':' . $s->port . '/panel/API/inbounds/list');

                // dd('http://' . $s->host . ':' . $s->port . '/panel/API/inbounds/list');

                // dd($response->json());

                if ($response->successful()) {
                    $data = $response->json();
                    $clientIdToSearch = $this->search_id;

                    foreach ($data['obj'] as $item) {
                        $clients = json_decode($item['settings']);
                        $result = collect($clients->clients)->first(function ($client) use ($clientIdToSearch) {
                            return $client->id == $clientIdToSearch;
                        });

                        if ($result) {
                            $response = Http::withHeaders([
                                'Accept' => 'application/json',
                                'Cookie' => $sessionCookie,
                            ])->get('http://' . $s->host . ':' . $s->port . '/panel/api/inbounds/getClientTraffics/' . $result->email);

                            if ($response->successful()) {
                                $response = $response->json();
                                $this->result = $response['obj'];
                            }
                        }
                    }
                }
            }
        }else {
            $this->notFound = 'سرور شما پیدا نشد';
        }
    }
}
