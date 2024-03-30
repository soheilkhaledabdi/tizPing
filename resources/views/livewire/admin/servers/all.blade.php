@section('r_title')
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">اضافه کردن سرور</button>
@endsection
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">لیست سرور ها</h4>
                <div class="table-responsive">
                    <table class="table table-bordered mb-0">

                        <thead>
                        <tr>
                            <th>نام سرور</th>
                            <th>هاست</th>
                            <th>نام کاربری</th>
                            <th>وضعیت</th>
                            <th>عملیات</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($servers as $server)
                            <tr>
                                <td>{{ $server->name }}</td>
                                <td>{{ $server->host }}</td>
                                <td>{{ $server->server_username }}</td>
                                <td>{{ $server->status == 1 ? "فعال" : "غیرفعال" }}</td>
                                <td>
                                    <button type="button" class="btn btn-primary" wire:click="OpenEditModals({{ $server->id }})"  data-toggle="modal" data-target="#OpenEditModals"><i class="bx bxs-edit-alt" ></i></button>
                                    <button type="button" class="btn btn-danger" wire:click="deleteConfirm({{ $server->id }})"><i class="bx bxs-trash" ></i></button>
                                        <a href="{{ \Illuminate\Support\Facades\Storage::url($server?->backup?->url) }}" type="button" class="btn btn-dark" target="_blank"><i class="bx bxs-download"></i></a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>

            </div>
            {{ $servers->links()  }}
        </div>
        @include('livewire.admin.servers.modals.add')
        @include('livewire.admin.servers.modals.edit')
    </div>
</div>
