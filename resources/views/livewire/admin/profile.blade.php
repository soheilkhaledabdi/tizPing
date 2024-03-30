<div class="page-body">
    <div class="container-xl">
        <div class="card">
            <div class="row g-0">
                <div class="col d-flex flex-column">
                    <div class="card-body">
                        <form wire:submit.prevent="update">
                            <div class="row col-md-12">
                                <div class="col-md-6">
                                    <div class="form-label">نام کامل شما</div>
                                    <input type="text" class="form-control"  wire:model.lazy="name">
                                    @error('first_name') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>

                            </div>
                            <div class="row col-md-12  mt-4">
                                <div class="col-md-6">
                                    <div class="form-label">ایمیل</div>
                                    <input type="text" class="form-control"
                                           wire:model.lazy="email">
                                    @error('email') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                            </div>
                            <button type="submit" class="btn mt-3 btn-primary">
                               ویرایش پروفایل
                            </button>
                        </form>
                        <form wire:submit.prevent="changePassword">
                            <h2 class="mb-4 mt-4">عوض کردن رمز</h2>
                            <div>
                                <div class="form-label mt-3">رمز فعلی</div>
                                <div class="col-auto">
                                    <input type="text" class="form-control w-auto" wire:model.lazy="oldPassword">
                                </div>
                                @error('oldPassword') <span class="text-danger">{{ $message }}</span> @enderror
                                <div class="form-label mt-3">رمز جدید</div>
                                <div class="col-auto">
                                    <input type="text" class="form-control w-auto" wire:model.lazy="newPassword">
                                </div>
                                @error('newPassword') <span class="text-danger">{{ $message }}</span> @enderror
                                <div class="form-label mt-3">تکرار</div>
                                <div class="col-auto">
                                    <input type="text" class="form-control w-auto" wire:model.lazy="confirmPassword">
                                </div>
                                @error('confirmPassword') <span class="text-danger">{{ $message }}</span> @enderror


                                <button class="btn mt-2 btn-primary" type="submit">
                                    ویرایش رمز
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

