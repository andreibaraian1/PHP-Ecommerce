<div class="col-md-6 col-sm-12 form-group">
    <label for="register-form-name">Name:</label>
    <input type="text" name="name" value="<?php if(isset($row)) { echo $row['produs_nume']; } ?>" class="form-control" / required>
</div>
<div class="col-md-6 col-sm-12 form-group">
    <label for="register-form-name">Pret:</label>
    <input type="text" name="price" value="<?php if(isset($row)) { echo $row['produs_pret']; } ?>" class="form-control" / required>
</div>
<div class="col-md-6 col-sm-12 form-group">
    <label for="register-form-name">Imagine:</label>
    <input type="text" name="img" value="<?php if(isset($row)) { echo $row['produs_img']; } ?>" class="form-control" / required>
</div>
<div class="col-md-6 col-sm-12 form-group">
    <label for="register-form-name">Categorie:</label>
    <input type="text" name="categorie" value="<?php if(isset($row)) { echo $row['produs_categ']; } ?>" class="form-control" / required>
</div>
<div class="col-md-6 col-sm-12 form-group">
    <label for="register-form-name">Descriere:</label>
    <input type="text" name="descriere" value="<?php if(isset($row)) { echo $row['produs_descriere']; } ?>" class="form-control" / required>
</div>
