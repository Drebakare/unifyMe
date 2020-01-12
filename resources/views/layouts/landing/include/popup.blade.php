
    <div class="modal fade" id="loginModal" role="dialog">
        <div class="modal-dialog modal-sm">
            <div class="modal-content login-modal">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title"><i class="fa fa-sign-in"></i>LOGIN</h4>
                </div>
                <form action="{{route('user.login')}}" method="post">
                    @csrf
                    <div class="modal-body">
                        <div>
                            <label><i class="fa fa-user"></i>EMAIL</label>
                            <input class="form-control" name="email" type="text" placeholder="Email" required>
                        </div>
                        <div>
                            <label><i class="fa fa-key"></i>PASSWORD</label>
                            <input class="form-control" name="password" type="password" placeholder="Password" required>
                        </div>
                        <a href="#" class="forgot-link">FORGOT PASSWORD?</a>
                        <button type="submit" class="login-link"><i class="fa fa-sign-in"></i>LOGIN</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
