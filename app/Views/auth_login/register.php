<?= $this->extend('auth_login/layout/template') ?>
<?= $this->section('content') ?>
<div class="container" style="margin-top: 3.2%;">

    <div class="row justify-content-center">
        <div class="col-xl-6">
            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <div class="col-lg">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">Buat Akun Baru</h1>
                                </div>
                                <?= view('Myth\Auth\Views\_message_block') ?>
                                <form action="<?= route_to('register') ?>" method="post" class="user">
                                    <?= csrf_field() ?>
                                    <div class="form-group">
                                        <input type="email"
                                            class="form-control form-control-user <?php if(session('errors.email')) : ?>is-invalid<?php endif ?>"
                                            name="email" placeholder="<?=lang('Auth.email')?>"
                                            value="<?= old('email') ?>" autocomplete="off">
                                    </div>
                                    <div class="form-group">
                                        <input type="text"
                                            class="form-control form-control-user <?php if(session('errors.username')) : ?>is-invalid<?php endif ?>"
                                            name="username" placeholder="<?=lang('Auth.username')?>"
                                            value="<?= old('username') ?>" autocomplete="off">
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-6 mb-3 mb-sm-0">
                                            <input type="password" name="password"
                                                class="form-control form-control-user <?php if(session('errors.password')) : ?>is-invalid<?php endif ?>"
                                                placeholder="<?=lang('Auth.password')?>" autocomplete="off">
                                        </div>
                                        <div class="col-sm-6">
                                            <input type="password" name="pass_confirm"
                                                class="form-control form-control-user <?php if(session('errors.pass_confirm')) : ?>is-invalid<?php endif ?>"
                                                placeholder="<?=lang('Auth.repeatPassword')?>" autocomplete="off">
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary btn-user btn-block">
                                        Daftar
                                    </button>
                                </form>
                                <hr>
                                <div class="text-center">
                                    <a class="small" href="<?= route_to('login') ?>">Masuk</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
<?= $this->endSection() ?>