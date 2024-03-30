<div class="w-screen h-screen flex justify-center items-center all">
    <div class="bg-white head p-2 rounded-xl flex flex-col w-[394px] relative ">
        <div class="flex   p-4 felx justify-center "><img src="img/logo.png" alt="" style="width: 80%;"></div>
        <div class="frame w-[394px] overflow-hidden">
            <div class=" flex w-[788px] {{ isset($result) == true ? 'scroller' : '' }}">
                <div class="-mt-1 w-[394px] ml-4 pl-2">
                    <div class="space-y-1">
                        <div class=" text-3xl font-bold poppins-medium text-center">بررسی وضعیت اکانتت؟</div>
                        <div class="text-base text-center">لطفا اطلاعات مورد نیاز رو وارد کنید</div>
                    </div>
                    <form wire:submit.prevent="search" class="">

                        <div class="my-8">
                            <input class="w-full border-[#D8DADC] border p-4 rounded-xl" type="text" placeholder="لطفا کانفیگ خود را وارد کنید" wire:model="search_id">
                            @error('search_id') <span>{{ $message }}</span> @enderror
                        </div>

                        @if($notFound)
                        <div class="alert mt-2 alert-warning alert-dismissible fade show" dir="rtl" role="alert">
                            <strong>خطایی رخ داده:</strong> ایدی(UUID) مذکور در سرور اشاره شده پیدا نشد
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        @endif



                        <button type="submit" class="font-semibold text-base w-full bg-black text-white p-4   rounded-xl">بررسی!</button>
                    </form>
                </div>
                @if(isset($result))

                <div class="space-y-8 w-[394px]">
                    <div class="text-3xl font-bold poppins-medium">نتیجه ی بررسی</div>

                    <div>
                        <div class="flex items-center space-x-2 ">
                            <ul class="flex flex-col space-y-4 w-full">
                                <li class="flex items-center w-full justify-between space-x-2">
                                    <span class="ml-2">وضعیت حساب:</span>
                                    <div class="flex items-center justify-center">
                                        <span class="relative inline-flex">
                                            <button type="button" class="inline-flex items-center px-4 py-2 font-semibold leading-6 text-sm shadow rounded-md text-emerald-800 bg-green-100 transition ease-in-out duration-150 cursor-not-allowed ring-1 ring-slate-900/10 dark:ring-slate-200/20" disabled>
                                                {{ $result['enable'] == true ? "فعال" : "غیرفعال" }}
                                            </button>
                                            <span class="flex absolute h-3 w-3 top-0 right-0 -mt-1 -mr-1">
                                                <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-emerald-600 opacity-75"></span>
                                                <span class="relative inline-flex rounded-full h-3 w-3 bg-emerald-800"></span>
                                            </span>
                                        </span>
                                    </div>
                                </li>
                                <li class="flex items-center w-full justify-between space-x-2">
                                    <span class="ml-2">حجم باقی مانده:</span>
                                    <span>{{ sizeFormat($result['up'] + $result['down']) }}</span>
                                </li>

                            </ul>


                        </div>
                    </div>
                </div>

                @endif

            </div>
        </div>

    </div>
</div>