<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>내집꾸미기</title>
    <script src="/resources/jquery-3.4.1.min.js"></script>
    <link rel="stylesheet" href="/resources/bootstrap-4.3.1-dist/css/bootstrap.min.css">
    <script src="/resources/bootstrap-4.3.1-dist/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="/resources/fontawesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="/resources/css/style.css">
    <script>
        $(function(){
            $(".custom-file-input").on("change", function(e){
                if(this.files.length > 0){
                    $(this).siblings(".custom-file-label").text(this.files[0].name);
                } else {
                    $(this).siblings(".custom-file-label").text("파일을 업로드 하세요.");
                }
            });
            
            $("[data-target='#sign-up']").on("click", function(){
                let canvas = $("#cap_canvas")[0];
                let ctx = canvas.getContext("2d");
                ctx.clearRect(0, 0, canvas.width, canvas.height);
                ctx.font = "50px 나눔스퀘어, sans-serif";

                let captcha = Math.random().toString(36).substr(2, 5);
                let cw = ctx.measureText(captcha).width;
                
                ctx.fillText(captcha, canvas.width / 2 - width / 2, canvas.height / 2 + 20);
                $("#cap_answer").val(captcha);
            });
        });
    </script>
</head>
<body>
    <div id="sign-in" class="modal fade">
        <div class="modal-dialog">
            <form class="modal-content" method="post" action="/sign-in">
                <div class="modal-body pt-4 pb-3 px-4">
                    <div class="title text-center">
                        SIGN IN
                    </div>
                    <div class="mt-4 form-group">
                        <label for="login_id">아이디</label>
                        <input type="text" id="login_id" class="form-control" name="user_id" placeholder="아이디를 입력하세요" required>
                    </div>
                    <div class="mt-1 form-group">
                        <label for="login_pw">비밀번호</label>
                        <input type="password" id="login_pw" class="form-control" name="password" placeholder="비밀번호를 입력하세요" required>
                    </div>
                    <div class="mt-3 form-group">
                        <button class="w-100 py-3 text-white bg-blue">
                            로그인
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div id="sign-up" class="modal fade">
        <div class="modal-dialog">
            <form class="modal-content" method="post" action="/sign-up" enctype="multipart/form-data">
                <div class="modal-body pt-4 pb-3 px-4">
                    <div class="title text-center">
                        SIGN UP
                    </div>
                    <div class="mt-4 form-group">
                        <label for="join_id">아이디</label>
                        <input type="text" id="join_id" class="form-control" name="user_id" placeholder="아이디를 입력하세요" required>
                    </div>
                    <div class="mt-1 form-group">
                        <label for="join_pw">비밀번호</label>
                        <input type="password" id="join_pw" class="form-control" name="password" placeholder="비밀번호를 입력하세요" required>
                    </div>
                    <div class="mt-1 form-group">
                        <label for="join_name">이름</label>
                        <input type="text" id="join_name" class="form-control" name="user_name" placeholder="이름을 입력하세요" required>
                    </div>
                    <div class="mt-1 form-group">
                        <label for="join_photo">사진</label>
                        <div class="custom-file">
                            <input type="file" name="photo" id="join_photo" class="custom-file-input" required>
                            <label for="join_photo" class="custom-file-label">파일을 업로드 하세요.</label>
                        </div>
                    </div>
                    <div class="mt-1 form-group">
                        <input type="hidden" id="cap_answer" name="cap_answer">
                        <canvas id="cap_canvas" class="w-100 border" width="450" height="100"></canvas>
                        <input type="text" id="cap_input" name="cap_input" class="form-control" placeholder="상단의 문자열를 입력하세요" required>
                    </div>
                    <div class="mt-3 form-group">
                        <button class="w-100 py-3 text-white bg-blue">
                            회원가입
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>


    <!-- 헤더 영역 -->
    <header <?= $currentURL !== "/" ? "class='no-visual'" :"" ?>>
        <!-- GNB -->
        <div id="gnb">
            <div class="h-100 d-between align-items-lg-end py-lg-3 px-4">
                <a href="/">
                    <img src="/resources/images/logo.svg" alt="내집꾸미기" title="내집꾸미기" height="60">
                </a> 
                <div class="nav position-center d-none d-lg-flex mt-2">
                    <a href="/">
                        <span class="icon mb-2">
                            <i class="fa-2x fa fa-home"></i>
                        </span>
                        홈
                    </a>
                    <a href="/online-party">
                        <span class="icon mb-2">
                            <i class="fa-2x fa fa-search"></i>
                        </span>
                        온라인 집들이
                    </a>
                    <a href="/store">
                        <span class="icon mb-2">
                            <i class="fa-2x fa fa-shopping-cart"></i>
                        </span>
                        스토어
                    </a>
                    <a href="/experts">
                        <span class="icon mb-2">
                            <i class="fa-2x fa fa-user-secret"></i>
                        </span>
                        전문가
                    </a>
                    <a href="/estimates">
                        <span class="icon mb-2">
                            <i class="fa-2x fa fa-file-text"></i>
                        </span>
                        시공 견적
                    </a>
                </div>
                <div>
                    <div class="auth d-none d-lg-flex">
                        <?php if(user()):?>
                            <span class="fx-n2 text-gold"><?=user()->user_name?>(<?=user()->user_id?>)</span>
                            <a href="/logout">로그아웃</a>
                        <?php else: ?>
                            <a href="#" data-target="#sign-in" data-toggle="modal">로그인</a>
                            <a href="#" data-target="#sign-up" data-toggle="modal">회원가입</a>
                        <?php endif;?>
                    </div>
                    <div class="menu-icon d-lg-none">
                        <div></div>
                        <div></div>
                        <div></div>
                    </div>
                    <div class="menu d-lg-none">
                        <div class="inner">
                            <div class="m-nav">
                                <a href="/">홈</a>
                                <a href="/online-party">온라인 집들이</a>
                                <a href="/store">스토어</a>
                                <a href="/experts">전문가</a>
                                <a href="/estimates">시공 견적</a>
                            </div>
                            <div class="m-auth">
                                <?php if(user()):?>
                                    <span class="fx-n2 text-gold mr-3"><?=user()->user_name?>(<?=user()->user_id?>)</span>
                                    <a href="/logout">로그아웃</a>
                                <?php else: ?>
                                    <a href="#" data-target="#sign-in" data-toggle="modal">로그인</a>
                                    <a href="#" data-target="#sign-up" data-toggle="modal">회원가입</a>
                                <?php endif;?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /GNB -->