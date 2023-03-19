
<!DOCTYPE html>
<html lang="zxx" class="js">

<head>
    <base href="../../../">
    <meta charset="utf-8">
    <meta name="author" content="Softnio">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="A powerful and conceptual apps base dashboard template that especially build for developers and programmers.">
    <!-- Google Font  -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">
    <!-- Page Title  -->
    <title>Login</title>
    <!-- StyleSheets  -->
    <link rel="stylesheet" href="{{ asset('assets/css/dashlite.css?ver=3.1.2') }}">
    <link id="skin-default" rel="stylesheet" href="{{ asset('assets/css/theme.css?ver=3.1.2') }}">

    <style>
        body{
            overflow: hidden;
        }
        .nk-content{
            /* opacity: .5; */
            position: relative;
            background-size: cover;
            background-position: right;
            background-repeat: no-repeat;
        }
        .asset-title-logo h3{
            color: #FFED00;
            font-family: 'Lobster', cursive;
            text-shadow: -1px 2px 1px #ccc;
        }
        .overlay{
            height: 100vh;
            width: 100vw;
            position: absolute;
            background: rgba(0, 0, 0, .7);
        }
        .bg-text{
            bottom: 10%;
            left: 5%;
        }
    </style>
</head>

<body class="nk-body bg-white npc-general pg-auth">
    <div class="nk-app-root">
        <!-- main @s -->
        <div class="nk-main ">
            <!-- wrap @s -->
            <div class="nk-wrap nk-wrap-nosidebar">
                <!-- content @s -->
                {{-- <div class="nk-content" style="background-image: url({{ asset('assets/images/asset.jpg') }})"> --}}
                    <div class="nk-content" style="background-color: #060047">
                    {{-- <div class="overlay"></div> --}}
                    <div class="nk-block nk-block-middle nk-auth-body  wide-xs">
                        <div class="brand-logo pb-4 text-center">
                        </div>
                        <div class="card card-bordered">
                            <div class="card-inner card-inner-lg shadow">
                                <div class="nk-block-head">
                                    <div class="nk-block-head-content text-center mb-4 mt-2">
                                        <div class="text-center asset-title-logo">
                                            <h3 class="nk-block-title">Asset</h3>
                                            <h3 class="nk-block-title"> Management</h3>
                                        </div>
                                    </div>
                                </div><!-- .nk-block-head -->
                                <form method="POST" action="{{ route('login') }}">
                                    @csrf
                                    <div class="form-group">
                                        <div class="form-label-group">
                                            <label class="form-label" for="default-01">Email</label>
                                        </div>
                                        <div class="form-control-wrap">
                                            <input name="email" type="text" class="form-control form-control-lg" id="default-01" placeholder="Masukkan Email Anda">
                                        </div>

                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div><!-- .form-group -->
                                    <div class="form-group">
                                        <div class="form-label-group">
                                            <label class="form-label" for="password">Password</label>
                                        </div>
                                        <div class="form-control-wrap">
                                            <a tabindex="-1" href="#" class="form-icon form-icon-right passcode-switch lg" data-target="password">
                                                <em class="passcode-icon icon-show icon ni ni-eye"></em>
                                                <em class="passcode-icon icon-hide icon ni ni-eye-off"></em>
                                            </a>
                                            <input name="password" type="password" class="form-control form-control-lg" id="password" placeholder="Masukkan Password">
                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div><!-- .form-group -->
                                    <div class="form-group">
                                        <button class="btn btn-lg btn-primary btn-block">Login</button>
                                    </div>
                                </form><!-- form -->
                                <div class="form-note-s2 pt-4 pb-2">
                                    Belum Punya Akun? <a href="{{ url('/register') }}">Buat Akun</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- wrap @e -->
            </div>
            <!-- content @e -->
        </div>
        <!-- main @e -->
    </div>
    <!-- app-root @e -->
    <!-- JavaScript -->
    <script src="{{ asset('assets/js/bundle.js?ver=3.1.2') }}"></script>
    <script src="{{ asset('assets/js/scripts.js?ver=3.1.2') }}"></script>

</html>
