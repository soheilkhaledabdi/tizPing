<?php

namespace App\Console;

use App\Models\Backup;
use App\Models\Servers;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use League\Flysystem\Sftp\SftpAdapter;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     */

        protected function schedule(Schedule $schedule): void
    {
        $schedule->call(function () {
            $servers = Servers::all();
            foreach ($servers as $server) {
                config(['filesystems.disks.sftp.host' => $server->host]);
                config(['filesystems.disks.sftp.username' => $server->server_username]);
                config(['filesystems.disks.sftp.password' => $server->server_password]);

                $remoteFilePath = '/etc/x-ui/x-ui.db';
                $randomFileName = Str::random(10);
                $localFilePath = storage_path('app/uploads/' . $randomFileName . '.db');

                // Create a new instance of the SFTP filesystem
                $filesystem = Storage::disk('sftp')->getDriver();

                // Get the file contents from the remote server
                $fileContents = $filesystem->read($remoteFilePath);

                // Save the file contents to the local path
                file_put_contents($localFilePath, $fileContents);

                // Delete the old file if it exists in the old path (if the old path is not 'app/uploads')
                if ($server->backup && $server->backup->url && !str_contains($server->backup->url, 'app/uploads')) {
                    Storage::delete($server->backup->url);
                }

                // Store the file in the desired directory with a random filename
                $path = Storage::putFileAs('public/uploads', new File($localFilePath), $randomFileName . '.db');

                if ($path) {
                    Backup::query()->updateOrCreate(
                        ['server_id' => $server->id],
                        ['url' => $path]
                    );
                } else {
                    // Error in storing the file
                }
            }
            $directory = storage_path('app/uploads');

            if (File::isDirectory($directory)) {
                $files = File::allFiles($directory);
                foreach ($files as $file) {
                    File::delete($file);
                }
            }
        })->everyFifteenMinutes();
    }




    /**
     * Register the commands for the application.
     */
    protected function commands(): void
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
