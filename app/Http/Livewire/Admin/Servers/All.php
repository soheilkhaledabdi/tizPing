<?php

namespace App\Http\Livewire\Admin\Servers;

use App\Models\Servers;
use Livewire\Component;
use Livewire\WithPagination;

class All extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';
    protected $listeners = ['delete'];

    public $name,$host,$username,$password,$port,$status,$panel_username , $panel_password;
    public $upd_id, $upd_name,$upd_host,$upd_username,$upd_password,$upd_port,$upd_status , $upd_panel_username , $upd_panel_password;

    public function render()
    {
        return view('livewire.admin.servers.all' , [
            'servers' => Servers::query()->paginate(10)
        ]);
    }

    protected $rules = [
        'name' => 'required',
        'host' => 'required',
        'username' => 'required',
        'password' => 'required',
        'panel_username' => 'required',
        'panel_password' => 'required',
        'port' => 'required|numeric',
    ];

    protected $messages = [
        'name.required' => 'نام سرور را وارد کنید.',
        'host.required' => 'ای پی سرور را وارد کنید',
        'username.required' => 'نام کاربری را وارد کنید',
        'password.required' => 'رمز سرور را وارد کنید',
        'port.required' => 'پورت سرور را وارد کنید',
        'port.numeric' => 'پورت باید عدد باشد',
    ];

    public function mount(){
    $settings = \App\Models\Settings::all();
    $this->username = $settings->firstWhere('key','server_username')?->value;
    $this->password = $settings->firstWhere('key','server_password')?->value;
    $this->panel_username = $settings->firstWhere('key','panel_username')?->value;
    $this->panel_password = $settings->firstWhere('key','panel_password')?->value;
}
    public function save()
    {
        $this->validate();

        Servers::query()->create([
            'name' => $this->name,
            'host' => $this->host,
            'server_username' => $this->username,
            'server_password'=> $this->password,
            'port' => $this->port,
            'panel_username' => $this->panel_username,
            'panel_password' => $this->panel_password,
            'status' => $this->status == null ? 0 : 1,
        ]);


        $this->reset([
            'name' ,
            'host',
            'username',
            'password',
            'panel_username',
            'panel_password',
            'port',
            'status',
        ]);

        $this->dispatchBrowserEvent('success' , [
            'message' => 'سرور جدید با موفقیت اضافه شد'
        ]);
    }

    public function OpenEditModals($id)
    {
        $this->reset([
            'upd_name' ,
            'upd_host',
            'upd_username',
            'upd_password',
            'upd_port',
            'upd_status',
        ]);

        $server = Servers::query()->findOrFail($id);

        $this->upd_id = $id;
        $this->upd_name = $server->name;
        $this->upd_host = $server->host;
        $this->upd_username = $server->server_username;
        $this->upd_password = $server->server_password;

        $this->upd_panel_username = $server->panel_username;
        $this->upd_panel_password = $server->panel_password;
        $this->upd_port = $server->port;
        $this->upd_status = $server->status;
    }

    public function update()
    {
        Servers::query()->findOrFail($this->upd_id)->update([
            'name' => $this->upd_name,
            'host' => $this->upd_host,
            'server_username' => $this->upd_username,
            'server_password'=> $this->upd_password,
            'panel_username'=> $this->upd_panel_username,
            'panel_password'=> $this->upd_panel_password,
            'port' => $this->upd_port,
            'status' => $this->upd_status == null ? 0 : 1,
        ]);



        $this->dispatchBrowserEvent('success' , [
            'message' => 'سرور با موفقیت ویرایش شد'
        ]);
    }

    public function deleteConfirm($id)
    {
        $servers = Servers::query()->findOrFail($id);
        $this->dispatchBrowserEvent('SwalConfirm',[
            'title'=>'حذف؟',
            'html'=>'ایا میخواید سرور'. $servers->name . 'حذف شود',
            'id'=>$id
        ]);
    }

    public function delete($id)
    {
        $attr = Servers::find($id)->delete();
        if ($attr)
        {
            $this->dispatchBrowserEvent('deleted' , [
                'message' => 'ویژگی با موفقیت حذف شد'
            ]);
        }
    }
}
