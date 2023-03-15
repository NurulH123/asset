<div class="card-inner pt-0">
    <h4 class="title nk-block-title">Tambah User</h4>
    @if (Session::has('success'))
        <div class="alert alert-success">{{ Session::get('success') }}</div>
    @endif
    <form action="{{ route('register') }}" class="gy-3 form-settings" method="post">
        @csrf

        <div class="row g-3 align-center">
            <div class="col-lg-5">
                <div class="form-group">
                    <label class="form-label" for="name">Nama</label>
                    <span class="form-note">Masukkan nama sebagai kelengkapan informasi.</span>
                </div>
            </div>
            <div class="col-lg-7">
                <div class="form-group">
                    <div class="form-control-wrap">
                        <input name="name" type="text" class="form-control" id="name" placeholder="Masukkan nama lengkap">
                    </div>
                </div>
                @error('name')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="row g-3 align-center">
            <div class="col-lg-5">
                <div class="form-group">
                    <label class="form-label" for="email">Email</label>
                    <span class="form-note">Daftarkan email yang digunakan untuk login ke dashboard.</span>
                </div>
            </div>
            <div class="col-lg-7">
                <div class="form-group">
                    <div class="form-control-wrap">
                        <input name="email" type="text" class="form-control" id="email" placeholder="Masukkan email">
                    </div>
                </div>
                @error('email')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="row g-3 align-center">
            <div class="col-lg-5">
                <div class="form-group">
                    <label class="form-label" for="password">Password</label>
                    <span class="form-note">Buat password yang digunakan untuk login ke dashboard.</span>
                </div>
            </div>
            <div class="col-lg-7">
                <div class="form-control-wrap">
                    <a href="#" class="form-icon form-icon-right passcode-switch lg" data-target="password">
                        <em class="passcode-icon icon-show icon ni ni-eye"></em>
                        <em class="passcode-icon icon-hide icon ni ni-eye-off"></em>
                    </a>
                    <input name="password" type="password" class="form-control form-control-lg" id="password" placeholder="Buat password Anda">
                </div>
                @error('password')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="row g-3 align-center">
            <div class="col-lg-5">
                <div class="form-group">
                    <label class="form-label" for="confirm_password">Konfirm Password</label>
                    <span class="form-note">Masukkan kembali password.</span>
                </div>
            </div>
            <div class="col-lg-7">
                <div class="form-control-wrap">
                    <a href="#" class="form-icon form-icon-right passcode-switch lg" data-target="password">
                        <em class="passcode-icon icon-show icon ni ni-eye"></em>
                        <em class="passcode-icon icon-hide icon ni ni-eye-off"></em>
                    </a>
                    <input name="confirm_password" type="password" class="form-control form-control-lg" id="confirm_password" placeholder="Masukkan kembali password Anda">
                </div>
                @error('confirm_password')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="row g-3 align-center">
            <div class="col-lg-5">
                <div class="form-group">
                    <label class="form-label" for="comp-copyright">Role</label>
                    <span class="form-note">Role untuk memberikan user, akses ke menu-menu yang ada di dashboard.</span>
                </div>
            </div>
            <div class="col-lg-7">
                <div class="form-group">
                    <div class="form-control-wrap">
                        <select name="role" class="form-select js-select2" data-search="on">
                            <option value=""></option>
                            <option value="admin">Admin</option>
                            <option value="hr">HR</option>
                            <option value="moderator">Moderator</option>
                            <option value="ga">GA</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
        <div class="row g-3">
            <div class="col-lg-7">
                <div class="form-group mt-2">
                    <button type="submit" class="btn btn-lg btn-primary">Kirim Data</button>
                </div>
            </div>
        </div>
    </form>
</div>
