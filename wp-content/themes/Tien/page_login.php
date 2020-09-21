<?php
/*
 Template Name: Login Page
 */
?>
 
<div class="login-area">
    <?php
        $login  = (isset($_GET['login']) ) ? $_GET['login'] : 0;
        if ( $login === "failed" ) {
                echo '<p><strong>ERROR:</strong> Sai username hoặc mật khẩu.</p>';
        } elseif ( $login === "empty" ) {
                echo '<p><strong>ERROR:</strong> Username và mật khẩu không thể bỏ trống.</p>';
        } elseif ( $login === "false" ) {
                echo '<p><strong>ERROR:</strong> Bạn đã thoát ra.</p>';
        }
    ?>
        <div class="form">
            <div>
                <?php
                        $args = array(
                                'redirect'       => site_url( $_SERVER['REQUEST_URI'] ),
                                'form_id'        => 'dangnhap', //Để dành viết CSS
                                'label_username' => __( 'Tên tài khoản' ),
                                'label_password' => __( 'Mật khẩu' ),
                                'label_remember' => __( 'Ghi nhớ' ),
                                'label_log_in'   => __( 'Đăng nhập' ),
                        );
                        wp_login_form($args);
                ?>
            </div>    
        </div>
</div>



<!--css-->
<style>
        body {
                background: white;
                font-family: Arial, sans-serif;
                font-size: 14px;
                line-height: 1.5em;
        }
        .login-area {
                background: pink;
                margin: 80px auto;
                width: 350px;
                height: 280px;            
                overflow: hidden;
        }
        .note {
                float: left;
                margin-right: 20px;
        }
        .form div{
            height: 230px; 
            margin-top: 25px;
            border:1px solid black;
           

        }
        .form {
                color: white;
                margin-left: 40px;
                width: 250px;
                text-align: center;
        }
        label {
                display: block;
                color: black;
        }
        input[type=email], input[type=number], input[type=password], input[type=search], input[type=tel], input[type=text], input[type=url], select, textarea {
                border: 1px solid #DDD;
                -webkit-box-shadow: inset 0 1px 2px rgba(0, 0, 0, 0.07);
                box-shadow: inset 0 1px 2px rgba(0, 0, 0, 0.07);
                background-color: #FFF;
                color: #333;
                -webkit-transition: .05s border-color ease-in-out;
                transition: .05s border-color ease-in-out;
                padding: 5px 10px;
        }
        input[type=submit] {
                        background: #51a818;
                        background-image: -webkit-linear-gradient(top, #51a818, #3d8010);
                        background-image: -moz-linear-gradient(top, #51a818, #3d8010);
                        background-image: -ms-linear-gradient(top, #51a818, #3d8010);
                        background-image: -o-linear-gradient(top, #51a818, #3d8010);
                        background-image: linear-gradient(to bottom, #51a818, #3d8010);
                        -webkit-border-radius: 10px;
                        -moz-border-radius: 10px;
                        border-radius: 10px;
                        font-family: Arial;
                        color: #ffffff;
                        padding: 10px 20px 10px 20px;
                        border: solid #32a840 2px;
                        text-decoration: none;
        }
</style>