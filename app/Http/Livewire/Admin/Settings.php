<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;

class Settings extends Component
{

    public $server_username , $server_password;
    public $panel_username , $panel_password;

    public function render()
    {
        return view('livewire.admin.settings');
    }


    public function mount(){
            $settings = \App\Models\Settings::all();
        $this->server_username = $settings->firstWhere('key','server_username')?->value;
        $this->server_password = $settings->firstWhere('key','server_password')?->value;
        $this->panel_username = $settings->firstWhere('key','panel_username')?->value;
        $this->panel_password = $settings->firstWhere('key','panel_password')?->value;
    }


    public function update(){
        \App\Models\Settings::query()->where('key' , 'server_username')->update([
            'value' => $this->server_username
        ]);

        \App\Models\Settings::query()->where('key' , 'server_password')->update([
            'value' => $this->server_password
        ]);


        \App\Models\Settings::query()->where('key' , 'panel_username')->update([
            'value' => $this->panel_username
        ]);


        \App\Models\Settings::query()->where('key' , 'panel_password')->update([
            'value' => $this->panel_password
        ]);

        $this->dispatchBrowserEvent('success' , [
            'message' => 'تنظیمات با موفقیت بروزرسانی شد'
        ]);
    }
}
