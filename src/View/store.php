</header>
    <!-- /헤더 영역 -->

    <!-- 장바구니 영역 -->
    <div class="container padding">
        <div class="py-4 sticky-top bg-white">
            <span class="text-muted">장바구니</span>
            <div class="title">장바구니</div>
            <div class="table-head">
                <div class="cell-50">상품 정보</div>
                <div class="cell-15">가격</div>
                <div class="cell-10">수량</div>
                <div class="cell-15">합계</div>
                <div class="cell-10">+</div>
            </div>
        </div>
        <div id="cart-list">
            <div class="w-100 py-5 text-center fx-n2 text-muted">장바구니에 담긴 상품이 없습니다.</div>
        </div>
        <div class="mt-4 d-between">
            <div>
                <span class="text-muted">총 합계</span>
                <span class="total-price ml-3 text-gold fx-3">0</span>
                <small class="text-muted">원</small>
            </div>
            <button class="button-label" data-target="#buy-modal" data-toggle="modal">
                구매하기
                <i class="fa fa-shopping-cart ml-3"></i>
            </button>
        </div>
    </div>
    <!-- /장바구니 영역 -->

    <!-- 스토어 영역 -->
    <div class="bg-gray">
        <div class="container padding">
            <div class="pt-4 sticky-top bg-gray d-between mb-4 border-bottom pb-3">
                <div>
                    <span class="text-muted">인테리어 스토어</span>
                    <div class="title blue">스토어</div>
                </div>
                <div class="d-flex align-items-center">
                    <input type="checkbox" id="open-cart" hidden checked>
                    <div class="search">
                        <span class="icon"><i class="fa fa-search"></i></span>
                        <input type="text" placeholder="검색어를 입력해 주세요">
                    </div>
                    <label for="open-cart" class="ml-4 mr-5 text-blue">
                        <i class="fa fa-shopping-cart fa-lg"></i>
                    </label>
                    <div id="drop-area">
                        <div class="text-center text-white">
                            <div class="success position-center">
                                <i class="fa fa-check fa-3x"></i>
                                <p class="mt-4 text-nowrap fx-n2">장바구니에 상품이 등록되었습니다!</p>
                            </div>
                            <div class="error position-center">
                                <i class="fa fa-times fa-3x"></i>
                                <p class="mt-4 text-nowrap fx-n2">이미 장바구니에 담긴 상품입니다.</p>
                            </div>
                            <div class="normal position-center">
                                <i class="fa fa-shopping-cart fa-3x"></i>
                                <p class="mt-4 text-nowrap fx-n2">여기에 상품을 넣어주세요.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="store-list" class="row">
                <div class="w-100 py-5 text-center fx-n2 text-muted">일치하는 상품이 없습니다.</div>
            </div>
        </div>
    </div>
    <!-- /스토어 영역 -->

    <!-- 구매하기 --> 
    <div id="buy-modal" class="modal fade">
        <div class="modal-dialog">
            <form class="modal-content">
                <div class="modal-body pt-4 pb-3 px-4">
                    <div class="title text-center">
                        BUY ITEM
                    </div>
                    <div class="mt-4 form-group">
                        <label for="user_name">구매자</label>
                        <input type="text" id="user_name" class="form-control" name="user_name" placeholder="이름을 입력하세요" required>
                    </div>
                    <div class="mt-1 form-group">
                        <label for="address">주소</label>
                        <input type="text" id="address" class="form-control" name="address" placeholder="주소를 입력하세요" required>
                    </div>
                    <div class="mt-3 form-group">
                        <button class="w-100 py-3 text-white bg-blue">
                            구매 완료
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div id="view-modal" class="modal fade">
        <div class="modal-dialog"></div>
        <img alt="구매 내역" class="mw-100 mx-3 position-center">
    </div>
    <!-- /구매하기 -->