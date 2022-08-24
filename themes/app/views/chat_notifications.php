<?php if (!empty($notifications)): ?>

  <?php foreach ($notifications as $item): ?>

    <?php $user = (new \Source\Models\User())->findById($item->sent_by) ?>
        <a class="d-flex" href="<?= url("/chat/{$item->sent_by}"); ?>">
            <div class="list-item d-flex align-items-start">
                <div class="me-1">
                    <div class="avatar"><img
                                src="<?= urlExterna("/storage/{$user->photo}"); ?>"
                                alt="avatar" width="32" height="32"></div>
                </div>
                <div class="list-item-body flex-grow-1">
                    <p class="media-heading"><span class="fw-bolder"><?= $user->name ?></span>
                    </p><small class="notification-text"> <?= date_fmt($item->created_at) ?></small>
                </div>
            </div>
        </a>
  <?php endforeach; ?>

<?php else: ?>
    <p class="mb-0 bold ml-2 mr-2" style="color: #FFFFFF">Você não tem nenhuma mensagem</p>
<?php endif; ?>