<div>
    <div class="card-body">
        <div class="tab-content">
            <div class="tab-pane show active" id="tabs-smtp" role="tabpanel">
                <form wire:submit.prevent="update">

                    <h2 class="mb-4 mt-4">تنظیمات پیشفرض</h2>

                    <div class="col-md-12 mt-4">
                        <div class="form-label">نام کاربری پنل پیشفرض</div>
                        <input type="text" class="form-control" wire:model.lazy="server_username">
                        @error('server_username') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>


                    <div class="col-md-12 mt-4">
                        <div class="form-label">رمز پنل پیشفرض</div>
                        <input type="text" class="form-control" wire:model.lazy="server_password">
                        @error('server_password') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>


                    <div class="col-md-12 mt-4">
                        <div class="form-label">نام کاربری سرور پیشفرض</div>
                        <input type="text" class="form-control" wire:model.lazy="panel_username">
                        @error('panel_username') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>


                    <div class="col-md-12 mt-4">
                        <div class="form-label">رمز کاربری پیشفرص</div>
                        <input type="text" class="form-control" wire:model.defer="panel_password">
                        @error('panel_password') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>

                    <button type="submit" class="btn mt-3 btn-primary">
                        ذخیره تغییرات
                    </button>

                </form>
            </div>
        </div>
    </div>
</div>
