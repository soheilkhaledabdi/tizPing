<div class="modal modal-blur fade OpenEditModals" wire:ignore.self id="OpenEditModals" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">ویرایش سرور</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            </div>

            <div class="modal-body">
                <form wire:submit.prevent="update">
                    <div class="mb-3">
                        <label class="form-label" for="name">نام</label>
                        <input type="text" class="form-control" name="name" id="name" placeholder="نام سرور را وارد کنید" wire:model.lazy="upd_name">
                        <span class="text-danger">@error('name'){{ $message }}@enderror</span>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">ای پی سرور را وارد کنید</label>
                        <input type="text" class="form-control" name="host" placeholder="ای پی سرور را وارد کنید" wire:model.lazy="upd_host">
                        <span class="text-danger">@error('host'){{ $message }}@enderror</span>

                    </div>
                    <div class="mb-3">
                        <label class="form-label">نام کاربری</label>
                        <input type="text" class="form-control" name="username" id="username" placeholder="نام کاربری را وارد کنید" wire:model.lazy="upd_username">
                        <span class="text-danger">@error('username'){{ $message }}@enderror</span>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">رمز</label>
                        <input type="text" name="password" id="password" class="form-control" placeholder="رمز سرور را وارد کنید" wire:model="upd_password">
                        <span class="text-danger">@error('password'){{ $message }}@enderror</span>

                    </div>

                    <div class="mb-3">
                        <label class="form-label" >پورت</label>
                        <input type="text" name="port" id="port" class="form-control" placeholder="پورت سرور را وارد کنید" wire:model="upd_port">
                        <span class="text-danger">@error('port'){{ $message }}@enderror</span>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">نام کاربری پنل</label>
                        <input type="text" class="form-control" name="upd_panel_username" id="upd_panel_username" placeholder="نام کاربری را وارد کنید" wire:model.lazy="upd_panel_username">
                        <span class="text-danger">@error('username'){{ $message }}@enderror</span>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">رمز پنل</label>
                        <input type="text" name="upd_panel_password" id="upd_password" class="form-control" placeholder="رمز سرور را وارد کنید" wire:model="upd_panel_password">
                        <span class="text-danger">@error('upd_panel_password'){{ $message }}@enderror</span>

                    </div>

                    <div class="mb-3">
                        <label class="form-label" >فعال ؟</label>
                        <input type="checkbox" name="status"wire:model="upd_status">
                        <span class="text-danger">@error('status'){{ $message }}@enderror</span>
                    </div>

                    <button type="submit" class="btn btn-primary">ذخیره</button>
                    <button type="button" class="btn btn-danger " data-bs-dismiss="modal">بستن</button>
                </form>


            </div>

        </div>
    </div>
</div>
