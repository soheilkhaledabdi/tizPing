<?php

namespace App\Http\Livewire\Admin;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class Profile extends Component
{
    public function render()
    {
        return view('livewire.admin.profile');
    }

    public $name,$email;
    public $oldPassword , $newPassword , $confirmPassword;

    public function mount()
    {
        $user = auth()->user();
        $this->name = $user->name;
        $this->email = $user->email;
    }

    public function changePassword()
    {
        $this->validate([
            'oldPassword' => 'required',
            'newPassword' => 'required|min:8',
            'confirmPassword' => 'required|same:newPassword',
        ]);

        $user = Auth::user();

        if (Hash::check($this->oldPassword, $user->password)) {
            $user->password = Hash::make($this->newPassword);
            $user->save();

            $this->oldPassword = '';
            $this->newPassword = '';
            $this->confirmPassword = '';

            $this->dispatchBrowserEvent('success' , [
                'message' => 'رمز با موفقیت بروزرسانی شد'
            ]);
        } else {
            $this->dispatchBrowserEvent('success' , [
                'message' => 'رمز فعلی اشتباه است'
            ]);
        }
    }

    public function update()
    {
        $this->validate([
            'name' => 'required|min:3,max:255',
            'email' => 'required|email',
        ]);

        $user = Auth::user();
        $user->name = $this->name;
        $user->email = $this->email;
        $user->save();

        $this->dispatchBrowserEvent('success' , [
            'message' => 'پرفایل شما اپدیت شد'
        ]);
    }

}
