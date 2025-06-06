<?php
    include 'header.php';
?>
 <main class="main pages">
        <div class="page-header breadcrumb-wrap">
            <div class="container">
                <div class="breadcrumb">
                    <a href="index.html" rel="nofollow"><i class="fi-rs-home mr-5"></i>Home</a>
                    <span></span> Pages <span></span> My Account
                </div>
            </div>
        </div>
        <div class="page-content pt-150 pb-150">
            <div class="container">
                <div class="row">
                    <div class="col-xl-4 col-lg-6 col-md-12 m-auto">
                        <div class="login_wrap widget-taber-content background-white">
                            <div class="padding_eight_all bg-white">
                                <div class="heading_s1">
                                    <img class="border-radius-15" src="assets/imgs/page/forgot_password.svg" alt="" />
                                    <h2 class="mb-15 mt-15">Forgot your password?</h2>
                                    <p class="mb-30">Not to worry, we got you! Let’s get you a new password. Please enter your email address or your Username.</p>
                                </div>
                                <form method="post">
                                    <div class="form-group">
                                        <input type="text" required="" name="email" placeholder="Username or Email *" />
                                    </div>
                                    <div class="login_footer form-group">
                                        <div class="chek-form">
                                            <input type="text" required="" name="email" placeholder="Security code *" />
                                        </div>
                                    </div>
                                    <div class="login_footer form-group mb-50">
                                        <div class="chek-form">
                                            <div class="custome-checkbox">
                                                <input class="form-check-input" type="checkbox" name="checkbox" id="exampleCheckbox1" value="" />
                                                <label class="form-check-label" for="exampleCheckbox1"><span>I agree to terms & Policy.</span></label>
                                            </div>
                                        </div>
                                        <a class="text-muted" href="#">Learn more</a>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-heading btn-block hover-up" name="login">Reset password</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
<?php
    include 'footer.php';
?>