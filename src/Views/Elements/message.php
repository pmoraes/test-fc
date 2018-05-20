<?php if(isset($_SESSION['message-error'])): ?>
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Atenção:</strong>
        <?= $_SESSION['message-error']; ?>
        <?php unset($_SESSION['message-error']); ?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
<?php endif; ?>

<?php if(isset($_SESSION['message-success'])): ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Atenção:</strong>
        <?= $_SESSION['message-success']; ?>
        <?php unset($_SESSION['message-success']); ?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
<?php endif; ?>

