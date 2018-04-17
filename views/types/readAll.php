<p>Here is a list of all types:</p>

<?php foreach($types as $type) { ?>
  <p>
    <?php echo $type->name; ?> &nbsp; &nbsp;
    <a href='?controller=type&action=read&id=<?php echo $type->id; ?>'>See type information</a> &nbsp; &nbsp;
   
  </p>
<?php } ?>