<?php

use Source\Models\Auth;

$v->layout("_chat2");

?>



<div class="page-content">
    <div class="container-fluid">
        <div class="chat-wrapper d-lg-flex gap-1 mx-n4 mt-n4 p-1">


            <div class="user-chat w-100  user-chat-show">

                <div class="chat-content d-lg-flex">
                    <!-- start chat conversation section -->
                    <div class="w-100 overflow-hidden position-relative">
                        <!-- conversation user -->
                        <div class="position-relative">
                            <div class="p-3 user-chat-topbar" style="background-color: #161D31;">
                                <div class="row align-items-center">
                                    <div class="col-sm-4 col-8">
                                        <div class="d-flex align-items-center">
                                            <div class="flex-shrink-0 d-block d-lg-none me-3">
                                                <a href="javascript: void(0);" class="user-chat-remove fs-18 p-1"><i class="ri-arrow-left-s-line align-bottom"></i></a>
                                            </div>
                                            <div class="flex-grow-1 overflow-hidden">
                                                <div class="d-flex align-items-center">
                                                    <div class="flex-shrink-0 chat-user-img online user-own-img align-self-center me-3 ms-0">
                                                        <img src="<?= urlExterna("/storage/$user->photo"); ?>" class="rounded-circle avatar-xs" alt="">
                                                        <span class="user-status"></span>
                                                    </div>
                                                    <div class="flex-grow-1 overflow-hidden">
                                                        <h5 class="text-truncate mb-0 fs-16" style="color: #fff;">
                                                            <a class=" text-reset username" data-bs-toggle="offcanvas" href="#userProfileCanvasExample" aria-controls="userProfileCanvasExample">
                                                                <?= $user->name ?>
                                                            </a>
                                                        </h5>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class=" col-sm-8 col-4">
                                        <ul class="list-inline user-chat-nav text-end mb-0">

                                            <li class="list-inline-item d-lg-inline-block m-0">
                                                <a href="<?= $userLogado->access_level_id == 1 ? url("/students") : url("/") ?>" type="button" class="btn btn-ghost-secondary " data-bs-toggle="offcanvas" data-bs-target="#userProfileCanvasExample" aria-controls="userProfileCanvasExample" style="color: #fff;">
                                                    Voltar <i class="fas fa-sign-out-alt" style="margin-left: 5px;"></i>
                                                </a>
                                            </li>

                                        </ul>
                                    </div>
                                </div>

                            </div>
                            <!-- end chat user head -->

                            <div class="position-relative" id="users-chat">
                                <div class="chat-conversation p-3 p-lg-4 " data-simplebar style="background-color: #333A4E;">
                                    <div class="list-unstyled chat-conversation-list scrollerchat" id="users-conversation">



                                    </div>
                                    <!-- end chat-conversation-list -->

                                </div>

                            </div>

                            <!-- end chat-conversation -->

                            <div class="chat-input-section p-3 p-lg-4" style="background-color: #161D31;">

                                <form id="chatinput-form" enctype="multipart/form-data" class="typing-area">
                                    <div class="row g-0 align-items-center">

                                        <input type="text" name="outgoing_id" value="<?= Auth::user()->id ?>" hidden />
                                        <input type="text" name="incoming_id" class="incoming_id" value="<?= $user->id ?>" hidden />
                                        <div class="col">
                                            <div class="chat-input-feedback">
                                                Digite uma mensagem
                                            </div>
                                            <input type="text" class="form-control chat-input bg-light border-light input-field" id="message" name="message" placeholder="Mensagem..." autocomplete="off">
                                        </div>
                                        <div class="col-auto">
                                            <div class="chat-input-links ms-2">
                                                <div class="links-list-item">
                                                    <button type="submit" class="btn btn-success chat-send waves-effect waves-light">
                                                        <i class="fa fa-paper-plane"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </form>
                            </div>

                            <div class="replyCard">
                                <div class="card mb-0">
                                    <div class="card-body py-3">
                                        <div class="replymessage-block mb-0 d-flex align-items-start">
                                            <div class="flex-grow-1">
                                                <h5 class="conversation-name"></h5>
                                                <p class="mb-0"></p>
                                            </div>
                                            <div class="flex-shrink-0">
                                                <button type="button" id="close_toggle" class="btn btn-sm btn-link mt-n2 me-n3 fs-18">
                                                    <i class="bx bx-x align-middle"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end chat-wrapper -->

    </div>
    <!-- container-fluid -->
</div>
<!-- End Page-content -->

<footer class="footer" style="background-color: #161D31;">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12" style="color: #fff;">
                <div class="text-sm-end d-sm-block">
                    DIREITO AUTORAL &copy;
                    <?= date('Y') ?>, criado e desenvolvido por <a class="ms-25" href="https://www.keygen.com.br/" target="_blank">Keygen Solution</a><span class="d-sm-inline-block">, Todos os direitos
                        reservados
                </div>
            </div>
        </div>
    </div>
</footer>

<?php $v->start("scripts"); ?>

<script>
    const form = document.querySelector(".typing-area"),
        incoming_id = form.querySelector(".incoming_id").value,
        inputField = form.querySelector(".input-field"),
        sendBtn = form.querySelector("button"),
        chatBox = document.querySelector(".scrollerchat")

    form.onsubmit = (e) => {
        e.preventDefault();
    }

    sendBtn.onclick = () => {
        let xhr = new XMLHttpRequest();
        xhr.open("POST", "<?= url("/chat/{$user->id}/chat-insert"); ?>", true);
        xhr.onload = () => {
            if (xhr.readyState === XMLHttpRequest.DONE) {
                if (xhr.status === 200) {
                    inputField.value = "";
                    scrollToBottom();
                }
            }
        }
        let formData = new FormData(form);
        xhr.send(formData);
    }

    chatBox.onmouseenter = () => {
        chatBox.classList.add("active");
    }

    chatBox.onmouseleave = () => {
        chatBox.classList.remove("active");
    }

    setInterval(() => {
        let xhr = new XMLHttpRequest();
        xhr.open("POST", "<?= url("/chat/{$user->id}/chat-get"); ?>", true);
        xhr.onload = () => {
            if (xhr.readyState === XMLHttpRequest.DONE) {
                if (xhr.status === 200) {
                    let data = xhr.response;
                    chatBox.innerHTML = data;
                    if (!chatBox.classList.contains("active")) {
                        // scrollToBottom();
                    }


                }
            }
        }
        xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhr.send("incoming_id=" + incoming_id);
    }, 500);

    // function scrollToBottom() {
    //     chatBox.scrollTop = chatBox.scrollHeight;
    // }
</script>

<?php $v->end(); ?>