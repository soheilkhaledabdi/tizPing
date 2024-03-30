<?php

namespace App\Console\Commands;

use App\Models\Backup;
use App\Models\Servers;
use Illuminate\Console\Command;
use phpseclib3\Net\SFTP;
use Telegram\Bot\Api;

class SendFileCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'send:file';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {

        foreach (Servers::all() as $server)
        {
            $server = [
                'host' => $server->host,
                'username' => $server->username,
                'password' => $server->password,
                'port' => 22,
            ];
        }


        $sftp = new SFTP($server['host'], $server['port']);
        if (!$sftp->login($server['username'], $server['password'])) {
            $this->error('Failed to connect to the server.');
            return;
        }


        $remoteFilePath = '/etc/x-ui/x-ui.db';

        $localFilePath = storage_path('app/public/x-ui.db');

        if (!$sftp->get($remoteFilePath ,$localFilePath)) {
            $this->error('Failed to retrieve the file from the server.');
            return;
        }
        Backup::query()->create([
           'url' => $localFilePath,
           'server_id' =>  $server->id
        ]);
    }
}
