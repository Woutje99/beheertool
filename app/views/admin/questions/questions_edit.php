<?php if($errors->count() > 0 ): ?>
    <div class="alert alert-danger">
        <?php foreach($errors->all() as $message): ?>
            - <?php echo $message ?> <br />
        <?php endforeach; ?>
    </div>
<?php endif; ?>

<form class="form-horizontal" role="form" method="POST">
   
    <?php echo Form::token(); ?>
    <?php echo Form::hidden('id', $question->id); ?>
   
   <div class="form-group">
        <label for="inputName" class="col-lg-2 control-label">Titel</label>
        <div class="col-lg-10">
            <input type="text" name="title" value="<?php echo $question->title; ?>" class="form-control" id="inputName" placeholder="Vraag">
        </div>
    </div>
    <div class="form-group">
        <div class="col-lg-offset-2 col-lg-10">
            <button type="submit" class="btn btn-default">Opslaan <i class="icon-save"></i></button>
            <a href="<?php echo Request::root(); ?>/admin/questions" class="btn btn-default">Annuleren <i class=""></i></a>
        </div>
    </div>
</form>


