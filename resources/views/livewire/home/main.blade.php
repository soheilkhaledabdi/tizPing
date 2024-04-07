<div class="bg-[#131221] w-screen h-screen flex justify-center items-center all">
    <div class="bg-white py-7 px-12 rounded-xl flex flex-col w-[410px] sm:sm">
        <div class="flex mb-11 "><img src="img/logo.png" alt=""></div>
        <div class="frame w-[314px] overflow-hidden">
            <div class=" flex w-[644px] {{ isset($result) == true ? 'scroller' : '' }}">
                <div class="w-[314px] ml-4 ">
                    <form wire:submit.prevent="search" class="space-y-8">
                        <div class="text-3xl font-bold poppins-medium">برسی وضعیت اکانتت؟</div>
                        <div class="space-y-2">
                            <label class="w-full" for="">کانفیگ</label>
                            <input class="w-full border-[#D8DADC] border p-4 rounded-xl" type="text" placeholder="لطفا کانفیگ خود را وارد کنید" wire:model="search_id">
                            @error('search_id') <span>{{ $message }}</span> @enderror
                        </div>

                        @if($notFound)
                        <div class="alert mt-2 alert-warning alert-dismissible fade show" dir="rtl" role="alert">
                            <strong>خطایی رخ داده:</strong> ایدی(UUID) مذکور در سرور اشاره شده پیدا نشد
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        @endif


                        <button type="submit" class="font-semibold text-base w-full bg-black text-white p-4  rounded-xl">برسی!</button>
                    </form>
                </div>
                <div class="space-y-8 w-[314px]">
                    <div class="text-3xl font-bold poppins-medium">نتیجه ی برسی</div>

                    <div>
                        @if(isset($result))

                        <div class="flex items-center space-x-2 ">
                            <ul class="flex flex-col space-y-4 w-full">
                                <li class="flex items-center w-full justify-between space-x-2">
                                    <span class="ml-2">وضعیت حساب:</span>
                                    <div class="flex items-center justify-center">
                                        <span class="relative inline-flex">
                                            <button type="button" class="inline-flex items-center px-4 py-2 font-semibold leading-6 text-sm shadow rounded-md  transition ease-in-out duration-150 cursor-not-allowed ring-1 ring-slate-900/10 dark:ring-slate-200/20  {{ $result['enable'] == true ? 'text-emerald-800 bg-green-100' : 'text-red-800 bg-red-100' }} " disabled>
                                                {{ $result['enable'] == true ? "فعال" : "غیرفعال" }}
                                            </button>
                                            <span class="flex absolute h-3 w-3 top-0 right-0 -mt-1 -mr-1">
                                                <span class="animate-ping absolute inline-flex h-full w-full rounded-full  opacity-75 {{ $result['enable'] == true ? 'bg-emerald-600' : 'bg-red-600' }} "></span>
                                                <span class="relative inline-flex rounded-full h-3 w-3 {{ $result['enable'] == true ? 'bg-emerald-600' : 'bg-red-600' }}"></span>
                                            </span>
                                        </span>
                                    </div>
                                </li>
                                <li class="flex items-center w-full justify-between space-x-2">
                                    <span class="ml-2 mt-3">حجم مصرف شده:</span>
                                    <span>{{ sizeFormat($result['up'] + $result['down']) }} </span>
                                </li>
                                <button onclick="document.getElementById('scroller').className='back flex w-[788px]'" class="font-semibold text-base w-full bg-black text-white p-4   rounded-xl">بازگشت</button>
                            </ul>
                        </div>
                        @endif

                    </div>
                </div>
            </div>
        </div>

    </div>
</div>